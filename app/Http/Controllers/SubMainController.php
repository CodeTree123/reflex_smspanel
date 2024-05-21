<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use App\Models\patient_infos;
use App\Models\chife_complaint;
use App\Models\clinical_finding;
use App\Models\investigation;
use App\Models\medicine;
use App\Models\treatment_plan;
use App\Models\treatment_cost;
use App\Models\treatment_info;
use App\Models\prescription;
use App\Models\chember_info;
use App\Models\chember_schedule;
use App\Models\favourite;
use App\Models\subscription;
use App\Models\notice;
use App\Models\User;
use App\Models\treatment_payment;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class SubMainController extends Controller
{
    public function check_alert($d_id){
        $doctor_info = User::find($d_id);
        
        if ($doctor_info->setting_alert == 1) {
            $bar = $doctor_info->doctor->bar_img_status;
            $fav = favourite::where('d_id', $doctor_info->id)->first();
            $cham = chember_info::where('d_id', $doctor_info->id)->first();
            $cost = treatment_cost::where('d_id', $doctor_info->id)->first();
            if ($fav != null && $cham != null && $cost != null) {
                if ($fav->status == 1 && $bar == 1 && $cham->status == 1 && $cost->status == 1) {
                    $doctor_info->update([
                        'setting_alert' => 0
                    ]);
                }
            }
        }
    }

    public function doctor_profile_setting($d_id)
    {
        $doctor_info=User::where('id','=',$d_id)->first();
        $t_ps = treatment_plan::all();
        $t_p_costs = treatment_cost::where('d_id','=',$d_id)->get();
        $chembers = chember_info::where('d_id','=',$d_id)->get();
        $schedules = chember_schedule::leftJoin('chember_infos','chember_schedules.chem_id','=','chember_infos.id')->where('chember_infos.d_id','=',$d_id)->get(['chember_schedules.*','chember_infos.chember_name']);
        // dd($schedules);
        $c_cs = chife_complaint::all();
        $c_fs = clinical_finding::all();
        $investigations = investigation::all();
        $fav = favourite::where('d_id','=',$d_id)->first();
        // dd($favs);
        return view('doctor.doctor_profile_setting',compact('doctor_info','t_ps','t_p_costs','chembers','schedules','c_cs','c_fs','investigations','fav'));
    }

    public function add_barcode(Request $request){

        $validator = Validator::make($request->all(),[
            'barcode' => 'required|image|mimes:jpeg,png,jpg'
        ],[
            'barcode.required' => 'QR Code Field Is Required.',
            'barcode.image' => 'QR Code Field Must Be Image Format.',
            'barcode.mimes' => 'QR Code Field Must Be jpeg,png,jpg format.'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors())->with('invalidBarAdd', 'Invalid Update');

        }else{
            $barcode_filename='';
            if($request->hasFile('barcode'))
            {
                $file= $request->file('barcode');
                if ($file->isValid()) {
                    $barcode_filename="Bar".date('Ymdhms').'.'.$file->getClientOriginalExtension();
                    $file->storeAs('doctor/Barcode',$barcode_filename);
                }
            }

            doctor::where('u_id',$request->d_id)->update([
                'bar_image' => $barcode_filename,
                'bar_img_status' => 1
            ]);

            $this->check_alert($request->d_id);

            return back()->with('success','QR Code Added Successfully!');
        }

    }

    public function update_barcode(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'u_barcode' => 'required|image|mimes:jpeg,png,jpg'
        ],[
            'u_barcode.required' => 'QR Code Field Is Required.',
            'u_barcode.image' => 'QR Code Field Must Be Image Format.',
            'u_barcode.mimes' => 'QR Code Field Must Be jpeg,png,jpg format.'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors())->with('invalidBarUp', 'Invalid Update');

        }else{
            $doctor_info = User::find($request->d_id);
            $barcode_filename = $doctor_info->doctor->bar_image;
        //    dd($barcode_filename);
            if($request->hasFile('u_barcode'))
            {
                $destination = 'public/uploads/doctor/Barcode/'.$doctor_info->doctor->bar_image;
                if(File::exists($destination)){
                    // dd($destination);
                    File::delete($destination);
                }
                $file= $request->file('u_barcode');
                if ($file->isValid()) {
                    $barcode_filename="Bar".date('Ymdhms').'.'.$file->getClientOriginalExtension();
                    $file->storeAs('doctor/Barcode',$barcode_filename);
                }
            }

//            $doctor_info->doctor->bar_image = $barcode_filename;
//            $doctor_info->update();
            doctor::where('u_id',$request->d_id)->update([
                'bar_image' => $barcode_filename
            ]);

            return back()->with('success','QR Code Updated Successfully!');
        }
    }

    public function treatment_cost(Request $request){

        $validator = Validator::make($request->all(),[
            'tp_name' => 'required|exists:treatment_plans,id',
            'tp_price' => 'required'
        ],[
            'tp_name.required' => 'Treatment Plan Field Is Required.',
            'tp_price.required' => 'Treatment Cost Field Is Required.',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors()
            ]);

        }else{
            $t_plan = treatment_plan::find($request->tp_name);
            $treatment_cost = new treatment_cost();
            $treatment_cost->d_id = $request->d_id;
            $treatment_cost->t_plan_id = $request->tp_name;
            $treatment_cost->name = $t_plan->name;
            $treatment_cost->price = $request->tp_price;
            $res = $treatment_cost->save();

            $this->check_alert($request->d_id);

            return response()->json([
                'status' => 200,
                'msg' => 'Treatment Cost Added Successfully!',
            ]);

        }

    }

    public function edit_treatment_cost($id){
        $treatmentCost = treatment_cost::find($id);
        return response()->json([
            'status'=>200,
            'tp_cost' => $treatmentCost,
        ]);
    }

    public function update_treatment_cost(Request $request){

        $validator = Validator::make($request->all(),[
            'tp_cost' => 'required'
        ],[
            'tp_cost.required' => 'Treatment Cost Field Is Required.',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors(),
                'id' => $request->tp_cost_id
            ]);

        }else{
            $tp_id = $request->tp_cost_id;
            // dd($cc_id);
            $treatment_cost = treatment_cost::find($tp_id);
            $treatment_cost->price = $request->tp_cost;
            $res = $treatment_cost->update();

            return response()->json([
                'status' => 200,
                'msg' => 'Treatment Cost Updated Successfully!',
            ]);

        }
    }

    public function delete_treatment_cost(Request $request){
//        dd($request->all());
        $del_tpCost_id = $request->deletingId;
        // dd($del_drug_id);
        $del_tpcost_info = treatment_cost::find($del_tpCost_id);
        $del_tpcost_info->delete();

        return response()->json([
            'status' => 200,
            'msg' => 'Treatment Cost Deleted Successfully!',
        ]);
    }

    public function doctor_chember(Request $request){

        $validator = Validator::make($request->all(),[
            'chember_name' => 'required',
            'chember_address' => 'required',
            'chember_number' => 'required|max:11',
        ],[
            'chember_name.required' => 'This Field Is Required.',
            'chember_address.required' => 'This Field Is Required.',
            'chember_number.required' => 'This Field Is Required.',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors(),
            ]);

        }else{
            // dd($request->all());
            $chember_info = new chember_info();
            $chember_info->d_id = $request->d_id;
            $chember_info->chember_name = $request->chember_name;
            $chember_info->chember_address = $request->chember_address;
            $chember_info->chember_number = $request->chember_number;
            $chember_info->save();

            $this->check_alert($request->d_id);

            return response()->json([
                'status' => 200,
                'msg' => 'Chamber Added Successfully!',
            ]);

        }
    }

    public function edit_chember($id){
        $chember_info = chember_info::find($id);
        return response()->json([
            'status'=>200,
            'ci' => $chember_info,
        ]);

    }

    public function update_chember(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'chember_name' => 'required',
            'chember_address' => 'required',
            'chember_number' => 'required|max:11',
        ],[
            'chember_name.required' => 'This Field Is Required.',
            'chember_address.required' => 'This Field Is Required.',
            'chember_number.required' => 'This Field Is Required.',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors(),
                'id' => $request->chember_id
            ]);

        }else{
            $ci_id = $request->chember_id;
            $chember_info = chember_info::find($ci_id);
            $chember_info->chember_name = $request->chember_name;
            $chember_info->chember_address = $request->chember_address;
            $chember_info->chember_number = $request->chember_number;
            $chember_info->update();

            return response()->json([
                'status' => 200,
                'msg' => 'Chamber Added Successfully!',
            ]);
        }
    }

    public function delete_chember(Request $request){
        $del_chember_id = $request->deletingId;
        // dd($del_chember_id);
        $del_chember_info = chember_info::find($del_chember_id);
        $del_chember_info->delete();
        return response()->json([
            'status' => 200,
            'msg' => 'Chamber Deleted Successfully!',
        ]);
    }

    public function chember_schedule(Request $request){

        $count = count($request->weekName);
        // dd($request->all(),$count);

        for ($i=1; $i <= $count; $i++) {
            $chem_schedule = new chember_schedule();
            $chem_schedule->chem_id = $request->chem_name;
            $chem_schedule->week_name = $request->weekName[$i];
            $chem_schedule->day_time = date('h:i A',strtotime($request->moreDays[$i]));
            $chem_schedule->evening_time = date('h:i A',strtotime($request->moreEvening[$i]));
            $chem_schedule->save();
        }

        return back();
    }

    public function add_favourite(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'c_c' => 'required|array|min:1|max:5',
            'c_f' => 'required|array|min:1|max:5',
            'investigation' => 'required|array|min:1|max:5',
            't_p' => 'required|array|min:1|max:5',
        ],[
            'c_c.required' => 'Field Is Required At Least 1.',
            'c_c.max' => 'Field Is Required Max 5.',
            'c_f.required' => 'Field Is Required At Least 1.',
            'c_f.max' => 'Field Is Required Max 5.',
            'investigation.required' => 'Field Is Required At Least 1.',
            'investigation.max' => 'Field Is Required Max 5.',
            't_p.required' => 'Field Is Required At Least 1.',
            't_p.max' => 'Field Is Required Max 5.'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors(),
//                'id' => $request->chember_id
            ]);

        }else{
            $c_cs = $request->c_c;
            $c_c = implode(',',$c_cs);
            $c_fs = $request->c_f;
            $c_f = implode(',',$c_fs);
            // dd($pc_f);
            $investigations = $request->investigation;
            $investigation = implode(',',$investigations);
            // dd($investigation); change pt_p after free time
            $t_ps = $request->t_p;
            $t_p = implode(',',$t_ps);

            $fav = new favourite();
            $fav->d_id = $request->d_id;
            $fav->fav_cc = $c_c;
            $fav->fav_cf = $c_f;
            $fav->fav_investigation = $investigation;
            $fav->fav_tp = $t_p;
            $fav->save();

            $this->check_alert($request->d_id);

            return response()->json([
                'status' => 200,
                'msg' => 'Favourite Added Successfully!',
            ]);
        }

    }

    public function edit_favourite($id){
        $favourite = favourite::find($id);
        $fav_cc = $favourite->fav_cc;
        $fav_cc = explode(',',$fav_cc);
        $fav_cf = $favourite->fav_cf;
        $fav_cf = explode(',',$fav_cf);
        $fav_investigation = $favourite->fav_investigation;
        $fav_investigation = explode(',',$fav_investigation);
        $fav_tp = $favourite->fav_tp;
        $fav_tp = explode(',',$fav_tp);

        return response()->json([
            'status'=>200,
            'fav_cc' => $fav_cc,
            'fav_cf' => $fav_cf,
            'fav_investigation' => $fav_investigation,
            'fav_tp' => $fav_tp,
        ]);
    }

    public function update_favourite(Request $request){
        $validator = Validator::make($request->all(),[
            'uc_c' => 'required|array|min:1|max:5',
            'uc_f' => 'required|array|min:1|max:5',
            'u_investigation' => 'required|array|min:1|max:5',
            'ut_p' => 'required|array|min:1|max:5',
        ],[
            'uc_c.required' => 'Field Is Required At Least 1.',
            'uc_c.max' => 'Field Is Required Max 5.',
            'uc_f.required' => 'Field Is Required At Least 1.',
            'uc_f.max' => 'Field Is Required Max 5.',
            'u_investigation.required' => 'Field Is Required At Least 1.',
            'u_investigation.max' => 'Field Is Required Max 5.',
            'ut_p.required' => 'Field Is Required At Least 1.',
            'ut_p.max' => 'Field Is Required Max 5.'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors(),
                'id' => $request->fav_id
            ]);

        }else{
            // dd($request->all());
            $c_cs = $request->uc_c;
            $c_c = implode(',',$c_cs);

            $c_fs = $request->uc_f;
            $c_f = implode(',',$c_fs);
            // dd($pc_f);
            $investigations = $request->u_investigation;
            $investigation = implode(',',$investigations);
            // dd($investigation); change pt_p after free time
            $t_ps = $request->ut_p;
            $t_p = implode(',',$t_ps);

            $fav = favourite::find($request->fav_id);
            $fav->fav_cc = $c_c;
            $fav->fav_cf = $c_f;
            $fav->fav_investigation = $investigation;
            $fav->fav_tp = $t_p;
            $fav->update();

            return response()->json([
                'status' => 200,
                'msg' => 'Favourite Updated Successfully!',
            ]);
        }
    }




    public function add_chife_complaint(Request $request){
        $validator = Validator::make($request->all(),[
            'cc_name' => 'required',
        ],[
            'cc_name.required' => 'The Cheif Complaint Field Is Required.'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors())->with('invalidCCAdd', 'Invalid Update');
        }else{
            $chife_complaint = new chife_complaint();
            $chife_complaint->name = $request->cc_name;
            $chife_complaint->status = $request->cc_status;
            $res = $chife_complaint->save();
            return back()->with('success','Cheif Complaint Added Successfully!');
        }
    }

    public function chife_complaint(Request $request){
        $validator = Validator::make($request->all(),[
            'cc_name' => 'required',
        ],[
            'cc_name.required' => 'The Cheif Complaint Field Is Required.'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors()
            ]);
        }else{
            $chife_complaint = new chife_complaint();
            $chife_complaint->name = $request->cc_name;
            $chife_complaint->status = $request->cc_status;
            $res = $chife_complaint->save();
            return response()->json([
                'status' => 200,
                'msg' => 'Cheif Complaint Added Successfully!',
            ]);
        }
    }

    public function edit_chife_complaint($id){
        $chifeComplaint = chife_complaint::find($id);
        return response()->json([
            'status'=>200,
            'cc' => $chifeComplaint,
        ]);
    }

    public function update_chife_complaint(Request $request){
        $validator = Validator::make($request->all(),[
            'Ucc_name' => 'required',
        ],[
            'Ucc_name.required' => 'The Cheif Complaint Field Can Not Be Empty.'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors(),
                'id' => $request->c_c_id
            ]);
        }else{
            $cc_id = $request->c_c_id;
            // dd($cc_id);
            $chife_complaint = chife_complaint::find($cc_id);
            $chife_complaint->name = $request->Ucc_name;
            $res = $chife_complaint->update();
            return response()->json([
                'status' => 200,
                'msg' => 'Cheif Complaint Updated Successfully!'
            ]);
        }
//        return back();
    }

    public function delete_chife_complaint(Request $request){
        $del_cc_id = $request->deletingId;
        // dd($del_drug_id);
        $del_cc_info = chife_complaint::find($del_cc_id);
        $del_cc_info->delete();
        return response()->json([
            'status' => 200,
            'msg' => 'Cheif Complaint Deleted Successfully!'
        ]);
//        return back();
    }

    public function add_clinical_finding(Request $request){
        $validator = Validator::make($request->all(),[
            'cf_name' => 'required',
        ],[
            'cf_name.required' => 'The Clinical Finding Field Required.'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors())->with('invalidCFAdd', 'Invalid Update');
        }else{
            $clinical_finding = new clinical_finding();
            $clinical_finding->name = $request->cf_name;
            $clinical_finding->status = $request->cf_status;
            $res = $clinical_finding->save();
            return back()->with('success','Clinical Finding Added Successfully!');
        }
    }

    public function clinical_finding(Request $request){
        $validator = Validator::make($request->all(),[
            'cf_name' => 'required',
        ],[
            'cf_name.required' => 'The Clinical Finding Field Required.'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors()
            ]);
        }else{
            $clinical_finding = new clinical_finding();
            $clinical_finding->name = $request->cf_name;
            $clinical_finding->status = $request->cf_status;
            $res = $clinical_finding->save();
            return response()->json([
                'status' => 200,
                'msg' => 'Clinical Finding Added Successfully!',
            ]);
        }
//        return back();
    }

    public function edit_clinical_finding($id){
        $clinicalFinding = clinical_finding::find($id);
        return response()->json([
            'status'=>200,
            'cf' => $clinicalFinding,
        ]);
    }

    public function update_clinical_finding(Request $request){
        $validator = Validator::make($request->all(),[
            'Ucf_name' => 'required',
        ],[
            'Ucf_name.required' => 'The Clinical Finding Field Can Not Be Empty.'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors(),
                'id' => $request->c_f_id
            ]);
        }else{
            $cf_id = $request->c_f_id;
            // dd($cc_id);
            $clinical_finding = clinical_finding::find($cf_id);
            $clinical_finding->name = $request->Ucf_name;
            $res = $clinical_finding->update();
            return response()->json([
                'status' => 200,
                'msg' => 'Clinical Finding Updated Successfully!'
            ]);
        }
//        return back();
    }

    public function delete_clinical_finding(Request $request){
        $del_cf_id = $request->deletingId;
        // dd($del_drug_id);
        $del_cf_info = clinical_finding::find($del_cf_id);
        $del_cf_info->delete();
        return response()->json([
            'status' => 200,
            'msg' => 'Clinical Finding Deleted Successfully!'
        ]);
//        return back();
    }

    public function add_investigation(Request $request){
        $validator = Validator::make($request->all(),[
            'investigation_name' => 'required',
        ],[
            'investigation_name.required' => 'The Investigation Field Is Required.'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors())->with('invalidInvsAdd', 'Invalid Update');
        }else{
            $investigation = new investigation();
            $investigation->name = $request->investigation_name;
            $investigation->status = $request->investigation_status;
            $res = $investigation->save();
            return back()->with('success','Investigation Added Successfully!');
        }
//        return back();
    }

    public function investigation(Request $request){
        $validator = Validator::make($request->all(),[
            'investigation_name' => 'required',
        ],[
            'investigation_name.required' => 'The Investigation Field Is Required.'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors()
            ]);
        }else{
            $investigation = new investigation();
            $investigation->name = $request->investigation_name;
            $investigation->status = $request->investigation_status;
            $res = $investigation->save();
            return response()->json([
                'status' => 200,
                'msg' => 'Investigation Added Successfully!',
            ]);
        }
//        return back();
    }

    public function edit_investigation($id){
        $investigation = investigation::find($id);
        return response()->json([
            'status'=>200,
            'inves' => $investigation,
        ]);
    }

    public function update_investigation(Request $request){
        $validator = Validator::make($request->all(),[
            'Uinvestigation_name' => 'required',
        ],[
            'Uinvestigation_name.required' => 'The Investigation Field Can Not Be Empty.'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors(),
                'id' => $request->investigation_id
            ]);
        }else{
            $investigation_id = $request->investigation_id;
            // dd($cc_id);
            $investigation = investigation::find($investigation_id);
            $investigation->name = $request->Uinvestigation_name;
            $res = $investigation->update();

            return response()->json([
                'status' => 200,
                'msg' => 'Investigation Updated Successfully!'
            ]);
        }
//        return back();
    }

    public function delete_investigation(Request $request){
        $del_investigation_id = $request->deletingId;
        // dd($del_drug_id);
        $del_investigation_info = investigation::find($del_investigation_id);
        $del_investigation_info->delete();
        return response()->json([
            'status' => 200,
            'msg' => 'Investigation Deleted Successfully!'
        ]);
//        return back();
    }

    public function admin_add_tp(Request $request){
        $validator = Validator::make($request->all(),[
            'tp_name' => 'required',
        ],[
            'tp_name.required' => 'The Treatment Plan Field Required.',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors())->with('invalidTPAdd', 'Invalid Update');
        }else{
            $treatment_plan = new treatment_plan();
            $treatment_plan->name = $request->tp_name;
            $treatment_plan->status = $request->tp_status;
            $treatment_plan->save();

            return back()->with('success','Treatment Plan Added Successfully!');
        }
    }

    public function admin_edit_tp($id){
        $treatmentPlan = treatment_plan::find($id);
        return response()->json([
            'status'=>200,
            'tp' => $treatmentPlan,
        ]);
    }

    public function admin_update_tp(Request $request){
        $validator = Validator::make($request->all(),[
            'Utp_name' => 'required',
        ],[
            'Utp_name.required' => 'The Treatment Plan Field Can Not Be Empty.',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors(),
                'id' => $request->t_p_id
            ]);
        }else{
            $tp_id = $request->t_p_id;
            // dd($cc_id);
            $treatment_plan = treatment_plan::find($tp_id);
            $treatment_plan->name = $request->Utp_name;
            $treatment_plan->update();

            return response()->json([
                'status' => 200,
                'msg' => 'Treatment Plan Updated Successfully!'
            ]);
        }
//        return back();
    }

    public function admin_delete_tp(Request $request){
        $del_tp_id = $request->deletingId;
        // dd($del_drug_id);
        $del_tp_info = treatment_plan::find($del_tp_id);
        $del_tp_info->delete();
        return response()->json([
            'status' => 200,
            'msg' => 'Treatment Plan Deleted Successfully!'
        ]);
//        return back();
    }

    public function treatment_plan(Request $request){
        $validator = Validator::make($request->all(),[
            'tp_name' => 'required',
            'tp_cost' => 'required',
        ],[
            'tp_name.required' => 'The Treatment Plan Field Required.',
            'tp_cost.required' => 'The Cost Field Required.'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors()
            ]);
        }else{
            $treatment_plan = new treatment_plan();
            $treatment_plan->name = $request->tp_name;
            $treatment_plan->d_id = $request->d_id;
            $treatment_plan->status = $request->tp_status;
            $treatment_plan->save();


            $treatment_cost = new treatment_cost();
            $treatment_cost->d_id = $request->d_id;
            $treatment_cost->t_plan_id = $treatment_plan->id;
            $treatment_cost->name = $treatment_plan->name;
            $treatment_cost->price = $request->tp_cost;
            $treatment_cost->save();
            return response()->json([
                'status' => 200,
                'msg' => 'Treatment Plan Added Successfully!',
            ]);
        }
        // dd($request->all());

//        return back();
    }

    public function edit_treatment_plan($id){
        $treatmentPlan = treatment_plan::find($id);
        $cost = treatment_cost::where('name',$treatmentPlan->id)->where('d_id',auth()->user()->id)->first();
        return response()->json([
            'status'=>200,
            'tp' => $treatmentPlan,
            'tpCost' => $cost,
        ]);
    }

    public function update_treatment_plan(Request $request){
        $validator = Validator::make($request->all(),[
            'Utp_name' => 'required',
            'Utp_cost' => 'required',
        ],[
            'Utp_name.required' => 'The Treatment Plan Field Can Not Be Empty.',
            'Utp_cost.required' => 'The Cost Field Can Not Be Empty.'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors(),
                'id' => $request->t_p_id
            ]);
        }else{
            $tp_id = $request->t_p_id;
            // dd($cc_id);
            $treatment_plan = treatment_plan::find($tp_id);
            $treatment_plan->name = $request->Utp_name;
            $treatment_plan->update();

            treatment_cost::where('name',$tp_id)->where('d_id',auth()->user()->id)->update([
                'price' => $request->Utp_cost
            ]);

            return response()->json([
                'status' => 200,
                'msg' => 'Treatment Plan Updated Successfully!'
            ]);
        }
//        return back();
    }

    public function delete_treatment_plan(Request $request){
        $del_tp_id = $request->deletingId;
        // dd($del_drug_id);
        $del_tp_info = treatment_plan::find($del_tp_id);
        $del_tp_info->delete();
        return response()->json([
            'status' => 200,
            'msg' => 'Treatment Plan Deleted Successfully!'
        ]);
//        return back();
    }



    public function admin_add_medicine(Request $request){
        $validator = Validator::make($request->all(), [
            'medicine_name' => 'required',
            'medicine_brand' => 'required',
        ],[
            'medicine_name.required' => 'Medicine Name Field Is Required.',
            'medicine_brand.required' => 'Medicine Brand Field Is Required.',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors())->with('invalidMedAdd', 'Invalid Update');
        }else{
            $medicine = new medicine();
            $medicine->name = $request->medicine_name;
            $medicine->brand = $request->medicine_brand;
            $res = $medicine->save();

            return back()->with('success','Medicine Added Successfully!');
        }
    }

    public function medicine_add(Request $request){
        $validator = Validator::make($request->all(), [
            'medicine_name' => 'required',
            'medicine_brand' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors()
            ]);
        }else{
            $medicine = new medicine();
            $medicine->name = $request->medicine_name;
            $medicine->brand = $request->medicine_brand;
            $res = $medicine->save();

            return response()->json([
                'status' => 200,
                'msg' => 'Medicine Added Successfully!'
            ]);
        }

        // return back();
    }

    public function edit_medicine($id){
        $medicine = medicine::find($id);
        return response()->json([
            'status'=>200,
            'medicine_info' => $medicine,
        ]);
    }

    public function update_medicine(Request $request){
        $validator = Validator::make($request->all(), [
            'medicine_name' => 'required',
            'medicine_brand' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors(),
                'id' => $request->medicine_id
            ]);
        }else{
            $medicine_id = $request->medicine_id;
            $medicine = medicine::find($medicine_id);
            $medicine->name = $request->medicine_name;
            $medicine->brand = $request->medicine_brand;
            $res = $medicine->update();
            return response()->json([
                'status' => 200,
                'msg' => 'Medicine Updated Successfully!'
            ]);
        }
//        return back();
    }

    public function delete_medicine(Request $request){
        $del_medicine_id = $request->deletingId;
        // dd($del_drug_id);
        $del_medicine_info = medicine::find($del_medicine_id);
        $del_medicine_info->delete();
        return response()->json([
            'status' => 200,
            'msg' => 'Medicine Deleted Successfully!'
        ]);
//        return back();
    }

    public function monthly_report(Request $req,$d_id){
        $chambers = chember_info::where('d_id', $d_id)->get();
        if($req->month){
            $date = Carbon::parse($req->month);
            $startOfCalendar = $date->copy()->firstOfMonth();
            $endOfCalendar = $date->copy()->lastOfMonth();
            $dates = [];
            for ($startOfCalendar; $startOfCalendar <= $endOfCalendar; $startOfCalendar->addDay()) {
                $dates[] = $startOfCalendar->format('Y-m-d');
            }
            $total_income = treatment_payment::whereYear('date','=',$date)->whereMonth('date', '=' ,$date)->where('d_id', $d_id)->sum('paid_amount');
        } else {
            $date = Carbon::parse($req->date);
            $dates = [];
            $total_income = treatment_payment::where('date','=',$date)->where('d_id', $d_id)->get()->unique('p_id');
        }
        return view('doctor.incomeReport',compact('d_id','chambers', 'total_income','date','dates'));
    }
}
