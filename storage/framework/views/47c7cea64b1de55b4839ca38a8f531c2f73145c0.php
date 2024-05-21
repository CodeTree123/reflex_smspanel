<div class="profile blue-grey-border-thin">

    <h6 class="   p-2 mb-1 d-flex justify-content-center bg-blue-grey custom-border-radius">Doctor's Profile</h6>
    <div class="complete">
        <div class="p-header">
            <a href="" class="d-flex m-0 p-0 w-100 justify-content-end <?php echo e($subscription->status == 1 ? '':'d-none'); ?>" data-bs-toggle="modal" data-bs-target="#total_amount">৳</a>
            <!-- <img src="img/banner.jpg" class="cover"> -->
            <?php if($doctor_info->p_image == null): ?>
            <img src="<?php echo e(asset('assets/img/profile.png')); ?>" class="doctor-profile mb-4 mt-2">
            <?php else: ?>
            <img src="<?php echo e(url('public/uploads/doctor/profile/'.$doctor_info->p_image)); ?>" class="doctor-profile mb-4 mt-2 image_view_sami">
            <?php endif; ?>

            <?php if($doctor_info->fname != null || $doctor_info->lname != null): ?>
            <h2 class="mb-2"><?php echo e($doctor_info->fname." ".$doctor_info->lname); ?></h2>
            <?php else: ?>
            <a href="<?php echo e(route('profile_edit',[$doctor_info->id ?? 0])); ?>" class="mb-2 text-danger text-decoration-underline">Add Your Name First.</a>
            <?php endif; ?>
            <p class="mb-2"><?php echo e($doctor_info->doctor->designation); ?></p>
            <?php if($sub_remain != 0): ?>
            <p class="mb-2">Subscription Remain : <?php echo e($sub_remain); ?> Days</p>
            <?php endif; ?>
            <p>Sms Remain: <?php echo e($doctor_info->userSms->sms); ?></p>
        </div>


    </div>

</div>
<div class="profile blue-grey-border-thin">
    <div class="d-flex justify-content-evenly my-2   ">
        <?php if($subscription->status == 1): ?>
        <?php if(auth()->user()->setting_alert == 0): ?>
        <a href="<?php echo e(route('doctor_profile_setting',[$doctor_info->id])); ?>" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="Setting">
            <i class="fa-solid fa-gear fa-xl"></i>
        </a>
        <?php else: ?>
        <a href="<?php echo e(route('doctor_profile_setting',[$doctor_info->id])); ?>" class="position-relative <?php echo e($subscription->status == 0 ? 'disable_link':''); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Setting">
            <i class="fa-solid fa-gear fa-xl"></i>
            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                <span class="visually-hidden">New alerts</span>
            </span>
        </a>
        <?php endif; ?>
        <?php else: ?>
        <a href="#" class="disable_link" data-bs-toggle="tooltip" data-bs-placement="top" title="Setting">
            <i class="fa-solid fa-gear fa-xl"></i>
        </a>
        <?php endif; ?>
        <a href="<?php echo e(route('profile_edit',[$doctor_info->id ?? 0])); ?>" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="Profile">
            <i class="fa-solid fa-user fa-xl"></i>
        </a>
        <a href="<?php echo e(route('logout')); ?>" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout">
            <i class="fa-solid fa-power-off fa-xl"></i>
        </a>
    </div>
</div>
<div class="profile blue-grey-border-thin py-2">
    <!-- <h3>Treatment Plans</h3> -->
    <div class="complete">
        <?php if($subscription->status == 1): ?>
        <a href="<?php echo e(route('patient_list',[$doctor_info->id])); ?>" class="btns btn-outline-blue-grey my-2 <?php echo e(auth()->user()->setting_alert == 1 ? 'disable_link':''); ?>">Patient
            List</a>
        <a href="<?php echo e(route('appointment_list',[$doctor_info->id])); ?>" class="btns btn-outline-blue-grey my-2 <?php echo e(auth()->user()->setting_alert == 1 ? 'disable_link':''); ?>">Appointment</a>
        <a href="<?php echo e(route('subscription',[$doctor_info->id])); ?>" class="btns btn-outline-blue-grey my-2">Subscription</a>
        <?php else: ?>
        <!-- <a href="#" class="btns btn-outline-blue-grey my-2">Patient List</a> -->
        <button type="button" class="btns btn-outline-blue-grey my-2 border-0" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Need To Subscribe." data-bs-custom-class="beautifier text-danger">Patient List
        </button>
        <!-- <a href="#" class="btns btn-outline-blue-grey my-2">Appointment</a> -->
        <button type="button" class="btns btn-outline-blue-grey my-2 border-0" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Need To Subscribe." data-bs-custom-class="beautifier text-danger">Appointment
        </button>
        <!-- <a href="#" class="btns btn-outline-blue-grey my-2">Income/Expence</a> -->
        <a href="<?php echo e(route('subscription',[$doctor_info->id])); ?>" class="btns btn-outline-blue-grey my-2">Subscription</a>
        <?php endif; ?>
    </div>

    <!-- <a href="">setting</a>
  <a href="" class="lgout-a">Logout</a> -->
</div>

<!-- Modal For T/P Estimated Cost List -->
<div class="modal fade " id="total_amount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Earning Information (TAKA)
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <?php
                    $month = [];
                    $findmonths = [];
                    $cost = [];
                    $paid = [];
                    $due = [];
                    $costByMonth = [];
                    $paidByMonth = [];
                    $treat_infos = [];
                    $d_id = auth()->user()->id;

                    for ($m = 1; $m <= 12; $m++) { 
                        $month[]=date('M', mktime(0, 0, 0, $m, 1, date('Y'))); 
                        $findmonths[]=date('m', mktime(0, 0, 0, $m, 1, date('Y'))); 
                    } 
                    foreach ($findmonths as $findmonth) { 
                        $cost[]=App\Models\treatment_info::whereYear('created_at','=', \Carbon\Carbon::today())->whereMonth('created_at', '=' , $findmonth)->where('d_id', $d_id)->sum('cost');
                        $paid[] = App\Models\treatment_payment::whereYear('date','=', \Carbon\Carbon::today())->whereMonth('date', '=', $findmonth)->where('d_id', $d_id)->sum('paid_amount');
                        $due[] = App\Models\treatment_info::whereYear('updated_at','=', \Carbon\Carbon::today())->whereMonth('updated_at', '=', $findmonth)->where('d_id', $d_id)->sum('due');
                    }
                    $treatmentByMonths=App\Models\treatment_payment::whereYear('date','=', \Carbon\Carbon::today())->whereMonth('date', '=' , \Carbon\Carbon::today())->where('d_id', $d_id)->orderBy('date','asc')->get();
                    $patients = App\Models\patient_infos::where('d_id',$d_id)->get();
                ?>

                <!-- T/P Treatment Cost List-->
                <h5 class="text-center text-uppercase">By Year Earning Short List</h5>
                <table class="table table-bordered mt-3 text-center">
                    <tbody>
                        <style>
                            .tbl_w {
                                width: 11%;
                            }
                        </style>
                        <tr>
                            <td class="tbl_w">#</td>
                            <?php $__currentLoopData = $month; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="fw-bolder"><?php echo e($m); ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <tr>
                            <td class="fw-bolder tbl_w">Total Cost</td>
                            <?php $__currentLoopData = $cost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e($c); ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <tr>
                            <td class="fw-bolder tbl_w">Total Income</td>
                            <?php $__currentLoopData = $paid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e($p); ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <tr>
                            <td class="fw-bolder tbl_w">Total Due</td>
                            <?php $__currentLoopData = $due; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e($d); ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </tbody>
                </table>

                <div class="row align-items-center mx-0 mb-3">
                    <div class="col-11 px-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-center text-uppercase">By Month of <?php echo e(\Carbon\Carbon::today()->format('F')); ?></h6>
                            <h6 class="text-center text-uppercase">Total Paid <?php echo e($treatmentByMonths->sum('paid_amount')); ?></h6>
                        </div>
                    </div>
                    <div class="col-1 text-center">
                        <form action="<?php echo e(route('monthly_report',$d_id)); ?>" method="post" class="ms-3">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="month" value="<?php echo e(\Carbon\Carbon::today()->format('F')); ?>">
                            <button type="submit" class="btn">
                                <i class="fa-solid fa-print"></i>
                            </button>
                        </form>
                    </div>
                </div>


                <div class="row mx-0 py-2 mb-2 text-center bg-light">
                    <div class="col-3">
                        <p class="fw-bold">Date</p>
                    </div>
                    <div class="col-5">
                        <p class="fw-bold">Patient</p>
                    </div>
                    <div class="col-3">
                        <p class="fw-bold">Paid</p>
                    </div>
                    <div class="col-1"></div>
                </div>
                <style>
                    .earn_body:nth-child(even) {
                        background-color: rgba(0, 0, 0, 0.05);
                    }

                    .earn_body_border {
                        border-left: 15px solid #fff;
                        border-right: 15px solid #fff;
                    }

                    .earn_body_border1 {
                        border-left: 15px solid #fff;
                    }

                    .earn_accordion {
                        background-color: transparent !important;
                        color: #000 !important;
                        text-align: center !important;
                    }

                    .earn_accordion::after {
                        margin-left: 0;
                        margin-right: 15px;
                    }

                    .earn_details {
                        background-color: rgba(0, 0, 0, 0.20);
                    }

                    .earn_details_body {
                        border-top: 1px solid #fff;
                    }

                    .earn_details_body:first-child {
                        border-top: 8px solid #fff;
                    }

                    .earn_details_body:last-child {
                        border-bottom: 8px solid #fff;
                    }
                </style>

                <?php
                    $date = \Carbon\Carbon::now();
                    $startOfCalendar = $date->copy()->firstOfMonth();
                    $endOfCalendar = $date->copy()->lastOfMonth();
                    $dates = [];
                    for($startOfCalendar; $startOfCalendar <= $endOfCalendar; $startOfCalendar->addDay()){
                        $dates [] = $startOfCalendar->format('Y-m-d');
                    }
                ?>

                <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $m_paidd = App\Models\treatment_payment::where('date','=', $date)->where('d_id', $d_id)->get();
                ?>
                <div class="row mx-0 text-center earn_body">
                    <div class="col-3 py-2">
                        <?php echo e(\Carbon\Carbon::parse($date)->format('d-m-y')); ?>

                    </div>
                    <div class="col-5 py-2 earn_body_border">
                        <?php if($m_paidd->unique('p_id')->count() != 0): ?>
                        <button class="p-0 accordion-button justify-content-center flex-row-reverse collapsed earn_accordion" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo e("collapseDatet".$key + 1); ?>" aria-expanded="true" aria-controls="collapseOne">
                            <?php echo e($m_paidd->unique('p_id')->count()); ?>

                        </button>
                        <!-- <i class="fa-solid fa-eye"></i> -->
                        <!-- <i class="ms-4 fa-solid fa-chevron-down"></i> -->
                        <?php endif; ?>
                    </div>
                    <div class="col-3 py-2">
                        <?php echo e($m_paidd->sum('paid_amount')); ?>

                    </div>
                    <div class="col-1 py-2 earn_body_border1">
                        <?php if($m_paidd->unique('p_id')->count() != 0): ?>
                        <form action="<?php echo e(route('monthly_report',$d_id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="date" value="<?php echo e($date); ?>">
                            <button type="submit" class="btn py-0">
                                <i class="fa-solid fa-print"></i>
                            </button>
                        </form>
                        <?php endif; ?>
                    </div>
                    <div class="col-12 accordion-collapse collapse earn_details" id="<?php echo e("collapseDatet".$key + 1); ?>">
                        <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($m_paidd->contains('p_id',$patient->id)): ?>
                        <div class="row text-center earn_details_body">
                            <div class="col-3 py-2 bg-white"></div>
                            <div class="col-6 py-2 earn_body_border">
                                <?php echo e($patient->name); ?>

                            </div>
                            <div class="col-3 py-2">
                                <?php
                                $amount = App\Models\treatment_payment::where('date',$date)->where('d_id',$d_id)->where('p_id',$patient->id)->sum('paid_amount');
                                echo $amount
                                ?>
                            </div>
                            <div class="col-1 py-2 bg-white"></div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end --><?php /**PATH C:\xampp\htdocs\reflex\resources\views/doctor/include/docLeftSide.blade.php ENDPATH**/ ?>