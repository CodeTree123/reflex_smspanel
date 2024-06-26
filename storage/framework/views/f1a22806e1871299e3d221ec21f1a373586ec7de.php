<?php $__env->startPush('page-css'); ?>
<style>
    @media (min-width: 1200px) {
        .col-xl-6 {
            flex: 0 0 auto;
            width: 85%;
        }
    }
    @media  print {
        body{
            margin: 0;
        }
        .print_border_bottom{
            border-bottom: 1px solid #000000;
            padding-bottom: 10px;
        }
        .col_print_left {
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: start;
        }

        .col_print_right {
            width: 50%;
            display: flex;
            justify-content: flex-end;
        }
        .col_print_right2 {
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }

        td, th, tr {
            border: 1px solid #000;
            text-align: left;
            padding: 8px;
            color: #000000;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-3">
        <div class="row align-items-center print_border_bottom">
            <div class="col-sm-7 text-center text-sm-start col_print_left">
                <img class="mb-2 logo" src="<?php echo e(asset ('assets/img/reflex_logo.png')); ?>" alt="Logo">
                <h4>ReflexDn</h4>
            </div>
            <div class="col-sm-5 text-center text-sm-end col_print_right">
                <h4 class="text-7 mb-0">Invoice</h4>
            </div>
        </div>
        <hr>

        <div class="row print_border_bottom">
            <div class="col-sm-6 col_print_left">
                <strong>Invoiced To:</strong>
                <address class="mb-0">
                    <?php echo e($order->doc_info->fname." ".$order->doc_info->lname); ?><br />
                    <?php echo e($order->doc_info->email); ?><br />
                    <?php echo e($order->doc_info->phone); ?><br />
                </address>
            </div>
            <div class="col-sm-6 text-sm-end col_print_right2">
                <p class="mb-0">
                    <strong>Invoice No:</strong> <?php echo e('INV-' . str_pad((int)$order->id, 4, '0', STR_PAD_LEFT)); ?>

                </p>
                <p class="mb-0">
                    <strong>Date: </strong><?php echo e(\Carbon\Carbon::parse($order->created_at)->format('d/m/Y')); ?>

                </p>
            </div>

        </div>
        <hr>

        <div class="card mb-3">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table text-center align-middle mb-0">
                        <thead class="card-header">
                        <tr>
                            <td class="col-1"><strong>#</strong></td>
                            <td class="col-3"><strong>Supplier</strong></td>
                            <td class="col-3"><strong>Product</strong></td>
                            <td class="col-2"><strong>QTY</strong></td>
                            <td class="col-2"><strong>Unit Price</strong></td>
                            <td class="col-2"><strong>Total</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $order->sub_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$order_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="col-1"><?php echo e($key + 1); ?></td>
                                <td class="col-3 text-1">
                                    <?php echo e($order_list->supplier_info->fname." ".$order_list->supplier_info->lname); ?><br>
                                    (<?php echo e($order_list->supplier_info->phone); ?>)
                                </td>
                                <td class="col-3 text-1"><?php echo e($order_list->product_info->pro_name); ?></td>
                                <td class="col-2"><?php echo e($order_list->quantity); ?></td>
                                <td class="col-2"><?php echo e($order_list->per_price); ?></td>
                                <td class="col-2"><?php echo e($order_list->subtotal_price); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot class="card-footer">
                        <tr>
                            <td colspan="5" class="text-end border-bottom-0"><strong>Sub
                                    Total:</strong>
                            </td>
                            <td class="text-center border-bottom-0"><?php echo e($order->net_total); ?></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end border-bottom-0"><strong>Vat(15%):</strong>
                            </td>
                            <td class="text-center border-bottom-0"><?php echo e($order->vat); ?></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end border-bottom-0"><strong>Total:</strong>
                            </td>
                            <td class="text-center border-bottom-0"><?php echo e($order->total_amount); ?></td>
                        </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>

        <p class="text-1"><strong>Tk :</strong> <?php echo e($word); ?> Taka Only.</p>
        <p class="text-1"><strong>NB :</strong> Wish Your Good Health.</p>
        <div class="text-center">
            <div class="btn-group btn-group-sm rounded d-print-none me-2">
                <?php
                    $t = str_replace(url('/'), '', url()->previous());
                ?>
                <?php if($t == "/shop/shop_admin/order_list"): ?>
                <a href="<?php echo e(route('shop_order_list')); ?>" class="btn btn-light border text-black-50 shadow-none">
                    <i class="fa-solid fa-arrow-left"></i>
                    Back
                </a>
                <?php else: ?>
                    <a href="<?php echo e(route('Order_list')); ?>" class="btn btn-light border text-black-50 shadow-none">
                        <i class="fa-solid fa-arrow-left"></i>
                        Back
                    </a>
                <?php endif; ?>

            </div>
            <div class="btn-group btn-group-sm rounded d-print-none">
                <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none">
                    <i class="fa fa-print"></i>
                    Print
                </a>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-modals'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('page-js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('master.shop_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/reflexdn/public_html/resources/views/shop/invoice.blade.php ENDPATH**/ ?>