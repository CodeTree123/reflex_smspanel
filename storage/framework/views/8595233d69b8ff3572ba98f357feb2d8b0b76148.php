<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="fs-4">My Information</span>
        <a class="crud-btns" href="<?php echo e(route('shop_admin_edit')); ?>">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
    </div>
    <div class="row">
        <div class="col-6 text-center">
            <!-- <p class="mb-2"> <span class="fw-bolder">Profile Picture:</span> </p> -->
            <img src="<?php echo e(asset('public/uploads/other/'.auth()->user()->p_image)); ?>" alt="" width="250px" height="250px">
        </div>
        <div class="col-6">
            <p class="fs-6 mb-2"><span
                        class="fw-bolder">Name:</span> <?php echo e(auth()->user()->fname." ".auth()->user()->lname); ?></p>
            <p class="fs-6 mb-2"><span class="fw-bolder">Email:</span> <?php echo e(auth()->user()->email); ?></p>
            <p class="fs-6 mb-2"><span class="fw-bolder">Contact:</span> <?php echo e(auth()->user()->phone); ?></p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.other.admin_other_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/reflexdn/public_html/resources/views/shop/shop_admin/shop_admin_panel.blade.php ENDPATH**/ ?>