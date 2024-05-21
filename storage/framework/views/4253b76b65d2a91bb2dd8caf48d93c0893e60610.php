<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="fs-4">My Inventory List</span>
        <button class="btn btn-sm crud-btns" data-bs-toggle="modal" data-bs-target="#Inventory_Add">
            <i class="bi bi-plus-circle"></i>
        </button>
    </div>

    <table class="table mt-2 text-center align-middle" id="inv_list">
        <thead>
        <tr>
            <th class="">#</th>
            <th class="">Product Name</th>
            <th class="">Product Description</th>
            <th class="">Stock</th>
            <th class="">Stock Alert</th>
            <th class="">Stock Status</th>
            <th class="">Status</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $storages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$storage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($key + 1); ?></td>
                <td><?php echo e($storage->product_name); ?></td>
                <td>
                    <?php if($storage->product_description != null): ?>
                    <?php echo e($storage->product_description); ?>

                    <?php else: ?>
                    No Description
                    <?php endif; ?>
                </td>
                <td><?php echo e($storage->product_stock); ?></td>
                <td><?php echo e($storage->product_stock_alert); ?></td>
                <td>
                    <?php if($storage->stock_status == 1): ?>
                        <p class="text-success my-0">In Stock</p>
                    <?php else: ?>
                        <p class="text-danger my-0">Out of Stock</p>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($storage->status == 1): ?>
                        <p class="text-success my-0">Active</p>
                    <?php else: ?>
                        <p class="text-danger my-0">Inactive</p>
                    <?php endif; ?>
                </td>
                <td>
                    <button class="btn crud-btns Inv_Edit <?php echo e("inv_".$storage->id); ?>" value="<?php echo e($storage->id); ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <?php if($storage->status == 1): ?>
                        <a href="<?php echo e(route('inventory_status',[$storage->id])); ?>" class="btn btn-sm rounded btn-danger my-0">Inactive</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('inventory_status',[$storage->id])); ?>" class="btn btn-sm rounded btn-success my-0">Active</a>
                    <?php endif; ?>
                    <?php if($storage->product_stock_alert >= $storage->product_stock): ?>
                        <button class="mt-1 btn btn-sm crud-btns btn-danger Pro_restock <?php echo e("inv_stock".$storage->id); ?>" data-pro="<?php echo e($storage->product_name); ?>" value="<?php echo e($storage->id); ?>">
                            Restock
                        </button>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-modals'); ?>
    <div class="modal fade " id="Inventory_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content new-Product-modal">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Add New Inventory
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('add_inventory')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="pro_name" class="form-label">New Product Name</label>
                                <input type="text" class="form-control" id="pro_name" aria-describedby="emailHelp" name="pro_name">
                                <span class="text-danger"><?php $__errorArgs = ['pro_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="pro_qty" class="form-label">Product Quantity</label>
                                    <input type="number" class="form-control" id="pro_qty" aria-describedby="emailHelp" name="pro_qty">
                                    <span class="text-danger"><?php $__errorArgs = ['pro_qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                                <div class="col-6">
                                    <label for="pro_alert_qty" class="form-label">Product Alert Quantity</label>
                                    <input type="number" class="form-control" id="pro_alert_qty" aria-describedby="emailHelp" name="pro_alert_qty">
                                    <span class="text-danger"><?php $__errorArgs = ['pro_alert_qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>
                                <div class="mb-3">
                                    <label for="pro_desc" class="form-label">Product Description</label>
                                    <textarea class="form-control" id="pro_desc" rows="4" name="pro_desc"></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-sm btn-black">Confirm</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>

    <div class="modal fade " id="Inventory_Edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content new-Product-modal">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Edit Inventory
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('update_inventory')); ?>" method="post" id="Update_inv">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="modal-body">
                            <input type="hidden" id="inv_id" name="inv_id">
                            <div class="mb-3">
                                <label for="u_pro_name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="u_pro_name" aria-describedby="emailHelp" name="u_pro_name">
                                <span class="text-danger u_pro_name_error"></span>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="u_pro_qty" class="form-label">Product Quantity</label>
                                    <input type="number" class="form-control" id="u_pro_qty" aria-describedby="emailHelp" name="u_pro_qty">
                                    <span class="text-danger u_pro_qty_error"></span>
                                </div>
                                <div class="col-6">
                                    <label for="u_pro_alert_qty" class="form-label">Product Alert Quantity</label>
                                    <input type="number" class="form-control" id="u_pro_alert_qty" aria-describedby="emailHelp" name="u_pro_alert_qty">
                                    <span class="text-danger u_pro_alert_qty_error"></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="u_pro_desc" class="form-label">Product Description</label>
                                <textarea class="form-control" id="u_pro_desc" rows="4" name="u_pro_desc"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-sm btn-black">Confirm</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>

    <div class="modal fade " id="Inventory_Restock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content new-Product-modal">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Inventory Restock
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('restock_inventory')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="modal-body">
                            <input type="hidden" name="pro_stock_id" id="ProStock-id" value="">
                            <div class="mb-2">
                                <label for="re_pro_qty" class="form-label">New Quantity Of <span class="pro_name fw-bolder"></span></label>
                                <input type="number" class="form-control" id="re_pro_qty" aria-describedby="emailHelp" name="re_pro_qty" value="<?php echo e(old('re_pro_qty')); ?>">
                                <span class="text-danger"><?php $__errorArgs = ['re_pro_qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>
                            <div class="mb-2">
                                <label for="re_pro_alert_qty" class="form-label">New Alert Quantity Of <span class="pro_name fw-bolder"></span></label>
                                <input type="number" class="form-control" id="re_pro_alert_qty" aria-describedby="emailHelp" name="re_pro_alert_qty" value="<?php echo e(old('re_pro_alert_qty')); ?>">
                                <span class="text-danger"><?php $__errorArgs = ['re_pro_alert_qty'];
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
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-sm btn-black">Confirm</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('page-js'); ?>
    <script>
        $(document).ready(function(){
            <?php if(Session::has('invalidInvAdd') && count($errors) > 0): ?>
            $('#Inventory_Add').modal('show');
            <?php endif; ?>


            $(document).on('click', '.Inv_Edit', function() {
                var inv_id = $(this).val();
                var url = "<?php echo e(route('edit_inventory',[':inv_id'])); ?>";
                url = url.replace(':inv_id', inv_id);
                // alert(edit);
                $("#Inventory_Edit").modal('show');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(response) {
                        $('#inv_id').val(inv_id);
                        $('#u_pro_name').val(response.inv.product_name);
                        $('#u_pro_qty').val(response.inv.product_stock);
                        $('#u_pro_alert_qty').val(response.inv.product_stock_alert);
                        $('#u_pro_desc').text(response.inv.product_description);
                    }
                });
            });

            $(document).on('submit', '#Update_inv', function(e) {
                e.preventDefault();

                var url = $(this).attr('action');
                // alert(url);

                var registerForm = $("#Update_inv");
                var formData = registerForm.serialize();

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function(data) {
                        // console.log(data);
                        if (data.status == 200) {
                            $('#Inventory_Edit').load(location.href + " #chife_Complaint_Update>*", "");
                            $('#inv_list').load(location.href + " #inv_list>*", "");
                            $(document).sami_Toast_Append({
                                cus_toast_time: 3000,
                                cus_toast_msg: data.msg
                            });

                            $('#Inventory_Edit').modal('hide');
                        } else {
                            $.each(data.error, function(key, value) {
                                $('.' + key + '_error').text(value);
                            });
                            $('.inv_' + data.id).click();
                        }
                    },
                });
            });

            $(document).on('click', '.Pro_restock', function() {
                var Pro_stockId = $(this).val();
                var ProName = $(this).attr("data-pro");
                // alert(drug_id);
                $("#Inventory_Restock").modal('show');
                $('#ProStock-id').val(Pro_stockId);
                $('.pro_name').text(ProName);
            });

            <?php if(Session::has('invalidInvRe') && count($errors) > 0): ?>
                let test = <?php echo e(Session::get('invalidInvRe')); ?>;
                $('.inv_stock' + test).click();
            <?php endif; ?>
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('master.doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/reflexdn/public_html/resources/views/inventory/inventory.blade.php ENDPATH**/ ?>