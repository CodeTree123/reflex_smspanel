<?php $__env->startSection('content'); ?>

<?php
$subscription = subscription();
$sub_remain = sub_remain();
$notices = notices();
$total_cost = total_cost();
$total_paid = total_paid();
$total_due = total_due();
?>

<!-- main start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 pe-0">
            <?php echo $__env->make('doctor.include.docLeftSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-7 pe-0">
            <div class="blank-sec dental_bg">
                <div class="pricing-header p-3 pb-md-4 mx-auto text-center">

                    <h1 class="  fw-bold">ReflexDN</h1>
                    <h1 class="text-bg-blue-grey">Choose a plan</h1>
                </div>
                <main>

                    <form action="<?php echo e(route('subscription_add_redeem')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="d-flex justify-content-center mb-3">
                            <input type="hidden" id="status" name="doctor_id" value="<?php echo e($doctor_info->id); ?>">

                            <input type="hidden" name="package_name" class="subscription_info ms-2" value="Redeem Code">


                            <!-- <input type="text" id="package_duration" name="package_duration" class="subscription_info ms-2" style="width: 20px;" readonly>
                                <input type="text" id="package_duration_types" name="package_duration_types" class="subscription_info" readonly> -->

                            <input type="hidden" name="package_price" class="subscription_info ms-2" value="0">

                            <div class="d-flex  bg-blue-grey rounded-pill p-2 m-2 ">

                                <input class="form-control " list="list" id="redeem_code" placeholder="Redeem Code" name="redeem_code" style="width:100%;">
                                <span class="text-danger"><?php $__errorArgs = ['redeem_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>

                                <button type="submit" class="btn btn-sm btn btn-sm btn-light rounded-pill">Activate</button>
                            </div>

                        </div>
                    </form>
                    <div class="container p-0">
                        <div class="row   mb-3 text-center mx-1 px-1 ">
                            <?php if($subscription_check->request == 0): ?>
                            <?php $__currentLoopData = $subscription_plans2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription_plan2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 px-1">
                                <div class=" bg-blue-grey card mb-4 rounded-3 shadow-sm">
                                    <div class="card-header py-3 blue-grey-border text-white">
                                        <h4 class="">Save <?php echo e($subscription_plan2->descount); ?>%</h4>
                                    </div>
                                    <div class="card-body bg-white mx-1 p-0 py-3">
                                        <h6 class="my-0 fw-normal"><?php echo e($subscription_plan2->package_name); ?></h6>

                                        <h3 class="text-dark fw-bold"> <?php echo e($subscription_plan2->duration." ".$subscription_plan2->duration_types); ?></h3>
                                        <p class="fw-bold text-dark   pricing-card-title py-3">Basic Price - <?php echo e($subscription_plan2->basic_price); ?> ৳ </p>

                                        <h5 class="fw-bold text-bg-blue-grey  pricing-card-title py-3">Discounted Price <br>
                                            <span class="fw-bolder  fs-3 ">
                                                ৳ <?php echo e($subscription_plan2->package_price); ?>

                                            </span>
                                        </h5>

                                        <p class=" fw-bold text-dark  pricing-card-title">Save
                                            <?php echo e($subscription_plan2->saved_price); ?>৳
                                        </p>

                                    </div>
                                    <div class="d-flex">
                                        <button type="button" class="w-100 btn btn-lg  PackageID me-1 <?php echo e("pack_".$subscription_plan2->id); ?>" value="<?php echo e($subscription_plan2->id); ?>">
                                            <span class="fw-bolder text-white fs-3">Buy Now</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <?php $__currentLoopData = $subscription_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription_plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 px-1">
                                <div class=" bg-blue-grey card mb-4 rounded-3 shadow-sm">
                                    <div class="card-header py-3 blue-grey-border text-white">
                                        <h4 class="">Save <?php echo e($subscription_plan->descount); ?>%</h4>
                                    </div>
                                    <div class="card-body bg-white mx-1 p-0 py-3">
                                        <h6 class="my-0 fw-normal"><?php echo e($subscription_plan->package_name); ?></h6>

                                        <h3 class="text-dark fw-bold"> <?php echo e($subscription_plan->duration." ".$subscription_plan->duration_types); ?></h3>
                                        <p class="fw-bold text-dark   pricing-card-title py-3">Basic Price - <?php echo e($subscription_plan->basic_price); ?> ৳ </p>

                                        <h5 class="fw-bold text-bg-blue-grey  pricing-card-title py-3">Discounted Price <br>
                                            <span class="fw-bolder  fs-3 ">
                                                ৳ <?php echo e($subscription_plan->package_price); ?>

                                            </span>
                                        </h5>

                                        <p class=" fw-bold text-dark  pricing-card-title">Save
                                            <?php echo e($subscription_plan->saved_price); ?>৳
                                        </p>

                                    </div>
                                    <div class="d-flex">
                                        <button type="button" class="w-100 btn btn-lg PackageID me-1 <?php echo e("pack_".$subscription_plan->id); ?>" value="<?php echo e($subscription_plan->id); ?>">
                                            <span class="fw-bolder text-white fs-3">Buy Now</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="d-flex justify-content-end align-items-center  ">
                            <p class=" bg-white py-3 ps-2">We Accept Only
                            </p>
                            <img class=" logo" src="<?php echo e(asset ('assets/img/bkash_logo.png')); ?>" alt="Logo">

                        </div>

                    </div>
                </main>
            </div>
        </div>

        <!-- Admin Notice,Ad & Events start -->
        <div class="col-md-3 page-home">

            <?php echo $__env->make('doctor.include.docRightSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
    </div>
</div>
<!-- Admin Notice,Ad & Events end -->

<!-- Modal For Subscription Add -->
<div class="modal fade " id="package" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Subscription Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <?php if($subscription_check->status == 1): ?>
                <!-- <form action="<?php echo e(route('subscription_add')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3 subscription-drug-name">
                             <input type="text" class="p-2" id="status" name="doctor_id" value="<?php echo e($doctor_info->id); ?>" readonly>
                            <input type="text" class="p-2" id="package_name" name="package_name" readonly>
                            <input type="text" class="p-2" id="package_price" name="package_price" readonly>
                            <input type="text" class="p-2" id="package_duration" name="package_duration" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn btn-sm btn-outline-blue-grey">Update</button>
                    </div>
                </form> -->
                <h4>You have already Subscribe <?php echo e($subscription_check->package_name); ?>.</h4>

                <?php else: ?>
                <p class="text-center mb-3 text-danger">Please select PAYMENT option in Bkash app to pay the subscription fee.</p>
                <h5 class="text-center mb-2">Our Bkash merchant number</h5>
                <h3 class="text-center fw-bold mb-2 text-primary">016 81 40 97 79</h3>
                <form action="<?php echo e(route('subscription_add')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="modal-body p-0 bg-primary">
                        <input type="hidden" id="status" name="doctor_id" value="<?php echo e($doctor_info->id); ?>">
                        <input type="hidden" name="s_time" value="1">
                        <input type="hidden" name="pack_id" id="pack_id" value="">
                        <div class="d-flex my-2 justify-content-center align-items-center">
                            <h6 class="me-1 text-white">Package:</h6>
                            <h6 class="text-white" id="package_name_show"></h6>
                        </div>
                        <input type="hidden" id="package_name" name="package_name" class="subscription_info ms-2" readonly>
                        <div class="d-flex mb-2 justify-content-center align-items-center">
                            <h6 class="me-1 text-white">Duration:</h6>
                            <h6 class="text-white" id="package_duration_show"></h6>
                            <h6 class="text-white ms-1" id="package_duration_types_show"></h6>
                        </div>
                        <input type="hidden" id="package_duration" name="package_duration" class="subscription_info ms-2" style="width: 20px;" readonly>
                        <input type="hidden" id="package_duration_types" name="package_duration_types" class="subscription_info" readonly>
                        <div class="d-flex mb-2 justify-content-center align-items-center">
                            <h6 class="me-1 text-white">Price:</h6>
                            <h6 class="text-white" id="package_price_show"></h6>
                            <h6 class="ms-1 text-white">TK.</h6>
                        </div>
                        <input type="hidden" id="package_price" name="package_price" class="subscription_info ms-2" readonly>
                        <div class="mb-3 px-2 text-white">
                            <label for="mobile" class="form-label">Your Sender Bkash number</label>
                            <input type="number" class="form-control" id="mobile" name="s_mobile" aria-describedby="emailHelp" placeholder="Enter Bkash Number">
                            <span class="text-danger"><?php $__errorArgs = ['s_mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            <p id="emailHelp" class="form-text text-white">After completing transection write the Bkash number you used to pay</p>
                        </div>

                        <!-- <input class="form-control" list="list" id="redeem_code" placeholder="Please Enter redeem code" name="redeem_code"> -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn btn-sm btn-outline-blue-grey">Confirm</button>
                    </div>
                </form>
                <?php endif; ?>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>
<script>
    $(document).ready(function() {
        $(document).on('click', '.PackageID', function() {
            var packageId = $(this).val();
            var url = "<?php echo e(route('subscription_info',[':packageId'])); ?>";
            url = url.replace(':packageId', packageId);
            // alert(packageId);
            $("#package").modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    // console.log(response.subscription_info);
                    $('#pack_id').val(packageId);
                    $('#package_name').val(response.subscription_info.package_name);
                    $('#package_name_show').text(response.subscription_info.package_name);
                    $('#package_price').val(response.subscription_info.package_price);
                    $('#package_price_show').text(response.subscription_info.package_price);
                    $('#package_duration').val(response.subscription_info.duration);
                    $('#package_duration_show').text(response.subscription_info.duration);
                    $('#package_duration_types').val(response.subscription_info.duration_types);
                    $('#package_duration_types_show').text(response.subscription_info.duration_types);

                }
            });
        });

        <?php if(Session::has('invalidPack') && count($errors) > 0): ?>
            let p = <?php echo e(Session::get('invalidPack')); ?>;
            $('.pack_'+p).click();
        <?php endif; ?>


    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('master.doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\reflex\resources\views/doctor/subscription.blade.php ENDPATH**/ ?>