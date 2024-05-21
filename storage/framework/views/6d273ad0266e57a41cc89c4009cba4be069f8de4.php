<!-- Modal for Tooth Tools -->
<div class="modal fade" id="Treatment_tools" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form action="<?php echo e(route('treatment_info',[$doctor_info->id,$patient->id])); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Treatment Information</h5> -->
                    <div class="modal_header">
                        <div class="row align-items-center">
                            <div class="col-6 d-flex align-items-center">
                                <h3 class="ps-0">Tooth No. <span class="multi_tooth_no"></span> </h3>
                                <input type="hidden" id="tooth_no_modal" name="tooth_no" value="<?php echo e(old('tooth_no')); ?>" />
                                <input type="hidden" id="tooth_no_count_modal" name="tooth_no_count" value="<?php echo e(old('tooth_no_count')); ?>" />
                            </div>
                            <div class="col-6 text-center">
                                <!-- <h3 name="tooth_side">Upper Right</h3> -->
                                <input type="text" id="tooth_side_modal" name="tooth_side" value="<?php echo e(old('tooth_side')); ?>" readonly class="text-center" />
                            </div>
                            <div class="text-center">
                                <input type="hidden" id="tooth_type_modal" name="tooth_type" value="<?php echo e(old('tooth_type')); ?>" readonly />
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-6 mb-3">
                            <h5 class="d-flex justify-content-between">
                                C/C Cheif Complaint 
                                <div>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#chife_Complaint_Add">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#chife_Complaint">
                                        <i class="bi bi-card-list"></i>
                                    </a>
                                </div>
                            </h5>
                            <select class="form-select multi load_cc" name="pc_c[]" aria-label="Default select example" multiple style="width:100%;">
                                <option value="">Nothing To Select </option>
                                <?php $__currentLoopData = $c_cs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($c_c -> name); ?>"><?php echo e($c_c -> name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span class="text-danger"><?php $__errorArgs = ['pc_c'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            <div class="modal_ul">
                                <?php
                                $fav_c_cs = $fav->fav_cc;
                                $fav_c_cs = explode(',',$fav_c_cs);
                                ?>
                                <?php $__currentLoopData = $fav_c_cs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$fav_cc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check btn_width p-0">
                                    <input type="checkbox" class="btn-check" id="btn-cc-<?php echo e($key + 1); ?>" autocomplete="off" name="pc_c[]" value="<?php echo e($fav_cc); ?>">
                                    <label class="btn btn-outline-secondary btn_test" for="btn-cc-<?php echo e($key + 1); ?>"><?php echo e($fav_cc); ?></label>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <h5 class="d-flex justify-content-between">
                                C/F Clinical Findings
                                <div>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Clinical_Finding_Add">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Clinical_Findings">
                                        <i class="bi bi-card-list"></i>
                                    </a>
                                </div>
                            </h5>
                            <select class="form-control custom-form-control multi load_cf" name="pc_f[]" aria-label="Default select example" multiple style="width:100%;">
                                <option value="">Nothing To Select</option>
                                <?php $__currentLoopData = $c_fs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($c_f -> name); ?>"><?php echo e($c_f -> name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span class="text-danger"><?php $__errorArgs = ['pc_f'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            <div class="modal_ul">
                                <?php
                                $fav_c_fs = $fav->fav_cf;
                                $fav_c_fs = explode(',',$fav_c_fs);
                                ?>
                                <?php $__currentLoopData = $fav_c_fs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$fav_cf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check btn_width p-0">
                                    <input type="checkbox" class="btn-check" id="btn-cf-<?php echo e($key + 1); ?>" autocomplete="off" name="pc_f[]" value="<?php echo e($fav_cf); ?>">
                                    <label class="btn btn-outline-secondary btn_test" for="btn-cf-<?php echo e($key + 1); ?>"><?php echo e($fav_cf); ?></label>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <h5 class="d-flex justify-content-between">Investigation
                                <div>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Investigation_Add">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Investigation">
                                        <i class="bi bi-card-list"></i>
                                    </a>
                                </div>
                            </h5>
                            <select class="form-control custom-form-control multi load_invest" name="p_investigation[]" aria-label="Default select example" multiple style="width:100%;">
                                <option value="">Nothing To Select</option>
                                <?php $__currentLoopData = $investigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investigation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($investigation->name); ?>"><?php echo e($investigation->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span class="text-danger"><?php $__errorArgs = ['p_investigation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            <div class="modal_ul">
                                <?php
                                $fav_investigations = $fav->fav_investigation;
                                $fav_investigations = explode(',',$fav_investigations);
                                ?>
                                <?php $__currentLoopData = $fav_investigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$fav_investigation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check btn_width p-0">
                                    <input type="checkbox" class="btn-check" id="btn-inves-<?php echo e($key + 1); ?>" autocomplete="off" name="p_investigation[]" value="<?php echo e($fav_investigation); ?>">
                                    <label class="btn btn-outline-secondary btn_test" for="btn-inves-<?php echo e($key + 1); ?>"><?php echo e($fav_investigation); ?></label>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <h5 class="d-flex justify-content-between">T/P Treatment Plans
                                <div>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Plan_Add">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Plans">
                                        <i class="bi bi-card-list"></i>
                                    </a>
                                </div>
                            </h5>
                            <select class="form-control custom-form-control multi load_TP" name="pt_p" aria-label="Default select example" style="width:100%;">
                                <option value="">Nothing To Select</option>
                                <?php $__currentLoopData = $t_ps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t_p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($t_p -> name); ?>"><?php echo e($t_p -> name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span class="text-danger"><?php $__errorArgs = ['pt_p'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            <div class="modal_ul">
                                <?php
                                $fav_tps = $fav->fav_tp;
                                $fav_tps = explode(',',$fav_tps);
                                ?>
                                <?php $__currentLoopData = $fav_tps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$fav_tp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check btn_width p-0">
                                    <input type="checkbox" class="btn-check" id="btn-tp-<?php echo e($key + 1); ?>" autocomplete="off" name="pt_p_check" value="<?php echo e($fav_tp); ?>">
                                    <label class="btn btn-outline-secondary btn_test" for="btn-tp-<?php echo e($key + 1); ?>"><?php echo e($fav_tp); ?></label>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <!-- <button class="btn   btn-outline-blue-grey">Submit</button> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Mpdal end -->

<!-- Modal for Tooth Tools -->
<div class="modal fade" id="Treatment_edit" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form action="<?php echo e(route('treatment_info_update',[$doctor_info->id,$patient->id])); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="hidden" name="treatment_id" id="treatment_id" value="">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Treatment Information</h5> -->
                    <div class="modal_header">
                        <div class="row align-items-center">
                            <div class="col-6 d-flex align-items-center">
                                <h3 class="ps-0">Tooth No. <span class="u_multi_tooth_no"></span> </h3>
                                <input type="hidden" id="u_tooth_no_modal" name="tooth_no" value="<?php echo e(old('tooth_no')); ?>" />
                            </div>
                            <div class="col-6 text-center">
                                <!-- <h3 name="tooth_side">Upper Right</h3> -->
                                <input type="text" id="u_tooth_side_modal" name="tooth_side" value="<?php echo e(old('tooth_side')); ?>" readonly class="text-center" />
                            </div>
                            <div class="text-center">
                                <input type="hidden" id="u_tooth_type_modal" name="tooth_type" value="<?php echo e(old('tooth_type')); ?>" readonly />
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-12 mb-3">
                            <h5 class="d-flex justify-content-between">
                                C/C Cheif Complaint
                                <!-- <div>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#chife_Complaint_Add">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#chife_Complaint">
                                        <i class="bi bi-card-list"></i>
                                    </a>
                                </div> -->
                            </h5>
                            <p class="mt-3" id="upc_c"></p>
                            
                        </div>

                        <div class="col-12 mb-3">
                            <h5 class="d-flex justify-content-between">
                                C/F Clinical Findings
                                <!-- <div>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Clinical_Finding_Add">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Clinical_Findings">
                                        <i class="bi bi-card-list"></i>
                                    </a>
                                </div> -->
                            </h5>
                            <p class="mt-3" id="upc_f"></p>
                            
                        </div>

                        <div class="col-12 mb-3">
                            <h5 class="d-flex justify-content-between">Investigation
                                <!-- <div>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Investigation_Add">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Investigation">
                                        <i class="bi bi-card-list"></i>
                                    </a>
                                </div> -->
                            </h5>
                            <p class="mt-3" id="up_investigation"></p>
                            
                        </div>

                        <div class="col-12 mb-3">
                            <h5 class="d-flex justify-content-between">T/P Treatment Plans
                                <!-- <div>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Plan_Add">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Plans">
                                        <i class="bi bi-card-list"></i>
                                    </a>
                                </div> -->
                            </h5>
                            <select class="form-control custom-form-control multi2 load_TP" id="upt_p" name="pt_p" aria-label="Default select example" style="width:100%;">
                                <option value="">Nothing To Select</option>
                                <?php $__currentLoopData = $t_ps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t_p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($t_p -> name); ?>"><?php echo e($t_p -> name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span class="text-danger"><?php $__errorArgs = ['pt_p'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            <div class="modal_ul">
                                <?php
                                $fav_tps = $fav->fav_tp;
                                $fav_tps = explode(',',$fav_tps);
                                ?>
                                <?php $__currentLoopData = $fav_tps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$fav_tp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check btn_width p-0">
                                    <input type="checkbox" class="btn-check" id="btn-tp-<?php echo e($key + 1); ?>" autocomplete="off" name="pt_p_check" value="<?php echo e($fav_tp); ?>">
                                    <label class="btn btn-outline-secondary btn_test" for="btn-tp-<?php echo e($key + 1); ?>"><?php echo e($fav_tp); ?></label>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <!-- <button class="btn   btn-outline-blue-grey">Submit</button> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Mpdal end -->

<!-- Modal For Delete Treatment Info -->
<div class="modal fade " id="del-tp-info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Delete Treatment Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('treatment_info_delete')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete Tooth No:<span class="text-dark" id="del-t_num-name"></span> treatment's information?</h5>
                    </div>
                    <input type="hidden" id="del-tp_info-id" name="deletingId">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal" aria-label="Close">Close</button>
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

<!-- Modal For C/C Chief Complaint List -->
<div class="modal fade " id="chife_Complaint" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    C/C Chief Complaint List
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- C/C Chief Complaint List-->
                <table class="table table-bordered mt-4 text-center cc_list">
                    <thead>
                        <tr>
                            <th class="">Serial No</th>
                            <th class="">Chief Complaints</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $lc_cs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$lcc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e($lcc->name); ?></td>
                            <?php if($lcc->status == 1): ?>
                            <td class="d-flex justify-content-around p-0">
                                <button type="button" class="btn crud-btns CC_editbtn <?php echo e("CC_".$lcc->id); ?>" href="" value="<?php echo e($lcc->id); ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn crud-btns delete-cc" data-cc-name="<?php echo e($lcc->name); ?>" value="<?php echo e($lcc->id); ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                            <?php else: ?>
                            <td></td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <!--C/C Chief Complaint list end -->
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Modal For C/C Chief Complaint Add -->
<div class="modal fade " id="chife_Complaint_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Cheif Complaint
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('chife_complaint')); ?>" method="post" id="AddCCForm">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control custom-form-control" list="list" placeholder="Enter New Cheif Complaint" name="cc_name">
                            <span class="text-danger cc_name_error"></span>
                            <input type="hidden" name="cc_status" id="" value="1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_1">Discard</button>
                        <button type="submit" class="btn btn-sm btn btn-sm btn-outline-blue-grey">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Modal For C/C Chief Complaint update -->
<div class="modal fade " id="chife_Complaint_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit Cheif Complaint
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#chife_Complaint" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('update_chife_complaint')); ?>" method="post" id="UpdateCCForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <input type="hidden" id="CCId" name="c_c_id" />
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="c_c_name" placeholder="Enter New Chief Complaint" name="Ucc_name">
                            <span class="text-danger Ucc_name_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#chife_Complaint">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Modal For Delete C/C Chief Complaint -->
<div class="modal fade " id="del-CC" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete C/C Chief Complaint
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#chife_Complaint" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('delete_chife_complaint')); ?>" method="POST" id="DeleteCCForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This <span class="text-dark" id="del-cc-name"></span> information?</h5>
                    </div>
                    <input type="hidden" id="del-cc-id" name="deletingId">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#chife_Complaint">Close</button>
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

<!-- Modal For C/F Clinical Findings List -->
<div class="modal fade " id="Clinical_Findings" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    C/F Clinical Findings List
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- C/F Clinical Findings List-->
                <table class="table table-bordered mt-4 text-center cf_list">
                    <thead>
                        <tr>
                            <th class="">Serial No</th>
                            <th class="">Clinical Findings</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $lc_fs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$lcf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e($lcf->name); ?></td>
                            <?php if($lcf->status == 1): ?>
                            <td class="d-flex justify-content-around p-0">
                                <button class="btn crud-btns CF_editbtn <?php echo e("CF_".$lcf->id); ?>" value="<?php echo e($lcf->id); ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn crud-btns delete-cf" data-cf-name="<?php echo e($lcf->name); ?>" value="<?php echo e($lcf->id); ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                            <?php else: ?>
                            <td></td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <!--C/F Clinical Findings list end -->
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For C/F Clinical Findings Add -->
<div class="modal fade " id="Clinical_Finding_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Clinical Finding
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('clinical_finding')); ?>" method="post" id="AddCFForm">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter New Clinical Finding" name="cf_name">
                            <span class="text-danger cf_name_error"></span>
                            <input type="hidden" name="cf_status" id="" value="1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_1">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For C/F Clinical Findings update -->
<div class="modal fade " id="Clinical_Finding_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit Clinical Finding
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Clinical_Findings" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('update_clinical_finding')); ?>" method="post" id="UpdateCFForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <input type="hidden" id="CFId" name="c_f_id" />
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="c_f_name" placeholder="Enter New Clinical Finding" name="Ucf_name">
                            <span class="text-danger Ucf_name_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Clinical_Findings">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Delete C/F Clinical Findings -->
<div class="modal fade " id="del-CF" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete C/F Clinical Findings
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Clinical_Findings" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('delete_clinical_finding')); ?>" method="POST" id="DeleteCFForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This <span class="text-dark" id="del-cf-name"></span> information?</h5>
                    </div>
                    <input type="hidden" id="del-cf-id" name="deletingId">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#Clinical_Findings">Close</button>
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

<!-- Modal For Investigation List -->
<div class="modal fade " id="Investigation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Investigation List
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Investigation List-->
                <table class="table table-bordered mt-4 text-center invest_list">
                    <thead>
                        <tr>
                            <th class="">Serial No</th>
                            <th class="">Investigations</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $investigation_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$investigation_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e($investigation_list->name); ?></td>
                            <?php if($investigation_list->status == 1): ?>
                            <td class="d-flex justify-content-around  p-0">

                                <button class="btn crud-btns Investigation_editbtn <?php echo e("Invest_".$investigation_list->id); ?>" href="" value="<?php echo e($investigation_list->id); ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn crud-btns delete-Investigation" data-invest-name="<?php echo e($investigation_list->name); ?>" value="<?php echo e($investigation_list->id); ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                            </td>
                            <?php else: ?>
                            <td></td>
                            <?php endif; ?>
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

<!-- Modal For Investigation Add -->
<div class="modal fade " id="Investigation_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Investigation
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('investigation')); ?>" method="post" id="AddInvestForm">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter New Investigation" name="investigation_name">
                            <span class="text-danger investigation_name_error"></span>
                            <input type="hidden" name="investigation_status" id="" value="1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_1">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Investigation update -->
<div class="modal fade " id="Investigation_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit Investigation
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Investigation" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('update_investigation')); ?>" method="post" id="UpdateInvestForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <input type="hidden" id="InvestigationId" name="investigation_id" />
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="Investigation_name" placeholder="Enter Investigation" name="Uinvestigation_name">
                            <span class="text-danger Uinvestigation_name_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Investigation">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Delete Investigation -->
<div class="modal fade " id="del-Investigation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete Investigation
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Investigation" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('delete_investigation')); ?>" method="POST" id="DeleteInvestForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This <span class="text-dark" id="del-Invest-name"></span> information?</h5>
                    </div>
                    <input type="hidden" id="del-Investigation-id" name="deletingId">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#Investigation">Close</button>
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

<!-- Modal For T/P Treatment Plans List -->
<div class="modal fade " id="Treatment_Plans" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    T/P Treatment Plans List
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- T/P Treatment Plans List-->
                <table class="table table-bordered mt-4 text-center TP_list">
                    <thead>
                        <tr>
                            <th class="">Serial No</th>
                            <th class="">Treatment Plans</th>
                            <!-- <th class="">Cost</th> -->
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $lt_ps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$ltp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e($ltp->name); ?></td>
                            <!-- <td><?php echo e($ltp->cost); ?></td> -->
                            <?php if($ltp->status == 1): ?>
                            <td class="d-flex justify-content-around  p-0">
                                <button class="btn crud-btns TP_editbtn <?php echo e("TP_".$ltp->id); ?>" href="" value="<?php echo e($ltp->id); ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn crud-btns delete-tp" data-tp-name="<?php echo e($ltp->name); ?>" value="<?php echo e($ltp->id); ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                            <?php else: ?>
                            <td></td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <!--T/P Treatment Plans list end -->
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For T/P Treatment Plans Add -->
<div class="modal fade " id="Treatment_Plan_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Treatment Plan
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('treatment_plan')); ?>" method="post" id="AddTPForm">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter New Treatment Plan" name="tp_name">
                            <span class="text-danger tp_name_error"></span>
                            <input type="hidden" name="tp_status" value="1">
                            <input type="hidden" name="d_id" id="" value="<?php echo e($doctor_info->id); ?>">
                        </div>
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter Cost" name="tp_cost">
                            <span class="text-danger tp_cost_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_1">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For T/P Treatment Plans update -->
<div class="modal fade " id="Treatment_Plan_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit Treatment Plan
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Treatment_Plans" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('update_treatment_plan')); ?>" method="post" id="UpdateTPForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <input type="hidden" id="TPId" name="t_p_id" />
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="t_p_name" placeholder="Enter New Clinical Finding" name="Utp_name">
                            <span class="text-danger Utp_name_error"></span>
                        </div>
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="t_p_cost" placeholder="Enter Cost" name="Utp_cost">
                            <span class="text-danger Utp_cost_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Treatment_Plans">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Delete T/P Treatment Plans -->
<div class="modal fade " id="del-TP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete T/P Treatment Plans
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Treatment_Plans" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('delete_treatment_plan')); ?>" method="POST" id="DeleteTPForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This <span class="text-dark" id="del-TP-name"></span> information?</h5>
                    </div>
                    <input type="hidden" id="del-TP-id" name="deletingId">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#Treatment_Plans">Close</button>
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

<!-- Modal For T/P Estimated Cost List -->
<div class="modal fade " id="Estimated_Cost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Estimated Cost List
                </h5>
                <div class="w-75 d-flex justify-content-end">
                    <h5 class="modal-title text-danger mb-0 me-4" id="exampleModalLabel1">
                        Total Paid - <?php echo e($total_paid); ?>

                    </h5>
                    <h5 class="modal-title text-danger mb-0 mx-4" id="exampleModalLabel2">
                        Total Due - <?php echo e($total_due); ?>

                    </h5>
                    <h5 class="modal-title text-danger mb-0 ms-4" id="exampleModalLabel2">
                        Discount <?php if($discount != null): ?>
                        <?php if($discount->discount_type == "precent"): ?>
                        (<?php echo e($discount->discount); ?>%)
                        <?php else: ?>
                        (৳ <?php echo e($discount->discount); ?>)
                        <?php endif; ?>
                        <?php endif; ?> - <?php echo e($total_discount); ?>

                    </h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <h6 class="text-center">Total Cost List</h6>
                        <!-- T/P Treatment Cost List-->
                        <table class="table table-bordered mt-3 text-center align-middle">
                            <thead>
                                <tr>
                                    <th class="">#</th>
                                    <th class="">Treatment Plans</th>
                                    <th class="">Cost</th>
                                    <!-- <th class="">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $treatment_infos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$t_p_cost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($t_p_cost->treatment_plans); ?> - <?php echo e($t_p_cost->tooth_no); ?></td>
                                    <td><?php echo e($t_p_cost->cost); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="2">Total</td>
                                    <td><?php echo e($total_cost); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <!--T/P Treatment Cost list end -->
                    </div>
                    <div class="col-6">
                        <h6 class="text-center">Total Cost Paid List</h6>
                        <!-- T/P Treatment Cost paid List-->
                        <table class="table table-bordered mt-3 text-center align-middle">
                            <thead>
                                <tr>
                                    <th class="">#</th>
                                    <th class="">Date</th>
                                    <th class="">Treatment Plans</th>
                                    <th class="">Paid Amount</th>
                                    <!-- <th class="">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $treatment_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$t_p_payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($t_p_payment->p_id); ?></td>

                                    <td><?php echo e(\Carbon\Carbon::parse($t_p_payment->date)->format('d-m-Y')); ?></td>
                                    <td><?php echo e($t_p_payment->treatment_plans); ?> - <?php echo e($t_p_payment->tooth_no); ?></td>
                                    <td><?php echo e($t_p_payment->paid_amount); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4">No Payment Added Yet.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <!--T/P Treatment Cost paid list end -->
                    </div>
                </div>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Delete Prescription -->
<div class="modal fade " id="del-Prescription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete Prescription
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('prescription_delete')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete <span class="text-dark" id="del-Prescription-name"></span> information?</h5>
                    </div>
                    <input type="hidden" id="del-Prescription-id" name="deletingId">
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
<!-- Modal end --><?php /**PATH C:\xampp\htdocs\reflex\resources\views/doctor/include/modals/view_patient_modals.blade.php ENDPATH**/ ?>