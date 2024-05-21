<?php

namespace App\Http\Controllers;

use App\Models\forum_post;
use App\Models\discount;
use App\Models\mobile_type;
use App\Models\notice;
use App\Models\subscription;
use App\Models\tooth;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Models\doctor;
use App\Models\patient_infos;
use App\Models\appointment;
use App\Models\chife_complaint;
use App\Models\clinical_finding;
use App\Models\investigation;
use App\Models\treatment_plan;
use App\Models\treatment_info;
use App\Models\treatment_cost;
use App\Models\drugs;
use App\Models\prescription;
use App\Models\medicine;
use App\Models\report;
use App\Models\treatment_step;
use App\Models\chember_info;
use App\Models\favourite;
use App\Models\treatment_payment;
use App\Models\User;
use App\Models\UserSms;
use App\Models\AdviceTemplate;
use App\Models\DrugTemplate;
use App\Models\SubDrugTemplate;
use PDF;
// use Mail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Str;

class MainController extends Controller
{
    function send_sms($mobile, $msg)
    {
        //dd($mobile, $msg);
        $url = "https://msg.elitbuzz-bd.com/smsapi";
        $data = [
            "api_key" => "C2009043664c759d2d2791.73075139",
            "type" => "unicode",
            "contacts" => "88" . $mobile,
            "senderid" => "8801844502238",
            "msg" => " স্বাগতম " . $msg,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        //dd($response);
        return $response;
    }

    public function patient_age($dob)
    {
        $years = Carbon::parse($dob)->age;
        return response()->json([
            'status' => 200,
            'p_dob' => $years
        ]);
    }

    public function patient_info(Request $request, $d_id)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|max:11',
            'mobile_type' => 'required|exists:mobile_types,id',
            'name' => 'required',
            'date' => 'required',
            'age' => 'required',
            'gender' => 'required|in:Male,Female,Other',
            'Blood_group' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'occupation' => 'required',
            'address' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
        ], [
            'mobile.required' => 'Mobile Field Is Required.',
            'mobile_type.required' => 'Mobile Type Field Is Required.',
            'mobile.max' => 'Mobile must not be greater than 11 characters.',
            'name.required' => 'Name Field Is Required.',
            'date.required' => 'DOB Field Is Required.',
            'age.required' => 'Age Field Is Required.',
            'gender.required' => 'Gender Field Is Required.',
            'Blood_group.required' => 'Blood Group Field Is Required.',
            'occupation.required' => 'Occupation Field Is Required.',
            'address.required' => 'Address Field Is Required.',
            'image.image' => 'Image Field Must Be Image Format.',
            'image.mimes' => 'Image Field Must Be Image Format.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidPAdd', 'Invalid Update')->withInput();
        } else {

            $check_p = patient_infos::where('mobile', $request->mobile)->where('mobile_type', $request->mobile_type)->doesntExist();

            if ($check_p) {

                $filename = '';
                if ($request->hasFile('image')) {

                    $file = $request->file('image');
                    if ($file->isValid()) {
                        $filename = "patient" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                        $file->storeAs('patient', $filename);
                    }
                }

                if ($request->patient_id != null) {
                    patient_infos::create([

                        'd_id' => $d_id,
                        'patient_id' => $request->patient_id,
                        'new_status' => 0,
                        'name' => $request->name,
                        'age' => $request->age,
                        'mobile' => $request->mobile,
                        'mobile_type' => $request->mobile_type,
                        'gender' => $request->gender,
                        'Blood_group' => $request->Blood_group,
                        'date' => $request->date,
                        'occupation' => $request->occupation,
                        'address' => $request->address,
                        'email' => $request->email,
                        'image' => $filename,

                    ]);
                } else {
                    $check = patient_infos::whereDate('created_at', Carbon::today()->format('Y-m-d'))->where('new_status', 1)->where('d_id', auth()->user()->id)->doesntExist();

                    if ($check) {
                        $patient_id = Carbon::today()->format('dmY') . '0001';
                    } else {
                        $getid = patient_infos::whereDate('created_at', Carbon::today()->format('Y-m-d'))->where('new_status', 1)->where('d_id', auth()->user()->id)->latest()->first()->patient_id;
                        $patient_id = $getid + 1;
                    }

                    patient_infos::create([
                        'd_id' => $d_id,
                        'patient_id' => $patient_id,
                        'name' => $request->name,
                        'age' => $request->age,
                        'mobile' => $request->mobile,
                        'mobile_type' => $request->mobile_type,
                        'gender' => $request->gender,
                        'Blood_group' => $request->Blood_group,
                        'date' => $request->date,
                        'occupation' => $request->occupation,
                        'address' => $request->address,
                        'email' => $request->email,
                        'image' => $filename,
                    ]);
                }

                $smsBalance = UserSms::where('user_id', auth()->id())->first();
                $check = $smsBalance !== null && $smsBalance->sms > 0;
                if ($check) {
                    if ($request->has('registration_sms')) {
                        $patientMobile = $request->input('mobile');
                        $patientName = $request->input('name');

                        if (empty($patientMobile) || empty($patientName)) {
                            return response()->json(['error' => 'Invalid input'], 400);
                        }

                        $message = "নিবন্ধনের জন্য।" . $patientName;
                        //dd($this->send_sms($patientMobile, $message));
                        try {
                            $response = $this->send_sms($patientMobile, $message);
                            $responseDecoded = json_decode($response, true);

                            if (isset($responseDecoded['status']) && $responseDecoded['status'] == 'error') {
                                return response()->json(['error' => 'Failed to send SMS', 'details' => $responseDecoded['message']], 500);
                            }
                            $smsBalance->sms - 1;
                            $smsBalance->save();
                            return response()->json(['message' => 'SMS sent successfully']);
                        } catch (\Exception $e) {
                            return response()->json(['error' => 'Failed to send SMS', 'details' => $e->getMessage()], 500);
                        }
                    }
                } else {
                    return back()->with('invalidPExist', 'Invalid Update')->with('fail', 'SMS Balance 0. Please recharge!')->withInput();
                }

                return response()->json(['message' => 'No SMS sent'], 200);

                $p_id = patient_infos::where('mobile', '=', $request->mobile)->where('mobile_type', $request->mobile_type)->where('d_id', '=', $d_id)->first()->id;
                return redirect()->route('view_patient', [$d_id, $p_id])->with('success', 'Patient Information Added Successfully!');
            } else {

                return back()->with('invalidPExist', 'Invalid Update')->with('fail', 'This Mobile Number And Type Already Exist!')->withInput();
            }
        }
    }

    public function edit_patient(Request $request, $d_id, $p_id)
    {
        $validator = Validator::make($request->all(), [
            'u_mobile' => 'required|max:11',
            'u_mobile_type' => 'required|exists:mobile_types,id',
            'u_name' => 'required',
            'u_date' => 'required',
            'u_age' => 'required',
            'u_gender' => 'required|in:Male,Female,Other',
            'u_Blood_group' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'u_occupation' => 'required',
            'u_address' => 'required',
            // 'u_email' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
        ], [
            'u_mobile.required' => 'Mobile Field Is Required.',
            'u_mobile_type.required' => 'Mobile Type Field Is Required.',
            'u_name.required' => 'Name Field Is Required.',
            'u_date.required' => 'DOB Field Is Required.',
            'u_age.required' => 'Age Field Is Required.',
            'u_gender.required' => 'Gender Field Is Required.',
            'u_Blood_group.required' => 'Blood Group Field Is Required.',
            'u_occupation.required' => 'Occupation Field Is Required.',
            'u_address.required' => 'Address Field Is Required.',
            // 'u_email.required' => 'Email Field Is Required.',
            'image.image' => 'Image Field Must Be Image Format.',
            'image.mimes' => 'Image Field Must Be Image Format.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidUPAdd', 'Invalid Update')->withInput();
        } else {
            // dd($request->all());
            $patient_info = patient_infos::find($p_id);

            $filename = $patient_info->image;

            if ($request->hasFile('image')) {
                $destination = 'public/uploads/patient/' . $patient_info->image;
                // dd($destination);
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('image');
                if ($file->isValid()) {
                    $filename = "patient" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                    // dd($filename);
                    $file->storeAs('patient', $filename);
                }
            }


            $patient_info->update([
                'patient_id' => $request->u_patient_id,
                'name' => $request->u_name,
                'age' => $request->u_age,
                'mobile' => $request->u_mobile,
                'mobile_type' => $request->u_mobile_type,
                'gender' => $request->u_gender,
                'Blood_group' => $request->u_Blood_group,
                'date' => $request->u_date,
                'occupation' => $request->u_occupation,
                'address' => $request->u_address,
                'email' => $request->u_email,
                'image' => $filename
            ]);

            return back()->with('success', 'Patient Information Updated Successfully!');
        }
    }

    public function delete_patient(Request $request, $d_id, $p_id)
    {
        $patient = patient_infos::where('id', '=', $p_id)->first();
        // dd($patient);
        $destination = 'public/uploads/patient/' . $patient->image;
        // dd($destination);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $del_reports = report::where('p_id', $p_id)->get();

        foreach ($del_reports as $del_report) {

            $destination = 'public/uploads/report/' . $del_report->image;

            if (File::exists($destination)) {
                File::delete($destination);
            }
        }
        $patient->delete();

        return redirect()->route('doctor')->with('success', 'Patient Information Deleted Successfully!');
    }

    // Patient form Patient List
    public function patient_list(Request $request, $id)
    {
        $doctor_info = User::where('id', '=', $id)->first();
        $patient_list = patient_infos::where('d_id', '=', $doctor_info->id)->get();
        $m_types = mobile_type::all();
        // if ($request->s_patient) {
        //     // dd($request->search);
        //     $patient_list = patient_infos::where('name', 'LIKE', $request->s_patient . '%')->orWhere('mobile', 'LIKE', $request->s_patient . '%')->where('d_id', '=', $id)->get();   
        // }
        return view('doctor.patient_list', compact('doctor_info', 'patient_list', 'm_types'));
    }

    public function edit_patient_list($id)
    {
        $patient = patient_infos::find($id);
        return response()->json([
            'status' => 200,
            'patient_infos' => $patient,
        ]);
    }
    public function update_patient_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|max:11',
            'mobile_type' => 'required|exists:mobile_types,id',
            'name' => 'required',
            'date' => 'required',
            'age' => 'required',
            'gender' => 'required|in:Male,Female,Other',
            'Blood_group' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'occupation' => 'required',
            'address' => 'required',
            // 'email' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
        ], [
            'mobile.required' => 'Mobile Field Is Required.',
            'mobile_type.required' => 'Mobile Type Field Is Required.',
            'name.required' => 'Name Field Is Required.',
            'date.required' => 'DOB Field Is Required.',
            'age.required' => 'Age Field Is Required.',
            'gender.required' => 'Gender Field Is Required.',
            'Blood_group.required' => 'Blood Group Field Is Required.',
            'occupation.required' => 'Occupation Field Is Required.',
            'address.required' => 'Address Field Is Required.',
            // 'email.required' => 'Email Field Is Required.',
            'image.image' => 'Image Field Must Be Image Format.',
            'image.mimes' => 'Image Field Must Be Image Format.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'error' => $validator->errors(),
                'id' => $request->patient_id
            ]);
        } else {
            $p_id = $request->patient_id;

            $patient_info = patient_infos::find($p_id);
            // dd($request->all(),$patient_info);

            $filename = $patient_info->image;
            if ($request->hasFile('image')) {
                $destination = '/public/uploads/patient/' . $patient_info->image;
                if (File::exists($destination)) {
                    File::delete($destination);
                } else {
                }
                $file = $request->file('image');
                if ($file->isValid()) {
                    $filename = "patient" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                    // dd($filename);
                    $file->storeAs('patient', $filename);
                }
            }

            $patient_info->update([

                'patient_id' => $request->p_id,
                'name' => $request->name,
                'age' => $request->age,
                'mobile' => $request->mobile,
                'mobile_type' => $request->mobile_type,
                'gender' => $request->gender,
                'Blood_group' => $request->Blood_group,
                'date' => $request->date,
                'occupation' => $request->occupation,
                'address' => $request->address,
                'email' => $request->email,
                'image' => $filename
            ]);
            return response()->json([
                'status' => 200,
                'msg' => 'Patient Information Updated Successfully!'
            ]);
        }
    }

    public function delete_patient_list(Request $request)
    {
        $del_patient_id = $request->deletingId;
        $patient = patient_infos::where('id', '=', $del_patient_id)->first();
        // dd($patient);
        $destination = 'public/uploads/patient/' . $patient->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $del_reports = report::where('p_id', $del_patient_id)->get();

        foreach ($del_reports as $del_report) {

            $destination1 = 'public/uploads/report/' . $del_report->image;

            if (File::exists($destination1)) {
                File::delete($destination1);
            }
        }

        $patient->delete();
        return back()->with('success', 'Patient Information Deleted Successfully!');
    }




    public function patient_appoinment($id)
    {
        $patient_info = patient_infos::find($id);
        return response()->json([
            'status' => 200,
            'p_info' => $patient_info,
        ]);
    }

    public function get_patient_info(Request $request, $d_id, $id)
    {

        $patient_info = patient_infos::where('id', '=', $id)->where('d_id', '=', $d_id)->first();
        return response()->json([
            'status' => 200,
            'p_info' => $patient_info,
        ]);
    }


    public function appointment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'time' => 'required',
        ], [
            'date.required' => 'Field Is Required.',
            'time.required' => 'Field Is Required.',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidAppAdd', 'Invalid Update');
        } else {
            $d_id = $request->d_id;
            $p_id = $request->p_id;
            $date = date('Y-m-d', strtotime($request->date));
            $time = date('h:i a', strtotime($request->time));
            $appointment_check = appointment::where('d_id', '=', $d_id)->where('p_id', '=', $p_id)->first();
            if ($appointment_check == null) {
                appointment::create([
                    'd_id' => $request->d_id,
                    'p_id' => $request->p_id,
                    'date' => $date,
                    'time' => $time
                ]);
            } else {
                $previousDate = $appointment_check->date;

                $appointment_check->date = $date;
                $appointment_check->time = $time;
                $appointment_check->previous_date = $previousDate;
                $appointment_check->status = "0";
                $appointment_check->update();
            }
            $smsBalance = UserSms::where('user_id', auth()->id())->first();
            $check = $smsBalance !== null && $smsBalance->sms > 0;
            $patientInfo = patient_infos::where('id', $request->p_id)->first();
            if ($check) {
                if ($request->has('appointment_sms')) {
                    $patientMobile = $patientInfo->mobile;
                    $patientName = $patientInfo->name;

                    if (empty($patientMobile) || empty($patientName)) {
                        return response()->json(['error' => 'Invalid input'], 400);
                    }

                    $message = $patientName . "আপনার অ্যাপয়েন্টমেন্ট" . $date . $time;
                    //dd($this->send_sms($patientMobile, $message));
                    try {
                        $response = $this->send_sms($patientMobile, $message);
                        $responseDecoded = json_decode($response, true);

                        if (isset($responseDecoded['status']) && $responseDecoded['status'] == 'error') {
                            return response()->json(['error' => 'Failed to send SMS', 'details' => $responseDecoded['message']], 500);
                        }
                        $smsBalance->sms - 1;
                        $smsBalance->save();
                        return response()->json(['message' => 'SMS sent successfully']);
                    } catch (\Exception $e) {
                        return response()->json(['error' => 'Failed to send SMS', 'details' => $e->getMessage()], 500);
                    }
                }
            } else {
                return back()->with('invalidPExist', 'Invalid Update')->with('fail', 'SMS Balance 0. Please recharge!')->withInput();
            }

            return response()->json(['message' => 'No SMS sent'], 200);


            return redirect()->back()->with('success', 'Appointment Added Successfully!');
        }
    }

    public function view_appointment($date)
    {
        $appointment_list = appointment::leftJoin('patient_infos', 'appointments.p_id', '=', 'patient_infos.id')->where('appointments.date', $date)->where('appointments.d_id', auth()->user()->id)->orderBy('time', "asc")->get(['appointments.*', 'patient_infos.name', 'patient_infos.mobile', 'patient_infos.image']);
        return response()->json([
            'status' => 200,
            'app_list' => $appointment_list,
            'date' => $date
        ]);
    }
    public function edit_appointment($id)
    {
        $appointment_info = appointment::leftJoin('patient_infos', 'appointments.p_id', '=', 'patient_infos.id')->where('appointments.id', '=', $id)->first(['appointments.*', 'patient_infos.patient_id', 'patient_infos.name', 'patient_infos.mobile']);
        $date = Carbon::parse($appointment_info->date)->format('Y-m-d');
        $time = Carbon::parse($appointment_info->time)->format('H:i');
        //        dd($date);
        return response()->json([
            'status' => 200,
            'app' => $appointment_info,
            'f_date' => $date,
            'f_time' => $time,
        ]);
    }

    public function update_appointment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'time' => 'required',
        ], [
            'date.required' => 'Field Is Required.',
            'time.required' => 'Field Is Required.',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'error' => $validator->errors(),
                'id' => $request->appointment_id
            ]);
        } else {
            $id = $request->appointment_id;
            // dd($id);
            $date = date('Y-m-d', strtotime($request->date));
            $time = date('h:i a', strtotime($request->time));

            $appointment_info = appointment::find($id);
            $appointment_info->date = $date;
            $appointment_info->time = $time;
            $appointment_info->update();
            //            return response()->json([
            //                'status' => 200,
            //                'msg' => 'Appointment Information Updated Successfully!'
            //            ]);
            return back()->with('success', 'Appointment Information Updated Successfully');
        }
    }

    public function delete_appointment(Request $request)
    {
        $del_appointment_id = $request->deletingId;
        // dd($del_doctor_id);
        $del_appointment_info = appointment::find($del_appointment_id);
        $del_appointment_info->delete();
        return back()->with('success', 'Appointment Deleted Successfully!');
    }

    public function next_appointment(Request $request)
    {
        // dd($request->all());
        //        $date = date('d/m/Y',strtotime($request->date));
        $d_id = $request->d_id;
        $p_id = $request->p_id;
        $date = date('Y-m-d', strtotime($request->date));
        $time = date('h:i a', strtotime($request->time));
        // $d = date('d/m/Y');
        // dd($new_date, $new_time);
        $p_appointment = appointment::find($request->appointment_id);
        $previousDate = $p_appointment->date;
        $p_appointment->update([
            'date' => $date,
            'time' => $time,
            'previous_date' => $previousDate
        ]);
        return redirect()->route('view_patient', [$d_id, $p_id])->with('success', 'Next Appointment Added Successfully!');
    }


    public function update_patient(Request $request, $id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'bp_high' => 'required|max:250|min:1',
            'bp_low' => 'required|max:250|min:1',
            'Bleeding_disorder' => 'required|in:yes,no',
            'Heart_Disease' => 'required|in:yes,no',
            'Allergy' => 'required|in:yes,no',
            'Diabetic' => 'required|in:yes,no',
            'Pregnant' => 'filled|in:yes,no',
            'Helpatics' => 'required|in:yes,no',
            // 'other' => 'required',
        ], [
            'Bleeding_disorder.in' => 'Bleeding Disorder Must Be Select Yes or NO.',
            'Heart_Disease.in' => 'Heart Disease Must Be Select Yes or NO.',
            'Allergy.in' => 'Allergy Must Be Select Yes or NO.',
            'Diabetic.in' => 'Diabetic Must Be Select Yes or NO.',
            'Pregnant.in' => 'Pregnant Must Be Select Yes or NO.',
            'Helpatics.in' => 'Helpatics Must Be Select Yes or NO.',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidPatientUpdate', 'Invalid Update')->withInput();
        } else {
            // dd($request->all());
            patient_infos::find($id)->update([
                'bp_high' => $request->bp_high,
                'bp_low' => $request->bp_low,
                'Bleeding_disorder' => $request->Bleeding_disorder,
                'Heart_Disease' => $request->Heart_Disease,
                'Allergy' => $request->Allergy,
                'Diabetic' => $request->Diabetic,
                'Pregnant' => $request->Pregnant,
                'Helpatics' => $request->Helpatics,
                'other' => $request->other
            ]);
        }

        // return redirect()->route('view_patient',$d_id,$p_id);
        return redirect()->back()->with('success', 'Patient Medical History Updated Successfully!');
    }

    public function view_patient($d_id, $p_id)
    {
        $doctor_info = User::where('id', '=', $d_id)->first();
        $patient = patient_infos::findOrFail($p_id);
        $c_cs = chife_complaint::all();
        $lc_cs = chife_complaint::orderBy('id', 'desc')->get();
        $c_fs = clinical_finding::all();
        $lc_fs = clinical_finding::orderBy('id', 'desc')->get();
        $investigations = investigation::all();
        $investigation_lists = investigation::orderBy('id', 'desc')->get();
        $t_ps = treatment_plan::where('d_id', $d_id)->get();
        $lt_ps = treatment_plan::orderBy('id', 'desc')->where('d_id', $d_id)->get();
        $t_p_costs = treatment_cost::all();
        $treatment_infos = treatment_info::where('p_id', '=', $p_id)->where('d_id', '=', $d_id)->get();
        $total_cost =  treatment_info::where('p_id', '=', $p_id)->where('d_id', '=', $d_id)->sum('cost');
        $total_paid =  treatment_info::where('p_id', '=', $p_id)->where('d_id', '=', $d_id)->sum('paid');
        $total_due =  treatment_info::where('p_id', '=', $p_id)->where('d_id', '=', $d_id)->sum('due');
        $discount =  discount::where('p_id', '=', $p_id)->where('d_id', '=', $d_id)->first();

        if ($discount != null) {
            if ($discount->discount_type == "precent") {
                $total_discount = $total_cost * $discount->discount / 100;
            } else {
                $total_discount = $discount->discount;
            }
        } else {
            $total_discount = 0;
        }

        $treatment_payments = treatment_payment::Join('treatment_infos', 'treatment_payments.t_id', '=', 'treatment_infos.id')->where('treatment_infos.p_id', 'like', $p_id)->where('treatment_infos.d_id', '=', $d_id)->orderBy('treatment_payments.date', 'asc')->get(['treatment_payments.*', 'treatment_infos.treatment_plans', 'treatment_infos.tooth_no']);
        // dd($treatment_payments);
        $v_prescriptions = prescription::where('p_id', 'like', $p_id)->get();
        $fav = favourite::where('d_id', '=', $d_id)->first();
        if ($fav == null) {
            return redirect()->route('doctor_profile_setting', [$d_id])->with('fail', 'Please Add Favourite Frist..!');
        } else {
            return view('doctor.view_patient', compact('doctor_info', 'patient', 'c_cs', 'lc_cs', 'c_fs', 'lc_fs', 't_ps', 'lt_ps', 't_p_costs', 'treatment_infos', 'total_cost', 'total_paid', 'total_due', 'total_discount', 'discount', 'investigations', 'investigation_lists', 'v_prescriptions', 'fav', 'treatment_payments'));
        }
    }

    public function  treatment_info(Request $request, $d_id, $p_id)
    {
        if ($request->pt_p == null && $request->pt_p_check == null) {
            $validator = Validator::make($request->all(), [
                'pc_c' => 'required|array|min:1',
                'pc_f' => 'required|array|min:1',
                'p_investigation' => 'required|array|min:1',
                'pt_p' => 'required|exists:treatment_plans,name',
            ], [
                'pc_c.required' => 'Field Is Required At Least 1.',
                'pc_f.required' => 'Field Is Required At Least 1.',
                'p_investigation.required' => 'Field Is Required At Least 1.',
                'pt_p.required' => 'Field Is Required At Least 1.'
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'pc_c' => 'required|array|min:1',
                'pc_f' => 'required|array|min:1',
                'p_investigation' => 'required|array|min:1',
            ], [
                'pc_c.required' => 'Field Is Required At Least 1.',
                'pc_f.required' => 'Field Is Required At Least 1.',
                'p_investigation.required' => 'Field Is Required At Least 1.',
            ]);
        }

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput()->with('invalidTreatAdd', $request->tooth_no);
        } else {
            //  dd($request->all(),$request->tooth_no,$request->tooth_no_count);
            $pc_c = $request->pc_c;
            $pc_c = implode(',', $pc_c);
            $pc_f = $request->pc_f;
            $pc_f = implode(',', $pc_f);
            // dd($pc_f);
            $investigation = $request->p_investigation;
            $investigation = implode(',', $investigation);
            // dd($investigation); change pt_p after free time
            if ($request->pt_p != null) {
                $pt_p = $request->pt_p;
            } else {
                $pt_p = $request->pt_p_check;
            }
            // $pt_p = implode(',',$pt_p);
            // dd($pt_p);
            // dd($request->all(),$pt_p);

            $pt_p_cost = treatment_cost::where('name', '=', $pt_p)->where('d_id', '=', $d_id)->first();
            //            dd($pt_p_cost);
            if ($pt_p_cost == null) {
                return redirect()->route('doctor_profile_setting', [$d_id])->with('fail', 'Please Add Treatment Cost Frist..!');
                // return "hello";
            } else {
                $Total_Price =  $pt_p_cost->price * $request->tooth_no_count;
                $cost = $Total_Price;
                $paid = '0';
                $due = $Total_Price;
            }

            $discount = discount::where('d_id', $d_id)->where('p_id', $p_id)->first();

            if ($discount) {
                // dd($pt_p_cost,$cost,$discount);
                treatment_info::create([
                    'd_id' => $d_id,
                    'p_id' => $p_id,
                    'tooth_type' => $request->tooth_type,
                    'tooth_no' => $request->tooth_no,
                    'tooth_side' => $request->tooth_side,
                    'chife_complaints' => $pc_c,
                    'clinical_findings' => $pc_f,
                    'investigation' => $investigation,
                    'treatment_plans' => $pt_p_cost->name,
                    'cost' => $cost,
                    'paid' => $paid,
                    'due' => $due,
                    'discount_id' => $discount->id
                ]);
            } else {
                treatment_info::create([
                    'd_id' => $d_id,
                    'p_id' => $p_id,
                    'tooth_type' => $request->tooth_type,
                    'tooth_no' => $request->tooth_no,
                    'tooth_side' => $request->tooth_side,
                    'chife_complaints' => $pc_c,
                    'clinical_findings' => $pc_f,
                    'investigation' => $investigation,
                    'treatment_plans' => $pt_p_cost->name,
                    'cost' => $cost,
                    'paid' => $paid,
                    'due' => $due
                ]);
            }

            return redirect()->back()->with('success', 'Treatment Added Success!');
        }
    }

    public function treatment_info_edit($id)
    {
        $t_info = treatment_info::find($id);

        return response()->json([
            'status' => 200,
            't_info' => $t_info,
        ]);
    }


    public function treatment_info_update(Request $request, $d_id, $p_id)
    {
        // dd($request->all());

        // if ($request->pt_p == null && $request->pt_p_check == null) {

        //     $validator = Validator::make($request->all(), [
        //         'pt_p' => 'required|exists:treatment_plans,name',
        //     ], [
        //         'pt_p.required' => 'Field Is Required At Least 1.'
        //     ]);
        // }

        // if ($validator->fails()) {
        //     return back()->withErrors($validator->errors())->withInput()->with('invalidTreatupdate', $request->tooth_no);
        // } else {
        if ($request->pt_p != null) {
            $pt_p = $request->pt_p;
        } else {
            $pt_p = $request->pt_p_check;
        }

        $pt_p_cost = treatment_cost::where('name', '=', $pt_p)->where('d_id', '=', $d_id)->first();
        //            dd($pt_p_cost);
        if ($pt_p_cost == null) {
            return redirect()->route('doctor_profile_setting', [$d_id])->with('fail', 'Please Add Treatment Cost Frist..!');
            // return "hello";
        } else {
            $cost = $pt_p_cost->price;
            $paid = '0';
            $due = $pt_p_cost->price;
        }

        $discount = discount::where('d_id', $d_id)->where('p_id', $p_id)->first();

        if ($discount) {
            // dd($pt_p_cost,$cost,$discount);
            treatment_info::find($request->treatment_id)->update([
                'treatment_plans' => $pt_p_cost->name,
                'cost' => $cost,
                'paid' => $paid,
                'due' => $due,
                'discount_id' => $discount->id
            ]);
        } else {
            treatment_info::find($request->treatment_id)->update([
                'treatment_plans' => $pt_p_cost->name,
                'cost' => $cost,
                'paid' => $paid,
                'due' => $due
            ]);
        }

        return redirect()->back()->with('success', 'Treatment Updated Success!');
        // }
    }

    public function treatment_info_delete(Request $request)
    {

        treatment_info::find($request->deletingId)->delete();

        return back()->with('success', 'Treatment Information Deleted Successfully!');
    }


    public function treatments($d_id, $p_id, $t_id, $t_plans)
    {
        $doctor_info = User::where('id', '=', $d_id)->first();
        $patient = patient_infos::findOrFail($p_id);
        $treatment_info = treatment_info::where('p_id', '=', $p_id)->where('d_id', '=', $d_id)->where('id', '=', $t_id)->first();
        // dd($treatment_info->id);
        $v_prescriptions = prescription::where('p_id', 'like', $p_id)->get();
        $reports = report::where('d_id', '=', $d_id)->where('p_id', '=', $p_id)->where('treatment_id', '=', $t_id)->get();
        $reports_count = report::where('d_id', '=', $d_id)->where('p_id', '=', $p_id)->where('treatment_id', '=', $t_id)->count();
        // dd($reports->all());
        $total_report = 10;
        $total_report = $total_report - $reports_count;
        $t_steps = treatment_step::where('d_id', '=', $d_id)->where('p_id', '=', $p_id)->where('treatment_id', '=', $t_id)->get();
        // dd($t_steps);
        $tooth_info = tooth::where('tooth_No', '=', $treatment_info->tooth_no)->first();
        // dd($tooth_info);
        $appointment_id = appointment::where('d_id', '=', $d_id)->where('p_id', '=', $p_id)->first('id');
        //         dd($appointment_id);
        if ($appointment_id != null || $treatment_info->status == 2) {
            return view('doctor.treatmentplans', compact('doctor_info', 'patient', 'treatment_info', 'v_prescriptions', 'reports', 'total_report', 't_steps', 'tooth_info', 'appointment_id'));
        } else {
            return redirect()->route('appointment_list', $d_id)->with('fail', "Please First Add At Least One Appointment Of That Patient.");
        }
        //        dd($tooth_info);
        // dd($t_steps->all());

        // dd($v_prescriptions);
        // foreach($v_prescriptions as $v_prescription){
        //     // dd($v_prescription);
        //     $drug_list = $v_prescription->drug_id_list;
        //     // dd($drug_list);
        //     $drug_list = explode(',',$drug_list);
        //     // dd($drug_list);
        // }
        // $drugs_infos = drugs::find($drug_list);


        // dd($drugs_info);

        // if($t_plans == 'Restoration'){
        //     return view('treatmentplans',compact('doctor_info','patient','treatment_info'));
        // }else{
        //     return "Hello";
        // }
        // return view('treatmentplans');

    }
    public function prescription($d_id, $p_id)
    {

        $ldate = date('d-m-Y');
        // dd($ldate);

        $doctor_info = User::where('id', '=', $d_id)->first();
        $patient = patient_infos::findOrFail($p_id);
        $chembers = chember_info::where('d_id', '=', $d_id)->get();

        $treatment_infos = treatment_info::where('p_id', '=', $p_id)->where('d_id', '=', $d_id)->get();
        $temp_advices = AdviceTemplate::where('d_id', $d_id)->get();
        $temp_drugs = DrugTemplate::where('d_id', $d_id)->get();
        //    dd($temp_drugs);
        // $tooth_no = $treatment_info->tooth_no;
        // dd($tooth_no);
        if ($treatment_infos->isEmpty()) {
            return back()->with('fail', 'Please Add At Least One Treatment First For This Patient!');
        } else {
            foreach ($treatment_infos as $treatment_info) {
                $pc_c[] = $treatment_info->chife_complaints;
                // $pc_f[]=$treatment_info->clinical_findings;
                // $pt_p[]=$treatment_info->treatment_plans;
                // $investigations[]= $treatment_info->investigation;
                // $t_plans[]=$treatment_info->treatment_plans;
            }
            // $pc = implode(',',$pc_c);
            // dd($pc_c);
            // $pc_c = explode(',',$pc_c);
            // $pc_f = explode(',',$pc_f);
            // $pt_p = explode(',',$pt_p);
            // $investigations = explode(',',$investigations);
            // $t_id=$treatment_info->id;
            $medicines = medicine::all();
            $medicines_lists = medicine::orderBy('id', 'desc')->get();
            $appointment = appointment::where('d_id', '=', $d_id)->where('p_id', '=', $p_id)->first();
            //        dd($appointment);

            $drugs = drugs::where('p_id', '=', $p_id)->where('date', '=', $ldate)->get();
            return view('doctor.prescription', compact('doctor_info', 'patient', 'chembers', 'pc_c', 'medicines', 'medicines_lists', 'drugs', 'treatment_infos', 'appointment', 'temp_advices', 'temp_drugs'));
            // ,'t_id',,'tooth_no','pc_f','pt_p','investigations','t_plans'
        }
    }

    public function add_advice_template(Request $request, $d_id)
    {
        $validator = Validator::make($request->all(), [
            'adviceName' => 'required|max:8',
            'adviceDes' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'error' => $validator->errors()
            ]);
        } else {

            AdviceTemplate::create([
                'd_id' => $d_id,
                'title' => $request->adviceName,
                'description' => $request->adviceDes
            ]);

            return response()->json([
                'status' => 200,
                'msg' => 'Advice Template Added Successfully!',
            ]);
        }
    }

    public function edit_advice_template($id)
    {
        $advice_temp = AdviceTemplate::find($id);

        return response()->json([
            'status' => 200,
            'a_t' => $advice_temp,
        ]);
    }

    public function update_advice_template(Request $request, $d_id)
    {
        $validator = Validator::make($request->all(), [
            'u_adviceName' => 'required|max:8',
            'u_adviceDes' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'error' => $validator->errors(),
                'id' => $request->tempAdvice_id
            ]);
        } else {

            AdviceTemplate::find($request->tempAdvice_id)->update([
                'title' => $request->u_adviceName,
                'description' => $request->u_adviceDes
            ]);

            return response()->json([
                'status' => 200,
                'msg' => 'Advice Template Updated Successfully!',
            ]);
        }
    }

    public function advice_form_template($id)
    {
        $adviceForm_temp = AdviceTemplate::find($id);

        return response()->json([
            'status' => 200,
            'af_t' => $adviceForm_temp,
        ]);
    }

    public function add_drug_template(Request $request, $d_id)
    {
        $validator = Validator::make($request->all(), [
            'drugTempName' => 'required|max:8',
            // 'drugName.*' => 'required|string|distinct',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'error' => $validator->errors()
            ]);
        } else {

            $drug_temp = DrugTemplate::create([
                'd_id' => $d_id,
                'title' => $request->drugTempName
            ]);

            $count = count($request->drugName);
            for ($i = 1; $i <= $count; $i++) {
                SubDrugTemplate::create([
                    'tempDrug_id' => $drug_temp->id,
                    'tempDrug_name' => $request->drugName[$i],
                    'tempDrug_time' => $request->drugTiming[$i],
                    'tempDrug_mealTime' => $request->meal_time[$i],
                    'tempDrug_duration' => $request->duration[$i],
                ]);
            }

            return response()->json([
                'status' => 200,
                'msg' => 'Drug Template Added Successfully!',
            ]);
        }
    }

    public function delete_drug_template(Request $request)
    {
        DrugTemplate::find($request->deletingId)->delete();

        return response()->json([
            'status' => 200,
            'msg' => 'Drug Template Deleted Successfully!',
        ]);
    }

    public function drug_form_template($d_id, $p_id, $id)
    {
        $drugForm_temp = SubDrugTemplate::where('tempDrug_id', $id)->get();
        $date = Carbon::today()->format('d-m-Y');
        // dd($d_id,$p_id,$drugForm_temp,$date);

        foreach ($drugForm_temp as $drug) {
            drugs::create([
                'd_id' => $d_id,
                'p_id' => $p_id,
                'drug_name' => $drug->tempDrug_name,
                'drug_time' => $drug->tempDrug_time,
                'meal_time' => $drug->tempDrug_mealTime,
                'duration' => $drug->tempDrug_duration,
                'date' => $date,
            ]);
        }


        return response()->json([
            'status' => 200,
        ]);
    }

    public function view_prescription($d_id, $p_id)
    {

        $ldate = date('d-m-Y');
        // dd($ldate);

        $doctor_info = User::where('id', '=', $d_id)->first();
        $patient = patient_infos::findOrFail($p_id);

        $treatment_info = treatment_info::where('p_id', '=', $p_id)->first();
        // $tooth_no = $treatment_info->tooth_no;
        // dd($tooth_no);
        $pc_c = $treatment_info->chife_complaints;
        $pc_f = $treatment_info->clinical_findings;
        $pt_p = $treatment_info->treatment_plans;
        $investigations = $treatment_info->investigation;
        $pc_c = explode(',', $pc_c);
        $pc_f = explode(',', $pc_f);
        $pt_p = explode(',', $pt_p);
        $investigations = explode(',', $investigations);
        $t_id = $treatment_info->id;
        $t_plans = $treatment_info->treatment_plans;
        $medicines = medicine::all();
        $medicines_lists = medicine::orderBy('id', 'desc')->get();

        $drugs = drugs::where('p_id', '=', $p_id)->where('date', '=', $ldate)->get();
        return view('view_prescription', compact('doctor_info', 'patient', 'pc_c', 'pc_f', 'pt_p', 'investigations', 'drugs', 't_id', 't_plans', 'medicines', 'medicines_lists')); //,'tooth_no'
    }


    public function add_drug(Request $request, $d_id, $p_id)
    {
        //         dd($request->all());
        // dd($request->date);
        $validator = Validator::make($request->all(), [
            'drug_name' => 'required|exists:medicines,name',
            'drug_time' => 'required|in:1+0+1,1+1+0,0+1+0,0+0+1,1+1+1',
            'meal_time' => 'required|in:Before Meal,After Meal',
            'duration' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'error' => $validator->errors()
            ]);
        } else {
            $treatment_info = treatment_info::where('p_id', 'like', $p_id)->first();
            $t_id = $treatment_info->id;
            // dd($t_id);

            $drugs = new drugs();
            $drugs->d_id = $d_id;
            $drugs->p_id = $p_id;
            // $drugs->t_id = $t_id;
            $drugs->drug_name = $request->drug_name;
            $drugs->drug_time = $request->drug_time;
            $drugs->meal_time = $request->meal_time;
            $drugs->duration = $request->duration;
            $drugs->date = $request->date;
            $res = $drugs->save();
            return response()->json([
                'status' => 200,
                'msg' => 'Drug Added Successfully!',
            ]);
            // return redirect()->route('prescription',[$d_id,$p_id]);
        }
    }

    public function edit_drug($id)
    {
        $drugInfo = drugs::find($id);
        return response()->json([
            'status' => 200,
            'di' => $drugInfo,
        ]);
    }

    public function  update_drug(Request $request)
    {
        $drug_id = $request->drug_id;
        // dd($drug_id);
        $drug_info = drugs::find($drug_id);
        $drug_info->drug_name = $request->drug_name;
        $drug_info->drug_time = $request->drug_time;
        $drug_info->meal_time = $request->meal_time;
        $drug_info->duration = $request->duration;
        $res = $drug_info->update();
        // return back();
        return response()->json([
            'status' => 200,
            'msg' => 'Drug Updated Successfully!'
        ]);
    }

    public function delete_drug(Request $request)
    {
        $del_drug_id = $request->deletingId;
        // dd($del_drug_id);
        $del_drug_info = drugs::find($del_drug_id);
        $del_drug_info->delete();
        // return back();
        return response()->json([
            'status' => 200,
            'msg' => 'Drug Deleted Successfully!'
        ]);
    }

    public function get_drug_info($p_id)
    {
        $ldate = date('d-m-Y');
        $drug_ids = drugs::where('p_id', '=', $p_id)->where('date', '=', $ldate)->get('id');
        // $drugs = drugs::find($drug_ids);
        foreach ($drug_ids as $drug_id) {
            $drug_id_list[] = $drug_id->id;
        }
        $drug_id_list = implode(',', $drug_id_list);
        return response()->json([
            'status' => 200,
            'drugIds' => $drug_id_list,
        ]);
    }

    public function prescription_add(Request $request, $d_id)
    {
        // return "hello";
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'patientID' => 'required',
            'drugIdList' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('fail', 'Please Add Medicine First!');
        } else {
            $p_id = $request->patientID;
            $date = $request->date;
            $check = prescription::where('p_id', '=', $p_id)->where('date', '=', $date)->first();
            if ($check) {
                return back()->with('fail', 'Sorry! You already Added this Information!');
            } else {
                $prescription = new prescription();
                $prescription->d_id = $d_id;
                $prescription->p_id = $p_id;
                // $prescription->t_id = $t_id;
                // $prescription->t_plan = $t_plans;
                $prescription->drug_id_list = $request->drugIdList;
                $prescription->date = $date;
                $res = $prescription->save();
                return redirect()->route('view_patient', [$d_id, $p_id])->with('success', 'New Prescription Added Successfully!');
            }
        }
    }

    public function prescription_delete(Request $request)
    {
        $del_prescription_id = $request->deletingId;
        // dd($del_drug_id);
        $del_prescription_info = prescription::find($del_prescription_id);
        $del_prescription_info->delete();
        return back()->with('success', 'Prescription Deleted Successfully!');
    }

    public function invoice($d_id, $p_id)
    {
        $doctor_info = User::where('id', '=', $d_id)->first();
        $patient = patient_infos::findOrFail($p_id);
        //test for new patient id custom create
        $l = patient_infos::latest('id')->first();
        $last = $l->id;
        $last++;
        // dd($last);
        $ldate = date('dmY');
        $view = $ldate . '/' . $last;
        // dd($view);
        //test end
        $treatment_infos = treatment_info::where('p_id', '=', $p_id)->where('d_id', '=', $d_id)->get();
        if ($treatment_infos->isEmpty()) {
            return back()->with('fail', 'Please Add At Least One Treatment First For This Patient!');
        }
        $total_cost =  $treatment_infos->sum('cost');
        $total_paid =  $treatment_infos->sum('paid');
        $total_due =  $treatment_infos->sum('due');

        $today = Carbon::today();

        $today_paid = treatment_payment::where('d_id', $d_id)->where('p_id', $p_id)->where('date', $today)->orderBy('id', 'desc')->take(5)->get()->unique('t_id');
        // dd($today_paid);
        $discount =  discount::where('p_id', '=', $p_id)->where('d_id', '=', $d_id)->where('p_mobile', '=', $patient->mobile)->first();
        //    dd($discount);
        if ($discount != null) {
            if ($discount->discount_type == "precent") {
                $total_discount = $total_cost * $discount->discount / 100;
                $total_Amount = $total_cost - $total_discount;
                $total_dueAmount = $total_due - $total_discount;
            } else {
                $total_discount = $discount->discount;
                $total_Amount = $total_cost - $total_discount;
                $total_dueAmount = $total_due - $total_discount;
            }
        } else {
            $total_discount = 0;
            $total_Amount = $total_cost;
            $total_dueAmount = $total_due;
        }
        // dd($total_cost,$total_paid,$total_due);
        $treatment_invoice_infos = treatment_info::where('p_id', 'like', $p_id)->where('d_id', '=', $d_id)->where('payment_status', '=', 0)->get();

        $chamber_info = chember_info::where('d_id', '=', $d_id)->first();

        return view('doctor.invoice', compact('doctor_info', 'patient', 'treatment_infos', 'treatment_invoice_infos', 'view', 'total_cost', 'total_paid', 'total_due', 'total_discount', 'total_Amount', 'total_dueAmount', 'chamber_info', 'discount', 'today_paid'));
    }

    public function treatment_payment(Request $request)
    {

        $validator = Validator::make($request->all(), [
            't_plan_id' => 'required|integer',
            'tp_amount' => 'required',
            't_payment_type' => 'required|in:Cash,Card,Mobile Banking',
        ], [
            't_plan_id.required' => 'This Field Is Required.',
            'tp_amount.required' => 'This Field Is Required.',
            't_payment_type.required' => 'This Field Is Required.',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidPaymentAdd', 'Invalid Update');
        } else {
            // dd($request->all());
            $t_info_id = $request->t_plan_id;
            $date = Carbon::today()->format('Y-m-d');
            $treatment_infos = treatment_info::find($t_info_id);

            treatment_payment::create([
                't_id' => $treatment_infos->id,
                'd_id' => $treatment_infos->d_id,
                'p_id' => $treatment_infos->p_id,
                'paid_amount' => $request->tp_amount,
                'date' => $date
            ]);

            $cost = $treatment_infos->cost;
            // dd($cost);
            $previous_paid = $treatment_infos->paid;
            // dd($previous_paid);
            $paid_amount = $request->tp_amount;
            $paid = $previous_paid + $paid_amount;
            // dd($paid);
            $due = $cost - $paid;
            // dd($due);

            treatment_info::find($t_info_id)->update([
                'paid' => $paid,
                'due' => $due,
                'payment_method' => $request->t_payment_type,
            ]);

            if ($cost == $paid || $due < 0) {
                $payment_status = 1;
                treatment_info::find($t_info_id)->update([
                    'payment_status' => $payment_status,
                ]);
            }

            $smsBalance = UserSms::where('user_id', auth()->id())->first();
            $check = $smsBalance !== null && $smsBalance->sms > 0;
            $pInfo = patient_infos::where('id', $treatment_infos->p_id)->first();
            if ($check) {
                if ($request->has('billing_sms')) {
                    $patientMobile = $pInfo->mobile;
                    $patientName = $pInfo->name;

                    if (empty($patientMobile) || empty($patientName)) {
                        return response()->json(['error' => 'Invalid input'], 400);
                    }

                    $message = $patientName . " " . "পেমেন্ট" . " " . $request->tp_amount . " " . "পরিশোধ" . " " . "আপনার বকেয়া পেমেন্ট" . " " . $due;
                    //dd($this->send_sms($patientMobile, $message));
                    try {
                        $response = $this->send_sms($patientMobile, $message);
                        $responseDecoded = json_decode($response, true);

                        if (isset($responseDecoded['status']) && $responseDecoded['status'] == 'error') {
                            return response()->json(['error' => 'Failed to send SMS', 'details' => $responseDecoded['message']], 500);
                        }
                        $smsBalance->sms -= 1;
                        $smsBalance->save();
                        return response()->json(['message' => 'SMS sent successfully']);
                    } catch (\Exception $e) {
                        return response()->json(['error' => 'Failed to send SMS', 'details' => $e->getMessage()], 500);
                    }
                }
            } else {
                return back()->with('invalidPExist', 'Invalid Update')->with('fail', 'SMS Balance 0. Please recharge!')->withInput();
            }

            return response()->json(['message' => 'No SMS sent'], 200);

            return back()->with('success', 'Treatment Payment Added Successfully!');
        }
    }

    public function treatment_discount(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'tp_discount' => 'required',
            't_discount_type' => 'required|in:cash,precent',
        ], [
            'tp_discount.required' => 'This Field Is Required.',
            't_discount_type.required' => 'This Field Is Required.',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidDiscountAdd', 'Invalid Update');
        } else {
            // dd($request->all());
            $check_p_id = discount::where('p_id', '=', $request->p_id)->where('d_id', '=', $request->d_id)->where('p_mobile', '=', $request->p_mobile)->first();
            $treatments = treatment_info::where('p_id', '=', $request->p_id)->where('d_id', '=', $request->d_id)->get();
            //    dd($check_p_id);

            if ($check_p_id == null) {
                $discount = discount::create([
                    'p_id' => $request->p_id,
                    'd_id' => $request->d_id,
                    'p_mobile' => $request->p_mobile,
                    'discount' => $request->tp_discount,
                    'discount_type' => $request->t_discount_type,
                ]);

                foreach ($treatments as $treatment) {
                    $treatment->update([
                        'discount_id' => $discount->id
                    ]);
                }
            } else {
                $check_p_id->discount = $request->tp_discount;
                $check_p_id->discount_type = $request->t_discount_type;
                $check_p_id->update();

                foreach ($treatments as $treatment) {
                    $treatment->update([
                        'discount_id' => $check_p_id->id
                    ]);
                }
            }

            return back()->with('success', 'Treatment Payment Discount Added Successfully!');
        }
    }

    public function report(Request $request, $d_id, $p_id, $t_id)
    {
        $validator = Validator::make($request->all(), [
            'report_image' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidReport', 'Invalid Update');
        } else {
            $filename = '';
            if ($request->hasFile('report_image')) {
                $file = $request->file('report_image');
                if ($file->isValid()) {
                    $filename = "r" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('report', $filename);
                }
            }
            $report = new report();
            $report->d_id = $d_id;
            $report->p_id = $p_id;
            $report->treatment_id = $t_id;
            $report->image = $filename;
            $report->save();

            return back()->with('success', 'Successfully Report Picture Added');
        }
    }

    public function report_delete(Request $request)
    {
        $del_report_id = $request->deletingId;
        // dd($del_drug_id);
        $del_report_info = report::find($del_report_id);

        $destination = 'public/uploads/report/' . $del_report_info->image;
        // dd($destination);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $del_report_info->delete();
        return back()->with('success', 'Successfully Report Picture Deleted!');
    }

    public function treatment_steps(Request $request, $d_id, $p_id, $t_id)
    {
        $request->validate([
            't_status' => 'required|in:1,2',
            'steps' => 'required',
        ], [
            't_status.in' => 'You Must Select Between Progress OR Done',
            'steps.required' => 'The OT Notes Is Required.',
        ]);
        // dd($request->all());
        //  $s[] = $request->steps;
        //  $s = implode('\r\n',$s);
        // dd($s);
        $ldate = date('d-m-Y');
        $t_step = new treatment_step();
        $t_step->d_id = $d_id;
        $t_step->p_id = $p_id;
        $t_step->treatment_id = $t_id;
        // $t_step->class = $request->btnradio;
        $t_step->steps = $request->steps;
        $t_step->date = $ldate;
        $t_step->save();

        $t_status = treatment_info::find($t_id);
        $t_status->status = $request->t_status;
        $t_status->update();

        return back()->with('success', 'OT Notes And Treatment Status Added Successfully!');
    }

    public function ot_notes($id)
    {
        $tretreatment_step = treatment_step::find($id);
        return response()->json([
            'status' => 200,
            'ts' => $tretreatment_step->steps,
            //            'ts1' => $tretreatment_step,
        ]);
    }

    public function update_ot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'u_steps' => 'required'
        ], [
            'u_steps.required' => 'This OT Note Fields Can Not Be Empty.'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidUpdate', 'Invalid Update');
        } else {
            $ot_id = $request->ot_notes_id;
            $ot_info = treatment_step::find($ot_id);

            $ot_info->steps = $request->u_steps;
            $ot_info->update();
            return back()->with('success', 'OT Notes Updated Successfully!');
        }
    }

    public function delete_ot(Request $request)
    {
        $del_ot_id = $request->deletingId;
        // dd($del_ot_id);
        $del_ot_info = treatment_step::find($del_ot_id);

        $del_ot_info->delete();
        return back()->with('success', 'OT Notes Deleted Successfully!');
    }



    public function case_studies($d_id, $p_id, $t_id)
    {

        $treat_info = treatment_info::find($t_id);
        $ots = treatment_step::where('d_id', $d_id)->where('p_id', $p_id)->where('treatment_id', $t_id)->get();
        $reports = report::where('d_id', $d_id)->where('p_id', $p_id)->where('treatment_id', $t_id)->get();

        return view('doctor.postCaseStudies', compact('treat_info', 'ots', 'reports', 'd_id', 'p_id', 't_id'));
    }



    public function sendMailWithPdf($d_id, $p_id)
    {
        $ldate = date('d-m-Y');
        $doctor_info = doctor::where('id', '=', $d_id)->first();
        $patient = patient_infos::findOrFail($p_id);
        $treatment_info = treatment_info::where('p_id', '=', $p_id)->first();
        $tooth_no = $treatment_info->tooth_no;
        // dd($tooth_no);
        $pc_c = $treatment_info->chife_complaints;
        $pc_f = $treatment_info->clinical_findings;
        $pt_p = $treatment_info->treatment_plans;
        $investigations = $treatment_info->investigation;
        $pc_c = explode(',', $pc_c);
        $pc_f = explode(',', $pc_f);
        $pt_p = explode(',', $pt_p);
        $investigations = explode(',', $investigations);
        $t_id = $treatment_info->id;
        $t_plans = $treatment_info->treatment_plans;
        $medicines = medicine::all();
        $medicines_lists = medicine::orderBy('id', 'desc')->get();
        $drugs = drugs::where('p_id', '=', $p_id)->where('date', '=', $ldate)->get();

        $data["email"] = "mahadimonna01@gmail.com";
        $data["Title"] = "Email Test";
        $data["body"] = "Email Test body";

        $pdf = PDF::loadview('view_prescription', compact('doctor_info', 'patient', 'pc_c', 'pc_f', 'pt_p', 'investigations', 'drugs', 't_id', 't_plans', 'tooth_no', 'medicines', 'medicines_lists'), $data)->setOptions(['defaultFont' => 'sans-serif']);

        Mail::send([], $data, function ($msg) use ($data, $pdf) {
            $msg->to($data["email"])
                ->subject($data["Title"])
                ->attachData($pdf->output(), "test.pdf");
        });
        // dd("email has been sent.");
        return back();
    }
}
