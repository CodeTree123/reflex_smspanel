<?php

use App\Models\doctor;
use App\Models\subscription;
use App\Models\notice;
use App\Models\treatment_info;
use App\Models\s_category;
use App\Models\s_sub_category;
use App\Models\s_sub_subcat1;
use App\Models\s_sub_subcat2;
use App\Models\s_sub_subcat3;
use App\Models\User;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;


function subscription()
{
//    if (Session::has('loginId')) {
        $d_id = auth()->user()->id;
        $subscription = subscription::where('d_id', '=', $d_id)->first();
        return $subscription;
//    }
}
function sub_remain()
{
//    if (Session::has('loginId')) {
        $d_id = auth()->user()->id;
        $subscription = subscription::where('d_id', '=', $d_id)->first();
        $today = Carbon::today();
        $formatted_today = Carbon::createFromFormat('Y-m-d H:i:s', $today);
        $sub_end = $subscription->end;
        if ($sub_end != null) {
            $formatted_subEnd = Carbon::createFromFormat('Y-m-d H:i:s', $sub_end);
            $sub_remain = $formatted_today->diffInDays($formatted_subEnd);
        } else {
            $sub_remain = '0';
        }
        //dd($sub_remain);
        // dd($subscription->status);
        return $sub_remain;
//    }
}
function notices()
{
    $notices = notice::where('status', '=', '1')->get();
    return $notices;
}
function total_cost()
{
//    if (Session::has('loginId')) {
        $d_id = auth()->user()->id;
        $total_cost =  treatment_info::where('d_id', '=', $d_id)->sum('cost');
        return $total_cost;
//    }
}
function total_paid()
{
//    if (Session::has('loginId')) {
        $d_id = auth()->user()->id;;
        $total_paid =  treatment_info::where('d_id', '=', $d_id)->sum('paid');
        return $total_paid;
//    }
}
function total_due()
{
//    if (Session::has('loginId')) {
        $d_id = auth()->user()->id;
        $total_due =  treatment_info::where('d_id', '=', $d_id)->sum('due');
        return $total_due;
//    }
}

// function payment_info(){
    

// }

function unverified()
{
//    $unvarified = doctor::where('role','=','0')->where('verification','=','0')->where('BMDC','!=','null')->count();
    $unvarified = User::Join('doctors','users.id','=','doctors.u_id')->where('users.role','=','0')->where('users.verification','=','0')->where('doctors.BMDC','!=','null')->count();
    return $unvarified;
}
function subscription_alert()
{
    $subscription_alert = subscription::where('pending_status','=',1)->count();
    return $subscription_alert;
}

function cat()
{
    $menus = s_category::all();
    return $menus;
}

function subcat()
{
    $submenus = s_sub_category::all();
    return $submenus;
}

function subsubcat1()
{
    $sSubmenu1s = s_sub_subcat1::all();
    return $sSubmenu1s;
}

function subsubcat2()
{
    $sSubmenu2s = s_sub_subcat2::all();
    return $sSubmenu2s;
}

function subsubcat3()
{
    $sSubmenu3s = s_sub_subcat3::all();
    return $sSubmenu3s;
}

//function cart(){
//    $cart=Cart::content();
//    return $cart;
//}


