<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center">
        <?php if($post_type == 4): ?>
        <span class="fs-4">Case Studies List</span>
        <?php elseif($post_type == 3): ?>
        <span class="fs-4">Product Review List</span>
        <?php elseif($post_type == 2): ?>
        <span class="fs-4">Article List</span>
        <?php else: ?>
        <span class="fs-4">Normal Post List</span>
        <?php endif; ?>



    </div>
    <!-- C/C Supplier List-->
    <table class="table table-bordered mt-2 text-center align-middle">
        <thead>
        <tr>
            <th class="">#</th>
            <th class="">Doctor Name</th>
            <?php if($post_type != 1): ?>
            <th class="">Post Title</th>
            <?php else: ?>
            <th class="">Post</th>
            <?php endif; ?>
            <th class="">Post Views</th>
            <th class="">Post likes</th>
            <th class="">Post Comments</th>
            <th class="">Status</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td class="p-0"><?php echo e($key+1); ?></td>
                <td class="p-0"><?php echo e($post->doc_post->fname." ".$post->doc_post->lname); ?></td>
                <?php if($post->post_type != 1): ?>
                <td class="p-0"><?php echo e($post->post_title); ?></td>
                <?php else: ?>
                <td class="p-0"><?php echo e($post->description); ?></td>
                <?php endif; ?>
                <td class="p-0"><?php echo e($post->view_count); ?></td>
                <td class="p-0"><?php echo e($post->likes_count); ?></td>
                <td class="p-0"><?php echo e($post->comments_count); ?></td>
                <td>
                    <?php if($post->showStatus == 0): ?>
                        <p class="text-danger mb-0">Hidden</p>
                    <?php else: ?>
                        <p class="text-success mb-0">Visible</p>
                    <?php endif; ?>
                </td>
                <td class="d-flex justify-content-around p-0">
                    <a href="<?php echo e(route('forum_post_view',[$post->id])); ?>" class="btn btn-sm rounded my-1 d-flex align-items-center"><i class="fa-solid fa-file fa-lg"></i></a>
                    <?php if($post->showStatus == 0): ?>
                    <a href="<?php echo e(route('forum_post_status',[$post->id])); ?>" class="btn btn-sm rounded btn-success my-1 d-flex align-items-center"><i class="fa-solid fa-eye"></i></a>
                    <?php else: ?>
                    <a href="<?php echo e(route('forum_post_status',[$post->id])); ?>" class="btn btn-sm rounded btn-danger my-1 d-flex align-items-center"><i class="fa-solid fa-eye-slash"></i></a>
                    <?php endif; ?>
                    <button class="btn crud-btns delete-post" value="<?php echo e($post->id); ?>">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <?php if($post_type != 1): ?>
                <td colspan="8">No Post Added Yet In This Section.</td>
                <?php else: ?>
                <td colspan="7">No Post Added Yet In This Section.</td>
                <?php endif; ?>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <?php echo e($posts ->links()); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>

    <!-- Modal For Delete Supplier -->
    <div class="modal fade " id="del-post" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Delete Post
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('forum_post_delete')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete Post information?</h5>
                        </div>
                        <input type="hidden" id="del-post-id" name="deletingId">
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
            <?php if(Session::has('invalidSupplierAdd') && count($errors) > 0): ?>
            $('#supplier_Add').modal('show');
            <?php endif; ?>

            $(document).on('click', '.delete-post', function () {
                var deleteReportId = $(this).val();

                $("#del-post").modal('show');
                $('#del-post-id').val(deleteReportId);
            });

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.other.admin_other_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/reflexdn/public_html/resources/views/admin/other/layout/forum_post_list.blade.php ENDPATH**/ ?>