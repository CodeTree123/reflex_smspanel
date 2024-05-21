<?php $__env->startPush('page-css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="blank-sec ">
        <h6 class="p-2 mb-1 d-flex justify-content-center bg-blue-grey custom-border-radius">
            Treatment Case Study
        </h6>

        <form action="<?php echo e(route('add_case_studies')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="p-3 pb-0">

                <div class="mb-3">
                    <label for="post_title" class="form-label">Post Title</label>
                    <textarea class="form-control" id="post_title" rows="2" name="post_title"></textarea>
                </div>
                <h5 class="mb-3"><?php echo e($treat_info->treatment_plans ." (Tooth No: ". $treat_info->tooth_no.")"); ?>:</h5>
                <div class="px-4">
                    <?php $__currentLoopData = $ots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$ot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h6 class="mb-2"><span class="border-bottom border-dark">Day <?php echo e($key + 1); ?> :</span> </h6>
                    <p class="mb-3"><?php echo e($ot->steps); ?></p>
                    <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(\Carbon\Carbon::parse($ot->date)->format('Y-m-d') == \Carbon\Carbon::parse($report->created_at)->format('Y-m-d')): ?>
                    <img src="<?php echo e(asset('public/uploads/report/'.$report->image)); ?>" alt="" width="200px">
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <input type="hidden" name="patient_id" value="<?php echo e($treat_info->p_id); ?>">
                <input type="hidden" name="treatment_id" value="<?php echo e($treat_info->id); ?>">
                <input type="hidden" name="treatment_name" value="<?php echo e($treat_info->treatment_plans); ?>">

                <div class="mb-3">
                    <label for="description" class="form-label">Short Description/Summery</label>
                    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                </div>

            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-outline-blue-grey mt-2">Submit</button>
                <a href="<?php echo e(route('treatments',[$d_id,$p_id,$t_id,$treat_info->treatment_plans])); ?>" class="btn btn-outline-blue-grey rounded mt-2 ms-3 mb-0">Back</a>
            </div>

        </form>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-modals'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('page-js'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('master.doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/reflexdn/public_html/resources/views/doctor/postCaseStudies.blade.php ENDPATH**/ ?>