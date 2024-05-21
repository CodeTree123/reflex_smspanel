<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SmsContent;
use App\Models\UserSms;
use App\Models\User;
use App\Models\subscription;

class SmsController extends Controller
{
    public function index()
    {
        $pageTitle = "Sms Content";
        $customSms = SmsContent::all();
        return view('sms.content', compact('pageTitle', 'customSms'));
    }

    public function editContent($id)
    {
        $pageTitle = "Edit Content";
        $editSms = SmsContent::find($id);
        return view('sms.content.edit', compact('pageTitle', 'editSms'));
    }

    public function updateContent(Request $request)
    {
        $id = $request->id;
        $sms = SmsContent::find($id);

        $sms->registration_sms = $request->registration_sms;
        $sms->appointment_sms = $request->appointment_sms;
        $sms->billing_sms = $request->billing_sms;

        $sms->save();

        $successMessage = 'SMS content updated successfully!';

        return back()->with('success', $successMessage);
    }

    public function bulkSms()
    {
        $pageTitle = "Bulk Sms";
        $userSms = UserSms::with('user')->paginate(5);
        return view('sms.bulk_sms', compact('pageTitle', 'userSms'));
    }

    public function bulkSmsEdit($id)
    {
        $pageTitle = "Bulk Sms Edit";
        $userSms = UserSms::find($id);
        return view('sms.bulk_sms_edit', compact('pageTitle', 'userSms'));
    }

    public function bulkSmsUpdate(Request $request)
    {
        $id = $request->id;
        $sms = UserSms::find($id);

        $sms->sms = $request->sms;
        $sms->save();
        $successMessage = 'SMS updated successfully!';

        return back()->with('success', $successMessage);
    }

    public function fetchUserData(Request $request)
    {
        $searchTerm = $request->input('q');
        $data = subscription::with('user')->where('s_mobile', 'like', '%' . $searchTerm . '%')
            ->limit(3)
            ->get();
        return response()->json($data);
    }

    public function giveSms(Request $request)
    {
        $sms = new UserSms();

        $sms->user_id = $request->user_id;
        $sms->sms = $request->sms;
        $sms->save();

        $successMessage = 'SMS added successfully!';

        return back()->with('success', $successMessage);
    }
}
