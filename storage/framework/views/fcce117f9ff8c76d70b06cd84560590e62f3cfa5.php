<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between aling-items-center">
        <span class="fs-4">Notice List</span>
        <a class="crud-btns me-2 add_medicine" href="" data-bs-toggle="modal" data-bs-target="#Notice_Add">
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>
    <!-- Medicine List-->
    <table class="table table-bordered mt-2 text-center align-middle">
        <thead>
        <tr>
            <th class="">Serial No</th>
            <th class="">Notice Title</th>
            <th class="">Notice Description</th>
            <th class="">Notice Status</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($key + 1); ?></td>
                <td><?php echo e($notice->title); ?></td>
                <td><?php echo e($notice->description); ?></td>
                <td>
                    <?php if($notice->status == 0): ?>
                        <a href="<?php echo e(route('notice_status',[$notice->id])); ?>"
                           class="btn btn-sm btn-danger my-0">Inactive</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('notice_status',[$notice->id])); ?>"
                           class="btn btn-sm btn-success my-0">Active</a>
                    <?php endif; ?>
                </td>
                <td>
                    <button class="btn crud-btns Notice_editbtn" value="<?php echo e($notice->id); ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="btn crud-btns Notice_delete" value="<?php echo e($notice->id); ?>">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <!--Medicine list end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>
    <!-- Modal For Add Notice -->
    <div class="modal fade " id="Notice_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Add Notice
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('notice_add')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="mb-3">
                                <input class="form-control" placeholder="Enter Title Of Notice" name="title">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" name="description" rows="3"
                                          placeholder="Enter Notice Description"></textarea>
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
    <div class="modal fade " id="Notice_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Update Notice
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('notice_update')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="modal-body">
                            <div class="mb-3">
                                <input class="form-control" placeholder="Enter Title Of Notice" name="title" id="title">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" name="description" id="description" rows="3"
                                          placeholder="Enter Notice Description"></textarea>
                            </div>
                            <input type="hidden" class="form-control" name="notice_id" id="notice_id" value="">
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
    <div class="modal fade " id="Notice_Delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Delete Notice
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('notice_delete')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This Notice?</h5>
                        </div>
                        <input type="hidden" id="del-Notice-id" name="deletingId">
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
            //script for Notice Update
            $(document).on('click', '.Notice_editbtn', function () {
                var notice_id = $(this).val();
                var url = "<?php echo e(route('notice_edit',[':id'])); ?>";
                url = url.replace(':id', notice_id);
                // alert(notice_id);
                $("#Notice_Update").modal('show');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        // console.log(response.notice);
                        $('#notice_id').val(notice_id);
                        $('#title').val(response.notice.title);
                        $('#description').val(response.notice.description);
                    }
                });
            });

            // script for Notice delete
            $(document).on('click', '.Notice_delete', function () {
                var deleteNoticeId = $(this).val();
                // alert(deleteNoticeId);
                $("#Notice_Delete").modal('show');
                $('#del-Notice-id').val(deleteNoticeId);
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.doctor.admin_doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/reflexdn/public_html/resources/views/admin/doctor/layout/notice_list.blade.php ENDPATH**/ ?>