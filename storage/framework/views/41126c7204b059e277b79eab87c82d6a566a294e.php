<?php $__env->startPush('page-css'); ?>

<!-- Print Style -->
<style>
    @page  {
        size: auto;
        margin: 1cm 0mm 0mm 0mm;
        padding: 0mm;
    }

    @media  print {
        body {
            page-break-inside: avoid;
            -webkit-print-color-adjust: exact;
        }

        .col_print_left {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: start;
        }

        .col_print_middle {
            display: flex;
            justify-content: center;
        }

        .col_print_right {
            display: flex;
            justify-content: flex-end;
        }

        .bottom-part {
            margin-top: 30%;
            position: fixed;
            bottom: 0;
        }


    }

    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .doctor_signeture {
        border-top: 1px solid #b5b5b5;
        padding: 1em 30px 0em 30px;
        margin-top: 100px;

    }

    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, .1);
    }

    .pb-25,
    .py-25 {
        padding-bottom: .75rem !important;
    }

    .pt-25,
    .py-25 {
        padding-top: .75rem !important;
    }

    .text-blue-m2 {
        color: #4e6f8a !important;
    }
</style>
<!-- Print Style End -->

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="page-content  px-5 ">
    <div class="page-header d-flex justify-content-between align-items-center text-blue-d2">

        <a href="<?php echo e(route('view_patient',[$doctor_info->id,$patient->id])); ?>" class="btn btn-outline-blue-grey d-print-none" id="backBTN">
            Back
        </a>

        <div class="page-tools align-self-end">
            <div class="action-buttons">
                <a class="btn btn-outline-blue-grey mx-1px text-95 d-print-none me-2" href="#" data-title="Print" data-bs-toggle="modal" data-bs-target="#Treatment_Payment" id="add_payment">
                    Add Paymet
                </a>
                <a class="btn btn-outline-blue-grey mx-1px text-95 d-print-none" href="#" data-title="Print" data-bs-toggle="modal" data-bs-target="#Treatment_Discount" id="add_payment">
                    Add Discount
                </a>

                <button class="btn btn-outline-blue-grey mx-1px text-95 prints-btn d-print-none" onclick="printInvoicepage()" id="printInvoicepagebutton">
                    <i class="mr-1 fa fa-print text-dark-m1 text-120 w-2"></i>
                    Print
                </button>
                
                
                
                
            </div>
        </div>
    </div>

    <div class="   px-0 mt-5">
        <div class=" d-flex justify-content-center">
            <!-- <a class="navbar-brand" href="#"> -->
            <!-- <img src="<?php echo e(asset ('assets/img/reflex_logo.png')); ?>" alt="" width="120" height="50" class="d-inline-block align-text-top"> -->
            <!-- Reflex -->
            <!-- </a> -->
            <h4><?php echo e($chamber_info->chember_name); ?></h4>
        </div>

        <hr class=" brc-default-l1 mx-n1 mb-4" />
        <div class="row ">
            <div class="col-sm-4 col_print_left">
                <div class="text-grey-m2">
                    <div class="my-1">
                        <span class="fw-bold">Patient's Name : </span><?php echo e($patient->name); ?>

                    </div>
                    <div class="my-1">
                        <span class="fw-bold"> Mobile Number : </span><?php echo e($patient->mobile); ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center col_print_middle">
                <?php if($doctor_info->doctor->bar_image == null): ?>
                <img src="<?php echo e(asset ('assets/img/qr.png')); ?>" alt="Qr" class="img-fluid">
                <?php else: ?>
                <img src="<?php echo e(asset ('public/uploads/doctor/Barcode/'.$doctor_info->doctor->bar_image)); ?>" alt="Qr" class="img-fluid" width="100" height="100">
                <?php endif; ?>
            </div>

            <div class="col-sm-4 text-95  text-end col_print_right">
                <hr class="d-sm-none" />
                <div class="text-grey-m2">
                    
                    
                    

                    <div class="my-2">
                        <span class="fw-bold">Issue Date:</span> <?php echo e(date('d-m-Y')); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 col-lg-12">


                <div class="mt-4">
                    <div class="row text-600 text-white  bg-blue-grey py-25">
                        <div class=" d-sm-block col-1">#</div>
                        <div class="col-9 col-sm-3">Treatment Name & Tooth</div>
                        <div class=" d-sm-block col-sm-2">Treatment Cost</div>
                        <div class="col-2">Paid</div>
                        <div class="col-2">Due</div>
                        <div class="col-2">Status</div>
                    </div>

                    <div class="text-95 text-secondary-d3">
                        <?php $__currentLoopData = $treatment_infos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$treatment_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row mb-2 mb-sm-0 py-25">
                            <div class="d-none d-sm-block col-1"><?php echo e($key + 1); ?></div>
                            <div class="col-9 col-sm-3"><?php echo e($treatment_info->treatment_plans."/".$treatment_info->tooth_no); ?></div>
                            <div class="d-none d-sm-block col-2 text-95">৳ <?php echo e($treatment_info->cost); ?></div>
                            <div class="col-2 text-secondary-d2">৳ <?php echo e($treatment_info->paid); ?></div>
                            <div class="col-2 text-secondary-d2">৳ <?php echo e($treatment_info->due); ?></div>
                            <div class="col-2 text-secondary-d2">
                                <?php if($treatment_info->payment_status == 1): ?>
                                Paid
                                <?php else: ?>
                                Due
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <hr />

                        <div class="row mb-2 mb-sm-0 py-25  ">
                            <div class="d-none d-sm-block col-1">*</div>
                            <div class="col-9 col-sm-3">Total</div>
                            <div class="d-none d-sm-block col-2 text-95">
                                <!--Total Cost <br> ৳--> <?php echo e($total_cost); ?>

                            </div>
                            <div class="col-2 text-secondary-d2"><!--Total Paid <br> ৳--> <?php echo e($total_paid); ?></div>
                            <div class="col-2 text-secondary-d2"><!--Total Due <br> ৳--> <?php echo e($total_due); ?></div>
                            <div class="col-2 text-secondary-d2"></div>
                        </div>

                    </div>


                    <!-- <div class="row border-b-2 brc-default-l2 mt-5"></div>  -->
                    <div class="row   mt-3">
                        <hr class="row brc-default-l1 mx-n1 mb-4" />
                        <div class="col-4 col-sm-4 text-grey-d2 text-95 mt-2 mt-lg-0 h-100">
                            <br><br><br><br><br>
                            <span class="doctor_signeture mt-5">
                                <?php echo e($doctor_info->fname." ".$doctor_info->lname); ?>

                            </span>
                        </div>
                        <div class="col-3 col-sm-3 text-end text-grey text-90 order-first order-sm-last pt-3 mx-auto">
                            <div class="border-bottom">
                                <p class="me-2 fw-bolder">Today's Payment</p>
                            </div>
                            <div class="border-bottom">
                                <?php if($today_paid != null): ?>
                                <?php $__currentLoopData = $today_paid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t_paid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p class="me-3">
                                    <?php echo e($t_paid->treat->treatment_plans." (".$t_paid->treat->tooth_no.")"); ?>

                                    <span class="ms-4">
                                        <?php
                                        echo App\Models\treatment_payment::where('t_id',$t_paid->t_id)->where('date',\Carbon\Carbon::today())->sum('paid_amount');
                                        ?>
                                    </span>
                                </p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <p class="text-center">Today No Payment Paid Yet.</p>
                                <?php endif; ?>
                            </div>
                            <div>
                                <p class="me-3">
                                    <span class="fw-bolder">Total</span>
                                    <span class="ms-4">
                                        <?php
                                        echo App\Models\treatment_payment::where('d_id',$doctor_info->id)->where('p_id',$patient->id)->where('date',\Carbon\Carbon::today())->sum('paid_amount');
                                        ?>
                                    </span>
                                </p>
                            </div>
                        </div>

                        <div class="col-5 col-sm-5 text-grey text-90 order-first order-sm-last align-self-end">
                            <div class="row mx-0 my-2 fw-bold">
                                <div class="col-8 text-end">
                                    Sub Total
                                </div>
                                <div class="col-4 text-end">
                                    <span class="text-120 text-secondary-d1"><?php echo e($total_cost); ?></span>
                                </div>
                            </div>

                            <div class="row mx-0 my-2 fw-bold">
                                <div class="col-8 text-end">
                                    Discount
                                    <?php if($discount == null): ?>
                                    <?php elseif($discount->discount_type == "precent"): ?>
                                    (<?php echo e($discount->discount); ?>%)
                                    <?php else: ?>
                                    (৳ <?php echo e($discount->discount); ?>)
                                    <?php endif; ?>
                                </div>
                                <div class="col-4 text-end">
                                    <span class="text-110 text-secondary-d1"><?php echo e($total_discount); ?></span>
                                </div>
                            </div>

                            <div class="row mx-0 my-2 fw-bold align-items-center bgc-primary-l3 ">
                                <div class="col-8 text-end">
                                    Total Payable(AD)
                                </div>
                                <div class="col-4 text-end">
                                    <span class="text-150 text-success-d3 opacity-2"><?php echo e($total_Amount); ?></span>
                                </div>
                            </div>

                            <div class="row mx-0 my-2 fw-bold align-items-center bgc-primary-l3 ">
                                <div class="col-8 text-end">
                                    Total Paid(AD)
                                </div>
                                <div class="col-4 text-end">
                                    <span class="text-150 text-success-d3 opacity-2"><?php echo e($total_paid); ?></span>
                                </div>
                            </div>

                            <div class="row mx-0 my-2 fw-bold align-items-center bgc-primary-l3 ">
                                <div class="col-8 text-end">
                                    Total Due(AD)
                                </div>
                                <div class="col-4 text-end">
                                    <span class="text-150 text-success-d3 opacity-2"><?php echo e($total_dueAmount); ?></span>
                                </div>
                            </div>
                            <div class="row align-items-center ">
                                <div class="col-12 text-center">
                                    <p class="fst-italic text-danger mb-0" style="font-size:12px">*AD-After Discount</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal For Treatment Cost Add -->
<div class="modal fade " id="Treatment_Payment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Payment
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('treatment_payment')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <!-- <input type="text" name="p_id" value="<?php echo e($patient->id); ?>"/> -->
                    <div class="mb-3">
                        <label for="t_plan_id">Select Treatment</label>
                        <select class="form-select" aria-label="Default select example" name="t_plan_id" id="t_plan_id">
                            <option value=""></option>
                            <?php $__currentLoopData = $treatment_invoice_infos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $treatment_invoice_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($treatment_invoice_info -> id); ?>"><?php echo e($treatment_invoice_info -> treatment_plans); ?>-<?php echo e($treatment_invoice_info -> tooth_no); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger"><?php $__errorArgs = ['t_plan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="t_payment_type">Select Payment Method</label>
                        <select class="form-select" aria-label="Default select example" name="t_payment_type" id="t_payment_type">
                            <option value="Cash">Cash</option>
                            <option value="Card">Card</option>
                            <option value="Mobile Banking">Mobile Banking</option>
                        </select>
                        <span class="text-danger"><?php $__errorArgs = ['t_payment_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" list="list" placeholder="Enter Amount" name="tp_amount">
                        <span class="text-danger"><?php $__errorArgs = ['tp_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Treatment Cost Discount -->
<div class="modal fade " id="Treatment_Discount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Discount
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('treatment_discount')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="p_id" value="<?php echo e($patient->id); ?>" />
                    <input type="hidden" name="d_id" value="<?php echo e($doctor_info->id); ?>" />

                    <div class="mb-3">
                        <input type="text" class="form-control" list="list" name="p_name" value="<?php echo e($patient->name); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" list="list" name="p_mobile" value="<?php echo e($patient->mobile); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="t_discount_type">Select Discount Type</label>
                        <select class="form-select" aria-label="Default select example" name="t_discount_type" id="t_discount_type">
                            <option value="cash">Cash</option>
                            <option value="precent">%</option>
                        </select>
                    </div>
                    <span class="text-danger"><?php $__errorArgs = ['t_discount_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    <div class="mb-3">
                        <input type="number" class="form-control" list="list" placeholder="Enter Discount" name="tp_discount">
                        <span class="text-danger"><?php $__errorArgs = ['tp_discount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Confirm</button>
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

<!-- Custom Js -->
<script src="<?php echo e(asset ('assets/js/custom.js')); ?>"></script>

<script>
    $(document).ready(function() {
        <?php if(Session::has('invalidPaymentAdd') && count($errors) > 0): ?>
        $('#Treatment_Payment').modal('show');
        <?php endif; ?>
        <?php if(Session::has('invalidDiscountAdd') && count($errors) > 0): ?>
        $('#Treatment_Discount').modal('show');
        <?php endif; ?>
    })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('master.doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/reflexdn/public_html/resources/views/doctor/invoice.blade.php ENDPATH**/ ?>