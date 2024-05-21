<?php
    $unvarified = unverified();
    $subscription_alert = subscription_alert();
?>
<div class="d-flex">
    <div class="d-flex flex-column p-3 bg-light" style="width: 240px;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light nav-pills pt-0">
            <div class="w-100 ms-2">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex align-items-center justify-content-between">
                    <a href="<?php echo e(route('admin')); ?>" class="text-dark">
                        <span class="fs-4">Dashboard</span>
                    </a>
                    <a href="<?php echo e(route('logout')); ?>" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout">
                        <i class="fa-solid fa-power-off fa-xl"></i>
                    </a>
                </div>
                <hr>
                <div class="collapse navbar-collapse me-2" id="navbarSupportedContent">
                    <ul class="navbar-nav flex-column mb-2 mb-lg-0 w-100">
                        <li class="nav-item">
                            <?php if($unvarified > 0): ?>
                            <a class="nav-link text-white text-center bg-dark my-2 position-relative active" aria-current="page" href="<?php echo e(route('doctor_list')); ?>">
                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span>
                                Doctor's List
                            </a>
                            <?php else: ?>
                            <a class="nav-link text-white text-center bg-dark my-2 active" aria-current="page" href="<?php echo e(route('doctor_list')); ?>">
                                Doctor's List
                            </a>
                            <?php endif; ?>
                        </li>
                        <li class="nav-item">
                            <?php if($subscription_alert > 0): ?>
                            <a class="nav-link text-white text-center bg-dark my-2 position-relative active" aria-current="page" href="<?php echo e(route('subscription_list')); ?>">
                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span>
                                Subscription
                            </a>
                            <?php else: ?>
                            <a class="nav-link text-white text-center bg-dark my-2" href="<?php echo e(route('subscription_list')); ?>">Subscription</a>
                            <?php endif; ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="<?php echo e(route('chief_complaint_list')); ?>">C/C Cheif Complaints</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="<?php echo e(route('clinical_findings_list')); ?>">C/F Clinical Findings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="<?php echo e(route('investigation_list')); ?>">Investigation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="<?php echo e(route('treatment_plans_list')); ?>">T/P Treatment Plans</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="<?php echo e(('medicine_list')); ?>">Medicine</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="<?php echo e(route('notice_list')); ?>">Notice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="<?php echo e(route('mobile_type_list')); ?>">Mobile Type</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="<?php echo e(route('med_clg_list')); ?>">Medical College</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="b-example-divider"></div>
</div>
<?php /**PATH /home1/reflexdn/public_html/resources/views/admin/doctor/include/admin_doc_manu.blade.php ENDPATH**/ ?>