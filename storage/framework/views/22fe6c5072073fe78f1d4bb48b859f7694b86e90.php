<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center">
        <span class="fs-4">Supplier List</span>
        <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#supplier_Add">
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>
    <!-- C/C Supplier List-->
    <table class="table table-bordered mt-2 text-center align-middle">
        <thead>
        <tr>
            <th class="">Serial No</th>
            <th class="">Supplier Name</th>
            <th class="">Supplier Email</th>
            <th class="">Status</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="p-0"><?php echo e($key+1); ?></td>
                <td class="p-0"><?php echo e($shop->fname." ".$shop->lname); ?></td>
                <td class="p-0"><?php echo e($shop->email); ?></td>
                <td>
                    <?php if($shop->status == 0): ?>
                        <a href="<?php echo e(route('supplier_status',[$shop->id])); ?>" class="btn btn-sm btn-danger my-0">Block</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('supplier_status',[$shop->id])); ?>"
                           class="btn btn-sm btn-success my-0">Unblock</a>
                    <?php endif; ?>
                </td>
                <td class="d-flex justify-content-around p-0">
                    
                    <button class="btn crud-btns delete-supplier" href="#" value="<?php echo e($shop->id); ?>">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($shops ->links()); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>
    <!-- Modal For Supplier Add -->
    <div class="modal fade " id="supplier_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Add Supplier
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('supplier_add')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                           name="s_fname">
                                    <span class="text-danger"><?php $__errorArgs = ['s_fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                           name="s_lname">
                                    <span class="text-danger"><?php $__errorArgs = ['s_lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Shop Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                           name="s_shopName">
                                    <span class="text-danger"><?php $__errorArgs = ['s_shopName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Contact Number</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1"
                                           name="s_phone">
                                    <span class="text-danger"><?php $__errorArgs = ['s_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input class="form-control" type="file" id="formFile" name="s_image">
                                    <span class="text-danger"><?php $__errorArgs = ['s_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email">
                                    <span class="text-danger"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1"
                                           name="s_password">
                                    <span class="text-danger"><?php $__errorArgs = ['s_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>
                            <input type="hidden" name="cf_status" id="" value="0">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-sm btn-outline-blue-grey">Add</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Modal For Delete Supplier -->
    <div class="modal fade " id="del-supplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Delete Supplier
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('supplier_delete')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                        </div>
                        <input type="text" id="del-supplier-id" name="deletingId">
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>
    <script>
        $(document).ready(function () {
            <?php if(Session::has('invalidSupplierAdd') && count($errors) > 0): ?>
            $('#supplier_Add').modal('show');
            <?php endif; ?>

            $(document).on('click', '.delete-supplier', function () {
                var deleteReportId = $(this).val();

                $("#del-supplier").modal('show');
                $('#del-supplier-id').val(deleteReportId);
            });

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.other.admin_other_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/reflexdn/public_html/resources/views/admin/other/layout/supplier_list.blade.php ENDPATH**/ ?>