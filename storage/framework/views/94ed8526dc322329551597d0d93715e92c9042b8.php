<?php $__env->startPush('page-css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="blank-sec p-0">
        <div class="row align-items-center p-3">
            <div class="col-2">
                <a href="<?php echo e(route('doctor')); ?>">
                    <?php if(auth()->user()->p_image == null): ?>
                        <img src="<?php echo e(asset('assets/img/profile.png')); ?>" class="img-fluid rounded-circle" width="50">
                    <?php else: ?>
                        <img src="<?php echo e(asset('public/uploads/doctor/profile/'.auth()->user()->p_image)); ?>" class=" rounded-circle" width="50" height="50">
                    <?php endif; ?>
                </a>
            </div>
            
            
            
            
            
            
        </div>
    </div>

    <div class="blank-sec p-0">
        <div class="row m-0">
            <?php $__empty_1 = true; $__currentLoopData = $tutorials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tutorial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-12 p-2">
                    <div class="tutorial-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo e($tutorial->video); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
                    </div>
                    <p class="tutorialTitle"><?php echo e($tutorial->title); ?></p>
                    <p class="tutorialBody p-3 mb-2"><?php echo e($tutorial->description); ?></p>
                    
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12">
                    <h5 class="text-center my-4">There was no tutorial available.</h5>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-modals'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('page-js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('forum.forum_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/reflexdn/public_html/resources/views/forum/layouts/tutorial_view.blade.php ENDPATH**/ ?>