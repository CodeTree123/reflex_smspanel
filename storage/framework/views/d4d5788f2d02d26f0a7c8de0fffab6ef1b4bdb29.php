<?php $__env->startSection('content'); ?>
    <div>
        <h1>Hello From Other Panel!</h1>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.other.admin_other_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/reflexdn/public_html/resources/views/admin/other/layout/dashboard.blade.php ENDPATH**/ ?>