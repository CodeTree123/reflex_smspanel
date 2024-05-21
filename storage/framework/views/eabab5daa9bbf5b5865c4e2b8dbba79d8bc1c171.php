<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="<?php echo e(asset ('assets/img/reflex_logo.png')); ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Sami Package CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/samipackage/css/samipack.css')); ?>">

    <!--Main Style CSS -->
    <link rel="stylesheet" href="<?php echo e(asset ('assets/css/style.css')); ?>">

    <!-- Page CSS -->
    <?php echo $__env->yieldPushContent('page-css'); ?>

    <title>ReflexDN</title>
</head>

<body class="header">
    <?php if(Route::current()->getName() != 'order_invoice'): ?>
    <?php echo $__env->make('shop.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if(Route::current()->getName() != 'order_invoice'): ?>
    <?php echo $__env->make('shop.include.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php if(Route::current()->getName() != 'order_invoice'): ?>
    <?php echo $__env->make('include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->make('include.samiPackage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldPushContent('page-modals'); ?>
    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Sami Package JS File -->
    <script src="<?php echo e(asset('public/samipackage/js/samipack.js')); ?>"></script>

    <script>
        $(document).ready(function() {

            //Sami Package For Toast
            $(document).cus_toast_auto({
                cus_toast_time: 3000,
                cus_toast_top: "60px",
                cus_toast_border: "#4e6f8a",
            });

        });
    </script>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    <!-- Page js -->
    <?php echo $__env->yieldPushContent('page-js'); ?>

</body>

</html><?php /**PATH /home1/reflexdn/public_html/resources/views/master/shop_master.blade.php ENDPATH**/ ?>