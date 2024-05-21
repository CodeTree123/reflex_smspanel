<?php

namespace App\Http\Controllers;

use App\Models\chember_info;
use App\Models\favourite;
use App\Models\forum_post;
use App\Models\medical_clg;
use App\Models\notice;
use App\Models\treatment_cost;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\doctor;
use App\Models\shop;
use App\Models\patient_infos;
use App\Models\redeem_code;
use App\Models\subscription_plan;
use App\Models\subscription;
use App\Models\appointment;
use App\Models\mobile_type;
use App\Models\treatment_info;
use Session;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{

    public function provider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackHandel()
    {
        $user = Socialite::driver('google')->user();
        //    dd($user);

        $finduser = User::where('google_id', $user->id)->first();

        if ($finduser) {

            if ($finduser->doctor->BMDC == null) {
                Auth::login($finduser);
                return redirect()->route('login_profile_edit', [$finduser->id]);
            } else {
                // if ($finduser->verification == 1) {

                if ($finduser->status == 0) {

                    Auth::login($finduser);
                    $finduser->update([
                        'lastActiveStatus' => 1
                    ]);
                    return redirect()->route('doctor')->with('success', 'Login Successfully!');
                } else {
                    return redirect()->route('login')->withInput()->with('message', 'Your Account is Blocked!');
                }
                // } else {
                //     return redirect()->route('login')->withInput()->with('message', 'Your account is not verified yet.Please contact with Reflex');
                // }
            }
        } else {

            $existUser = User::where('email', $user->email)->first();

            if ($existUser) {
                // dd($existUser);
                $newUser = User::find($existUser->id)->update([
                    'google_id' => $user->id,
                    'p_google_img' => $user->avatar
                ]);

                if ($existUser->doctor->BMDC == null) {
                    // Auth::login($existUser);
                    return redirect()->route('login_profile_edit', [$existUser->id]);
                } else {
                    Auth::login($existUser);
                    return redirect()->route('doctor')->with('success', 'Login Successfully!');
                }
            } else {
                $newUser = User::create([
                    // 'fname' => $user->user['given_name'],
                    // 'lname' => $user->user['family_name'],
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => "reflexdn1234",
                    'p_google_img' => $user->avatar
                ]);

                doctor::create([
                    'u_id' => $newUser->id
                ]);

                subscription::create([
                    'd_id' => $newUser->id
                ]);

                if ($newUser->doctor->BMDC == null) {
                    Auth::login($newUser);
                    return redirect()->route('login_profile_edit', [$newUser->id]);
                } else {
                    Auth::login($newUser);
                    return redirect()->route('doctor')->with('success', 'Login Successfully!');
                }
            }
        }
    }

    public function registration()
    {
        return view('doctor.registration');
    }

    public function register_user(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $id = User::where('email', '=', $request->email)->first()->id;

        doctor::create([
            'u_id' => $id
        ]);
        subscription::create([
            'd_id' => $id
        ]);
        Auth::login($user);
        // dd($id);
        if ($user) {
            // return back() ->with('success','Successfully Registered');
            return redirect()->route('login_profile_edit', [$id]);
        } else {
            return back()->with('fail', 'Please Check Your Information Properly');
        }
        // return view('index');
    }

    public function login()
    {

        return view('login');
    }

    public function login_user(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user =  User::where('email', '=', $request->email)->first();
        if ($user) {

            if ($request->password == $user->password) {

                if ($user->role == 1) {

                    Auth::login($user);
                    return redirect()->route('admin')->with('success', 'Login Successfully!');
                } elseif ($user->role == 2) {

                    if ($user->verification == 1) {

                        if ($user->status == 0) {

                            Auth::login($user);
                            $user->update(['lastActiveStatus' => 1]);
                            return redirect()->route('shop_admin')->with('success', 'Login Successfully!');
                        } else {
                            return back()->withInput()->with('message', 'Your Account is Blocked!');
                        }
                    } else {
                        return back()->withInput()->with('message', 'Your account is not verified yet.Please contact with Reflex');
                    }
                } else {

                    if ($user->doctor->BMDC == null) {

                        // Auth::login($user);
                        return redirect()->route('login_profile_edit', [$user->id]);
                    } else {

                        // if ($user->verification == 1) {

                        if ($user->status == 0) {

                            Auth::login($user);
                            $user->update(['lastActiveStatus' => 1]);
                            return redirect()->route('doctor')->with('success', 'Login Successfully!');
                        } else {
                            return back()->withInput()->with('message', 'Your Account is Blocked!');
                        }

                        // } else {
                        //     return back()->withInput()->with('message', 'Your account is not verified yet.Please contact with Reflex');
                        // }

                    }
                }
            } else {
                return back()->withInput()->with('message', 'Password not Matches');
            }
        } else {
            return back()->withInput()->with('message', 'Enter Email Properly');
        }
    }

    public function login_profile_edit($id)
    {
        $med_clgs = medical_clg::all();
        $doctor_id = $id;
        return view('doctor.login_profile_edit', compact('doctor_id', 'med_clgs'));
    }

    public function login_update_doctor(Request $request, $doctor_id)
    {
        // dd($request->all());
        $request->validate([
            'phone' => 'required|max:11',
            'BMDC' => 'required|unique:doctors',
            'nid' => 'required|min:10|max:17',
            'dob' => 'required',
            'gender' => 'required',
            'blood_group' => 'required',
            // 'bDegree'=> 'required',
            'mCollege' => 'required',
            'batch' => 'required',
            'd_session' => 'required',
            'passing_year' => 'required',
            // 'professional_degree'=> 'required',
            'speciality' => 'required',
            'designation' => 'required',
            'p_image' => 'required|image|mimes:jpeg,png,jpg',
            'image1' => 'required|image|mimes:jpeg,png,jpg'
        ], [
            'BMDC.required' => 'BMDC field is required.',
            'p_image.required' => 'Profile Image field in required.',
            'p_image.mimes' => 'Profile Image field must be jpeg,png,jpg format.',
            'image1.required' => 'BMDC Image field in required.',
            'image1.mimes' => 'BMDC PDF Image field must be jpeg,png,jpg format.',
        ]);

        $P_filename = '';
        $bmdc_filename = '';
        $post_filename = '';
        if ($request->hasFile('p_image')) {

            $file = $request->file('p_image');
            if ($file->isValid()) {
                $P_filename = "P" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('doctor/profile', $P_filename);
            }
        }
        if ($request->hasFile('image1')) {

            $file = $request->file('image1');
            if ($file->isValid()) {
                $bmdc_filename = "bmdc" . date('mdhms') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('doctor/bmdc', $bmdc_filename);
            }
        }
        if ($request->hasFile('image2')) {

            $file = $request->file('image2');
            if ($file->isValid()) {
                $post_filename = "postG" . date('Ymdhm') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('doctor/post_gred', $post_filename);
            }
        }

        User::find($doctor_id)->update([
            'phone' => $request->phone,
            'p_image' => $P_filename,
        ]);

        doctor::where('u_id', $doctor_id)->update([
            //            'phone'=>$request->phone,
            'BMDC' => $request->BMDC,
            'nid' => $request->nid,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'blood_group' => $request->blood_group,
            'bDegree' => $request->bDegree,
            'mCollege' => $request->mCollege,
            'batch' => $request->batch,
            'session' => $request->d_session,
            'passing_year' => $request->passing_year,
            'professional_degree' => $request->professional_degree,
            'speciality' => $request->speciality,
            'designation' => $request->designation,
            //            'p_image'=>$P_filename,
            'bmdc_image' => $bmdc_filename,
            'postG_image' => $post_filename
        ]);

        return redirect()->route('doctor')->with('success', 'Successfully Registered,Please LogIn.');
    }

    public function doctor(Request $request)
    {

        $doctor_info = User::with('userSms')->where('id', '=', auth()->user()->id)->first();
        $d_id = $doctor_info->id;
        $date_check = Carbon::today()->format('Y-m-d H:i:s');
        $appointments = appointment::leftJoin('patient_infos', 'appointments.p_id', '=', 'patient_infos.id')->where('appointments.d_id', '=', $d_id)->where('appointments.date', '=', $date_check)->get(['appointments.*', 'patient_infos.name', 'patient_infos.image']);
        $count_ap = ($appointments)->count();
        $mobile_type_lists = mobile_type::all();
        $exclusives = forum_post::orderBy('view_count', 'desc')->orderBy('created_at', 'desc')->take(8)->get();
        $p_search = 'null';
        if ($request->search) {
            $p_search = patient_infos::where('mobile', '=', $request->search)->where('d_id', '=', $d_id)->get();
        }
        return view('doctor.doctor', compact('doctor_info', 'appointments', 'count_ap', 'p_search', 'mobile_type_lists', 'exclusives'));
    }

    public function profile_edit($d_id)
    {

        $doctor_info = User::where('id', '=', $d_id)->first();
        $med_clgs = medical_clg::all();

        return view('doctor.profile_edit', compact('doctor_info', 'med_clgs'));
    }

    public function update_doctor(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'nid' => 'required',
            'mCollege' => 'required',
            'batch' => 'required',
            'd_session' => 'required',
            'passing_year' => 'required',
            'speciality' => 'required',
            'p_image' => 'image|mimes:jpeg,png,jpg',
        ], [
            'fname.required' => 'This Field Is Required.',
            'lname.required' => 'This Field Is Required.',
            'phone.required' => 'This Field Is Required.',
            'nid.required' => 'This Field Is Required.',
            'mCollege.required' => 'This Field Is Required.',
            'batch.required' => 'This Field Is Required.',
            'd_session.required' => 'This Field Is Required.',
            'passing_year.required' => 'This Field Is Required.',
            'speciality.required' => 'This Field Is Required.',
            'p_image.image' => 'This Field Is Format Must Be Image.',
            'p_image.mimes:jpeg,png,jpg' => 'This Field Is Format Must Be Image.',
        ]);
        $doctor = User::find($id);
        $doctor_info = doctor::where('u_id', $id)->first();
        $P_filename = $doctor->p_image;
        if ($request->hasFile('p_image')) {
            $destination = 'public/uploads/doctor/profile/' . $doctor->p_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('p_image');
            if ($file->isValid()) {
                $P_filename = "P" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                // dd($P_filename);
                $file->storeAs('doctor/profile', $P_filename);
            }
        }

        $doctor->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'p_image' => $P_filename,
        ]);

        $doctor_info->update([
            // 'fname'=>$request->fname,
            // 'lname'=>$request->lname,
            // 'phone'=>$request->phone,
            'nid' => $request->nid,
            'mCollege' => $request->mCollege,
            'batch' => $request->batch,
            'session' => $request->d_session,
            'passing_year' => $request->passing_year,
            'speciality' => $request->speciality,
            // 'p_image'=>$P_filename,
        ]);

        return redirect()->route('doctor', $id)->with('success', 'Profile Informaton Update Successfully!');
    }

    public function subscription($d_id)
    {
        $doctor_info = User::where('id', '=', $d_id)->first();
        $subscription_plans = subscription_plan::orderBy('id', 'desc')->get();
        $subscription_plans2 = subscription_plan::find([3, 4]);
        // $subscription_check = subscription::find($d_id);
        $subscription_check = subscription::where('d_id', '=', $d_id)->first();
        return view('doctor.subscription', compact('doctor_info', 'subscription_plans', 'subscription_check', 'subscription_plans2'));
    }

    public function subscription_info($id)
    {
        $subscription_info = subscription_plan::find($id);
        return response()->json([
            'status' => 200,
            'subscription_info' => $subscription_info,
        ]);
    }

    public function subscription_add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            's_mobile' => 'required|max:11'
        ], [
            's_mobile.required' => 'The Number Field Is Required.',
            's_mobile.max' => 'The Number must not be greater than 11 characters.'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidPack', $request->pack_id);
        } else {
            $d_id = $request->doctor_id;
            $id = subscription::where('d_id', '=', $d_id)->first()->id;
            // dd($id);
            subscription::find($id)->update([
                'package_name' => $request->package_name,
                'package_price' => $request->package_price,
                'duration' => $request->package_duration,
                'duration_types' => $request->package_duration_types,
                's_mobile' => $request->s_mobile,
                'request' => $request->s_time,
                'pending_status' => 1,
            ]);
            return back()->with('success', 'Subscription Successfully Registered, Please Wait for Admin Approval.');
        }
        // return "hello null";

        // else if($request->redeem_code == "reflexDN2022"){
        //    // return "$request->redeem_code";
        //    $duration = "7 Days(Trial)";
        //    $status = "1";
        //    $d_id = $request->doctor_id;
        //    $id = subscription::where('d_id','=',$d_id)->first()->id;
        //    $start = Carbon::now()->format('d/m/Y');
        //    $end = now()->copy()->addDays(7)->format('d/m/Y');
        // //    dd($id,$start,$end,$duration);
        // subscription::find($id)->update([
        //         'package_name' => $request->package_name,
        //         'package_price' => $request->package_price,
        //         'duration' => $duration,
        //         'start' => $start,
        //         'end' => $end,
        //         'status' => $status,
        //     ]);
        //     return back()->with('success','Subscription Added Successfully');
        // }
        // else if($request->redeem_code != "reflexDN2022"){
        //     return back()->with('fail','Please Enter Redeem Code Properly');
        // }


        // $subscription = new subscription();
        // $subscription->d_id = $request->doctor_id;
        // $subscription->package_name = $request->package_name;
        // $subscription->package_price = $request->package_price;
        // $subscription->duration = $request->package_duration;
        // $res = $subscription->save();
        // return back()->with('success','Successfully Registered');
    }

    public function subscription_add_redeem(Request $request)
    {
        $request->validate([
            'redeem_code' => 'required'
        ], [
            'redeem_code.required' => 'Redeem Code Field Is Required.'
        ]);
        $r_redeem = $request->redeem_code;
        $check_redeem = redeem_code::where('redeem_code', '=', $r_redeem)->first();
        if ($check_redeem == null) {
            return back()->with('fail', 'Please Enter Redeem Code Properly');
        } elseif ($check_redeem->status == '1') {
            return back()->with('fail', 'This Redeem Code Already Used ! Please Contact With Admin !');
        } else {
            // return "$request->redeem_code";
            $duration = $check_redeem->duration;
            $duration_type = $check_redeem->duration_type;
            //    dd($duration,$duration_type);
            $status = "1";
            $d_id = $request->doctor_id;
            $check_valid = User::find($d_id);
            if ($check_valid->verification == 1) {
                $id = subscription::where('d_id', '=', $d_id)->first()->id;
                $start = Carbon::now()->format('Y-m-d H:i:s');
                if ($duration_type == "Days") {
                    $end = now()->copy()->addDays($duration)->format('Y-m-d H:i:s');
                } else if ($duration_type == "Months") {
                    $end = now()->copy()->addMonths($duration)->format('Y-m-d H:i:s');
                } else if ($duration_type == "Years") {
                    $end = now()->copy()->addYears($duration)->format('Y-m-d H:i:s');
                }
                //    dd($id,$duration,$duration_type,$start,$end);
                subscription::find($id)->update([
                    'package_name' => $request->package_name,
                    'package_price' => $request->package_price,
                    'duration' => $duration,
                    'duration_types' => $duration_type,
                    'start' => $start,
                    'end' => $end,
                    'status' => $status,
                ]);
                $check_redeem->status = $status;
                $check_redeem->update();
                return back()->with('success', 'Subscription Added Successfully');
            } else {
                return back()->with('fail', 'This Account Is Not Verified! Please Contact With Admin.');
            }
        }
    }

    public function updateDocFrom_prescription(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'specialty' => 'required',
            // 'post_grad_deg' => 'required',
            'cur_desig_ins' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'error' => $validator->errors()
            ]);
        } else {
            doctor::find($request->doc_id)->update([
                'speciality' => $request->specialty,
                'professional_degree' => $request->post_grad_deg,
                'designation' => $request->cur_desig_ins,
            ]);

            return response()->json([
                'status' => 200,
                'msg' => 'Own Information Updated Successfully!'
            ]);
        }
    }

    public function logout()
    {
        // if(Session::has('loginId')){
        //     Session::pull('loginId');
        //     return redirect('login');
        // }
        User::find(auth()->user()->id)->update(['lastActiveStatus' => 0, 'lastActive' => Carbon::now()]);
        Auth::logout();

        return redirect()->route('login')->with('success', 'Logout Successfully!');
    }
}
