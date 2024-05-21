<?php $__env->startPush('page-css'); ?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<?php
$subscription = subscription();
$sub_remain = sub_remain();
$notices = notices();
$total_cost = total_cost();
$total_paid = total_paid();
$total_due = total_due();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 pe-0">
            <?php echo $__env->make('doctor.include.docLeftSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-7 pe-0">
            <div class="blank-sec">
                <h6 class="p-2 mb-3 d-flex justify-content-center bg-blue-grey custom-border-radius">
                    Profile Settings</h6>
                <div class="mx-3">
                    <ul class="nav nav-tabs doctor_profile_setting" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="barcode-tab" data-bs-toggle="tab" data-bs-target="#barcode-tab-pane" type="button" role="tab" aria-controls="barcode-tab-pane" aria-selected="true">QR Code/Logo</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="treatment-cost-tab" data-bs-toggle="tab" data-bs-target="#treatment-cost-tab-pane" type="button" role="tab" aria-controls="treatment-cost-tab-pane" aria-selected="false">Treatment Cost</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="chamber-info-tab" data-bs-toggle="tab" data-bs-target="#chamber-info-tab-pane" type="button" role="tab" aria-controls="chamber-info-tab-pane" aria-selected="false">Chamber Info</button>
                        </li>
                        
                        
                        
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="favourite-tab" data-bs-toggle="tab" data-bs-target="#favourite-tab-pane" type="button" role="tab" aria-controls="favourite-tab-pane" aria-selected="false">Favourite</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="barcode-tab-pane" role="tabpanel" aria-labelledby="barcode-tab" tabindex="0">
                            <div class="d-flex justify-content-evenly mt-2">
                                <h4>QR Code/Logo</h4>
                                <button class="crud-btns border-0 bg-transparent <?php echo e($doctor_info->doctor->bar_image != null ? 'd-none':''); ?>" data-bs-toggle="modal" data-bs-target="#AddBarcode">
                                    <i class="bi bi-plus-circle"></i>
                                </button>
                            </div>

                            <table class="table table-bordered mt-4 text-center align-middle">
                                <thead>
                                    <tr>
                                        <th class="">QR Code Image/Logo</th>
                                        <th class="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($doctor_info->doctor->bar_image != null): ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo e(asset('public/uploads/doctor/Barcode/'.$doctor_info->doctor->bar_image)); ?>" alt="Barcode" width="200" class="image_view_sami" style="cursor: pointer">

                                        </td>
                                        <td>
                                            <button class="btn crud-btns" data-bs-toggle="modal" data-bs-target="#UpdateBarcode">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php else: ?>
                                    <tr>
                                        <td colspan="2">There Was No QR Code Found.</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>

                        </div>
                        <div class="tab-pane fade" id="treatment-cost-tab-pane" role="tabpanel" aria-labelledby="treatment-cost-tab" tabindex="0">
                            <div div class="d-flex justify-content-evenly mt-2">
                                <h4>Treatment Cost</h4>
                                <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Cost_Add">
                                    <i class="bi bi-plus-circle"></i>
                                </a>
                                <!-- <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Cost">
                                            <i class="bi bi-card-list"></i>
                                        </a> -->
                            </div>
                            <table class="table table-bordered mt-4 text-center align-middle Treat_list">
                                <thead>
                                    <tr>
                                        <th class="">Serial No</th>
                                        <th class="">Treatment Plans</th>
                                        <th class="">Cost</th>
                                        <th class="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $t_p_costs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$t_p_cost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td><?php echo e($t_p_cost->name); ?></td>
                                        <td><?php echo e($t_p_cost->price); ?></td>
                                        <td class="d-flex justify-content-around">
                                            <button class="btn crud-btns TP_Cost_editbtn <?php echo e("TP_cost".$t_p_cost->id); ?>" value="<?php echo e($t_p_cost->id); ?>">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn crud-btns delete-tp_Cost" data-tp_cost-name="<?php echo e($t_p_cost->name); ?>" value="<?php echo e($t_p_cost->id); ?>">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="chamber-info-tab-pane" role="tabpanel" aria-labelledby="chamber-info-tab" tabindex="0">
                            <div class="d-flex justify-content-evenly mt-2">
                                <h4>Chamber List</h4>
                                <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Chember_Add">
                                    <i class="bi bi-plus-circle"></i>
                                </a>
                            </div>

                            <table class="table table-bordered mt-4 text-center align-middle Cham_list">
                                <thead>
                                    <tr>
                                        <th class="">Serial No</th>
                                        <th class="">Chamber Name</th>
                                        <th class="">Chamber Address</th>
                                        <th class="">Chamber Number</th>
                                        <th class="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $chembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$chember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key + 1); ?></td>
                                        <td><?php echo e($chember->chember_name); ?></td>
                                        <td><?php echo e($chember->chember_address); ?></td>
                                        <td><?php echo e($chember->chember_number); ?></td>
                                        <td class="d-flex justify-content-around">
                                            <button class="btn crud-btns chember_editbtn <?php echo e("Cham".$chember->id); ?>" value="<?php echo e($chember->id); ?>">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn crud-btns delete-Chember" data-cham-name="<?php echo e($chember->chember_name); ?>" value="<?php echo e($chember->id); ?>">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <!-- </div> -->
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    
                    
                    
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <div class="tab-pane fade" id="favourite-tab-pane" role="tabpanel" aria-labelledby="favourite-tab" tabindex="0">
                    <div class="d-flex justify-content-evenly mt-2">
                        <h4>Favourite List</h4>
                        <button class="crud-btns border-0 bg-transparent <?php echo e($fav != null ? 'd-none':''); ?>" data-bs-toggle="modal" data-bs-target="#Favourite_Add">
                            <i class="bi bi-plus-circle"></i>
                        </button>
                    </div>
                    <table class="table table-bordered mt-4 text-center align-middle fav_list">
                        <thead>
                            <tr>
                                <th class="">Cheif Complaint</th>
                                <th class="">Clinical Findings</th>
                                <th class="">Investigation</th>
                                <th class="">Treatment Plans</th>
                                <th class="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($fav)): ?>
                            <tr>
                                <td><?php echo e($fav->fav_cc); ?></td>
                                <td><?php echo e($fav->fav_cf); ?></td>
                                <td><?php echo e($fav->fav_investigation); ?></td>
                                <td><?php echo e($fav->fav_tp); ?></td>
                                <td>
                                    <button class="btn crud-btns fav_editbtn <?php echo e("Fav_".$fav->id); ?>" value="<?php echo e($fav->id); ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3 page-home">
    <?php echo $__env->make('doctor.include.docRightSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
</div>
</div>

<!-- Admin Notice,Ad & Events end -->

<!-- Modal for Barcode Add -->
<div class="modal fade " id="AddBarcode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Add QR Code Image
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('add_barcode')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="d_id" value="<?php echo e($doctor_info->id); ?>" />

                    <div class="mb-3">
                        <input type="file" class="form-control" name="barcode">
                        <span class="text-danger"><?php $__errorArgs = ['barcode'];
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
<!-- Modal for end Barcode Add -->

<!-- Modal for Barcode Update -->
<div class="modal fade " id="UpdateBarcode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Update QR Code Image
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('update_barcode')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="d_id" value="<?php echo e($doctor_info->id); ?>" />

                    <div class="mb-3">
                        <input type="file" class="form-control" name="u_barcode">
                        <span class="text-danger"><?php $__errorArgs = ['u_barcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                    <div class="mb-3 text-center">
                        <h5 class="mb-2">Previous QR Code</h5>
                        <img src="<?php echo e(asset('public/uploads/doctor/Barcode/'.$doctor_info->doctor->bar_image)); ?>" alt="Barcode" width="200">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal for end Barcode Update -->

<!-- Modal For T/P Treatment Cost Add -->
<div class="modal fade " id="Treatment_Cost_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Add Treatment Plan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('treatment_cost')); ?>" method="post" id="TreatmentCostAddForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="d_id" value="<?php echo e($doctor_info->id); ?>" />
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="tp_name">
                            <option value=""></option>
                            <?php $__currentLoopData = $t_ps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t_p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($t_p -> id); ?>"><?php echo e($t_p -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger tp_name_error"></span>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" list="list" placeholder="Enter Cost" name="tp_price">
                        <span class="text-danger tp_price_error"></span>
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

<!-- Modal For T/P Treatment Cost update -->
<div class="modal fade " id="Treatment_Cost_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Edit Treatment Cost
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('update_treatment_cost')); ?>" method="post" id="TreatmentCostUpdateForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <input type="hidden" id="TPCostId" name="tp_cost_id" />
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <p class="fw-bolder">Name: <span id="u_tp_cost_name"></span></p>
                        </div>
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="tp_cost" placeholder="Enter Cost" name="tp_cost">
                            <span class="text-danger tp_cost_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Delete T/P Treatment Cost -->
<div class="modal fade " id="del-Cost-TP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Delete Treatment Cost
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('delete_treatment_cost')); ?>" method="POST" id="TreatmentCostDeleteForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete <span class="text-dark" id="del-tp_cost-name"></span> information?</h5>
                    </div>
                    <input type="hidden" id="del-TP-cost-id" name="deletingId">
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

<!-- Modal For Chamber Add -->
<div class="modal fade " id="Chember_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Add Chamber Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('doctor_chember')); ?>" method="post" id="ChamberAddForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="d_id" value="<?php echo e($doctor_info->id); ?>" />
                    <div class="mb-3">
                        <input type="text" class="form-control" list="list" placeholder="Chember Name" name="chember_name">
                        <span class="text-danger chember_name_error"></span>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" list="list" placeholder="Chember Address" name="chember_address">
                        <span class="text-danger chember_address_error"></span>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" list="list" placeholder="Chember Contact Number" name="chember_number">
                        <span class="text-danger chember_number_error"></span>
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
<!-- Modal For Chamber update -->
<div class="modal fade " id="Chember_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Edit Chamber Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('update_chember')); ?>" method="post" id="ChamberUpdateForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <input type="hidden" id="Chember_id" name="chember_id" />
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input type="text" class="form-control" list="list" id="chember_name" name="chember_name">
                            <span class="text-danger chember_name_error"></span>
                        </div>
                        <div class="mb-3 drug-name">
                            <input type="text" class="form-control" list="list" id="chember-add" name="chember_address">
                            <span class="text-danger chember_address_error"></span>
                        </div>
                        <div class="mb-3 drug-name">
                            <input type="number" class="form-control" list="list" id="chember-num" name="chember_number">
                            <span class="text-danger chember_number_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Delete Chamber -->
<div class="modal fade " id="del-chember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete Chamber Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('delete_chember')); ?>" method="POST" id="ChamberDeleteForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete <span class="text-dark" id="del-cham-name"></span> information?</h5>
                    </div>
                    <input type="hidden" id="del-Chember_id" name="deletingId">
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


<!-- Modal For Chamber  Schedule Add -->







































































<!-- Modal For Favourite Add -->
<div class="modal fade " id="Favourite_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Add Favourite Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('add_favourite')); ?>" method="post" id="FavAddForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="d_id" value="<?php echo e($doctor_info->id); ?>" />
                    <div class="mb-3">
                        <label for="c_c" class="form-label">Select C/C Cheif Complaint</label>
                        <select class="form-control custom-form-control multi" name="c_c[]" aria-label="Default select example" multiple style="width:100%;" id="c_c">
                            <option value="">Nothing To Select</option>
                            <?php $__currentLoopData = $c_cs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($c_c -> name); ?>"><?php echo e($c_c -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger c_c_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="c_f" class="form-label">Select C/F Clinical Findings</label>
                        <select class="form-control custom-form-control multi" name="c_f[]" aria-label="Default select example" multiple style="width:100%;" id="c_f">
                            <option value="">Nothing To Select</option>
                            <?php $__currentLoopData = $c_fs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($c_f -> name); ?>"><?php echo e($c_f -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger c_f_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="investigation" class="form-label">Select Investigation</label>
                        <select class="form-control custom-form-control multi" name="investigation[]" aria-label="Default select example" multiple style="width:100%;" id="investigation">
                            <option value="">Nothing To Select</option>
                            <?php $__currentLoopData = $investigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investigation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($investigation->name); ?>"><?php echo e($investigation->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger investigation_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="t_p" class="form-label">Select T/P Treatment Plans</label>
                        <select class="form-control custom-form-control multi" name="t_p[]" aria-label="Default select example" multiple style="width:100%;" id="t_p">
                            <option value="">Nothing To Select</option>
                            <?php $__currentLoopData = $t_ps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t_p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($t_p -> name); ?>"><?php echo e($t_p -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger t_p_error"></span>
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

<!-- Modal For Favourite Update -->
<div class="modal fade " id="Favourite_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Update Favourite Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('update_favourite')); ?>" method="post" id="FavUpdateForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="fav_id" id="fav_id" value="" />
                    <div class="mb-3">
                        <label for="uc_c" class="form-label">Select C/C Cheif Complaint</label>
                        <select class="form-control custom-form-control multi2" name="uc_c[]" aria-label="Default select example" multiple style="width:100%;" id="uc_c" value="">
                            <?php $__currentLoopData = $c_cs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($c_c -> name); ?>"><?php echo e($c_c -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger uc_c_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="uc_f" class="form-label">Select C/F Clinical Findings</label>
                        <select class="form-control custom-form-control multi2" name="uc_f[]" aria-label="Default select example" multiple style="width:100%;" id="uc_f">
                            <option value="">Nothing To Select</option>
                            <?php $__currentLoopData = $c_fs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($c_f -> name); ?>"><?php echo e($c_f -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger uc_f_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="u_investigation" class="form-label">Select Investigation</label>
                        <select class="form-control custom-form-control multi2" name="u_investigation[]" aria-label="Default select example" multiple style="width:100%;" id="u_investigation">
                            <option value="">Nothing To Select</option>
                            <?php $__currentLoopData = $investigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investigation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($investigation->name); ?>"><?php echo e($investigation->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger u_investigation_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="ut_p" class="form-label">Select T/P Treatment Plans</label>
                        <select class="form-control custom-form-control multi2" name="ut_p[]" aria-label="Default select example" multiple style="width:100%;" id="ut_p">
                            <option value="">Nothing To Select</option>
                            <?php $__currentLoopData = $t_ps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t_p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($t_p -> name); ?>"><?php echo e($t_p -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger ut_p_error"></span>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // $(".multi").select2(2);
        $(".multi").select2({
            dropdownParent: $("#Favourite_Add"),
            maximumSelectionLength: 5
        });
        $(".multi2").select2({
            dropdownParent: $("#Favourite_Update"),
            maximumSelectionLength: 5
        });

        <?php if(Session::has('invalidBarAdd') && count($errors) > 0): ?>
        $('#AddBarcode').modal('show');
        <?php endif; ?>
        <?php if(Session::has('invalidBarUp') && count($errors) > 0): ?>
        $('#UpdateBarcode').modal('show');
        <?php endif; ?>

        // script for T/P Treatment Costs

        $(document).on('submit', '#TreatmentCostAddForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#TreatmentCostAddForm");
            var formData = registerForm.serialize();
            console.log(formData);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#Treatment_Cost_Add').load(location.href + " #Treatment_Cost_Add>*", "");
                        $('.Treat_list').load(location.href + " .Treat_list>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#Treatment_Cost_Add').modal('hide');
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                        $('#Treatment_Cost_Add').modal('show');
                    }
                },
            });
        });

        $(document).on('click', '.TP_Cost_editbtn', function() {
            var tpCost_id = $(this).val();
            var url = "<?php echo e(route('edit_treatment_cost',[':tpCost_id'])); ?>";
            url = url.replace(':tpCost_id', tpCost_id);
            // alert(edit);
            $("#Treatment_Cost_Update").modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    // console.log(response.cc.name);
                    $('#TPCostId').val(tpCost_id);
                    $('#u_tp_cost_name').text(response.tp_cost.name);
                    $('#tp_cost').val(response.tp_cost.price);
                }
            });
        });

        $(document).on('submit', '#TreatmentCostUpdateForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#TreatmentCostUpdateForm");
            var formData = registerForm.serialize();
            console.log(formData);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#Treatment_Cost_Update').load(location.href + " #Treatment_Cost_Update>*", "");
                        $('.Treat_list').load(location.href + " .Treat_list>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#Treatment_Cost_Update').modal('hide');
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                        $('.TP_cost' + data.id).click();
                    }
                },
            });
        });

        $(document).on('click', '.delete-tp_Cost', function() {
            var deleteTPCostId = $(this).val();
            let deleteName = $(this).attr('data-cham-name');
            // alert(deleteTPCostId);
            $("#del-Cost-TP").modal('show');
            $('#del-TP-cost-id').val(deleteTPCostId);
            $('#del-tp_cost-name').text(deleteName);
        });

        $(document).on('submit', '#TreatmentCostDeleteForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#TreatmentCostDeleteForm");
            var formData = registerForm.serialize();
            console.log(formData);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#del-Cost-TP').load(location.href + " #del-Cost-TP>*", "");
                        $('.Treat_list').load(location.href + " .Treat_list>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#del-Cost-TP').modal('hide');
                    }
                },
            });
        });

        // script for Chember

        $(document).on('submit', '#ChamberAddForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#ChamberAddForm");
            var formData = registerForm.serialize();
            console.log(formData);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#Chember_Add').load(location.href + " #Chember_Add>*", "");
                        $('.Cham_list').load(location.href + " .Cham_list>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#Chember_Add').modal('hide');
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                        $('#Chember_Add').modal('show');
                    }
                },
            });
        });

        $(document).on('click', '.chember_editbtn', function() {
            var chember_id = $(this).val();
            var url = "<?php echo e(route('edit_chember',[':chember_id'])); ?>";
            url = url.replace(':chember_id', chember_id);
            $("#Chember_Update").modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    $('#Chember_id').val(chember_id);
                    $('#chember_name').val(response.ci.chember_name);
                    $('#chember-add').val(response.ci.chember_address);
                    $('#chember-num').val(response.ci.chember_number);
                }
            });
        });

        $(document).on('submit', '#ChamberUpdateForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#ChamberUpdateForm");
            var formData = registerForm.serialize();
            console.log(formData);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#Chember_Update').load(location.href + " #Chember_Update>*", "");
                        $('.Cham_list').load(location.href + " .Cham_list>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#Chember_Update').modal('hide');
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                        $('.Cham' + data.id).click();
                    }
                },
            });
        });

        $(document).on('click', '.delete-Chember', function() {
            var deleteChemberId = $(this).val();
            let deleteName = $(this).attr('data-cham-name');

            $("#del-chember").modal('show');
            $('#del-Chember_id').val(deleteChemberId);
            $('#del-cham-name').text(deleteName);
        });

        $(document).on('submit', '#ChamberDeleteForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#ChamberDeleteForm");
            var formData = registerForm.serialize();
            console.log(formData);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#del-chember').load(location.href + " #del-chember>*", "");
                        $('.Cham_list').load(location.href + " .Cham_list>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#del-chember').modal('hide');
                    }
                },
            });
        });

        // script for Faverite

        $(document).on('submit', '#FavAddForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#FavAddForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#Favourite_Add').load(location.href + " #Favourite_Add>*", "");
                        $('.fav_list').load(location.href + " .fav_list>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#Favourite_Add').modal('hide');
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                        $('#Favourite_Add').modal('show');
                    }
                },
            });
        });

        $(document).on('click', '.fav_editbtn', function() {
            var fav_id = $(this).val();
            var url = "<?php echo e(route('edit_favourite',[':fav_id'])); ?>";
            url = url.replace(':fav_id', fav_id);
            // alert(fav_id);
            $("#Favourite_Update").modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    // console.log(response.fav);
                    $('#fav_id').val(fav_id);
                    $('#uc_c').val(response.fav_cc);
                    $('#uc_f').val(response.fav_cf);
                    $('#u_investigation').val(response.fav_investigation);
                    $('#ut_p').val(response.fav_tp);
                }
            });
        });

        $(document).on('submit', '#FavUpdateForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            var registerForm = $("#FavUpdateForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#Favourite_Update').load(location.href + " #Favourite_Update>*", "");
                        $('.fav_list').load(location.href + " .fav_list>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#Favourite_Update').modal('hide');
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                        $('.Fav_' + data.id).click();
                    }
                },
            });
        });


    });
</script>


































<?php $__env->stopPush(); ?>
<?php echo $__env->make('master.doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex\resources\views/doctor/doctor_profile_setting.blade.php ENDPATH**/ ?>