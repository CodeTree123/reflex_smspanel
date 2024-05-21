<?php

use App\Http\Controllers\SmsController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/sms/content/index', [SmsController::class, 'index'])->name('sms.content');
    Route::get('/custom/bulk/sms', [SmsController::class, 'bulkSms'])->name('bulk.sms');
    Route::get('/get/user/data', [SmsController::class, 'fetchUserData'])->name('get.user.data');
    Route::get('/sms/content/edit/{id}', [SmsController::class, 'editContent'])->name('sms.content.edit');
    Route::post('/sms/content/update', [SmsController::class, 'updateContent'])->name('sms.content.update');
    Route::post('/sms/give/', [SmsController::class, 'giveSms'])->name('bulk.sms.give');
    Route::post('/sms/update/', [SmsController::class, 'bulkSmsUpdate'])->name('sms.bulk.update');
    Route::get('/sms/bulk/edit/{id}', [SmsController::class, 'bulkSmsEdit'])->name('sms.bulk.edit');

});
