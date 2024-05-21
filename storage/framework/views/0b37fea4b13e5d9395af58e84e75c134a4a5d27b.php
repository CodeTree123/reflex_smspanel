<?php $__env->startSection('content'); ?>

<?php
$subscription = subscription();
$sub_remain = sub_remain();
$notices = notices();
$total_cost = total_cost();
$total_paid = total_paid();
$total_due = total_due();
?>

<?php $__env->startPush('page-css'); ?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

<?php $__env->stopPush(); ?>

<!-- body -->
<!-- body part 1 -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 pe-0">
            <?php echo $__env->make('doctor.include.docLeftSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <!-- body part 1 end-->
        <!-- body part 2 -->

        <div class="col-md-7 pe-0">
            <div class="blank-sec">
                <div class="d-flex justify-content-between align-items-center p-2">
                    <h4>Appointment List</h4>
                    <button class="btn btn-outline-blue-grey crud-btns Appointment" value="" data-bs-toggle="modal" data-bs-target="#Appointment_form">
                        <!-- <i class="fa-solid fa-pen-to-square"></i> -->
                        Set Appointment
                    </button>
                </div>

                <div class="p-2 mt-3" id="calendar">

                </div>







                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                





































            </div>
        </div>
        <!-- body part 2 end -->
        <!-- body part 3 -->

        <!-- Admin Notice,Ad & Events start -->
        <div class="col-md-3 page-home">

            <div class="info-box-col mb-3">
                <?php echo $__env->make('doctor.include.docRightSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <!-- body part 3 end -->

        </div>
    </div>
    <!-- body end-->

    <?php $__env->startPush('page-modals'); ?>

    <!-- Modal For Appointment -->
    <div class="modal fade " id="Appointment_List" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Appointment For <span id="app_date"></span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <table class="table table-bordered mt-2 text-center align-middle">
                        <thead>
                            <tr>
                                <th class="">Image</th>
                                <th class="">Name</th>
                                <th class="">Contact</th>
                                <th class="">Time</th>
                                <th class="">Action</th>
                            </tr>
                        </thead>
                        <tbody id="app_list_tbl">

                        </tbody>
                    </table>

                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Modal For Appointment -->
    <div class="modal fade " id="Appointment_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Add Appointment
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('appointment')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="modal-body">
                            <input type="hidden" id="d_id" value="<?php echo e($doctor_info->id); ?>" name="d_id">
                            <input type="hidden" id="p_id" value="" name="p_id">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <select class="form-control custom-form-control multi" id="phone" name="" aria-label="Default select example" style="width:100%;">
                                    <option value="">Nothing To Select</option>
                                    <?php $__currentLoopData = $patient_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t_p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($t_p->id); ?>"><?php echo e($t_p->mobile." (".$t_p->m_type->name.")"); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" min="<?php echo e(date('Y-m-d')); ?>" max="<?php echo e(\Carbon\Carbon::now()->addDays(365)->format('Y-m-d')); ?>">
                                <span class="text-danger"><?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="time" class="form-label">Time</label>
                                <input type="time" class="form-control" id="time" name="time">
                                <span class="text-danger"><?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>
                            
                            
                            
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-sm btn-outline-blue-grey">Appointment</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->
    <!-- Modal For Edit Appointment -->
    <div class="modal fade " id="Appointment_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Edit Appointment
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('update_appointment')); ?>" method="post" id="UpdateAppForm">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="modal-body">
                            <input type="hidden" id="appointment_id" value="" name="appointment_id">
                            <div class="mb-3">
                                <label for="e_phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="e_phone" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="e_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="e_name" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="e_date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="e_date" name="date" min="<?php echo e(date('Y-m-d')); ?>" max="<?php echo e(\Carbon\Carbon::now()->addDays(5)->format('Y-m-d')); ?>">
                                <span class="text-danger date_error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="e_time" class="form-label">Time</label>
                                <input type="time" class="form-control" id="e_time" name="time">
                                <span class="text-danger time_error"></span>
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

    <!-- Modal For Delete Appointment -->
    <div class="modal fade " id="del-Appointment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Delete Appointment Information
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('delete_appointment')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                        </div>
                        <input type="hidden" id="del-Appointment-id" name="deletingId">
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

    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('page-js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <script>
        $(document).ready(function() {
            var appointments = <?php echo json_encode($events, 15, 512) ?>;
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek',
                },
                events: appointments,
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDays) {
                    var select_date = moment(start).format('YYYY-MM-DD');
                    var url = "<?php echo e(route('view_appointment',[':select_date'])); ?>";
                    url = url.replace(':select_date', select_date);
                    $.ajax({
                        url:url,
                        type:"GET",
                        success:function(response) {
                            // console.log(response.app_list);
                            $('#Appointment_List').modal('show');

                            $('#app_date').text(response.date);

                            $('#app_list_tbl').html("");
                            $.each(response.app_list, function( index, value ) {
                                $('#app_list_tbl').append('\
                                    <tr>\
                                        <td><img src="/../public/uploads/patient/'+ value.image+'" alt="" width="50px" height="50px"> </td>\
                                        <td>'+value.name+'</td>\
                                        <td>'+value.mobile+'</td>\
                                        <td>'+value.time+'</td>\
                                        <td>\
                                            <button class="btn btn-sm crud-btns app_editbtn App_'+value.id+'" value="'+value.id+'">\
                                                <i class="fa-solid fa-pen-to-square"></i>\
                                            </button>\
                                            <button class="btn btn-sm crud-btns delete-appointment" value="'+value.id+'">\
                                                <i class="fa-solid fa-trash"></i>\
                                            </button>\
                                        </td>\
                                    </tr>\
                                ');
                            });
                        }
                    });
                }


            });

            $('.fc-event').css('font-size', '20px');
            $('.fc-event').css('text-align', 'center');

            $(".multi").select2({
                dropdownParent: $("#Appointment_form")
            });

            <?php if(Session::has('invalidAppAdd') && count($errors) > 0): ?>
            $('#Appointment_form').modal('show');
            <?php endif; ?>

            $('#phone').change(function() {
                var id = $(this).val();
                // alert(id);
                var d_id = $('#d_id').val();
                var url = "<?php echo e(route('get_patient_info',[':d_id',':id'])); ?>";
                url = url.replace(':d_id', d_id);
                url = url.replace(':id', id);
                // console.log(url);
                //  alert(d_id);
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(response) {
                        $('#p_id').val(response.p_info.id)
                        $('#name').val(response.p_info.name);
                    }
                });

            });

            $(document).on('click', '.app_editbtn', function() {
                var app_id = $(this).val();
                $("#Appointment_List").modal('hide');
                var url = "<?php echo e(route('edit_appointment',[':app_id'])); ?>";
                url = url.replace(':app_id', app_id);
                // alert(app_id);
                $("#Appointment_edit").modal('show');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(response) {
                        // console.log(response.f_date);
                        $('#appointment_id').val(app_id);
                        $('#e_phone').val(response.app.mobile);
                        $('#e_name').val(response.app.name);
                        $('#e_date').val(response.f_date);
                        $('#e_time').val(response.f_time);
                    }
                });
            });

            // $(document).on('submit', '#UpdateAppForm', function(e) {
            //     e.preventDefault();
            //
            //     var url = $(this).attr('action');
            //     // alert(url);
            //
            //     var registerForm = $("#UpdateAppForm");
            //     var formData = registerForm.serialize();
            //
            //     $.ajax({
            //         url: url,
            //         type: 'POST',
            //         data: formData,
            //         success: function(data) {
            //             // console.log(data);
            //             if (data.status == 200) {
            //                 $('#Appointment_edit').load(location.href + " #Appointment_edit>*", "");
            //                 $('.App_list').load(location.href + " .App_list>*", "");
            //                 $(document).sami_Toast_Append({
            //                     cus_toast_time: 3000,
            //                     cus_toast_msg: data.msg
            //                 });
            //
            //                 $('#Appointment_edit').modal('hide');
            //                 $("#Appointment_List").modal('show');
            //             } else {
            //                 $.each(data.error, function(key, value) {
            //                     $('.' + key + '_error').text(value);
            //                 });
            //                 $('.App_' + data.id).click();
            //             }
            //         },
            //     });
            // });

            $(document).on('click', '.delete-appointment', function() {
                var deleteDoctorId = $(this).val();
                // alert(deleteCCId);
                $("#del-Appointment").modal('show');
                $("#Appointment_List").modal('hide');
                $('#del-Appointment-id').val(deleteDoctorId);
            });
        });
    </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('master.doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/reflexdn/public_html/resources/views/doctor/appointment.blade.php ENDPATH**/ ?>