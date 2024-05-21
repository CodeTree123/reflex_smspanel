<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center">
        <span class="fs-4">Product List</span>
        <a class="crud-btns" href="<?php echo e(route('shop_add_product')); ?>">
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>

    <table class="table table-bordered mt-2 text-center align-middle">
        <thead>
        <tr>
            <th class="">#</th>
            <th class="">Image</th>
            <th class="">Product Name</th>
            <th class="">Product Price</th>
            <th class="">Stock</th>
            <th class="">Stock Alert</th>
            <th class="">Stock Status</th>
            <th class="">Status</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($key + 1); ?></td>
                <td>
                    <img src="<?php echo e(asset('public/uploads/shop_product/'.$product->pro_img)); ?>" alt="" width="100px"
                         height="100px">
                </td>
                <td><?php echo e($product->pro_name); ?></td>
                <td><?php echo e($product->pro_price); ?></td>
                <td><?php echo e($product->pro_stock->stock); ?></td>
                <td><?php echo e($product->pro_stock->stock_alert); ?></td>
                <td>
                    <?php if($product->pro_stock->status == 1): ?>
                        <p class="text-success my-0">In Stock</p>
                    <?php else: ?>
                        <p class="text-danger my-0">Out of Stock</p>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($product->status == 0): ?>
                        <p class="text-danger my-0">Inactive</p>
                    <?php else: ?>
                        <p class="text-success my-0">Active</p>
                    <?php endif; ?>
                </td>
                <td style="width : 12%">
                    <a href="<?php echo e(route('shop_edit_product',$product->id)); ?>" class="m-0 btn crud-btns">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <button class="btn crud-btns Pro_delete" data-pro-name="<?php echo e($product->pro_name); ?>"
                            value="<?php echo e($product->id); ?>">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    <?php if($product->status == 1): ?>
                        <a href="<?php echo e(route('product_status',[$product->id])); ?>" class="btn btn-sm rounded btn-danger my-0">Inactive</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('product_status',[$product->id])); ?>"
                           class="btn btn-sm rounded btn-success my-0">Active</a>
                    <?php endif; ?>
                    
                    <button class="mt-1 btn btn-sm crud-btns btn-danger Pro_restock"
                            data-pro="<?php echo e($product->pro_name); ?>" value="<?php echo e($product->pro_stock->id); ?>">
                        Restock
                    </button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>

    <!-- Modal For Product Add -->
    <div class="modal fade " id="Product_Restock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content new-Product-modal">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Product Restock
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('restock_shop_product')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <input type="hidden" name="pro_stock_id" id="ProStock-id" value="">
                            <div class="mb-2">
                                <label for="pro_qty" class="form-label">New Quantity Of <span
                                            class="pro_name fw-bolder"></span></label>
                                <input type="number" class="form-control" id="pro_qty" aria-describedby="emailHelp"
                                       name="pro_qty" value="">
                            </div>
                            <div class="mb-2">
                                <label for="pro_alert_qty" class="form-label">New Alert Quantity Of <span
                                            class="pro_name fw-bolder"></span></label>
                                <input type="number" class="form-control" id="pro_alert_qty"
                                       aria-describedby="emailHelp" name="pro_alert_qty" value="">
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

    <!-- Modal For Delete Medicine -->
    <div class="modal fade " id="del-Product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Delete Product
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('product_delete')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This <span id="del_pro_name"
                                                                                      class="text-black"></span>
                                information?</h5>
                        </div>
                        <input type="hidden" id="del-Product-id" name="deletingId">
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
            $(document).on('click', '.Pro_restock', function () {
                var Pro_stockId = $(this).val();
                var ProName = $(this).attr("data-pro");
                // alert(drug_id);
                $("#Product_Restock").modal('show');
                $('#ProStock-id').val(Pro_stockId);
                $('.pro_name').text(ProName);
            });

            $(document).on('click', '.Pro_delete', function () {
                var deleteProId = $(this).val();
                var dataProName = $(this).attr("data-pro-name");
                // alert(drug_id);
                $("#del-Product").modal('show');
                $('#del-Product-id').val(deleteProId);
                $('#del_pro_name').text(dataProName);
            });

        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.other.admin_other_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/reflexdn/public_html/resources/views/shop/shop_admin/shop_product_list.blade.php ENDPATH**/ ?>