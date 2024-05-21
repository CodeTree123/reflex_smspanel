<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SubMainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('google/login', [AuthController::class,'provider'])->name('google.login');
Route::get('google/callback', [AuthController::class,'callbackHandel'])->name('google.login.callback');
// Route::get('/', function () {
//     return view('login');
// })->middleware('AfterLogin');
Route::get('/', [AuthController::class, 'login'])->name('login')->middleware('AfterLogin');
// L3R175873

Route::get('/header', [FrontEndController::class, 'header'])->name('header');
Route::get('/adminheader', [FrontEndController::class, 'adminheader'])->name('adminheader');
Route::get('/footer', [FrontEndController::class, 'footer'])->name('footer');
// Route::get('/doctor_profile_setting', [FrontEndController::class, 'doctor_profile_setting'])->name('doctor_profile_setting');

Route::get('/appointment_list/{d_id}', [FrontEndController::class, 'appointment'])->name('appointment_list');
Route::get('/index', [FrontEndController::class, 'index'])->name('index');
Route::get('/loginForm', [FrontEndController::class, 'loginForm'])->name('loginForm');
Route::get('/patient', [FrontEndController::class, 'patient'])->name('patient');
Route::get('/prescription_list', [FrontEndController::class, 'prescription_list'])->name('prescription_list');
// Route::get('/treatment_plan', [FrontEndController::class, 'treatment_plan'])->name('treatment_plan');
Route::get('/treatmentPlans', [FrontEndController::class, 'treatmentPlans'])->name('treatmentPlans');


Route::get('/registration', [AuthController::class, 'registration'])->name('registration')->middleware('AfterLogin');
Route::post('/register_user', [AuthController::class, 'register_user'])->name('register_user');
Route::get('/login_profile_edit/{id}', [AuthController::class, 'login_profile_edit'])->name('login_profile_edit');
Route::put('/login_update/doctor/{id}', [AuthController::class, 'login_update_doctor'])->name('login_update_doctor');

Route::post('/login_user', [AuthController::class, 'login_user'])->name('login_user')->middleware('SubCheck');

Route::middleware('auth')->group(function () {

    // AdminController

    Route::prefix('/admin')->middleware('admin')->group(function () {
        Route::get('/', [AdminController::class, 'admin'])->name('admin');

        Route::get('/doctor_list', [AdminController::class, 'doctor_list'])->name('doctor_list');
        Route::post('/doctor_add', [AdminController::class, 'doctor_add'])->name('doctor_add');
        Route::get('/edit_doctor/{id}', [AdminController::class, 'edit_doctor'])->name('edit_doctor');
        Route::put('/update_doctor', [AdminController::class, 'update_doctor'])->name('update_doctor');
        Route::delete('/delete_doctor', [AdminController::class, 'delete_doctor'])->name('delete_doctor');
        Route::get('/doctor_status/{id}', [AdminController::class, 'doctor_status'])->name('doctor_status');
        Route::get('/doctor_verification/{id}', [AdminController::class, 'doctor_verification'])->name('doctor_verification');

        Route::get('/subscription_list', [AdminController::class, 'subscription_list'])->name('subscription_list');
        Route::get('/subscription_status/{id}', [AdminController::class, 'subscription_status'])->name('subscription_status');
        Route::delete('/delete_subscription', [AdminController::class, 'delete_subscription'])->name('delete_subscription');

        Route::post('/redeem_add', [AdminController::class, 'redeem_add'])->name('redeem_add');
        Route::get('/redeem_status/{id}', [AdminController::class, 'redeem_status'])->name('redeem_status');
        Route::delete('/delete_redeem', [AdminController::class, 'delete_redeem'])->name('delete_redeem');

        Route::get('/chief_complaint_list', [AdminController::class, 'chief_complaint_list'])->name('chief_complaint_list');
        Route::post('/add_chife_complaint', [SubMainController::class, 'add_chife_complaint'])->name('add_chife_complaint');

        Route::get('/clinical_findings_list', [AdminController::class, 'clinical_findings_list'])->name('clinical_findings_list');
        Route::post('/add_clinical_finding', [SubMainController::class, 'add_clinical_finding'])->name('add_clinical_finding');

        Route::get('/investigation_list', [AdminController::class, 'investigation_list'])->name('investigation_list');
        Route::post('/add_investigation', [SubMainController::class, 'add_investigation'])->name('add_investigation');

        Route::get('/treatment_plans_list', [AdminController::class, 'treatment_plans_list'])->name('treatment_plans_list');

        Route::get('/medicine_list', [AdminController::class, 'medicine_list'])->name('medicine_list');
        Route::post('/admin_add_medicine', [SubMainController::class, 'admin_add_medicine'])->name('admin_add_medicine');

        Route::get('/notice_list', [AdminController::class, 'notice_list'])->name('notice_list');
        Route::post('/notice_add', [AdminController::class, 'notice_add'])->name('notice_add');
        Route::get('/notice_status/{id}', [AdminController::class, 'notice_status'])->name('notice_status');
        Route::get('/notice_edit/{id}', [AdminController::class, 'notice_edit'])->name('notice_edit');
        Route::put('/notice_update', [AdminController::class, 'notice_update'])->name('notice_update');
        Route::delete('/notice_delete', [AdminController::class, 'notice_delete'])->name('notice_delete');

        Route::get('/mobile_type_list', [AdminController::class, 'mobile_type_list'])->name('mobile_type_list');
        Route::post('/mobileType_add', [AdminController::class, 'mobileType_add'])->name('mobileType_add');
        Route::get('/edit_mobile_type/{id}', [AdminController::class, 'edit_mobile_type'])->name('edit_mobile_type');
        Route::put('/update_mobile_type', [AdminController::class, 'update_mobile_type'])->name('update_mobile_type');
        Route::delete('/mobile_type_delete', [AdminController::class, 'mobile_type_delete'])->name('mobile_type_delete');

        Route::get('/med_clg_list', [AdminController::class, 'med_clg_list'])->name('med_clg_list');
        Route::post('/med_clg_add', [AdminController::class, 'med_clg_add'])->name('med_clg_add');
        Route::get('/edit_med_clg/{id}', [AdminController::class, 'edit_med_clg'])->name('edit_med_clg');
        Route::put('/update_med_clg', [AdminController::class, 'update_med_clg'])->name('update_med_clg');
        Route::delete('/med_clg_delete', [AdminController::class, 'med_clg_delete'])->name('med_clg_delete');

        // other
        Route::get('/other_panel', [AdminController::class, 'other_panel'])->name('other_panel');
        Route::get('/supplier_list', [AdminController::class, 'supplier_list'])->name('supplier_list');
        Route::post('/supplier_add', [AdminController::class, 'supplier_add'])->name('supplier_add');
        Route::delete('/supplier_delete', [AdminController::class, 'supplier_delete'])->name('supplier_delete');
        Route::get('/supplier_status/{id}', [AdminController::class, 'supplier_status'])->name('supplier_status');


        Route::get('/normal_post', [AdminController::class, 'normal_post'])->name('normal_post');
        Route::get('/case_studies_post', [AdminController::class, 'case_studies_post'])->name('case_studies_post');
        Route::get('/article_post', [AdminController::class, 'article_post'])->name('article_post');
        Route::get('/review_post', [AdminController::class, 'review_post'])->name('review_post');
        Route::get('/forum_post_view/{id}', [AdminController::class, 'forum_post_view'])->name('forum_post_view');
        Route::get('/forum_post_status/{id}', [AdminController::class, 'forum_post_status'])->name('forum_post_status');
        Route::delete('/forum_post_delete', [AdminController::class, 'forum_post_delete'])->name('forum_post_delete');

        Route::get('/forum_event', [AdminController::class, 'forum_event'])->name('forum_event');
        Route::get('/forum_event_view/{id}', [AdminController::class, 'forum_event_view'])->name('forum_event_view');
        Route::get('/forum_event_status/{id}', [AdminController::class, 'forum_event_status'])->name('forum_event_status');
        Route::delete('/forum_event_delete', [AdminController::class, 'forum_event_delete'])->name('forum_event_delete');


        Route::get('/tutorial', [AdminController::class, 'tutorial'])->name('tutorial');
        Route::post('/tutorial_add', [AdminController::class, 'tutorial_add'])->name('tutorial_add');
        Route::get('/tutorial_edit/{id}', [AdminController::class, 'tutorial_edit'])->name('tutorial_edit');
        Route::put('/tutorial_update', [AdminController::class, 'tutorial_update'])->name('tutorial_update');
        Route::get('/tutorial_status/{id}', [AdminController::class, 'tutorial_status'])->name('tutorial_status');
        Route::delete('/tutorial_delete', [AdminController::class, 'tutorial_delete'])->name('tutorial_delete');
    });



    //Route::get('/doctor', [AuthController::class, 'doctor'])->name('doctor')->middleware('NotLogin');
    Route::get('/doctor', [AuthController::class, 'doctor'])->name('doctor');
    Route::get('/doctor/profile_edit/{d_id}', [AuthController::class, 'profile_edit'])->name('profile_edit');
    Route::put('/update/doctor/{id}', [AuthController::class, 'update_doctor'])->name('update.doctor');
    // Route::post('/search',[AuthController::class,'search'])->name('search');

    Route::get('/subscription/{d_id}', [AuthController::class, 'subscription'])->name('subscription');
    Route::get('/subscription_info/{id}', [AuthController::class, 'subscription_info'])->name('subscription_info');
    Route::put('/subscription_add', [AuthController::class, 'subscription_add'])->name('subscription_add');
    Route::put('/subscription_add_redeem', [AuthController::class, 'subscription_add_redeem'])->name('subscription_add_redeem');

    // Shop

    Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
    Route::get('/shop/product/{tb_name}/{id}', [ShopController::class, 'shop_product'])->name('shop_product');
    Route::get('/shop/product_details/{p_id}', [ShopController::class, 'shop_single_product'])->name('shop_single_product');


    // Forum
    Route::get('/forum', [ForumController::class, 'forum'])->name('forum');

    Route::get('/forum_populerPost_list', [ForumController::class, 'forum_populerPost_list'])->name('forum_populerPost_list');

    // Route::get('/forum_post_view/{post_id}', [ForumController::class, 'forum_post_view'])->name('forum_post_view');

    Route::get('/post_view/{post_id}', [ForumController::class, 'post_view'])->name('post_view');

    Route::get('/forum_case_studies', [ForumController::class, 'forum_case_studies'])->name('forum_case_studies');

    Route::get('/forum_article', [ForumController::class, 'forum_article'])->name('forum_article');

    Route::get('/forum_product_review', [ForumController::class, 'forum_product_review'])->name('forum_product_review');

    Route::get('/all_events', [ForumController::class, 'all_events'])->name('all_events');

    Route::get('/viewEvent/{event_id}', [ForumController::class, 'viewEvent'])->name('viewEvent');

    Route::get('/viewTutorial', [ForumController::class, 'viewTutorial'])->name('viewTutorial');


    Route::middleware('userVerified')->group(function () {

        //patient MainController
        Route::get('/patient_age/{dob}', [MainController::class, 'patient_age'])->name('patient_age');

        Route::post('/new/patient/{id}', [MainController::class, 'patient_info'])->name('patient_info');
        Route::put('edit/patient/{d_id}/{p_id}', [MainController::class, 'edit_patient'])->name('edit.patient');
        Route::delete('delete/patient/{d_id}/{p_id}', [MainController::class, 'delete_patient'])->name('delete.patient');

        // patient info from patient list
        Route::get('/patient_list/{id}', [MainController::class, 'patient_list'])->name('patient_list');
        Route::get('/edit_patient/{id}', [MainController::class, 'edit_patient_list'])->name('edit_patient_list');
        Route::post('/update_patient', [MainController::class, 'update_patient_list'])->name('update_patient_list');
        Route::delete('/delete_patient', [MainController::class, 'delete_patient_list'])->name('delete_patient_list');


        Route::get('/patient_appoinment/{id}', [MainController::class, 'patient_appoinment'])->name('patient_appoinment'); //check Later

        Route::get('/get_patient_info/{d_id}/{id}', [MainController::class, 'get_patient_info'])->name('get_patient_info');

        Route::put('/appointment', [MainController::class, 'appointment'])->name('appointment');
        Route::get('/view_appointment/{date}', [MainController::class, 'view_appointment'])->name('view_appointment');
        Route::get('/edit_appointment/{id}', [MainController::class, 'edit_appointment'])->name('edit_appointment');
        Route::put('/update_appointment', [MainController::class, 'update_appointment'])->name('update_appointment');
        Route::delete('/delete_appointment', [MainController::class, 'delete_appointment'])->name('delete_appointment');

        Route::put('/next_appointment', [MainController::class, 'next_appointment'])->name('next_appointment');


        //view_patient
        Route::get('/view/patient/{d_id}/{p_id}', [MainController::class, 'view_patient'])->name('view_patient'); //view

        // Patient Other Info Update
        Route::put('/update/patient/{id}', [MainController::class, 'update_patient'])->name('update_patient');

        Route::post('/view/patient/{d_id}/{p_id}', [MainController::class, 'treatment_info'])->name('treatment_info');
        Route::get('/treatment_info/{id}', [MainController::class, 'treatment_info_edit'])->name('treatment_info_edit');
        Route::put('/treatment_info_update/{d_id}/{p_id}', [MainController::class, 'treatment_info_update'])->name('treatment_info_update');
        Route::delete('/treatment_info_delete', [MainController::class, 'treatment_info_delete'])->name('treatment_info_delete');

        Route::get('/view/patient/treatment/{d_id}/{p_id}/{t_id}/{t_plans}', [MainController::class, 'treatments'])->name('treatments');
        // Route::post('/view/patient/treatment/{p_id}/{t_id}/{t_plans}',[MainController::class,'treatments'])->name('treatments');

        Route::get('/view/patient/prescription/{d_id}/{p_id}', [MainController::class, 'prescription'])->name('prescription');
        Route::post('/add_advice_template/{d_id}',[MainController::class, 'add_advice_template'])->name('add_advice_template');
        Route::get('/edit_advice_template/{id}',[MainController::class, 'edit_advice_template'])->name('edit_advice_template');
        Route::post('/update_advice_template/{d_id}',[MainController::class, 'update_advice_template'])->name('update_advice_template');
        Route::get('/advice_form_template/{id}',[MainController::class, 'advice_form_template'])->name('advice_form_template');
        
        Route::post('/add_drug_template/{d_id}',[MainController::class, 'add_drug_template'])->name('add_drug_template');
        Route::post('/delete_drug_template',[MainController::class, 'delete_drug_template'])->name('delete_drug_template');
        Route::get('/drug_form_template/{d_id}/{p_id}/{id}',[MainController::class, 'drug_form_template'])->name('drug_form_template');
        
        Route::post('/updateDocFrom_prescription',[AuthController::class, 'updateDocFrom_prescription'])->name('updateDocFrom_prescription');
        
        Route::get('/view_prescription/{d_id}/{p_id}', [MainController::class, 'view_prescription'])->name('view_prescription');
        Route::post('/patient/prescription/drug/{d_id}/{p_id}', [MainController::class, 'add_drug'])->name('add_drug');
        Route::get('/edit_drug/{id}', [MainController::class, 'edit_drug'])->name('edit_drug');
        Route::put('/update_drug', [MainController::class, 'update_drug'])->name('update_drug');
        Route::delete('/delete_drug', [MainController::class, 'delete_drug'])->name('delete_drug');
        Route::post('/prescription_add/{d_id}', [MainController::class, 'prescription_add'])->name('prescription_add');
        // Route::post('/prescription_add/{d_id}/{t_id}/{t_plans}', [MainController::class, 'prescription_add'])->name('prescription_add');
        Route::delete('/prescription_delete', [MainController::class, 'prescription_delete'])->name('prescription_delete');

        Route::get('/get_drug_info/{p_id}', [MainController::class, 'get_drug_info'])->name('get_drug_info');

        Route::get('/invoice/{d_id}/{p_id}', [MainController::class, 'invoice'])->name('invoice');
        Route::put('/treatment_payment', [MainController::class, 'treatment_payment'])->name('treatment_payment');
        Route::put('/treatment_discount', [MainController::class, 'treatment_discount'])->name('treatment_discount');

        Route::post('/treatment_steps/{d_id}/{p_id}/{t_id}', [MainController::class, 'treatment_steps'])->name('treatment_steps');
        Route::get('/ot_notes/{id}', [MainController::class, 'ot_notes'])->name('ot_notes');
        Route::put('/update_ot', [MainController::class, 'update_ot'])->name('update_ot');
        Route::delete('/delete_ot', [MainController::class, 'delete_ot'])->name('delete_ot');


        Route::post('/report/{d_id}/{p_id}/{t_id}', [MainController::class, 'report'])->name('report');
        Route::delete('/report_delete', [MainController::class, 'report_delete'])->name('report_delete');


        Route::get('/case_studies/{d_id}/{p_id}/{t_id}', [MainController::class, 'case_studies'])->name('case_studies');



        // SubMainController

        Route::get('/doctor_profile_setting/{d_id}', [SubMainController::class, 'doctor_profile_setting'])->name('doctor_profile_setting');

        Route::post('/add_barcode', [SubMainController::class, 'add_barcode'])->name('add_barcode');
        Route::put('/update_barcode', [SubMainController::class, 'update_barcode'])->name('update_barcode');

        Route::post('/treatment_cost', [SubMainController::class, 'treatment_cost'])->name('treatment_cost');
        Route::get('/edit_treatment_cost/{id}', [SubMainController::class, 'edit_treatment_cost'])->name('edit_treatment_cost');
        Route::put('/update_treatment_cost', [SubMainController::class, 'update_treatment_cost'])->name('update_treatment_cost');
        Route::delete('/delete_treatment_cost', [SubMainController::class, 'delete_treatment_cost'])->name('delete_treatment_cost');

        Route::post('/doctor_chamber', [SubMainController::class, 'doctor_chember'])->name('doctor_chember');
        Route::get('/edit_chamber/{id}', [SubMainController::class, 'edit_chember'])->name('edit_chember');
        Route::put('/update_chamber', [SubMainController::class, 'update_chember'])->name('update_chember');
        Route::delete('/delete_chamber', [SubMainController::class, 'delete_chember'])->name('delete_chember');

        Route::post('/chamber_schedule', [SubMainController::class, 'chember_schedule'])->name('chember_schedule');


        Route::post('/add_favourite', [SubMainController::class, 'add_favourite'])->name('add_favourite');
        Route::get('/edit_favourite/{id}', [SubMainController::class, 'edit_favourite'])->name('edit_favourite');
        Route::put('/update_favourite', [SubMainController::class, 'update_favourite'])->name('update_favourite');



        Route::post('/chife_complaint', [SubMainController::class, 'chife_complaint'])->name('chife_complaint');
        Route::get('/edit_chife_complaint/{id}', [SubMainController::class, 'edit_chife_complaint'])->name('edit_chife_complaint');
        Route::put('/update_chife_complaint', [SubMainController::class, 'update_chife_complaint'])->name('update_chife_complaint');
        Route::delete('/delete_chife_complaint', [SubMainController::class, 'delete_chife_complaint'])->name('delete_chife_complaint');

        Route::post('/clinical_finding', [SubMainController::class, 'clinical_finding'])->name('clinical_finding');
        Route::get('/edit_clinical_finding/{id}', [SubMainController::class, 'edit_clinical_finding'])->name('edit_clinical_finding');
        Route::put('/update_clinical_finding', [SubMainController::class, 'update_clinical_finding'])->name('update_clinical_finding');
        Route::delete('/delete_clinical_finding', [SubMainController::class, 'delete_clinical_finding'])->name('delete_clinical_finding');

        Route::post('/investigation', [SubMainController::class, 'investigation'])->name('investigation');
        Route::get('/edit_investigation/{id}', [SubMainController::class, 'edit_investigation'])->name('edit_investigation');
        Route::put('/update_investigation', [SubMainController::class, 'update_investigation'])->name('update_investigation');
        Route::delete('/delete_investigation', [SubMainController::class, 'delete_investigation'])->name('delete_investigation');

        Route::post('/treatment_plan', [SubMainController::class, 'treatment_plan'])->name('treatment_plan');
        Route::get('/edit_treatment_plan/{id}', [SubMainController::class, 'edit_treatment_plan'])->name('edit_treatment_plan');
        Route::put('/update_treatment_plan', [SubMainController::class, 'update_treatment_plan'])->name('update_treatment_plan');
        Route::delete('/delete_treatment_plan', [SubMainController::class, 'delete_treatment_plan'])->name('delete_treatment_plan');

        Route::post('/admin_add_tp', [SubMainController::class, 'admin_add_tp'])->name('admin_add_tp');
        Route::get('/admin_edit_tp/{id}', [SubMainController::class, 'admin_edit_tp'])->name('admin_edit_tp');
        Route::put('/admin_update_tp', [SubMainController::class, 'admin_update_tp'])->name('admin_update_tp');
        Route::delete('/admin_delete_tp', [SubMainController::class, 'admin_delete_tp'])->name('admin_delete_tp');



        Route::post('/medicine_add', [SubMainController::class, 'medicine_add'])->name('medicine_add');
        Route::get('/edit_medicine/{id}', [SubMainController::class, 'edit_medicine'])->name('edit_medicine');
        Route::put('/update_medicine', [SubMainController::class, 'update_medicine'])->name('update_medicine');
        Route::delete('/delete_medicine', [SubMainController::class, 'delete_medicine'])->name('delete_medicine');
        
        // Route::get('/monthly_report/{d_id}/{Date}', [SubMainController::class, 'monthly_report'])->name('monthly_report');      
        Route::post('/monthly_report/{d_id}', [SubMainController::class, 'monthly_report'])->name('monthly_report');      


        // Route::post('/admin/medicine_add', [AdminController::class, 'medicine_add'])->name('medicine_add');

        // Route::put('/admin/update_medicine', [AdminController::class, 'update_medicine'])->name('update_medicine');
        // Route::delete('/admin/delete_medicine', [AdminController::class, 'delete_medicine'])->name('delete_medicine');

        Route::get('/send_mail/{d_id}/{p_id}', [MainController::class, 'sendMailWithPdf'])->name('send_mail');
        Route::get('/action/{d_id}/{mobile}', [FrontEndController::class, 'action'])->name('action');
        Route::get('/select_chamber/{id}', [FrontEndController::class, 'select_chamber'])->name('select_chamber');



        Route::get('/test', [FrontEndController::class, 'test'])->name('test');

        Route::post('/addToCart', [ShopController::class, 'addToCart'])->name('addToCart');
        Route::get('/other/cart_view', [ShopController::class, 'cart_view'])->name('cart_view');
        Route::post('/CartIncrement', [ShopController::class, 'CartIncrement'])->name('CartIncrement');
        Route::post('/deleteCart', [ShopController::class, 'deleteCart'])->name('deleteCart');
        Route::get('/clearCarts', [ShopController::class, 'clearCarts'])->name('clearCarts');

        Route::get('/placeOrder/{id}', [ShopController::class, 'placeOrder'])->name('placeOrder');
        Route::get('/Order_list', [ShopController::class, 'Order_list'])->name('Order_list');
        Route::get('/order_invoice/{id}', [ShopController::class, 'order_invoice'])->name('order_invoice');


        //Inventory
        Route::get('/inventory', [InventoryController::class, 'inventories'])->name('inventory');
        Route::post('/add_inventory', [InventoryController::class, 'add_inventory'])->name('add_inventory');
        Route::get('/edit_inventory/{id}', [InventoryController::class, 'edit_inventory'])->name('edit_inventory');
        Route::put('/update_inventory', [InventoryController::class, 'update_inventory'])->name('update_inventory');
        Route::put('/restock_inventory', [InventoryController::class, 'restock_inventory'])->name('restock_inventory');
        Route::get('/inventory_status/{id}', [InventoryController::class, 'inventory_status'])->name('inventory_status');


        // shop admin
        Route::get('/shop/shop_admin', [ShopController::class, 'shop_admin'])->name('shop_admin');
        Route::get('/shop/shop_admin/edit', [ShopController::class, 'shop_admin_edit'])->name('shop_admin_edit');
        Route::put('/supplier_update', [ShopController::class, 'supplier_update'])->name('supplier_update');

        Route::get('/shop/shop_admin/product_list', [ShopController::class, 'shop_admin_product_list'])->name('shop_admin_product_list');
        Route::get('/shop/shop_admin/add_product', [ShopController::class, 'shop_add_product'])->name('shop_add_product');
        Route::get('/shop/shop_admin/edit_product/{id}', [ShopController::class, 'shop_edit_product'])->name('shop_edit_product');

        Route::get('/shop/shop_admin/fatch_subcat/{id}', [ShopController::class, 'fatch_subcat'])->name('fatch_subcat');
        Route::get('/shop/shop_admin/fatch_sub_subcat/{id}', [ShopController::class, 'fatch_sub_subcat'])->name('fatch_sub_subcat');
        Route::get('/shop/shop_admin/fatch_sub_subcat1/{id}', [ShopController::class, 'fatch_sub_subcat1'])->name('fatch_sub_subcat1');
        Route::get('/shop/shop_admin/fatch_sub_subcat2/{id}', [ShopController::class, 'fatch_sub_subcat2'])->name('fatch_sub_subcat2');

        Route::post('/add_shop_product', [ShopController::class, 'add_shop_product'])->name('add_shop_product');
        Route::put('/edit_shop_product/{id}', [ShopController::class, 'edit_shop_product'])->name('edit_shop_product');
        Route::get('/product_status/{id}', [ShopController::class, 'product_status'])->name('product_status');
        Route::delete('/product_delete', [ShopController::class, 'product_delete'])->name('product_delete');
        Route::post('/restock_shop_product', [ShopController::class, 'restock_shop_product'])->name('restock_shop_product');

        Route::get('/shop/shop_admin/order_list', [ShopController::class, 'shop_order_list'])->name('shop_order_list');
        Route::get('/shop/shop_admin/order_confirm/{id}', [ShopController::class, 'order_confirm'])->name('order_confirm');
        Route::get('/shop/shop_admin/order_cancel/{id}', [ShopController::class, 'order_cancel'])->name('order_cancel');

        // Forum

        Route::post('/add_post', [ForumController::class, 'add_post'])->name('add_post');
        Route::put('/update_post', [ForumController::class, 'update_post'])->name('update_post');

        Route::post('/add_article', [ForumController::class, 'add_article'])->name('add_article');
        Route::put('/update_article', [ForumController::class, 'update_article'])->name('update_article');

        Route::post('/add_review', [ForumController::class, 'add_review'])->name('add_review');
        Route::put('/update_review', [ForumController::class, 'update_review'])->name('update_review');

        Route::post('/add_case_studies', [ForumController::class, 'add_case_studies'])->name('add_case_studies');
        Route::put('/update_case', [ForumController::class, 'update_case'])->name('update_case');

        Route::delete('/delete_post', [ForumController::class, 'delete_post'])->name('delete_post');

        Route::get('/forum_favPost_list', [ForumController::class, 'forum_favPost_list'])->name('forum_favPost_list');
        Route::get('/forum_post_fav/{post_id}/{u_id}', [ForumController::class, 'forum_post_fav'])->name('forum_post_fav');
        Route::get('/forum_post_unfav/{post_id}/{u_id}', [ForumController::class, 'forum_post_unfav'])->name('forum_post_unfav');

        Route::post('/add_post_comment/{post_id}', [ForumController::class, 'add_post_comment'])->name('add_post_comment');
        Route::get('/get_post_comment/{comment_id}', [ForumController::class, 'get_post_comment'])->name('get_post_comment');
        Route::put('/update_post_comment', [ForumController::class, 'update_post_comment'])->name('update_post_comment');
        Route::delete('/delete_comment', [ForumController::class, 'delete_comment'])->name('delete_comment');

        Route::get('/forum_post_like/{post_id}/{u_id}', [ForumController::class, 'forum_post_like'])->name('forum_post_like');
        Route::get('/forum_post_dislike/{post_id}/{u_id}', [ForumController::class, 'forum_post_dislike'])->name('forum_post_dislike');



        Route::post('/add_event', [ForumController::class, 'add_event'])->name('add_event');
        Route::put('/edit_event', [ForumController::class, 'edit_event'])->name('edit_event');
        Route::delete('/delete_event', [ForumController::class, 'delete_event'])->name('delete_event');

        Route::get('/event_response/{event_id}/{u_id}/{value}', [ForumController::class, 'event_response'])->name('event_response');


    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


});





