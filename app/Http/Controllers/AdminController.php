<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use App\Models\forum_event;
use App\Models\forum_event_response;
use App\Models\forum_post;
use App\Models\forum_post_comment;
use App\Models\forum_post_like;
use App\Models\forum_post_view;
use App\Models\medical_clg;
use App\Models\mobile_type;
use App\Models\patient_infos;
use App\Models\chife_complaint;
use App\Models\clinical_finding;
use App\Models\investigation;
use App\Models\treatment_plan;
use App\Models\treatment_info;
use App\Models\drugs;
use App\Models\prescription;
use App\Models\medicine;
use App\Models\redeem_code;
use App\Models\subscription;
use App\Models\notice;
use App\Models\report;
use App\Models\shop;
use App\Models\treatment_cost;
use App\Models\tutorial;
use App\Models\User;
use Carbon\Carbon;
use File;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use function Symfony\Component\String\b;

class AdminController extends Controller
{
    public function admin()
    {
        $varified_doctors = User::where('role','=','0')->where('verification','=','1')->count();
        $unvarified_doctors = User::Join('doctors','users.id','=','doctors.u_id')->where('users.role','=','0')->where('users.verification','=','0')->where('doctors.BMDC','!=','null')->count();
        $lc_cs = chife_complaint::orderBy('id','desc')->paginate(10);
        $lc_fs = clinical_finding::orderBy('id','desc')->get();
        $investigation_lists = investigation::orderBy('id','desc')->get();
        $lt_ps = treatment_plan::orderBy('id','desc')->get();
        $medicines_lists = medicine::orderBy('id','desc')->get();
        $redeems = redeem_code::all();
        // $subscription_lists = subscription::orderBy('id','desc')->get();
        $subscriped = subscription::where('status','=',1)->count();
        $unsubscriped = subscription::where('status','=',0)->count();
        $notices = notice::all();
        // return view('admin_page',compact('varified_doctors','unvarified_doctors','lc_cs','lc_fs','investigation_lists','lt_ps','medicines_lists','redeems','subscription_lists','notices'));
        return view('admin.doctor.layout.dashboard',compact('varified_doctors','unvarified_doctors','lc_cs','lc_fs','investigation_lists','lt_ps','medicines_lists','redeems','subscriped','unsubscriped','notices'));
        // compact('doctor_info','patient','c_cs','lc_cs','c_fs','lc_fs','t_ps','lt_ps','treatment_infos','investigations','investigation_lists','notices')
    }

    public function doctor_list(){
        $varified_doctors = User::where('role', '=', '0')->where('verification', '=', '1')->get();
        $unvarified_doctors = User::Join('doctors','users.id','=','doctors.u_id')->where('users.role','=','0')->where('users.verification','=','0')->where('doctors.BMDC','!=','null')->get();
        return view('admin.doctor.layout.doctor_list', compact('varified_doctors', 'unvarified_doctors'));
    }

    public function doctor_add(Request $request){

        User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $id = User::where('email','=',$request->email)->first()->id;

        doctor::create([
            'u_id'=>$id
        ]);

        return back()->with('success','Added Successfully! Doctor Need To Login First.');
    }

    public function edit_doctor($id){
        $doctor = User::Join('doctors','users.id','=','doctors.u_id')->where('users.id',$id)->first();
        return response()->json([
            'status'=>200,
            'doctor_info' => $doctor,
        ]);
    }

    public function update_doctor(Request $request){
        $d_id = $request->doctor_id;
        // dd($cc_id);
        $doctor = doctor::find($d_id);
        $doctor->fname = $request->fname;
        $doctor->lname = $request->lname;
        $doctor->email = $request->email;
        $doctor->phone=$request->mobile;
        $doctor->BMDC=$request->BMDC;
        $doctor->chember_name=$request->chember_name;
        $doctor->chember_add=$request->chember_add;
        $res = $doctor->update();
        return back();
    }

    public function delete_doctor(Request $request){
        $del_doctor_id = $request->deletingId;
        // dd($del_doctor_id);
        $del_doctor_info = User::find($del_doctor_id);
        $destination = 'public/uploads/doctor/profile/' . $del_doctor_info->p_image;

        if (File::exists($destination)) {
            File::delete($destination);
        }
        
        $del_doc = doctor::where('u_id', $del_doctor_id)->first();
        
        $destination1 = 'public/uploads/doctor/bmdc/' . $del_doc->bmdc_image;
        $destination2 = 'public/uploads/doctor/post_gred/' . $del_doc->postG_image;
        $destination3 = 'public/uploads/doctor/Barcode/' . $del_doc->bar_image;

        
        if (File::exists($destination1)) {
            File::delete($destination1);
        } 
        if (File::exists($destination2)) {
            File::delete($destination2);
        } 
        if (File::exists($destination3)) {
            File::delete($destination3);
        }
        $del_patients = patient_infos::where('d_id', $del_doctor_id)->get();
        
        foreach($del_patients as $del_patient){
            
            $destination4 = 'public/uploads/patient/' . $del_patient->image;
    
            if (File::exists($destination4)) {
                File::delete($destination4);
            }
        }
        
        $del_reports = report::where('d_id', $del_doctor_id)->get();

        // dd($destination, $destination1, $destination2, $destination3, $del_patients,$del_reports);
        
        foreach ($del_reports as $del_report) {

            $destination5 = 'public/uploads/report/' . $del_report->image;
    
            if (File::exists($destination5)) {
                File::delete($destination5);
            }

        }

        $del_doctor_info->delete();
        return back()->with('success','Doctor Information Deleted Successfully!');
    }

    public function doctor_verification($id){
        $getVerification = User::find($id);
        if($getVerification->verification == 1){
            $verification = 0;
        }else{
            $verification = 1;
        }

        $del_doc = doctor::where('u_id',$id)->first();
        $destination = 'public/uploads/doctor/bmdc/' . $del_doc->bmdc_image;
        $destination1 = 'public/uploads/doctor/post_gred/' . $del_doc->postG_image;

        // dd($destination,$destination1);

        if (File::exists($destination)) {
            File::delete($destination);
        }
        if (File::exists($destination1)) {
            File::delete($destination1);
        }
        User::find($id)->update(['verification' => $verification]);
        doctor::where('u_id',$id)->update(['bmdc_image' => '', 'postG_image' => '']);
        return back()->with('success','Doctor Information Successfully Verified!');
    }

    public function doctor_status($id){
        $getStatus = User::where('id',$id)->first();
        if($getStatus->status == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        User::where('id',$id)->update(['status' => $status]);
        return back()->with('success','Doctor Status Update Successfully!');
    }

    public function subscription_list(){
        $subscription_lists = subscription::leftJoin('users', 'subscriptions.d_id', '=', 'users.id')->where('subscriptions.status',1)->orWhere('subscriptions.request',1)->orderBy('subscriptions.id', 'desc')->get(['subscriptions.*', 'users.fname', 'users.lname']);
        $redeems = redeem_code::all();
        return view('admin.doctor.layout.subscription_list', compact('subscription_lists', 'redeems'));
    }

    public function redeem_add(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'redeem_code' => 'required',
            'duration' => 'required',
            'duration_type' => 'required|in:"Days","Months","Years"',
        ],[
            'redeem_code.required'=>'Redeem Code Fields Is Required',
            'duration.required'=>'Duration Fields Is Required',
            'duration_type.required'=>'Duration Type Number Fields Is Required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidRedeemAdd', 'Invalid Update');
        }else{
            redeem_code::create([
                'redeem_code' => $request->redeem_code,
                'duration' => $request->duration,
                'duration_type' => $request->duration_type,
            ]);
        }
        return back()->with('success','Redeem Code Added Successfully!');
    }

    public function redeem_status($id){
        $getStatus = redeem_code::where('id',$id)->first();
        if($getStatus->status == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        redeem_code::where('id',$id)->update(['status' => $status]);
        return back()->with('success','Redeem Code Status Update Successfully!');
    }

    public function delete_redeem(Request $request){
        $del_redeem_id = $request->deletingId;
        // dd($del_drug_id);
        $del_redeem_info = redeem_code::find($del_redeem_id);
        $del_redeem_info->delete();
        return back()->with('success','Redeem Code Delete Successfully!');
    }

    public function subscription_status($id){

        $null = "";
        $getStatus = subscription::where('id',$id)->first();

        $checkUser = User::find($getStatus->d_id);
        // dd($checkUser);
        if($checkUser->verification == 1){
            // $today = Carbon::now()->format('d/m/Y');
            $start = Carbon::now()->format('Y-m-d H:i:s');
            $getStatusMonth = $getStatus->duration;
            // dd($getStatusMonth);
            if($getStatusMonth <= 1){
                $end = now()->copy()->addMonth($getStatusMonth)->format('Y-m-d H:i:s');
            }else{
                $end = now()->copy()->addMonths($getStatusMonth)->format('Y-m-d H:i:s');
            }
            // dd($end);
            // return $getStatus;
            if($getStatus->status == 1){
                $status = 0;
            }else{
                $status = 1;
            }
            if($status == 1){
                subscription::where('id',$id)->update(['status'=>$status,'start'=>$start,'end'=>$end,'pending_status'=>0]);
            }else{
                subscription::where('id',$id)->update(['status'=>$status,'start'=>$null,'end'=>$null]);
            }
            return back()->with('success','Subscription Status Update Successfully!');
        }else{
            $message = $checkUser->fname." ".$checkUser->lname." , This Account Is Not Verified Yet! Verify First.";
            return back()->with('fail', $message);
        }
    }

    public function delete_subscription(Request $request){
        $del_subscription_id = $request->deletingId;
        // dd($del_drug_id);
        $del_subscription_info = subscription::find($del_subscription_id);
        $del_subscription_info->delete();
        return back();
    }

    public function chief_complaint_list(){
        $lc_cs = chife_complaint::orderBy('id', 'desc')->paginate(10);
        return view('admin.doctor.layout.chief_complaint_list', compact('lc_cs'));
    }

    public function clinical_findings_list(){
        $lc_fs = clinical_finding::orderBy('id', 'desc')->paginate(10);
        return view('admin.doctor.layout.clinical_findings_list', compact('lc_fs'));
    }

    public function investigation_list(){
        $investigation_lists = investigation::orderBy('id', 'desc')->paginate(10);
        return view('admin.doctor.layout.investigation_list', compact('investigation_lists'));
    }

    public function treatment_plans_list(){
        $lt_ps = treatment_plan::orderBy('id', 'desc')->paginate(10);
        return view('admin.doctor.layout.treatment_plans_list', compact('lt_ps'));
    }

    public function medicine_list(){
        $medicines_lists = medicine::orderBy('id', 'desc')->paginate(10);
        return view('admin.doctor.layout.medicine_list', compact('medicines_lists'));
    }

    // public function update_medicine(Request $request){
    //     $medicine_id = $request->medicine_id;
    //     // dd($cc_id);
    //     $medicine = medicine::find($medicine_id);
    //     $medicine->name = $request->medicine_name;
    //     $medicine->brand = $request->medicine_brand;
    //     $res = $medicine->update();
    //     return back();
    // }

    public function notice_list()
    {
        $notices = notice::all();
        return view('admin.doctor.layout.notice_list', compact('notices'));
    }

    public function notice_add(Request $request){
    //      dd($request->all());
        notice::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return back()->with('success','Notice Added Successfully!');
    }

    public function notice_status($id){
        $getStatus = notice::where('id',$id)->first();
        if($getStatus->status == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        notice::where('id',$id)->update(['status' => $status]);
        return back()->with('success','Notice Status Updated Successfully!');
    }

    public function notice_edit($id){
        $notice = notice::find($id);
        return response()->json([
            'status'=>200,
            'notice' => $notice,
        ]);
    }

    public function notice_update(Request $request){
    //        dd($request->all());
        $notice = notice::find($request->notice_id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return back()->with('success','Notice Updated Successfully!');
    }

    public function notice_delete(Request $request){
        $del_notice_id = $request->deletingId;
        // dd($del_drug_id);
        $del_notice_info = notice::find($del_notice_id);
        $del_notice_info->delete();
        return back()->with('success','Notice Deleted Successfully!');
    }

    public function mobile_type_list(){
        $mobile_types = mobile_type::paginate(10);
        return view('admin.doctor.layout.mobile_type',compact('mobile_types'));
    }

    public function mobileType_add(Request $request){
        $validator = Validator::make($request->all(),[
            'typeName' => 'required',
        ],[
            'typeName.required' => 'Type Name Field Is Required.'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors())->with('invalidMTAdd', 'Invalid');
        }else{
            mobile_type::create([
                'name' => $request->typeName,
                'status' => 1
            ]);
            return back()->with('success','Mobile Type Added Successfully!');
        }
    }

    public function edit_mobile_type($id){
        $mobile_type = mobile_type::find($id);
        return response()->json([
            'status'=>200,
            'mt' => $mobile_type,
        ]);
    }

    public function update_mobile_type(Request $request){
        $validator = Validator::make($request->all(),[
            'u_typeName' => 'required',
        ],[
            'u_typeName.required' => 'Type Name Field Is Required.'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors(),
                'id' => $request->mType_id
            ]);
        }else{
            mobile_type::find($request->mType_id)->update([
                'name' => $request->u_typeName,
            ]);
            return response()->json([
                'status' => 200,
                'msg' => 'Mobile Type Updated Successfully!'
            ]);
        }
    }

    public function mobile_type_delete(Request $request){
        mobile_type::find($request->deletingId)->delete();
        return back()->with('success','Mobile Type Deleted Successfully!');
    }

    public function med_clg_list(){
        $med_clgs = medical_clg::orderBy('id','desc')->paginate(10);
        return view('admin.doctor.layout.med_clg',compact('med_clgs'));
    }

    public function med_clg_add(Request $request){
        $validator = Validator::make($request->all(),[
            'typeName' => 'required',
        ],[
            'typeName.required' => 'Name Field Is Required.'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors())->with('invalidMCAdd', 'Invalid');
        }else{
            medical_clg::create([
                'name' => $request->typeName,
                'status' => 1
            ]);
            return back()->with('success','Medical College Added Successfully!');
        }
    }

    public function edit_med_clg($id){
        $med_Clg = medical_clg::find($id);
        return response()->json([
            'status'=>200,
            'mc' => $med_Clg,
        ]);
    }

    public function update_med_clg(Request $request){
        $validator = Validator::make($request->all(),[
            'u_typeName' => 'required',
        ],[
            'u_typeName.required' => 'Name Field Is Required.'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors(),
                'id' => $request->mClg_id
            ]);
        }else{
            medical_clg::find($request->mClg_id)->update([
                'name' => $request->u_typeName,
            ]);
            return response()->json([
                'status' => 200,
                'msg' => 'Medical College Updated Successfully!'
            ]);
        }
    }

    public function med_clg_delete(Request $request){
        medical_clg::find($request->deletingId)->delete();
        return back()->with('success','Medical College Deleted Successfully!');
    }



    public function other_panel(){
        return view('admin.other.layout.dashboard');
    }

    public function supplier_list(){
        $shops = User::where('role',2)->orderBy('id', 'desc')->paginate(10);
        return view('admin.other.layout.supplier_list',compact('shops'));
    }

    public function supplier_add(Request $request){
        $validator = Validator::make($request->all(), [
            's_fname' => 'required',
            's_lname' => 'required',
            's_phone' => 'required',
            's_image' => 'required|image|mimes:jpeg,png,jpg',
            'email' => 'required|email|unique:users',
            's_password' => 'required',
        ],[
            's_fname.required'=>'First Name Fields Is Required',
            's_lname.required'=>'Last Name Fields Is Required',
            's_phone.required'=>'Contact Number Fields Is Required',
            's_image.required|image|mimes:jpeg,png,jpg'=>'Image Fields Is Required',
            's_image.image'=>'Image Must Be Image Format',
            's_image.mimes'=> 'Image Must Be Image Format of jpeg,png,jpg',
            'email.required|email'=>'Email Fields Is Required',
            's_password.required'=>'Password Fields Is Required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidSupplierAdd', 'Invalid Update');
        }else{
            $filename = '';
            if ($request->hasFile('s_image')) {
                $file = $request->file('s_image');
                if ($file->isValid()) {
                    $filename = "other" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('other', $filename);
                }
            }
            User::create([
                'fname' => $request->s_fname,
                'lname' => $request->s_lname,
    //                'other' => $request->s_shopName,
                'email' => $request->email,
                'password' => $request->s_password,
                'phone' => $request->s_phone,
                'p_image' => $filename,
                'role' => 2,
                'verification' => 1
            ]);

            $id = User::where('email','=',$request->email)->first()->id;
            shop::create([
                'u_id' => $id
            ]);
        }
        return back()->with('success', 'Successfully Supplier Added.');
    }

    public function supplier_status($id)
    {
        $getStatus = User::where('id', $id)->first();
        if ($getStatus->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        User::where('id', $id)->update(['status' => $status]);
        return back()->with('success', 'Successfully Status Changed.');
    }

    public function supplier_delete(Request $request)
    {
        $del_supplier_id = $request->deletingId;

        $del_supplier_info = shop::find($del_supplier_id);
        $destination = 'public/uploads/other/' . $del_supplier_info->shop_image;

        if (File::exists($destination)) {
            File::delete($destination);
        }

        $del_supplier_info->delete();
        return back()->with('success', 'Successfully Supplier Deleted.');
    }

    public function normal_post(){
        $post_type = 1;
        $posts = forum_post::where('post_type',$post_type)->orderBy('id','desc')->paginate(10);

        return view('admin.other.layout.forum_post_list',compact('posts','post_type'));
    }

    public function case_studies_post(){
        $post_type = 4;
        $posts = forum_post::where('post_type',$post_type)->orderBy('id','desc')->paginate(10);

        return view('admin.other.layout.forum_post_list',compact('posts','post_type'));
    }

    public function article_post(){
        $post_type = 2;
        $posts = forum_post::where('post_type',$post_type)->orderBy('id','desc')->paginate(10);

        return view('admin.other.layout.forum_post_list',compact('posts','post_type'));
    }

    public function review_post(){
        $post_type = 3;
        $posts = forum_post::where('post_type',$post_type)->orderBy('id','desc')->paginate(10);

        return view('admin.other.layout.forum_post_list',compact('posts','post_type'));
    }

    public function forum_post_view($id){
        $post = forum_post::find($id);
        $comments = forum_post_comment::where('post_id', $post->id)->get();

        return view('admin.other.layout.forum_post_view',compact('post', 'comments'));
    }

    public function forum_post_status($id)
    {
        $getStatus = forum_post::find($id);
        if ($getStatus->showStatus == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        // dd($id,$getStatus,$status);
        forum_post::find($id)->update(['showStatus' => $status]);

        return back()->with('success', 'Successfully Status Changed.');
    }

    public function forum_post_delete(Request $request){
        $views = forum_post_view::where('post_id', $request->deletingId)->get();
        $likes = forum_post_like::where('post_id', $request->deletingId)->get();
        $comments = forum_post_comment::where('post_id', $request->deletingId)->get();

        foreach ($views as $view){
            forum_post_view::find($view->id)->delete();
        }
        foreach ($likes as $like){
            forum_post_like::find($like->id)->delete();
        }
        foreach ($comments as $comment){
            forum_post_comment::find($comment->id)->delete();
        }

        forum_post::find($request->deletingId)->delete();

        return back()->with('success', 'Successfully Post Deleted.');
    }

    public function forum_event(){
        $events = forum_event::orderBy('id','desc')->paginate(10);

        return view('admin.other.layout.forum_event_list',compact('events'));
    }

    public function forum_event_view($id){
        $event = forum_event::find($id);
        $eventResponses = forum_event_response::where('event_id', $id)->get();
        $go = forum_event_response::where('event_id', $id)->where('status',1)->count();
        $notgo = forum_event_response::where('event_id', $id)->where('status',2)->count();
        $maybe = forum_event_response::where('event_id', $id)->where('status',3)->count();

        return view('admin.other.layout.forum_event_view', compact('event', 'eventResponses','go','notgo','maybe'));
    }

    public function forum_event_status($id)
    {
        $getStatus = forum_event::find($id);
        if ($getStatus->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        forum_event::find($id)->update(['status' => $status]);

        return back()->with('success', 'Successfully Status Changed.');
    }

    public function forum_event_delete(Request $request){
        $responses = forum_event_response::where('event_id', $request->event_id)->get();
        foreach($responses as $response){
            forum_event_response::find($response->id)->delete();
        }
        forum_event::find($request->deletingId)->delete();

        return back()->with('success', 'Successfully Event Deleted.');
    }

    public function tutorial(){
        $tutorials = tutorial::orderBy('id','desc')->paginate(10);

        return view('admin.other.layout.tutorial',compact('tutorials'));
    }

    public function tutorial_add(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
            'y_link' => 'required',
        ],[
            'title.required' => 'Title Field Is Required.',
            'description.required' => 'Description Field Is Required.',
            'y_link.required' => 'Description Field Is Required.',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors())->with('invalidTutoAdd', 'Invalid Update');
        }else{
            $youTub_Link =  str_replace('https://youtu.be/', '', $request->y_link);
            // dd($request->all(),$youTub_Link);
            tutorial::create([
                'title' => $request->title,
                'description' => $request->description,
                'video' => $youTub_Link,
            ]);

            return back()->with('success','Tutorial Added Successfully!');
        }
    }

    public function tutorial_edit($id){
        $tutorial = tutorial::find($id);
        return response()->json([
            'status'=>200,
            't' => $tutorial,
        ]);
    }

    public function tutorial_update(Request $request){
        $validator = Validator::make($request->all(),[
            'u_title' => 'required',
            'u_description' => 'required',
            'u_y_link' => 'required',
        ],[
            'u_title.required' => 'Title Field Is Required.',
            'u_description.required' => 'Description Field Is Required.',
            'u_y_link.required' => 'Description Field Is Required.',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'error' => $validator->errors(),
                'id' => $request->tutorial_id
            ]);
        }else{
            tutorial::find($request->tutorial_id)->update([
                'title' => $request->u_title,
                'description' => $request->u_description,
                'video' => $request->u_y_link,
            ]);
            return response()->json([
                'status' => 200,
                'msg' => 'Tutorial Updated Successfully!'
            ]);
        }
    }

    public function tutorial_status($id)
    {
        $getStatus = tutorial::find($id);
        if ($getStatus->showStatus == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        tutorial::find($id)->update(['showStatus' => $status]);

        return back()->with('success', 'Successfully Status Changed.');
    }

    public function tutorial_delete(Request $request){

        tutorial::find($request->deletingId)->delete();

        return back()->with('success', 'Successfully Event Deleted.');
    }

}
