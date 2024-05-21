<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between aling-items-center">
        <span class="fs-4">Mobile Type List</span>
        <a class="crud-btns me-2 add_medicine" href="" data-bs-toggle="modal" data-bs-target="#MobileType_Add">
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>
    <!-- Medicine List-->
    <table class="table table-bordered mt-2 text-center align-middle MT_list">
        <thead>
        <tr>
            <th class="">#</th>
            <th class="">Name</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $mobile_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$mobile_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($key + 1); ?></td>
                <td><?php echo e($mobile_type->name); ?></td>
                <td>
                    <button class="btn crud-btns m_type_editbtn <?php echo e("MT_".$mobile_type->id); ?>" value="<?php echo e($mobile_type->id); ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <?php if($mobile_type->status == 1): ?>
                    <button class="btn crud-btns m_type_delete" value="<?php echo e($mobile_type->id); ?>">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <!--Medicine list end -->
    <?php echo e($mobile_types ->links()); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>
    <!-- Modal For Add Notice -->
    <div class="modal fade " id="MobileType_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Add MobileType
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('mobileType_add')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="mb-3">
                                <input class="form-control" placeholder="Enter Type Name" name="typeName">
                                <span class="text-danger"><?php $__errorArgs = ['typeName'];
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
                            <button type="submit" class="btn btn-sm btn-outline-blue-grey">Confirm</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Modal For Update Notice -->
    <div class="modal fade " id="MType_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Update Mobile Type
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('update_mobile_type')); ?>" method="post" id="MT_UpdateForm">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="modal-body">
                            <div class="mb-3">
                                <input class="form-control" placeholder="Enter Type Name" name="u_typeName" id="u_typeName">
                                <span class="text-danger u_typeName_error"></span>
                            </div>
                            <input type="hidden" class="form-control" name="mType_id" id="mType_id" value="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-sm btn-outline-blue-grey">Confirm</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Modal For Delete Notice -->
    <div class="modal fade " id="MobileType_Delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Delete Mobile Type
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('mobile_type_delete')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This Mobile Type?</h5>
                        </div>
                        <input type="hidden" id="del-mType-id" name="deletingId">
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close
                            </button>
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

            <?php if(Session::has('invalidMTAdd') && count($errors) > 0): ?>
            $('#MobileType_Add').modal('show');
            <?php endif; ?>

            //script for Notice Update
            $(document).on('click', '.m_type_editbtn', function () {
                var mType_id = $(this).val();
                var url = "<?php echo e(route('edit_mobile_type',[':id'])); ?>";
                url = url.replace(':id', mType_id);
                // alert(mType_id);
                $("#MType_Update").modal('show');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        // console.log(response.notice);
                        $('#mType_id').val(mType_id);
                        $('#u_typeName').val(response.mt.name);
                    }
                });
            });

            $(document).on('submit', '#MT_UpdateForm', function (e) {
                e.preventDefault();

                var url = $(this).attr('action');
                // alert(url);

                var registerForm = $("#MT_UpdateForm");
                var formData = registerForm.serialize();

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        // console.log(data);
                        if (data.status == 200) {
                            $('#MType_Update').load(location.href + " #MType_Update>*", "");
                            $('.MT_list').load(location.href + " .MT_list>*", "");
                            $(document).sami_Toast_Append({
                                cus_toast_time: 3000,
                                cus_toast_msg: data.msg
                            });

                            $('#MType_Update').modal('hide');
                        } else {
                            $.each(data.error, function (key, value) {
                                $('.' + key + '_error').text(value);
                            });
                            $('.MT_' + data.id).click();
                        }
                    },
                });
            });

            // script for Notice delete
            $(document).on('click', '.m_type_delete', function () {
                var deletemTypeId = $(this).val();
                // alert(deletemTypeId);
                $("#MobileType_Delete").modal('show');
                $('#del-mType-id').val(deletemTypeId);
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.doctor.admin_doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex\resources\views/admin/doctor/layout/mobile_type.blade.php ENDPATH**/ ?>