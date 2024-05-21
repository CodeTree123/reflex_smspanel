<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center">
        <span class="fs-4">Subscription List</span>
        <h5 class="d-flex align-items-center fs-6">
            Redeem Code Information
            <div class="ms-5">
                <a class="crud-btns me-1" href="" data-bs-toggle="modal" data-bs-target="#Redeem_Add">
                    <i class="bi bi-plus-circle"></i>
                </a>
                <a class="crud-btns ms-1" href="" data-bs-toggle="modal" data-bs-target="#Redeem_list">
                    <i class="bi bi-card-list"></i>
                </a>
            </div>
        </h5>
    </div>
    <!-- Subscription List-->
    <table class="table table-bordered mt-2 text-center align-middle">
        <thead>
        <tr>
            <th class="">#</th>
            <!--<th class="">Doctor Id</th>-->
            <th class="">Doctor Name</th>
            <!-- <th class="">BMDC</th> -->
            <th class="">Package Name</th>
            <th class="">Package Price</th>
            <th class="">Duration</th>
            <th class="">Bkash Number</th>
            <th class="">From</th>
            <th class="">To</th>
            <th class="">Status</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $subscription_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$subscription_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($key+1); ?></td>
                <!--<td><?php echo e($subscription_list->d_id); ?></td>-->
                <td><?php echo e($subscription_list->fname." ".$subscription_list->lname); ?></td>
                <!--<td><?php echo e($subscription_list->package_name); ?></td>-->
                <td><?php echo e($subscription_list->package_name); ?></td>
                <td><?php echo e($subscription_list->package_price); ?></td>
                <td><?php echo e($subscription_list->duration." ".$subscription_list->duration_types); ?></td>
                <td><?php echo e($subscription_list->s_mobile); ?></td>
                <td><?php echo e(Carbon\Carbon::parse($subscription_list->start)->format('d/m/Y')); ?></td>

                <td><?php echo e(Carbon\Carbon::parse($subscription_list->end)->format('d/m/Y')); ?></td>
                <td>
                    <?php if($subscription_list->status == 1): ?>
                        <p class="btn btn-sm btn-success my-0 rounded-pill" style="cursor: not-allowed;">Paid</p>
                    <?php else: ?>
                        <a href="<?php echo e(route('subscription_status',[$subscription_list->id])); ?>"
                           class="btn btn-sm btn-danger my-0">Unpaid</a>
                    <?php endif; ?>
                </td>
                <td class="d-flex justify-content-around">
                    <!-- <button type="button" class="btn crud-btns CC_editbtn" href="" value="" >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button> -->
                    <button class="btn crud-btns delete-subscribtion" data value="<?php echo e($subscription_list->id); ?>">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

    </table>
    <!--Subscription list end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>
    <!-- Modal For Redeem Code List -->
    <div class="modal fade " id="Redeem_list" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Redeem Code List
                    </h5>
                    <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1"
                            aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Investigation List-->
                    <table class="table table-bordered mt-4 text-center align-middle">
                        <thead>
                        <tr>
                            <th class="">#</th>
                            <th class="">Redeem Code</th>
                            <th class="">Redeem Code Duration</th>
                            <th class="">Status</th>
                            <th class="">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $redeems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$redeem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e($redeem->redeem_code); ?></td>
                                <td><?php echo e($redeem->duration." ".$redeem->duration_type); ?></td>
                                <td>
                                    <?php if($redeem->status == 1): ?>
                                        <a href="<?php echo e(route('redeem_status',[$redeem->id])); ?>"
                                           class="btn btn-sm btn-danger my-0">Inactive</a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('redeem_status',[$redeem->id])); ?>"
                                           class="btn btn-sm btn-success my-0">Active</a>
                                    <?php endif; ?>
                                </td>
                                <td class="d-flex justify-content-around  p-0">

                                    <button class="btn crud-btns delete-redeem" data-name="<?php echo e($redeem->redeem_code); ?>"
                                            value="<?php echo e($redeem->id); ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <!--Investigation list end -->
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Modal For Redeem Code Add -->
    <div class="modal fade " id="Redeem_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header ">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Add Redeem Code
                    </h5>
                    <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1"
                            aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('redeem_add')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="mb-3 drug-name">
                                <input class="form-control" list="list" placeholder="Enter New Redeem Code"
                                       name="redeem_code">
                                <span class="text-danger"><?php $__errorArgs = ['redeem_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>
                            <div class="mb-3 drug-name">
                                <input class="form-control" list="list" placeholder="Enter Duration" name="duration">
                                <span class="text-danger"><?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>
                            <div class="mb-3 drug-name">
                                <select class="form-select" aria-label="Default select example" name="duration_type">
                                    <option value="Days">Days</option>
                                    <option value="Months">Months</option>
                                    <option value="Years">Years</option>
                                </select>
                                <span class="text-danger"><?php $__errorArgs = ['duration_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal_1">Discard
                            </button>
                            <button type="submit" class="btn btn-sm btn-outline-blue-grey">Confirm</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->
    <!-- Modal For Delete Redeem Code -->
    <div class="modal fade " id="del-Redeem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Delete Redeem Code
                    </h5>
                    <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Redeem_list"
                            aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('delete_redeem')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete <span id="redeem_name"></span> Redeem Code?
                            </h5>
                        </div>
                        <input type="hidden" id="del-Redeem-id" name="deletingId">
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#Redeem_list">Close
                            </button>
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

    <script>
        $(document).ready(function () {

            <?php if(Session::has('invalidRedeemAdd') && count($errors) > 0): ?>
            $('#Redeem_Add').modal('show');
            <?php endif; ?>


            // script for Sub
            $(document).on('click', '.delete-subscribtion', function () {
                var deleteSubscribtionId = $(this).val();
                // alert(deleteSubscribtionId);
                $("#del-Subscribtion").modal('show');
                $('#del-subscribtion-id').val(deleteSubscribtionId);
            });

            // script for Redeem Code delete
            $(document).on('click', '.delete-redeem', function () {
                var deleteRedeemId = $(this).val();
                var deleteRedeemName = $(this).attr('data-name');
                // alert(deleteRedeemId);
                $("#Redeem_list").modal('hide');
                $("#del-Redeem").modal('show');
                $('#del-Redeem-id').val(deleteRedeemId);
                $('#redeem_name').text(deleteRedeemName);
            });

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.doctor.admin_doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/reflexdn/public_html/resources/views/admin/doctor/layout/subscription_list.blade.php ENDPATH**/ ?>