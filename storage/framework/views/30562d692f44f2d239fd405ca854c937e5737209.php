<?php $__env->startPush('page-css'); ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<!-- ========= main ========= -->
<main class="bg-dark">
    <div class="container main">
        <section class="prescription-header">
            <div class="container">
                <div class="d-flex justify-content-between mb-5">
                    <div class="mb-3 test1">
                        <h5 class="docname"><?php echo e($doctor_info->fname." ".$doctor_info->lname); ?></h5>
                        <ul class="list-unstyled">
                            <li>
                                <p class="deg2"><?php echo e($doctor_info->doctor->designation); ?></p>
                            </li>
                            <li>
                                <p class="bmdcnum">BMDC no: <?php echo e($doctor_info->doctor->BMDC); ?></p>
                            </li>
                            <li>
                                <p class="deg2"><?php echo e($doctor_info->doctor->bDegree); ?></p>
                            </li>
                        </ul>
                    </div>

                    <div class="mb-3 test1">
                        <div class="mb-2 qrcode">

                        </div>
                        <?php if($doctor_info->doctor->bar_image == null): ?>
                        <img src="<?php echo e(asset ('assets/img/qr.png')); ?>" alt="Qr" class="img-fluid">
                        <?php else: ?>
                        <img src="<?php echo e(asset ('public/uploads/doctor/Barcode/'.$doctor_info->doctor->bar_image)); ?>" alt="Qr" class="img-fluid" width="100" height="100">
                        <?php endif; ?>
                    </div>
                    <div class="date w-25 test1">
                        <!-- <select class="form-select form-select-sm mb-2 doc_chembars">

                        </select> -->
                        <select class="form-select chamber d-print-none" id="chember" aria-label="Default select example">
                            <option>Select Chamber</option>
                            <?php $__currentLoopData = $chembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($chember->id); ?>"><?php echo e($chember->chember_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                        <h2 id="chem_name" class="chem_name mb-1"></h2>
                        <h2 id="chem_add" class="chem_add"></h2>
                        <h2 id="chem_phone" class="chem_phone"></h2>
                        <!-- <p>06/06/2022</p> -->

                        <input type="hidden" class="doc_uid">
                        <input type="hidden" class="doc_uid_profile">
                        <!-- <p>06/06/2022</p> -->

                    </div>

                </div>
            </div>
        </section>

        <section class="prescription-subheader">
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-sm table-borderless">
                        <tr class=" ">
                            <td class=""><span class="title">Name : <?php echo e($patient->name); ?></span> <span class="value pres_pt_name"></span></td>
                            <td class=""><span class="title">Age : <?php echo e($patient->age); ?></span> <span class="value pres_pt_age"></span></td>
                            <td class=""><span class="title">Today Date :<?php echo e(date('d/m/Y')); ?></span> <span class="value pres_pt_date"></span></td>
                        </tr>
                        <tr class="">
                            <td class="  "><span class="title">Mobile : <?php echo e($patient->mobile); ?></span> <span class="value pres_pt_mobile"></span></td>
                            <td class=" "><span class="title">Address : <?php echo e($patient->address); ?></span> <span class="value pres_pt_address"></span></td>
                            <td class=" "><span class="title">Next Appointment :
                                    <?php if($appointment != null && $appointment->date == \Carbon\Carbon::today()): ?>
                                    <?php echo e(\Carbon\Carbon::parse($appointment->date)->format('d/m/Y')); ?>

                                    <?php endif; ?>
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>

        <section class="prescription-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 left-col">
                        <div class="left">
                            <div class="single cc">
                                <h2>C/C:</h2>
                                <div class="complain d-flex justify-content-between align-items-center">
                                    <ol class="ms-3">
                                        <li>
                                            <?php
                                            foreach($pc_c as $c_c){
                                            $p[] = $c_c;
                                            }
                                            $t = implode(',',$p);
                                            $t = explode(',',$t);
                                            $pc = array_unique($t);
                                            $pc =implode(',',$pc);
                                            print_r($pc);

                                            ?>
                                        </li>
                                    </ol>
                                    <!--<table class="tb" >-->
                                    <!--    <tr class="tr-1">-->
                                    <!--        <th class="top-left" id="tl">13</th>-->
                                    <!--        <th class="top-right" id="tr">23  </th> -->
                                    <!--    </tr>-->
                                    <!--    <tr class="tr-2">-->
                                    <!--        <th class="bottom-left" id="bl">  12</th>-->
                                    <!--        <th class="bottom-right" id="br"> 23</th> -->
                                    <!--    </tr> -->
                                    <!--    </table> -->
                                </div>
                            </div>
                            <div class="single oe">
                                <h2>O/E:</h2>
                                <div class="complain">

                                    <ol class="">
                                        <?php $__currentLoopData = $treatment_infos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$treatment_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="d-flex justify-content-between">
                                            <span><?php echo e($key + 1); ?>. <?php echo e($treatment_info->clinical_findings); ?></span>
                                            <span><?php echo e($treatment_info->tooth_no); ?></span>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ol>
                                    <!--<table class="tb" >-->
                                    <!--    <tr class="tr-1">-->
                                    <!--        <th class="top-left" id="tl">13</th>-->
                                    <!--        <th class="top-right" id="tr">23  </th> -->
                                    <!--    </tr>-->
                                    <!--    <tr class="tr-2">-->
                                    <!--        <th class="bottom-left" id="bl">  12</th>-->
                                    <!--        <th class="bottom-right" id="br"> 23</th> -->
                                    <!--    </tr> -->
                                    <!--    </table> -->
                                </div>
                            </div>
                            <div class="single tp">
                                <h2>T/P:</h2>
                                <div class="complain">

                                    <ol class="">
                                        <?php $__currentLoopData = $treatment_infos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$treatment_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="d-flex justify-content-between">
                                            <span><?php echo e($key + 1); ?>. <?php echo e($treatment_info->treatment_plans); ?></span>
                                            <span><?php echo e($treatment_info->tooth_no); ?></span>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ol>
                                    <!--<table >-->
                                    <!--    <tr class="tr-1">-->
                                    <!--        <th class="top-left">18</th>-->
                                    <!--        <th class="top-right">27</th> -->
                                    <!--    </tr>-->
                                    <!--    <tr class="tr-2">-->
                                    <!--        <th class="bottom-left">15</th>-->
                                    <!--        <th class="bottom-right">8</th> -->
                                    <!--    </tr> -->
                                    <!--    </table> -->
                                </div>
                            </div>
                            <div class="single investigation">
                                <h2>Investigation:</h2>
                                <div class="complain">

                                    <ol class="">
                                        <?php $__currentLoopData = $treatment_infos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$treatment_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="d-flex justify-content-between">
                                            <span><?php echo e($key + 1); ?>. <?php echo e($treatment_info->investigation); ?></span>
                                            <span><?php echo e($treatment_info->tooth_no); ?></span>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ol>
                                    <!--<table >-->
                                    <!--    <tr class="tr-1">-->
                                    <!--        <th class="top-left">18</th>-->
                                    <!--        <th class="top-right">27</th> -->
                                    <!--    </tr>-->
                                    <!--    <tr class="tr-2">-->
                                    <!--        <th class="bottom-left">15</th>-->
                                    <!--        <th class="bottom-right">8</th> -->
                                    <!--    </tr> -->
                                    <!--    </table> -->
                                </div>
                            </div>
                            <div class="single MedHistory">
                                <h2>Medical History:</h2>
                                <div class="complain">

                                    <div class="text-start text-capitalize"><span class="fw-bolder">BP</span> : <?php echo e($patient->bp_high); ?> / <?php echo e($patient->bp_low); ?></div>
                                    <div class="text-start text-capitalize"><span class="fw-bolder">Heart Disease</span> : <?php echo e($patient->Heart_Disease); ?></div>
                                    <div class="text-start text-capitalize"><span class="fw-bolder">Diabetic</span> : <?php echo e($patient->Diabetic); ?></div>
                                    <div class="text-start text-capitalize"><span class="fw-bolder">Helpatics</span> : <?php echo e($patient->Helpatics); ?></div>
                                    <div class="text-start text-capitalize"><span class="fw-bolder">Bleeding disorder</span> : <?php echo e($patient->Bleeding_disorder); ?></div>
                                    <div class="text-start text-capitalize"><span class="fw-bolder">Allergy</span> : <?php echo e($patient->Allergy); ?></div>

                                    <?php if($patient->gender == "Male"): ?>
                                    <div class="text-start"> </div>
                                    <?php else: ?>
                                    <div class="text-start text-capitalize"><span class="fw-bolder">Pregnant/Lactating</span> : <?php echo e($patient->Pregnant); ?></div>
                                    <?php endif; ?>
                                    <div class="text-start text-capitalize"><span class="fw-bolder">Other</span> : <?php echo e($patient->other); ?></div>

                                </div>
                            </div>

                        </div>
                        <!-- <div class="timing mb-4 d-inline-block float-end">
                            <h6>Schedule Time</h6>
                            <div class="table-responsive">
                                <table class="table-sm table-bordered">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Day</th>
                                        <th>Morning</th>
                                        <th>Evening</th>
                                    </tr>
                                    </thead>
                                    <tbody class="doc_time_shc">
                                    <tr>
                                        <td>SAT</td>
                                        <td class="sat_mon">09:30-10:30 AM</td>
                                        <td class="sat_eve">09:30-10:30 AM</td>
                                    </tr>
                                    <tr>
                                        <td>SUN</td>
                                        <td class="sun_mon"></td>
                                        <td class="sun_eve"></td>
                                    </tr>
                                    <tr>
                                        <td>MON</td>
                                        <td class="mon_mor"></td>
                                        <td class="mon_eve"></td>
                                    </tr>
                                    <tr>
                                        <td>TUE</td>
                                        <td class="tue_mor"></td>
                                        <td class="tue_eve"></td>
                                    </tr>
                                    <tr>
                                        <td>WED</td>
                                        <td class="wed_mor"></td>
                                        <td class="wed_eve"></td>
                                    </tr>
                                    <tr>
                                        <td>THU</td>
                                        <td class="thu_mor"></td>
                                        <td class="thu_eve"></td>
                                    </tr>
                                    <tr>
                                        <td>FRI</td>
                                        <td class="fri_mor"></td>
                                        <td class="fri_eve"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div> -->
                    </div>
                    <div class="col-md-8">
                        <div class="right">
                            <div class="single">

                                <div class="mb-3">


                                    <img src="<?php echo e(asset ('assets/img/rx.png')); ?>" class="img-fluid" alt="">
                                </div>
                                <!-- <div class="drug-list">
                                    <ol>
                                        <li>
                                            <div class="d-flex justify-content-between">
                                                <div class="align-self-center">
                                                    <p class="drug-name">ALATROL 10MG TAB</p>
                                                </div>
                                                <div class="align-self-center">
                                                    <button type="button" class="btn btn-sm p-o edit-drug"><i class="bi bi-pencil-square text-primary"></i></button>
                                                </div>
                                            </div>
                                            <P class="qty">1+0+1 [ 5 day(s)] After Meal (Qty. 10)</P>
                                        </li>
                                    </ol>
                                </div> -->

                                <div class="drug-list">
                                    <ol>
                                        <?php $__empty_1 = true; $__currentLoopData = $drugs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <li>
                                            <div class="d-flex justify-content-between">
                                                <div class="align-self-center">
                                                    <p class=""><?php echo e($drug->drug_name); ?></p>
                                                </div>
                                                <div class="align-self-center">
                                                    <button type="button" class="btn crud-btns edit_drug" value="<?php echo e($drug->id); ?>">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>

                                                    <button class="btn crud-btns delete-drug" data-drug-name="<?php echo e($drug->drug_name); ?>" value="<?php echo e($drug->id); ?>">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <P class="qty"><?php echo e($drug->drug_time); ?> [ <?php echo e($drug->duration); ?> day(s) ] <?php echo e($drug->meal_time); ?> </P>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <li>
                                            <p>There Are No Drugs Add Yet.</p>
                                        </li>
                                        <?php endif; ?>
                                    </ol>
                                </div>

                                <button type="button" class="btn btn-sm btn-outline-blue-grey addDrug" id="drugBtn">Add Drug
                                </button>


                                <div class="single_advice_container">
                                    <div class="single advice mt-3  ">
                                        <h5>Advice:</h5>
                                        <button type="button" class="btn btn-sm rounded-pill prescription-btn" data-bs-toggle="modal" data-bs-target="#advice">Add Advice</button>
                                        <textarea type="text" name="" id="view_advice_area" class="complain m-0 ms-5 d-none" value="" rows="3" style="width:80%"></textarea>
                                        <ul class="view_advice_list d-none">
                                            <li>
                                                <p class="mb-0" id="view_advice"></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </section>


        <!-- <div class="logout"><a href="#" class="btn btn-sm btn-danger">Logout</a></div>  -->

    </div>
    <div>
        
        <button class="btn btn-primary print-btn d-print-none" id="printpagebutton">
            <i class="fa-solid fa-print"></i>
            Print
        </button>

        <button type="button" class="btn btn-primary hide-btn " id="hide_head">
            
            Hide
        </button>
        <button type="button" class="btn btn-primary preview-btn " id="previewBtn">

            Preview
        </button>
        <button type="button" class="btn btn-primary back-btn px-2 submitPrescription d-print-none" value="<?php echo e($patient->id); ?>">
            <i class="fa-solid fa-arrow-left-long"></i>
            Back
        </button>
    </div>
</main>
<!-- ========= M O D A L ========= -->
<!-- Add Chief -->
<div class="modal fade" id="chief">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <form action="#">
            <div class="modal-content">
                <div class="modal-body">
                    <textarea class="form-control border-0" placeholder="Type Here.." rows="3"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-black">Update</button>
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                </div>
            </div>
        </form>
    </div>
</div>





<!-- Examination Finding -->
<div class="modal fade" id="exam">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form action="#">
                <div class="modal-content">
                    <div class="modal-body">
                        <textarea class="form-control border-0" placeholder="Type Here.." rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-black">Update</button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Investigation Advice -->
<div class="modal fade" id="advice">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form action="#" id="AddAdvice">
                <div class="modal-content">
                    <div class="modal-body">
                        <textarea class="form-control border-0" placeholder="Type Here.." rows="3" id="advice_txt"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-black">Update</button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal For Drug add-->
<div class="modal fade drug-mo" id="drug">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Drug For Patient
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="text-end me-2">
                <a class="crud-btns me-2 add_medicine" href="" data-bs-toggle="modal" data-bs-target="#Medicine_Add">
                    <i class="bi bi-plus-circle"></i>
                </a>
                <a class="crud-btns list_medicine" href="" data-bs-toggle="modal" data-bs-target="#Medicine_List">
                    <i class="bi bi-card-list"></i>
                </a>
            </div>
            <input type="hidden" id="drug_d_id" value="<?php echo e($doctor_info->id); ?>">
            <input type="hidden" id="drug_p_id" value="<?php echo e($patient->id); ?>">
            <form method="POST" id="DrugForm">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3 drug-name select_drug">
                        <select class="form-select select_drug med_for_addDrug multi1" name="drug_name">
                            <option value="Selected">Select Drug</option>
                            <?php $__currentLoopData = $medicines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medicine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($medicine -> name); ?>"><?php echo e($medicine -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger test drug_name_error"></span>
                        
                        
                        
                        
                        
                        
                        <!-- <input class="form-control" list="list" placeholder="Drug name-brand/generic" name="drug_name">
                        <datalist id="list" class="allGrugList">
                            <?php $__currentLoopData = $medicines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medicine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($medicine -> name); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </datalist> -->
                    </div>
                    <div class="mb-3 drug-time">

                        <select class="form-select" name="drug_time" value="">
                            <option value="">Select Drug Timing</option>
                            <option value="1+0+1">1+0+1</option>
                            <option value="1+1+0">1+1+0</option>
                            <option value="0+1+0">0+1+0</option>
                            <option value="0+0+1">0+0+1</option>
                            <option value="1+1+1">1+1+1</option>
                        </select>
                        <span class="text-danger test drug_time_error"></span>
                    </div>
                    <div class="mb-3 drug-meal-time">
                        <select class="form-select" name="meal_time">
                            <option value="Before Meal">Before Meal</option>
                            <option value="After Meal">After Meal</option>
                        </select>
                        <span class="text-danger meal_time_error"></span>
                    </div>
                    <div class="mb-3 drug-duration">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Duration/Days" value="1" name="duration">
                                <span class="text-danger duration_error"></span>
                            </div>
                            <div class="col">
                                <select class="form-select">
                                    <option>Day(s)</option>
                                    <option>Duration</option>
                                </select>
                            </div>
                            <input type="hidden" name="date" value="<?php echo e(date('d-m-Y')); ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                    <button type="submit" id="submitForm" class="btn btn-sm btn-black">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Modal For Drug update -->
<div class="modal fade" id="editDrug">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form action="<?php echo e(route('update_drug')); ?>" method="POST" id="UpdateDrugForm">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-body">
                    <input type="hidden" id="drug-id" name="drug_id">
                    <div class="mb-3 drug-name">
                        <input class="form-control" list="list" id="drug-name" placeholder="Drug name-brand/generic" name="drug_name" readonly>
                    </div>
                    <div class="mb-3 drug-time">
                        <select class="form-select" name="drug_time" value="" id="drug-time">
                            <option value="1+0+1">1+0+1</option>
                            <option value="1+1+0">1+1+0</option>
                            <option value="0+1+0">0+1+0</option>
                            <option value="0+0+1">0+0+1</option>
                            <option value="1+1+1">1+1+1</option>
                        </select>
                    </div>
                    <div class="mb-3 drug-meal-time">
                        <select class="form-select" name="meal_time" id="meal-time">
                            <option>Before Meal</option>
                            <option>After Meal</option>
                        </select>
                    </div>
                    <div class="mb-3 drug-duration">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Duration/Days" value="" name="duration" id="duration">
                            </div>
                            <div class="col">
                                <select class="form-select">
                                    <option>Day(s)</option>
                                </select>
                            </div>
                            <!-- <input type="hidden" name="date" value="<?php echo e(date('d-m-Y')); ?>"> -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                    <button type="submit" class="btn btn-sm btn-black">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal For Delete Drugs Information-->
<div class="modal fade " id="del-drug" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete Drugs Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form method="POST" id="DeleteDrugForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete <span id="del_drug_name" class="text-black"></span> information?</h5>
                    </div>
                    <input type="hidden" id="del-drug-id" name="deletingId">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Delete</button>
                        <!-- Modal Footer end -->
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Modal For Save Prescription Information -->
<div class="modal fade" id="p_submit">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Save Prescription
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('prescription_add',[$doctor_info->id])); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <h4>Are you sure you want to add this prescription?</h4>
                    <input type="hidden" id="patientID" name="patientID">
                    <input type="hidden" id="drugIdList" name="drugIdList">
                    <input type="hidden" value="<?php echo e(date('d-m-Y')); ?>" name="date">
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <a href="<?php echo e(route('view_patient',[$doctor_info->id,$patient->id])); ?>" class="btn btn-dark btn-sm rounded">No,Back</a>
                    <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal For medicine Add -->
<div class="modal fade " id="Medicine_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content new-medicine-modal">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add New Medicine
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#drug" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('medicine_add')); ?>" method="POST" id="AddMedicineForm">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter New medicine" name="medicine_name">
                            <span class="text-danger medicine_name_error"></span>
                        </div>
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter medicine Brand" name="medicine_brand">
                            <span class="text-danger medicine_brand_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#drug">Discard</button>
                        <button type="submit" class="btn btn-sm btn-black">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Modal For Medicine List -->
<div class="modal fade " id="Medicine_List" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content medicine-list-modal">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Medicine List
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#drug" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="alert alert-success d-flex justify-content-between align-items-center test" role="alert">
                    <span class="test2">dfghs</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <!-- Medicine List-->
                <table class="table table-bordered mt-4 text-center med_list">
                    <thead>
                        <tr>
                            <th class="">Serial No</th>
                            <th class="">Medicine Name</th>
                            <th class="">Brand Name</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $medicines_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$medicines_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key + 1); ?></td>
                            <td><?php echo e($medicines_list->name); ?></td>
                            <td><?php echo e($medicines_list->brand); ?></td>
                            <td class="d-flex justify-content-around">
                                <button type="button" class="btn crud-btns Medicine_editbtn <?php echo e("med_".$medicines_list->id); ?>" value="<?php echo e($medicines_list->id); ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn crud-btns delete-Medicine" data-med-name="<?php echo e($medicines_list->name); ?>" value="<?php echo e($medicines_list->id); ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <!--Medicine list end -->
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Modal For Medicine update -->
<div class="modal fade " id="Medicine_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content edit-medicine-info-modal">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit Medicine Info
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Medicine_List" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('update_medicine')); ?>" method="post" id="UpdateMedicineForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <input type="hidden" id="MedicineId" name="medicine_id" />
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="Medicine_name" placeholder="Enter New medicine" name="medicine_name">
                            <span class="text-danger medicine_name_error"></span>
                        </div>
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="Medicine_brand" placeholder="Enter medicine Brand" name="medicine_brand">
                            <span class="text-danger medicine_brand_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Medicine_List">Discard</button>
                        <button type="submit" class="btn btn-sm btn-black">Update</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Modal For Delete Medicine -->
<div class="modal fade " id="del-Medicine" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete Medicine
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Medicine_List" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('delete_medicine')); ?>" method="POST" id="DeleteMedicineForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This <span id="del_med_name" class="text-black"></span> information?</h5>
                    </div>
                    <input type="hidden" id="del-Medicine-id" name="deletingId">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#Medicine_List">Close</button>
                        <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Delete</button>
                        <!-- Modal Footer end -->
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>
<!-- <script src="<?php echo e(asset ('assets/js/jquery-1.12.4.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset ('assets/js/popper.min.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset ('assets/js/bootstrap.min.js')); ?>"></script> -->





<!-- <script src="<?php echo e(asset ('assets/js/scroll-up.min.js')); ?>"></script> -->
<!-- Custom Js -->
<script src="<?php echo e(asset ('assets/js/custom.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- <script src="<?php echo e(asset ('assets/js/multiselect.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset ('assets/js/prescription_app.js')); ?>"></script> -->

<!-- <script src="<?php echo e(asset ('assets/js/prescription.js')); ?>"></script> -->

<script>
    $(document).ready(function() {
        // window.setTimeout(function() {
        //     // $(".test").addClass('d-none');
        //     $(".test").alert('show');
        // }, 2000);
        $(".multi1").select2({
            width: "100%",
            dropdownParent: $("#drug")
        });

        $('#previewBtn').click(function(e) {
            $('.btn').toggle();
            $('.select-hospital').toggle();
            $(this).show();
        });

        $(document).on('submit', '#AddAdvice', function(e) {
            e.preventDefault();
            let advice_text = $('#advice_txt').val();
            $('.view_advice_list').removeClass('d-none');
            $('.view_advice_list').addClass('m-3');
            $('#view_advice').text(advice_text);
            $('#view_advice_area').val(advice_text);
            // console.log($('#view_advice_area').val());
            $('#advice').modal('hide');
        });

        // JS For Drug
        $(document).on('click', '.addDrug', function() {
            $('#drug').modal('show');
            // alert(test1);
        });

        $(document).on('submit', '#DrugForm', function(e) {
            e.preventDefault();
            let t = $('.test').text("");
            // console.log(t);
            let d_id = $('#drug_d_id').val();
            let p_id = $('#drug_p_id').val();

            var url = "<?php echo e(route('add_drug',[':d_id',':p_id'])); ?>";
            url = url.replace(':d_id', d_id);
            url = url.replace(':p_id', p_id);
            // alert(url);

            var registerForm = $("#DrugForm");
            var formData = registerForm.serialize();
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#drug').modal('hide');
                        // $('.drug-mo').load(location.href + " .drug-mo>*", "");
                        $('.drug-mo').load(location.href + " .drug-mo>*", function() {
                            $(".multi1").select2({
                                width: "100%",
                                dropdownParent: $("#drug")
                            });
                        });
                        $('.drug-list').load(location.href + " .drug-list>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                    }
                },
            });
        });

        $(document).on('click', '.edit_drug', function() {
            var drug_id = $(this).val();
            var url = "<?php echo e(route('edit_drug',[':drug_id'])); ?>";
            url = url.replace(':drug_id', drug_id);
            // alert(drug_id);
            $("#editDrug").modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    // console.log(response);
                    $('#drug-id').val(drug_id);
                    $('#drug-name').val(response.di.drug_name);
                    $('#drug-time').val(response.di.drug_time);
                    $('#meal-time').val(response.di.meal_time);
                    $('#duration').val(response.di.duration);
                }
            });
        });

        $(document).on('submit', '#UpdateDrugForm', function(e) {
            e.preventDefault();
            let url = $(this).attr('action');
            var registerForm = $("#UpdateDrugForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#editDrug').modal('hide');
                        $('.drug-mo').load(location.href + " .drug-mo>*", function() {
                            $(".multi1").select2({
                                width: "100%",
                                dropdownParent: $("#drug")
                            });
                        });
                        $('.drug-list').load(location.href + " .drug-list>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });
                    }
                },
            });
        });

        $(document).on('click', '.delete-drug', function() {
            var deleteDrugId = $(this).val();
            var dataDrugName = $(this).attr("data-drug-name");
            // alert(drug_id);
            $("#del-drug").modal('show');
            $('#del-drug-id').val(deleteDrugId);
            $('#del_drug_name').text(dataDrugName);
        });

        $(document).on('submit', '#DeleteDrugForm', function(e) {
            e.preventDefault();
            var registerForm = $("#DeleteDrugForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: "<?php echo e(route('delete_drug')); ?>",
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#del-drug').modal('hide');
                        $('.drug-mo').load(location.href + " .drug-mo>*", function() {
                            $(".multi1").select2({
                                width: "100%",
                                dropdownParent: $("#drug")
                            });
                        });
                        $('.drug-list').load(location.href + " .drug-list>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });
                    }
                },
            });
        });

        // JS for Add Medicine
        $(document).on('submit', '#AddMedicineForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#AddMedicineForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#Medicine_Add').load(location.href + " #Medicine_Add>*", "");
                        $('.med_list').load(location.href + " .med_list>*", "");
                        $('.med_for_addDrug').load(location.href + " .med_for_addDrug>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#Medicine_Add').modal('hide');
                        $('#Medicine_List').modal('show');
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key).text(value);
                        });
                    }
                },
            });
        });

        // $(document).on('click', '.add_medicine', function() {
        //     $('#drug').modal('hide');
        // });

        // $(document).on('click', '.list_medicine', function() {
        //     $('#drug').modal('hide');
        // });

        // Medicine edit/update
        $(document).on('click', '.Medicine_editbtn', function() {
            var medicine_id = $(this).val();
            // alert(medicine_id);
            let url = "<?php echo e(route('edit_medicine',[':medicine_id'])); ?>";
            url = url.replace(':medicine_id', medicine_id);
            $("#Medicine_Update").modal('show');
            $("#Medicine_List").modal('hide');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    // console.log(response);
                    $('#MedicineId').val(medicine_id);
                    $('#Medicine_name').val(response.medicine_info.name);
                    $('#Medicine_brand').val(response.medicine_info.brand);
                }
            });
        });

        $(document).on('submit', '#UpdateMedicineForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');

            var registerForm = $("#UpdateMedicineForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#Medicine_Update').load(location.href + " #Medicine_Update>*", "");
                        $('.med_list').load(location.href + " .med_list>*", "");
                        $('.med_for_addDrug').load(location.href + " .med_for_addDrug>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#Medicine_Update').modal('hide');
                        $('#Medicine_List').modal('show');
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                        $('.med_' + data.id).click();
                    }
                },
            });
        });
        // Medicine delete
        $(document).on('click', '.delete-Medicine', function() {
            var deleteMedicineId = $(this).val();
            var dataMedName = $(this).attr("data-med-name");
            $("#Medicine_List").modal('hide');
            $("#del-Medicine").modal('show');
            $('#del-Medicine-id').val(deleteMedicineId);
            $('#del_med_name').text(dataMedName);
        });

        $(document).on('submit', '#DeleteMedicineForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');

            var registerForm = $("#DeleteMedicineForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#del-Medicine').load(location.href + " #del-Medicine>*", "");
                        $('.med_list').load(location.href + " .med_list>*", "");
                        $('.med_for_addDrug').load(location.href + " .med_for_addDrug>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#del-Medicine').modal('hide');
                        $('#Medicine_List').modal('show');
                    }
                },
            });
        });

        //JS for Chamber

        $('#chember').change(function() {
            var chember_id = $(this).val();
            var url = "<?php echo e(route('select_chamber',[':chember_id'])); ?>";
            url = url.replace(':chember_id', chember_id);
            // var d_id = $('#d_id').val();
            //  alert(chember_id);
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    // console.log(response.c_info);
                    // $('#p_id').val(response.p_info.id)
                    // // $('#patient_id').val(response.p_info.patient_id);
                    $('#chem_name').text(response.c_info.chember_name);
                    $('#chem_add').text(response.c_info.chember_address);
                    $('#chem_phone').text(response.c_info.chember_number);
                }
            });

        });

        // JS for Submit Prescription

        $(document).on('click', '.submitPrescription', function() {
            var patient_id = $(this).val();
            let url = "<?php echo e(route('get_drug_info',[':p_id'])); ?>";
            url = url.replace(':p_id', patient_id);
            // alert(patient_id);
            $("#p_submit").modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    // console.log(response);
                    $('#patientID').val(patient_id);
                    $('#drugIdList').val(response.drugIds);
                }
            });
        });

        $(document).on('click', '#printpagebutton', function() {
            let cham_name = $('#chem_name').text();
            if (cham_name === '') {
                let msg = "Please Add Chamber Information First!"
                $(document).sami_Toast_Append({
                    cus_toast_time: 3000,
                    cus_toast_msg: msg
                });
            } else {
                // $('.test1').css('opacity', 0);
                window.print();
            }
        });

        $(document).on('click', '#hide_head', function() {
            let chem_name = $('#chem_name').text();
            if (chem_name == '') {
                $('#chem_name').text('Hello');
            }
            $('.test1').css('opacity', 0);
            $(this).text('Unhide');
            $(this).attr("id", "unhide_head");
        });

        $(document).on('click', '#unhide_head', function() {
            let chem_name = $('#chem_name').text();
            if (chem_name == 'Hello') {
                $('#chem_name').text('');
            }
            $('.test1').css('opacity', 1);
            $(this).text('Hide');
            $(this).attr("id", "hide_head");
        });

    });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('master.doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/doctor/prescription.blade.php ENDPATH**/ ?>