<!-- Header Start -->
<div class="header  mb-3 shadow">
    <div class="container-fluid pt-2">
        <div class="row align-items-center">
            <!--logo & title start-->

            <div class="col-md-5">
                <a class="d-flex align-items-center logo" href="<?php echo e(route('doctor')); ?>">
                    <!-- <img class="logo" src="img/Logo.png" alt="Logo"> -->

                    <img class=" logo" src="<?php echo e(asset ('assets/img/reflex_logo.png')); ?>" alt="Logo">

                    <!-- <h2 class="ms-3 mb-0 logo-title">
                        Dental Office Management System
                    </h2> -->
                </a>
            </div>
            <!--logo & title end-->

            <!--nav start-->

            <?php if(auth()->user()): ?>
                <?php if(Route::current()->getName() != 'login_profile_edit'): ?>
                    <div class="col-md-4">
                        <nav class="navbar navbar-expand-lg  p-0 ">
                            <div class="container-fluid">
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav fs-5 pe-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active text-bg-blue-grey" aria-current="page" href="<?php echo e(route('doctor')); ?>">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-bg-blue-grey " href="<?php echo e(route('inventory')); ?>">Inventory</a>
                                            <!-- <a class="nav-link text-bg-blue-grey" href="#" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="Coming Soon" data-bs-custom-class="beautifier text-danger">Inventory</a> -->

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-bg-blue-grey" href="<?php echo e(route('shop')); ?>" target="_blank">Shop</a>
                                            <!-- <a class="nav-link text-bg-blue-grey" href="#" data-bs-toggle="popover"
                                                   data-bs-placement="bottom" data-bs-content="Coming Soon"
                                                   data-bs-custom-class="beautifier text-danger">Shop</a> -->
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-bg-blue-grey" href="<?php echo e(route('forum')); ?>" target="_blank">Forum</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <!--nav end-->

                    <!--info Bar start-->
                <?php endif; ?>
            <?php endif; ?>
            <!--info Bar end-->
        </div>
    </div>
</div>
<!-- Header end -->
<script>
    // var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    // var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    // return new bootstrap.Tooltip(tooltipTriggerEl)
    // })

    // var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    // var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    // return new bootstrap.Popover(popoverTriggerEl)
    // })
</script>
<?php /**PATH /home1/reflexdn/public_html/resources/views/doctor/include/header.blade.php ENDPATH**/ ?>