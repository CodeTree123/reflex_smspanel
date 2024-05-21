<?php $__env->startPush('page-css'); ?>
<style>
    input::-webkit-calendar-picker-indicator {
        display: none;
    }

    input[type="date"]::-webkit-input-placeholder {
        visibility: hidden !important;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<?php
$subscription = subscription();
$sub_remain = sub_remain();
$notices = notices();
$total_cost = total_cost();
$total_paid = total_paid();
$total_due = total_due();
?>
<!-- main start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 pe-0">
            <?php echo $__env->make('doctor.include.docLeftSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-7 pe-0">
            <div class="blank-sec">
                
                <h6 class="p-2 mb-1 d-flex justify-content-center bg-blue-grey custom-border-radius">Patient List</h6>
                
                
            <table class="table table-bordered mt-2 text-center align-middle p_list ">
                <thead>
                    <tr>
                        <th class="">#</th>
                        <th class="">Name</th>
                        <th class="">Mobile</th>
                        <th class="">Type</th>
                        <th class="">Due</th>
                        <th class="" style="width:50px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $patient_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key + 1); ?></td>
                        <td><?php echo e($patient->name); ?></td>
                        <td><?php echo e($patient->mobile); ?></td>
                        <td><?php echo e($patient->m_type->name); ?></td>
                        <td>
                            <?php
                            $id = $patient->id;
                            $cost = \App\Models\treatment_info::where('p_id','=',$id)->sum('cost');
                            $paid = \App\Models\treatment_info::where('p_id','=',$id)->sum('paid');
                            $due = $cost - $paid;
                            echo $due;
                            ?>
                            <?php if($due>0): ?>
                            Taka
                            <?php endif; ?>
                        </td>
                        <td class="d-flex justify-content-around">
                            <!-- <button type="button" class="btn crud-btns Patient_viewbtn" value="<?php echo e($patient->id); ?>">
                                <i class="fa-solid fa-file-lines"></i>
                            </button> -->
                            <div class="dropdown dropstart">
                                <button type="button" class="btn crud-btns" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" value="<?php echo e($patient->id); ?>">
                                    <i class="fa-solid fa-file-lines"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <button type="button" class="dropdown-item Patient_viewbtn" value="<?php echo e($patient->id); ?>">
                                            View Patient
                                        </button>
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('view_patient',[$doctor_info->id,$patient->id])); ?>">Open Profile</a></li>
                                </ul>
                            </div>
                            <button type="button" class="btn crud-btns Patient_editbtn <?php echo e("P_".$patient->id); ?>" value="<?php echo e($patient->id); ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn crud-btns delete-patient" data-pl-name="<?php echo e($patient->name); ?>" value="<?php echo e($patient->id); ?>">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <!-- <button class="btn crud-btns Patient_Edit" href="" value="<?php echo e($patient->id); ?>" >
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    </button> -->
                            <!--  -->
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

    </div>

    <!-- Admin Notice,Ad & Events start -->
    <div class="col-md-3 page-home">
        <?php echo $__env->make('doctor.include.docRightSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
</div>
<!-- Admin Notice,Ad & Events end -->

<!-- main end -->

<style>
    .image_view {
        width: 100px;
        height: 100px;
        cursor: pointer;
    }

    #FullImageView {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        text-align: center;
        z-index: 1200;
    }

    #FullImage {
        padding: 24px;
        max-width: 98%;
        max-height: 98%;
    }

    #CloseBtn {
        position: absolute;
        top: 12px;
        right: 12px;
        font-size: 2rem;
        color: white;
        cursor: pointer;
    }
</style>

<div id="FullImageView">
    <img id="FullImage" />
    <span id="CloseBtn" onclick="FullViewClose()">&times;</span>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-modals'); ?>
<!-- Modal For Patient VIEW -->
<div class="modal fade " id="Patient_View" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    View Patient Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body" id="view_patient_info">

            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Patient update -->
<div class="modal fade " id="Patient_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header my-auto  align-items-center justify-content-between">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Edit Patient Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('update_patient_list')); ?>" method="POST" enctype="multipart/form-data" id="UpdatePatientFromList">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="doctor_id" value="<?php echo e($doctor_info->id); ?>" />
                    <input type="hidden" name="patient_id" id="patient_id" value="" />
                    <div class="modal-body py-0">

                        <div class="row">
                            <div class="col-4">
                                <div class="mb-2">
                                    <label for=" ">ID</label>
                                    <input type="number" name="p_id" class="form-control" id="p_id" placeholder="Enter Patient ID" value="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-2">
                                    <label for="mobile"> Mobile No.</label>
                                    <input type="number" name="mobile" class="form-control custom-form-control" placeholder="Mobile No" id="mobile" value="">
                                    <span class="text-danger mobile_error"></span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-2">
                                    <label for="mName">Type</label>
                                    <select class="form-select" name="mobile_type" id="mobile_type" aria-label="Mobile Type" value="">
                                        <?php $__currentLoopData = $m_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($m_type->id); ?>"><?php echo e($m_type->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <span class="text-danger mobile_type_error"></span>
                            </div>
                            <div class="col-8">
                                <div class="mb-2">
                                    <label for="name"> Name</label>
                                    <input type="name" name="name" id="name" class="form-control custom-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" value="">
                                    <span class="text-danger name_error"></span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-2">
                                    <label for="date"> Date of Birth</label>
                                    <input class="form-control custom-form-control dob" name="date" type="date" placeholder="Date of Birth" value="" id="date">
                                    <span class="text-danger date_error"></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-2">
                                    <label for="age"> Age</label>
                                    <input type="number" name="age" id="age" class="form-control custom-form-control age" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Age" value="" readonly>
                                    <span class="text-danger age_error"></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-2">
                                    <label for="gender"> Gender</label>
                                    <input type="text" name="gender" class="form-control custom-form-control" id="gender" aria-describedby="emailHelp" placeholder="Gender" value="">
                                    <span class="text-danger gender_error"></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-2">

                                    <label for="Blood_group"> Blood Group</label>
                                    <input type="text" name="Blood_group" id="Blood_group" class="form-control custom-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Blood Group" value="">
                                    <span class="text-danger Blood_group_error"></span>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="mb-2">
                                    <label for="occupation"> Occupation</label>
                                    <input type="text" class="form-control custom-form-control" name="occupation" id="occupation" placeholder="Occupation" value="">
                                    <span class="text-danger occupation_error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="address"> Address</label>
                            <input type="address" class="form-control custom-form-control" name="address" placeholder="Address" value="" id="address">
                            <span class="text-danger address_error"></span>
                        </div>

                        <div class="">
                            <label for="email"> Email</label>
                            <input type="email" name="email" class="form-control custom-form-control" id="email" aria-describedby="emailHelp" placeholder="Email address" value="">
                            <span class="text-danger email_error"></span>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-6 my-2">
                                <label for="formFile" class="form-label text-dark">
                                    Drop your image <span class="text-danger" style="font-size:12px ;">*If You Want To Change Profile Picture</span>
                                </label>
                                <input class="form-control" name="image" type="file">
                                <span class="text-danger image_error"></span>
                            </div>
                            <div id="img_show" class="col-6 mt-2">
                                <img src="" class="mt-2" style="width: 70px; height: 70px;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer py-0">
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

<!-- Modal For Delete Patient -->
<div class="modal fade " id="del-Patient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Delete Patient Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('delete_patient_list')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete <span class="text-dark" id="del-pl-name"></span> information?</h5>
                    </div>
                    <input type="hidden" id="del-patient-id" name="deletingId">
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

<?php $__env->stopPush(); ?>

<?php $__env->startPush('page-js'); ?>

<script>
    $(document).ready(function() {

        $(document).on('click', '.Patient_viewbtn', function() {
            var Patient_id = $(this).val();
            // alert(Patient_id);
            var url = "<?php echo e(route('edit_patient_list',[':Patient_id'])); ?>";
            url = url.replace(':Patient_id', Patient_id);

            $("#Patient_View").modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    // console.log(response.patient_infos);
                    $('#view_patient_info').html("");
                    $('#view_patient_info').append('\
                            <p>Patent ID: <span>' + response.patient_infos.patient_id + '</span></p>\
                            <p>Name: <span>' + response.patient_infos.name + '</span></p>\
                            <p>Age: <span>' + response.patient_infos.age + '</span></p>\
                            <p>Email: <span>' + response.patient_infos.email + '</span></p>\
                            <p>Mobile: <span>' + response.patient_infos.mobile + '</span></p>\
                            <p>Gender: <span>' + response.patient_infos.gender + '</span></p>\
                            <p>Blood Group: <span>' + response.patient_infos.Blood_group + '</span></p>\
                            <p>Birth Date: <span>' + response.patient_infos.date + '</span></p>\
                            <p>Occupation: <span>' + response.patient_infos.occupation + '</span></p>\
                            <p>Address: <span>' + response.patient_infos.address + '</span></p>\
                            <p class="d-flex align-items-center">Profile Picture: \
                                <img class="image_view ms-5 full_view" src="/public/uploads/patient/' + response.patient_infos.image + '">\
                            </p>\
                        ');
                }
            });

        });

        $(document).on('change', '.dob', function() {
            var dob = $(this).val();
            let url = "<?php echo e(route('patient_age',[':dob'])); ?>";
            url = url.replace(':dob', dob);
            $.ajax({
                type: 'GET',
                url: url,
                success: function(response) {
                    $('.age').val(response.p_dob);
                }
            });
        });

        $(document).on('click', '.Patient_editbtn', function() {
            var Patient_id = $(this).val();
            // alert(Patient_id);
            var url = "<?php echo e(route('edit_patient_list',[':Patient_id'])); ?>";
            url = url.replace(':Patient_id', Patient_id);
            $("#Patient_Update").modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    // console.log(response.patient_infos);
                    $('#patient_id').val(Patient_id);
                    $('#p_id').val(response.patient_infos.patient_id);
                    $('#mobile').val(response.patient_infos.mobile);
                    $('#mobile_type').val(response.patient_infos.mobile_type);
                    $('#name').val(response.patient_infos.name);
                    $('#age').val(response.patient_infos.age);
                    $('#gender').val(response.patient_infos.gender);
                    $('#Blood_group').val(response.patient_infos.Blood_group);
                    $('#date').val(response.patient_infos.date);
                    $('#occupation').val(response.patient_infos.occupation);
                    $('#address').val(response.patient_infos.address);
                    $('#email').val(response.patient_infos.email);
                    $('#img_show').html("");
                    $('#img_show').append('\
                        <p class="d-flex align-items-center">Profile Picture:\
                            <img class="image_view ms-5 full_view" src="/../public/uploads/patient/' + response.patient_infos.image + '"> \
                         </p>\
                        ');
                }
            });
        });

        $(document).on('submit', '#UpdatePatientFromList', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            // alert(url);

            // alert(formData);
            $.ajax({
                url: url,
                type: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#Patient_Update').load(location.href + " #Patient_Update>*", "");
                        $('.p_list').load(location.href + " .p_list>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#Patient_Update').modal('hide');
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                        $('.P_' + data.id).click();
                    }
                },
            });
        });

        $(document).on('click', '.delete-patient', function() {
            var deletePatientId = $(this).val();
            let deleteName = $(this).attr('data-pl-name');
            // alert(deletePatientId);
            $("#del-Patient").modal('show');
            $('#del-patient-id').val(deletePatientId);
            $('#del-pl-name').text(deleteName);
        });

    });
</script>

<script>
    function FullView(ImgLink) {
        document.getElementById("FullImage").src = ImgLink;
        document.getElementById("FullImageView").style.display = "block";
    }

    function FullViewClose() {
        document.getElementById("FullImageView").style.display = "none";
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('master.doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex\resources\views/doctor/patient_list.blade.php ENDPATH**/ ?>