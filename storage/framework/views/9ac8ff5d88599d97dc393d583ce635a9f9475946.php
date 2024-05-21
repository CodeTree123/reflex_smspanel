<?php $__env->startSection('content'); ?>
    <span class="fs-4">Welcome To The Admin Dashboard.</span>
    <div class="row mt-3">
        <div class="col-3">
            <div class="card text-center">
                <div class="card-header">
                    <span class="fs-5">Verified Doctor's</span>
                </div>
                <div class="card-body">
                    <h4><?php echo e($varified_doctors); ?></h4>
                </div>
                <div class="card-footer">
                    <a href="" class="text-decoration-none text-dark">
                    <span class="d-flex justify-content-between align-items-center">
                        View Details
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-center">
                <div class="card-header">
                    <span class="fs-5">Unverified Doctor's</span>
                </div>
                <div class="card-body">
                    <?php if($unvarified_doctors > 1): ?>
                        <h4 class="text-danger"><?php echo e($unvarified_doctors); ?></h4>
                    <?php else: ?>
                        <h4 class="text-dark"><?php echo e($unvarified_doctors); ?></h4>
                    <?php endif; ?>
                </div>
                <div class="card-footer">
                    <a href="" class="text-decoration-none text-dark">
                    <span class="d-flex justify-content-between align-items-center">
                        View Details
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-center">
                <div class="card-header">
                    <span class="fs-5">Subscriped Doctor's</span>
                </div>
                <div class="card-body">
                    <h4><?php echo e($subscriped); ?></h4>
                </div>
                <div class="card-footer">
                    <a href="" class="text-decoration-none text-dark">
                    <span class="d-flex justify-content-between align-items-center">
                        View Details
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-center">
                <div class="card-header">
                    <span class="fs-5">Unsubscriped Doctor's</span>
                </div>
                <div class="card-body">
                    <h4><?php echo e($unsubscriped); ?></h4>
                </div>
                <div class="card-footer">
                    <a href="" class="text-decoration-none text-dark">
                    <span class="d-flex justify-content-between align-items-center">
                        View Details
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.doctor.admin_doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex\resources\views/admin/doctor/layout/dashboard.blade.php ENDPATH**/ ?>