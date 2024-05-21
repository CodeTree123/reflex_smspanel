<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center">
        <span class="fs-4">Event List</span>
        <a class="crud-btns" data-bs-toggle="modal" data-bs-target="#CreatePostModal">
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>
    <!-- C/C Supplier List-->
    <table class="table table-bordered mt-2 text-center align-middle">
        <thead>
        <tr>
            <th class="">#</th>
            <th class="">Doctor Name</th>
            <th class="">Event Title</th>
            <th class="">Event Location</th>
            <th class="">Event Date & Time</th>
            <th class="">Event Response</th>
            <th class="">Status</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td class="p-0"><?php echo e($key+1); ?></td>
                <td class="p-0"><?php echo e($event->doc_event->fname." ".$event->doc_event->lname); ?></td>
                <td class="p-0"><?php echo e($event->eventTitle); ?></td>
                <td class="p-0"><?php echo e($event->location); ?></td>
                <td class="p-0"><?php echo e(\Carbon\Carbon::parse($event->eventDate)->format('d/M/Y') ." (". \Carbon\Carbon::parse($event->eventDate)->isoFormat('dddd') .") ". \Carbon\Carbon::parse($event->eventTime)->format('h:i a')); ?></td>
                <td class="p-0 d-flex flex-column">
                    <?php
                        $go = App\Models\forum_event_response::where('event_id', $event->id)->where('status',1)->count();
                        $notgo = App\Models\forum_event_response::where('event_id', $event->id)->where('status',2)->count();
                        $maybe = App\Models\forum_event_response::where('event_id', $event->id)->where('status',3)->count();
                    ?>
                    <p>Going (<?php echo e($go); ?>)</p>
                    <p>Maybe (<?php echo e($maybe); ?>)</p>
                    <p>Not Going (<?php echo e($notgo); ?>)</p>
                </td>
                <td>
                    <?php if($event->status == 0): ?>
                        <p class="text-danger mb-0">Rejected</p>
                    <?php else: ?>
                        <p class="text-success mb-0">Allowed</p>
                    <?php endif; ?>
                </td>
                <td class=" p-0">
                    <div class="d-flex justify-content-around">
                        <a href="<?php echo e(route('forum_event_view',[$event->id])); ?>" class="btn btn-sm rounded my-1 d-flex align-items-center"><i class="fa-solid fa-file fa-lg"></i></a>
                        <?php if($event->status == 0): ?>
                            <a href="<?php echo e(route('forum_event_status',[$event->id])); ?>" class="btn btn-sm rounded btn-success my-1 d-flex align-items-center">
                                <i class="fa-solid fa-check"></i>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('forum_event_status',[$event->id])); ?>" class="btn btn-sm rounded btn-danger my-1 d-flex align-items-center">
                                <i class="fa-solid fa-xmark"></i>
                            </a>
                        <?php endif; ?>
                        <button class="btn crud-btns delete-event" value="<?php echo e($event->id); ?>">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="8">No Event Added Yet In This Section.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <?php echo e($events ->links()); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>

    <!-- Modal Add Event -->
    <div class="modal fade" id="CreatePostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mb-0" id="exampleModalLabel">Add Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('add_event')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="author_role" value="1">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="eventTitle" class="form-label">Event Title</label>
                            <input type="text" class="form-control" id="eventTitle" placeholder="Event Title" name="eventTitle">
                            <span class="text-danger"><?php $__errorArgs = ['eventTitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        </div>
                        <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, voluptatum! Modi eos dolor aspernatur magni, molestiae assumenda in quas deleniti? -->
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <textarea class="form-control" id="location" rows="2" name="location" placeholder="Add Location"></textarea>
                            <span class="text-danger"><?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="eventDate" class="form-label">Date</label>
                                <input type="date" class="form-control" id="eventDate" name="eventDate">
                                <span class="text-danger"><?php $__errorArgs = ['eventDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="eventTime" class="form-label">Time</label>
                                <input type="time" class="form-control" id="eventTime" name="eventTime">
                                <span class="text-danger"><?php $__errorArgs = ['eventTime'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="5" name="description" placeholder="Description"></textarea>
                            <span class="text-danger"><?php $__errorArgs = ['description'];
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Model -->

    <!-- Modal For Delete Supplier -->
    <div class="modal fade " id="del-event" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Delete Event
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('forum_event_delete')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete Post information?</h5>
                        </div>
                        <input type="hidden" id="del-event-id" name="deletingId">
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
            <?php if(Session::has('invalideventAdd') && count($errors) > 0): ?>
            $('#CreatePostModal').modal('show');
            <?php endif; ?>

            $(document).on('click', '.delete-event', function () {
                var deleteReportId = $(this).val();

                $("#del-event").modal('show');
                $('#del-event-id').val(deleteReportId);
            });

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.other.admin_other_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/reflexdn/public_html/resources/views/admin/other/layout/forum_event_list.blade.php ENDPATH**/ ?>