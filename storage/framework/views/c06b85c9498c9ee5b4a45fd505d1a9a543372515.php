<?php $__env->startPush('page-css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="blank-sec p-0">
    <div class="row align-items-center p-3">
        <div class="col-2">
            <a href="<?php echo e(route('doctor')); ?>">
                <?php if(auth()->user()->p_image == null): ?>
                <img src="<?php echo e(asset('assets/img/profile.png')); ?>" class="img-fluid rounded-circle" width="50">
                <?php else: ?>
                <img src="<?php echo e(asset('public/uploads/doctor/profile/'.auth()->user()->p_image)); ?>" class=" rounded-circle" width="50" height="50">
                <?php endif; ?>
            </a>
        </div>
        <div class="col-7">
            <input type="text" class="form-control" id="add_case_field" placeholder="Let's Share Your Completed Case Studies" readonly>
        </div>
        <div class="col-3 text-center">
            <button type="button" class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#CreatePostModal">Case Studies</button>
        </div>
    </div>
</div>

<div class="scrolling-pagination">
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="blank-sec p-0">
        <div class="row align-items-center p-3">
            <div class="col-12 mb-auto">
                <div class="d-flex justify-content-between">
                    <div class="d-flex my-2">
                        <div class="mx-1">
                            <?php if($post->doc_post->p_image == null): ?>
                            <img src="<?php echo e(asset('assets/img/profile.png')); ?>" class="img-fluid rounded-circle" width="50">
                            <?php else: ?>
                            <img src="<?php echo e(asset('public/uploads/doctor/profile/'.$post->doc_post->p_image)); ?>" class=" rounded-circle" width="50" height="50">
                            <?php endif; ?>
                        </div>
                        <div class="ms-2">
                            <p class="post_user_name"><?php echo e($post->doc_post->fname . " " . $post->doc_post->lname); ?></p>
                            <p class="post_time"><?php echo e(\Carbon\Carbon::parse($post->created_at)->diffForHumans()); ?></p>
                        </div>
                    </div>
                    <?php if($post->post_Fav->contains('u_id',auth()->user()->id)): ?>
                    <a href="<?php echo e(route('forum_post_unfav',[$post->id,auth()->user()->id])); ?>" class="bg-light-grey p-2 rounded-circle text-center mt-1 favourite_icon">
                        <i class="fa-solid fa-heart"></i>
                        <!-- <i class="fa-regular fa-heart"></i> -->
                    </a>
                    <?php else: ?>
                    <a href="<?php echo e(route('forum_post_fav',[$post->id,auth()->user()->id])); ?>" class="bg-light-grey p-2 rounded-circle text-center mt-1 favourite_icon">
                        <!-- <i class="fa-solid fa-heart"></i> -->
                        <i class="fa-regular fa-heart"></i>
                    </a>
                    <?php endif; ?>
                </div>

                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="row ">
                            <div class="col-3 d-flex justify-content-center p-2">
                                <?php
                                $array = explode(',',$post->post_main);
                                $reports = App\Models\report::where('d_id',$post->u_doc_id)->where('p_id',$array[0])->where('treatment_id',$array[1])->orderBy('id','desc')->take(2)->get();
                                ?>

                                <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img src="<?php echo e(asset('public/uploads/report/'.$report->image)); ?>" alt="" width="80px" height="80px">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="col-9">
                                <div class="border-top border-bottom">
                                    <div class="mx-2 mt-2">
                                        <p class="post_title"><?php echo e($post->post_title); ?></p>
                                    </div>
                                    <div class="m-2 ms-0 me-0">
                                        <p class="mx-2 text-break">
                                            <?php echo e(Str::limit($post->description,220)); ?>

                                            <a href="<?php echo e(route('post_view',$post->id)); ?>" class="fst-italic fw-bold">See More</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="mx-3">
                                <p><?php echo e($post->view_count); ?> Views</p>
                            </div>
                            <?php if($post->post_Like->contains('u_id',auth()->user()->id)): ?>
                            <a href="<?php echo e(route('forum_post_dislike',[$post->id,auth()->user()->id])); ?>" class="m-0 ms-3 d-flex  align-items-center btn btn-sm me-3">
                                <i class="fa-solid fa-lg fa-thumbs-up me-2"></i>
                                <!-- <i class="fa-regular fa-lg fa-thumbs-up me-2"></i> -->
                                <p class="ms-2"><?php echo e($post->likes_count); ?> Likes</p>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo e(route('forum_post_like',[$post->id,auth()->user()->id])); ?>" class="m-0 ms-3 d-flex  align-items-center btn btn-sm me-3">
                                <!-- <i class="fa-solid fa-lg fa-thumbs-up me-2"></i> -->
                                <i class="fa-regular fa-lg fa-thumbs-up me-2"></i>
                                <p class="ms-2"><?php echo e($post->likes_count); ?> Likes</p>
                            </a>
                            <?php endif; ?>
                            <a class="m-0 d-flex  align-items-center btn btn-sm ms-3">
                                <i class="fa-solid fa-lg fa-comments me-2"></i>
                                <p class="ms-2"><?php echo e($post->comments_count); ?> comments</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo e($posts->links()); ?>

</div>

<!-- <div class="blank-sec p-0">
    <div class="row align-items-center p-3">
        <div class="col-3">
            <img src="<?php echo e(asset('assets/img/Logo.png')); ?>" class="img-fluid rounded shadow" width="100">
        </div>
        <div class="col-9 mb-auto">
            <div class="d-flex justify-content-between">
                <div>
                    <p>Re-RCT of Upper Right first Molar Tooth2</p>
                </div>
                <div class="bg-light-grey p-2 rounded-circle">
                    <i class="fa-solid fa-heart"></i>

                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-4">
                    <div class="d-flex my-2">
                        <div class="mx-1">
                            <img src="<?php echo e(asset('assets/img/profile.png')); ?>" class="img-fluid rounded-circle" width="50">
                        </div>
                        <div class="mx-1">
                            <p>Dr. Mizan <span class="fs-6"> &middot; </span></p>
                            <p>3 weeks Ago</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row justify-content-end">
                <div class="col-8">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p>651,324 Views</p>
                        </div>
                        <div>
                            <p>651,324 Likes</p>
                        </div>
                        <div>
                            <p>56 comments</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-modals'); ?>
<!-- Modal -->
<div class="modal fade" id="CreatePostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mb-0" id="exampleModalLabel">Add Article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="text-center">Add Case Studies From Treatment Plans Which Is Currently Done!</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Model -->
<?php $__env->stopPush(); ?>

<?php $__env->startPush('page-js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
<script>
    $(document).ready(function() {

        $('ul.pagination').hide();
        $('p.small').hide();
        $(function() {
            $('.scrolling-pagination').jscroll({
                autoTrigger: true,
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.scrolling-pagination',
                callback: function() {
                    $('ul.pagination').remove();
                    $('p.small').remove();

                }
            });
        });

        $(document).on('click', '#add_case_field', function() {
            $('#CreatePostModal').modal('show');
        });

    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('forum.forum_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/reflexdn/public_html/resources/views/forum/layouts/caseStudies.blade.php ENDPATH**/ ?>