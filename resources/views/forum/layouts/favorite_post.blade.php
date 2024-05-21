@extends('forum.forum_master')

@push('page-css')

@endpush

@section('content')

<div class="blank-sec p-0">
    <div class="row align-items-center p-3">
        <div class="col-2">
            <a href="{{route('doctor')}}">
                @if(auth()->user()->p_image == null)
                <img src="{{ asset('assets/img/profile.png')}}" class="img-fluid rounded-circle" width="50">
                @else
                <img src="{{ asset('public/uploads/doctor/profile/'.auth()->user()->p_image)}}" class=" rounded-circle" width="50" height="50">
                @endif
            </a>
        </div>
        <div class="col-7">
            <input type="text" name="" class="form-control" id="add_post_field" placeholder="Let's Share whats going on your mind" readonly>
        </div>
        <div class="col-3 text-center">
            <button type="button" class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#CreatePostModal">Create Post</button>
        </div>
    </div>
</div>

<div class="scrolling-pagination" id="favPost-data">

    {{--@include('forum.layouts.post.forum_favPostList')--}}
    @foreach($fav_posts as $post)
    <div class="blank-sec p-0">
        <div class="row align-items-center p-3">
            <div class="col-12 mb-auto">
                <div class="d-flex justify-content-between">
                    <div class="d-flex my-2">
                        <div class="mx-1">
                            @if($post->fav_post->doc_post->p_image == null)
                            <img src="{{ asset('assets/img/profile.png')}}" class="img-fluid rounded-circle" width="50">
                            @else
                            <img src="{{ asset('public/uploads/doctor/profile/'.$post->fav_post->doc_post->p_image)}}" class=" rounded-circle" width="50" height="50">
                            @endif
                        </div>
                        <div class="ms-2">
                            <p class="post_user_name">{{$post->fav_post->doc_post->fname . " " . $post->fav_post->doc_post->lname}}</p>
                            <p class="post_time">{{\Carbon\Carbon::parse($post->fav_post->created_at)->diffForHumans()}}</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <!-- <button class="btn bg-light-grey p-2 rounded-circle text-center mt-1 favourite_icon me-2 social_btn">
                            <i class="fa-regular fa-share-from-square align-top"></i>
                        </button> -->
                        @if($post->fav_post->post_Fav->contains('u_id',auth()->user()->id))
                        <a href="{{route('forum_post_unfav',[$post->post_id,auth()->user()->id])}}" class="bg-light-grey p-2 rounded-circle text-center mt-1 favourite_icon">
                            <i class="fa-solid fa-heart"></i>
                            <!-- <i class="fa-regular fa-heart"></i> -->
                        </a>
                        @else
                        <a href="{{route('forum_post_fav',[$post->post_id,auth()->user()->id])}}" class="bg-light-grey p-2 rounded-circle text-center mt-1 favourite_icon">
                            <!-- <i class="fa-solid fa-heart"></i> -->
                            <i class="fa-regular fa-heart"></i>
                        </a>
                        @endif
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="row ">
                            <div class="col-3 d-flex justify-content-center p-2">
                                <img src="{{ asset('assets/img/Logo.png')}}" class="img-fluid rounded shadow" width="100">
                            </div>
                            <div class="col-9">
                                <div class="border-top border-bottom">
                                    <div class="mx-2 mt-2">
                                        <p class="post_title">
                                            {{$post->fav_post->post_title}}
                                            @if ($post->fav_post->post_type == 4)
                                            <span class="post_type">(Case)</span>
                                            @elseif($post->fav_post->post_type == 3)
                                            <span class="post_type">(Review)</span>
                                            @elseif($post->fav_post->post_type == 2)
                                            <span class="post_type">(Article)</span>
                                            @else
                                            <span class="post_type"></span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="m-2 ms-0 me-0">
                                        <p class="mx-2 text-break">
                                            {{Str::limit($post->fav_post->description,220)}}
                                            <a href="{{route('post_view',$post->post_id)}}" class="fst-italic fw-bold">See More</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="mx-3">
                                <p>{{$post->fav_post->view_count}} Views</p>
                            </div>
                            @if($post->fav_post->post_Like->contains('u_id',auth()->user()->id))
                            <a href="{{route('forum_post_dislike',[$post->post_id,auth()->user()->id])}}" class="m-0 ms-3 d-flex  align-items-center btn btn-sm me-3">
                                <i class="fa-solid fa-lg fa-thumbs-up me-2"></i>
                                <!-- <i class="fa-regular fa-lg fa-thumbs-up me-2"></i> -->
                                <p class="ms-2">{{$post->fav_post->likes_count}} Likes</p>
                            </a>
                            @else
                            <a href="{{route('forum_post_like',[$post->post_id,auth()->user()->id])}}" class="m-0 ms-3 d-flex  align-items-center btn btn-sm me-3">
                                <!-- <i class="fa-solid fa-lg fa-thumbs-up me-2"></i> -->
                                <i class="fa-regular fa-lg fa-thumbs-up me-2"></i>
                                <p class="ms-2">{{$post->fav_post->likes_count}} Likes</p>
                            </a>
                            @endif
                            <a class="m-0 d-flex  align-items-center btn btn-sm ms-3">
                                <i class="fa-solid fa-lg fa-comments me-2"></i>
                                <p class="ms-2">{{$post->fav_post->comments_count}} comments</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{ $fav_posts->links() }}
</div>

<div class="ajax-load text-center pt-0 pb-5" style="display:none">
    <p><img src="{{asset('assets/img/giphy.gif')}}" width="50px">Loading</p>
</div>
@endsection

@push('page-modals')
<!-- Modal -->
<div class="modal fade" id="CreatePostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mb-0" id="exampleModalLabel">Add Forum Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('add_post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- <div class="mb-3">
                    <label for="postTitle" class="form-label">Post Title</label>
                    <input type="text" class="form-control" id="postTitle" placeholder="Post Title" name="postTitle">
                </div> -->
                    <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, voluptatum! Modi eos dolor aspernatur magni, molestiae assumenda in quas deleniti? -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description" placeholder="Description"></textarea>
                        <span class="text-danger">@error('description') {{$message}} @enderror</span>
                    </div>
                    <!-- <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description" placeholder="Description"></textarea>
                </div> -->
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Add Image</label>
                        <input class="form-control" type="file" id="formFile" name="post_image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Model -->
@endpush

@push('page-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
<script>
    $(document).ready(function() {

        @if(Session::has('invalidPostAdd') && count($errors) > 0)
        $('#CreatePostModal').modal('show');
        @endif

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

        $(document).on('click', '#add_post_field', function() {
            $('#CreatePostModal').modal('show');
        });

    });

    // function loadMoreData(page) {
    //     $.ajax({
    //             url: '?page=' + page,
    //             type: "get",
    //             beforeSend: function() {
    //                 $('.ajax-load').show();
    //             }
    //         })
    //         .done(function(data) {
    //             if (data.html == "") {
    //                 $('.ajax-load').html("No more records found");
    //                 return;
    //             }
    //             setInterval(function() {
    //                 $('.ajax-load').hide();
    //             }, 5000);
    //             $("#favPost-data").append(data.html);
    //         })
    //     // .fail(function(jqXHR, ajaxOptions, thrownError) {
    //     //     alert('server not responding...');
    //     // });
    // }

    // var page = 1;
    // $(window).scroll(function() {
    //     if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
    //         page++;
    //         loadMoreData(page);
    //     }
    // });
</script>
@endpush