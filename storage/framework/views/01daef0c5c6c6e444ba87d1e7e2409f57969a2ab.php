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
            <!-- <p class="mb-2">Dental Consulatant of the Royal <br>Dental</p> -->
            <!-- <a href="#_" class="btns btn-outline-blue-grey  mb-2">This Month</a> -->
            <!--<p class="mb-2">Buy SMS : 50</p>-->
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
                    $paid[] = App\Models\treatment_info::whereYear('created_at','=', \Carbon\Carbon::today())->whereMonth('created_at', '=', $findmonth)->where('d_id', $d_id)->sum('paid');
                    $due[] = App\Models\treatment_info::whereYear('created_at','=', \Carbon\Carbon::today())->whereMonth('created_at', '=', $findmonth)->where('d_id', $d_id)->sum('due');
                }

                $treatmentByMonths=App\Models\treatment_info::whereYear('created_at','=', \Carbon\Carbon::today())->whereMonth('created_at', '=' , \Carbon\Carbon::today())->where('d_id', $d_id)->orderBy('created_at','asc')->get();
                $patients = App\Models\patient_infos::where('d_id',$d_id)->get();
                ?>

                    <!-- T/P Treatment Cost List-->
                    <h5 class="text-center">By Year Earning Short List</h5>
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

                    <h5 class="text-center">By Month Information List</h5>
                    <table class="table table-bordered mt-3 text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Patient Name</th>
                                
                                <th>Cost</th>
                                <th>Paid</th>
                                <th>Due</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($treatmentByMonths->contains('p_id',$p->id)): ?>
                            <tr>
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e($p->name); ?></td>
                                <?php
                                $m_cost=App\Models\treatment_info::whereYear('created_at','=', \Carbon\Carbon::today())->whereMonth('created_at', '=' , \Carbon\Carbon::today())->where('d_id', $d_id)->where('p_id',$p->id)->sum('cost');
                                $m_paid=App\Models\treatment_info::whereYear('created_at','=', \Carbon\Carbon::today())->whereMonth('created_at', '=' , \Carbon\Carbon::today())->where('d_id', $d_id)->where('p_id',$p->id)->sum('paid');
                                $m_due=App\Models\treatment_info::whereYear('created_at','=', \Carbon\Carbon::today())->whereMonth('created_at', '=' , \Carbon\Carbon::today())->where('d_id', $d_id)->where('p_id',$p->id)->sum('due');
                                ?>
                                <td><?php echo e($m_cost); ?></td>
                                <td><?php echo e($m_paid); ?></td>
                                <td><?php echo e($m_due); ?></td>

                            </tr>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <!--T/P Treatment Cost list end -->
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end --><?php /**PATH C:\xampp\htdocs\resources\views/doctor/include/docLeftSide.blade.php ENDPATH**/ ?>