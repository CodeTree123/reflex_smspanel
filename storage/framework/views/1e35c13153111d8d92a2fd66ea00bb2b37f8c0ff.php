<?php $__env->startPush('page-css'); ?>
    <style>
        .bar_style{
            background-color: #ddd;
            padding: 3px 0px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container mt-3">
        <h4 class="text-bg-blue-grey mb-3 text-center">My Order Lists</h4>
        <div class="text-center">
            <table class="table mt-2 text-center align-middle">
                <thead>
                <tr>
                    <th class="">Order Number</th>
                    <th class="">Total Items</th>
                    <th class="">Sub Total</th>
                    <th class="">Vat(15%)</th>
                    <th class="">Total Amount</th>
                    <th class="">Status</th>
                    <th class="">Action</th>

                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e('INV-' . str_pad((int)$order->id, 4, '0', STR_PAD_LEFT)); ?></td>
                        <td><?php echo e($order->total_quantity); ?></td>
                        <td><?php echo e($order->net_total); ?></td>
                        <td><?php echo e($order->vat); ?></td>
                        <td><?php echo e($order->total_amount); ?></td>
                        <td>
                            <?php if($order->status == 0): ?>
                                <p class="text-warning my-0">Pending Order</p>

                            <?php elseif($order->status == 1): ?>
                                <p class="text-success my-0">Order Confirmed</p>
                            <?php else: ?>
                                <p class="text-danger my-0">Order Canceled</p>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($order->status == 1): ?>
                            <a href="<?php echo e(route('order_invoice',$order->id)); ?>" class="btn crud-btns my-0" data-bs-toggle="tooltip" data-bs-placement="left" title="View Invoice">
                                <i class="fa-solid fa-file-lines"></i>
                            </a>
                            <?php endif; ?>
                            <?php if($order->status == 0): ?>
                            <button class="btn crud-btns delete-Cart" data-cart-name="<?php echo e($order->id); ?>" value="<?php echo e($order->id); ?>">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <?php endif; ?>
                        </td>

                    </tr>








                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8">There Was No Order added Yet.</td>
                    </tr>
                <?php endif; ?>

                </tbody>
            </table>
            <a href="<?php echo e(route('shop')); ?>" class="btn btn-sm border border-dark rounded cart_btn">
                <i class="fa-solid fa-arrow-left"></i>
                Back Home
            </a>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-modals'); ?>
    <!-- Modal For Delete Cart -->
    <div class="modal fade " id="del-Cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Delete Cart
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('deleteCart')); ?>" method="POST" id="DeleteMedicineForm">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This <span id="del_cart_name" class="text-black"></span> information?</h5>
                        </div>
                        <input type="hidden" id="del-cart-id" name="deletingId">
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
<?php $__env->stopPush(); ?>
<?php $__env->startPush('page-js'); ?>

    <script>
        // $(document).ready(function() {
        //     let t = $('#bar_style_count').val();
        //     let t2 = $('.bar_count').length;
        //     let test = t-t2;
        //     let test2 = 100 / t;
        //     let test3 = test2*test;
        //
        //     console.log(t,t2,test);
        // });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('master.shop_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/reflexdn/public_html/resources/views/shop/shop_ordered_list.blade.php ENDPATH**/ ?>