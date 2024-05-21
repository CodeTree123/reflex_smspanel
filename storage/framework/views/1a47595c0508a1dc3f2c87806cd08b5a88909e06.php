<?php if(Session::has('success') ): ?>
<!-- Custom Toast For Success Start-->
<div class="cus_toast">
    <div class="cus_toast-content">
        <i class="fas fa-solid fa-check check"></i>

        <div class="message">
            <span class="cus_success">Success</span>
            <span class="text text-2"><?php echo e(Session::get('success')); ?></span>
        </div>
    </div>
    <i class="fa-solid fa-xmark sami_close"></i>

    <div class="progress"></div>
</div>
<!-- Custom Toast For Success End -->
<?php endif; ?>

<?php if(Session::has('fail')): ?>
<!-- Custom Toast For Error Start-->
<div class="cus_toast">
    <div class="cus_toast-content">
        <i class="fa-solid fa-xmark error"></i>

        <div class="message">
            <span class="cus_error">Error</span>
            <span class="text"><?php echo e(Session::get('fail')); ?></span>
        </div>
    </div>
    <i class="fa-solid fa-xmark sami_close"></i>

    <div class="progress"></div>
</div>
<!-- Custom Toast For Error End -->
<?php endif; ?><?php /**PATH C:\xampp\htdocs\resources\views/include/samiPackage.blade.php ENDPATH**/ ?>