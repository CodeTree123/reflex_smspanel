<?php $__env->startSection('content'); ?>

    <?php
        $unvarified = unverified();
        $subscription_alert = subscription_alert();
    ?>

    <div class="d-flex justify-content-between">
        <span class="fs-4">Doctors List</span>
        <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#doctor_Add">
            <i class="bi bi-plus-circle"></i>
        </a>

    </div>
    <!-- ....................... -->

    <div class="row justify-content-center align-items-center">
        <div class="col-lg-12 mt-1">
            <ul class="nav nav-tabs doctor_profile_setting" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn active" id="Verified-Doctor-tab" data-bs-toggle="tab"
                            data-bs-target="#Verified-Doctor" type="button" role="tab" aria-controls="Verified-Doctor"
                            aria-selected="true">Verified Doctors
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <?php if($unvarified > 0): ?>
                        <button class="nav-link btn position-relative" id="Unverified_Doctors-tab" data-bs-toggle="tab"
                                data-bs-target="#Unverified_Doctors" type="button" role="tab"
                                aria-controls="Unverified_Doctors" aria-selected="false">
                            <span
                                class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span>
                            Unverified Doctors
                        </button>
                    <?php else: ?>
                        <button class="nav-link btn" id="Unverified_Doctors-tab" data-bs-toggle="tab"
                                data-bs-target="#Unverified_Doctors" type="button" role="tab"
                                aria-controls="Unverified_Doctors" aria-selected="false">
                            Unverified Doctors
                        </button>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
        <div class="col-lg-12">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="Verified-Doctor" role="tabpanel"
                     aria-labelledby="Verified-Doctor-tab">
                    <!-- Doctor List-->
                    <table class="table table-bordered mt-2 text-center align-middle">
                        <thead>
                        <tr>
                            <th class="">#</th>
                            <th class="">Doctor Name</th>
                            <th class="">BMDC</th>
                            <th class="">Contact No.</th>
                            <th class="">Email</th>
                            <th class="">Status</th>
                            <th class="">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $varified_doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$v_doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($key+1); ?></td>
                                <td>
                                    <?php if($v_doctor->lastActiveStatus == 1): ?>
                                        <img src="<?php echo e(asset('public/assets/img/Green_Dot_(Active).png')); ?>" alt="" style="width:3%;">
                                    <?php endif; ?>
                                    <span class="ms-2 text-break"><?php echo e($v_doctor->fname." ".$v_doctor->lname); ?></span>
                                    <?php if($v_doctor->lastActiveStatus == 0): ?>
                                    <p><?php echo e("( ".\Carbon\Carbon::parse($v_doctor->lastActive)->diffForHumans().")"); ?></p>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($v_doctor->doctor->BMDC); ?></td>
                                <td><?php echo e($v_doctor->phone); ?></td>
                                <td><?php echo e($v_doctor->email); ?></td>
                                <td>
                                    <?php if($v_doctor->status == 0): ?>
                                        <a href="<?php echo e(route('doctor_status',[$v_doctor->id])); ?>"
                                           class="btn btn-sm btn-danger my-0">Block</a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('doctor_status',[$v_doctor->id])); ?>"
                                           class="btn btn-sm btn-success my-0">Unblock</a>
                                    <?php endif; ?>
                                </td>
                                <td class="d-flex justify-content-around">

                                    <button type="button" class="btn crud-btns Doctor_viewbtn" href=""
                                            value="<?php echo e($v_doctor->id); ?>">
                                        <i class="fa-solid fa-file-lines"></i>
                                    </button>
                                    <button type="button" class="btn crud-btns Doctor_editbtn" href=""
                                            value="<?php echo e($v_doctor->id); ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn crud-btns delete-doctor"
                                            data-doc-name="<?php echo e($v_doctor->fname." ".$v_doctor->lname); ?>"
                                            value="<?php echo e($v_doctor->id); ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7">There Is No Verified Doctor Available</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <!--Doctor list end -->
                </div>
                <div class="tab-pane fade" id="Unverified_Doctors" role="tabpanel"
                     aria-labelledby="Unverified_Doctors-tab">
                    <!-- Doctor List-->
                    <table class="table table-bordered mt-2 text-center align-middle">
                        <thead>
                        <tr>
                            <th class="">Serial No</th>
                            <th class="">Doctor Name</th>
                            <th class="">BMDC</th>
                            <th class="">Contact No.</th>
                            <th class="">Email</th>
                            <th class="">Status</th>
                            <th class="">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $unvarified_doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e($doctor->fname." ".$doctor->lname); ?></td>
                                <td><?php echo e($doctor->BMDC); ?></td>
                                <td><?php echo e($doctor->phone); ?></td>
                                <td><?php echo e($doctor->email); ?></td>
                                <td>
                                    <?php if($doctor->verification == 1): ?>
                                        <a href="<?php echo e(route('doctor_verification',[$doctor->u_id])); ?>"
                                           class="btn btn-sm btn-success my-0">Verified</a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('doctor_verification',[$doctor->u_id])); ?>"
                                           class="btn btn-sm btn-danger my-0">Unverified</a>
                                    <?php endif; ?>
                                </td>
                                <td class="d-flex justify-content-around">

                                    <button type="button" class="btn crud-btns unverified_Doctor_viewbtn" href=""
                                            value="<?php echo e($doctor->u_id); ?>">
                                        <i class="fa-solid fa-file-lines"></i>
                                    </button>
                                    <button class="btn crud-btns delete-doctor"
                                            data-doc-name="<?php echo e($doctor->fname." ".$doctor->lname); ?>"
                                            value="<?php echo e($doctor->u_id); ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7">
                                    <h6 class="my-3">There Is No Unverified Doctor Available</h6>
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <!--Doctor list end -->
                    <a href=""></a>
                </div>
            </div>
        </div>
    </div>

    <!-- ....................... -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>
    <!-- Modal For Doctor Add -->
    <div class="modal fade " id="doctor_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Add Doctor Information
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('doctor_add')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="form-floating ">
                                <input type="name" name="fname" class="form-control custom-form-control mb-2"
                                       placeholder="name@example.com" value="<?php echo e(old('fname')); ?>">
                                <label for="floatingInput">First Name</label>
                            </div>
                            <div class="form-floating ">
                                <input type="name" name="lname" class="form-control custom-form-control mb-2"
                                       placeholder="name@example.com" value="<?php echo e(old('lname')); ?>">
                                <label for="floatingInput">Last Name</label>
                            </div>

                            <div class="form-floating ">
                                <input type="email" name="email" class="form-control custom-form-control mb-2"
                                       placeholder="name@example.com" value="<?php echo e(old('email')); ?>">
                                <label for="floatingInput">Email address</label>
                            </div>

                            <!-- <div class="form-floating ">
                                <input type="text" name="mobile" class="form-control mb-2" placeholder="Name">
                                <label for="floatingInput">Mobile Number</label>
                            </div> -->
                            <!-- <div class="form-floating">
                                <input type="text" name="BMDC" class="form-control mb-2" placeholder="BMDC Registration No.">
                                <label for="bmdcID">BMDC Registration No.</label>
                            </div> -->
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control custom-form-control mb-2"
                                       placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-sm btn btn-sm btn-outline-blue-grey">Add</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->
    <!-- Modal For Doctor VIEW -->
    <div class="modal fade " id="Doctor_View" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        View Doctor Information
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body" id="doctor_info">

                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->
    <!-- Modal For Unverified Doctor VIEW -->
    <div class="modal fade " id="Unverified_Doctor_View" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        View Unverified Doctor Information
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body" id="unverified_doc_info">

                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Modal For Doctor update -->
    <div class="modal fade " id="Doctor_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Edit Doctor Information
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('update_doctor')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <input type="hidden" id="DoctorId" name="doctor_id"/>
                        <div class="modal-body">
                            <div class="form-floating ">
                                <input type="name" name="fname" id="d_fname"
                                       class="form-control custom-form-control mb-2" placeholder="fname@example.com"
                                       value="<?php echo e(old('fname')); ?>">
                                <label for="floatingInput">First Name</label>
                            </div>
                            <div class="form-floating ">
                                <input type="name" name="lname" id="d_lname"
                                       class="form-control custom-form-control mb-2" placeholder="lname@example.com"
                                       value="<?php echo e(old('lname')); ?>">
                                <label for="floatingInput">Last Name</label>
                            </div>

                            <div class="form-floating ">
                                <input type="email" name="email" id="d_email"
                                       class="form-control custom-form-control mb-2" placeholder="name@example.com"
                                       value="<?php echo e(old('email')); ?>">
                                <label for="floatingInput">Email address</label>
                            </div>

                            <div class="form-floating ">
                                <input type="text" name="mobile" id="d_mobile" class="form-control mb-2"
                                       placeholder="Name">
                                <label for="floatingInput">Mobile Number</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="BMDC" id="d_bmdc" class="form-control mb-2"
                                       placeholder="BMDC Registration No.">
                                <label for="bmdcID">BMDC Registration No.</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="chember_name" id="d_c_name" class="form-control mb-2"
                                       placeholder="chamberName">
                                <label for="chamberName">Chamber Name</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="chember_add" id="d_c_add" class="form-control mb-2"
                                       placeholder="chamberAddress">
                                <label for="chamberAddress">Chamber Address</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Modal For Delete Doctor -->
    <div class="modal fade " id="del-Doctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Delete Doctor Information
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('delete_doctor')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This <span id="doc_name"></span>'s
                                information?</h5>
                        </div>
                        <input type="hidden" id="del-doctor-id" name="deletingId">
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Delete</button>
                            <!-- Modal Footer end -->
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>

    <script>
        $(document).ready(function () {

            // script for Doctor
            $(document).on('click', '.Doctor_viewbtn', function () {
                var Doctor_id = $(this).val();
                var url = "<?php echo e(route('edit_doctor',[':d_id'])); ?>";
                url = url.replace(':d_id', Doctor_id);
                // alert(Doctor_id);
                $("#Doctor_View").modal('show');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        // console.log(response.doctor_info);
                        $("#doctor_info").html("");
                        $("#doctor_info").append('\
                            <p>Name: <span>' + response.doctor_info.fname + " " + response.doctor_info.lname + '</span></p>\
                            <p>Email: <span>' + response.doctor_info.email + '</span></p>\
                            <p>Phone: <span>' + response.doctor_info.phone + '</span></p>\
                            <p>BMDC No: <span>' + response.doctor_info.BMDC + '</span></p>\
                            <p>NID No: <span>' + response.doctor_info.nid + '</span></p>\
                            <p class="d-flex align-items-center">Profile Picture: \
                                <img class="image_view ms-5 full_view" src="/public/uploads/doctor/profile/' + response.doctor_info.p_image + '" alt="" >\
                            </p>\
                        \
                        ');
                    }
                });
                // .attr("src","anotherImg.jpg");
            });

            $(document).on('click', '.unverified_Doctor_viewbtn', function () {
                var Doctor_id = $(this).val();
                var url = "<?php echo e(route('edit_doctor',[':d_id'])); ?>";
                url = url.replace(':d_id', Doctor_id);
                // alert(Doctor_id);
                $("#Unverified_Doctor_View").modal('show');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        // console.log(response.doctor_info);
                        $("#unverified_doc_info").html("");
                        $("#unverified_doc_info").append('\
                            <p>Name: <span>' + response.doctor_info.fname + " " + response.doctor_info.lname + '</span></p>\
                            <p>Email: <span>' + response.doctor_info.email + '</span></p>\
                            <p>Phone: <span>' + response.doctor_info.phone + '</span></p>\
                            <p>BMDC No: <span>' + response.doctor_info.BMDC + '</span></p>\
                            <p>NID No: <span>' + response.doctor_info.nid + '</span></p>\
                            <p class="d-flex align-items-center justify-contant-evenly">Profile Picture: \
                                <img class="image_view ms-5 full_view" src="/public/uploads/doctor/profile/' + response.doctor_info.p_image + '" alt="">\
                            </p>\
                            <p class="d-flex align-items-center justify-contant-evenly">BMDC: \
                                <img class="image_view ms-5 full_view" src="/public/uploads/doctor/bmdc/' + response.doctor_info.bmdc_image + '" alt="">\
                            </p>\
                        \
                        ');
                    }
                });
                // .attr("src","anotherImg.jpg");
            });

            $(document).on('click','img.full_view',function(){
                $(this).modal_image_preview();
            });

            $(document).on('click', '.Doctor_editbtn', function () {
                var Doctor_id = $(this).val();
                var url = "<?php echo e(route('edit_doctor',[':d_id'])); ?>";
                url = url.replace(':d_id', Doctor_id);
                // alert(Doctor_id);
                $("#Doctor_Update").modal('show');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        // console.log(response.doctor_info);
                        $('#DoctorId').val(Doctor_id);
                        $('#d_fname').val(response.doctor_info.fname);
                        $('#d_lname').val(response.doctor_info.lname);
                        $('#d_email').val(response.doctor_info.email);
                        $('#d_mobile').val(response.doctor_info.phone);
                        $('#d_bmdc').val(response.doctor_info.BMDC);
                        $('#d_c_name').val(response.doctor_info.chember_name);
                        $('#d_c_add').val(response.doctor_info.chember_add);
                    }
                });
            });

            $(document).on('click', '.delete-doctor', function () {
                var deleteDoctorId = $(this).val();
                var deleteDoctorName = $(this).attr("data-doc-name");
                // alert(deleteCCId);
                $("#del-Doctor").modal('show');
                $('#del-doctor-id').val(deleteDoctorId);
                $('#doc_name').text(deleteDoctorName);
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.doctor.admin_doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex\resources\views/admin/doctor/layout/doctor_list.blade.php ENDPATH**/ ?>