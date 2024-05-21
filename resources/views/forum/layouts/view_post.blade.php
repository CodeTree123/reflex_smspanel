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

<div class="blank-sec p-0">
    <div class="row align-items-center p-3">
        <div class="col-12">
            <div class="border-bottom ">
                <div class="d-flex justify-content-between">
                    <div class="d-flex my-2">
                        <div class="mx-1">
                            @if($post->doc_post->p_image == null)
                            <img src="{{ asset('assets/img/profile.png')}}" class="img-fluid rounded-circle" width="50">
                            @else
                            <img src="{{ asset('public/uploads/doctor/profile/'.$post->doc_post->p_image)}}" class=" rounded-circle" width="50" height="50">
                            @endif
                        </div>
                        <div class="ms-2">
                            <p class="post_user_name">{{$post->doc_post->fname . " " . $post->doc_post->lname}}</p>
                            <p class="post_time">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <button class="btn bg-light-grey p-2 rounded-circle text-center mt-1 favourite_icon me-2 social_btn">
                            <i class="fa-regular fa-share-from-square align-top"></i>
                        </button>
                        @if($post->post_Fav->contains('u_id',auth()->user()->id))
                        <a href="{{route('forum_post_unfav',[$post->id,auth()->user()->id])}}" class="bg-light-grey p-2 rounded-circle text-center mt-1 favourite_icon">
                            <i class="fa-solid fa-heart"></i>
                            <!-- <i class="fa-regular fa-heart"></i> -->
                        </a>
                        @else
                        <a href="{{route('forum_post_fav',[$post->id,auth()->user()->id])}}" class="bg-light-grey p-2 rounded-circle text-center mt-1 favourite_icon">
                            <!-- <i class="fa-solid fa-heart"></i> -->
                            <i class="fa-regular fa-heart"></i>
                        </a>
                        @endif
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-12">
                        @if($post->post_type != 4)
                        <div class="row ">
                            <div class="col-3 d-flex justify-content-center align-items-center p-2">
                                @if($post->post_img == null)
                                <img src="{{ asset('assets/img/Logo.png')}}" class="rounded shadow" width="100" height="100">
                                @elseif($post->post_type == 2)
                                <img src="{{ asset('public/uploads/forum/article/'.$post->post_img)}}" class="rounded shadow" width="100" height="100">
                                @elseif($post->post_type == 3)
                                <img src="{{ asset('public/uploads/forum/product/'.$post->post_img)}}" class="rounded shadow" width="100" height="100">
                                @else
                                <img src="{{ asset('public/uploads/forum/post/'.$post->post_img)}}" class="rounded shadow" width="100" height="100">
                                @endif
                            </div>
                            <div class="col-9">
                                <div class="border-top border-bottom">
                                    <div class="mx-2 mt-2">
                                        <p class="post_title">{{$post->post_title}}</p>
                                    </div>
                                    <div class="m-2 ms-0 me-0 mb-2">
                                        <p class="mx-2 text-break">
                                            {{$post->post_main}}
                                        </p>
                                    </div>
                                    <div class="m-2 ms-0 me-0">
                                        <p class="mx-2 text-break">
                                            @nl2br($post->description)
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class=" ">
                            <div class="border-top border-bottom">
                                <div class="mx-2 mt-2">
                                    <p class="post_title">{{$post->post_title}}</p>
                                </div>
                                <div class="m-2 ms-0 me-0">
                                    <p class="mx-2">
                                        @nl2br($post->description)
                                    </p>
                                </div>
                                <div class="m-2 ms-0 me-0 px-2 pb-4">
                                    <p class="mx-2 px-4">
                                        @php
                                        $array = explode(',',$post->post_main);
                                        $ots = App\Models\treatment_step::where('d_id',$post->u_doc_id)->where('p_id',$array[0])->where('treatment_id',$array[1])->get();
                                        $reports = App\Models\report::where('d_id',$post->u_doc_id)->where('p_id',$array[0])->where('treatment_id',$array[1])->get();
                                        @endphp

                                        @foreach($ots as $key =>$ot)
                                    <p class="mb-2 fw-bolder"><span class="border-bottom border-dark">Day {{$key + 1}} :</span> </p>
                                    <p class="mb-3 text-break">{{$ot->steps}}</p>
                                    @foreach($reports as $report)
                                    @if(\Carbon\Carbon::parse($ot->date)->format('Y-m-d') == \Carbon\Carbon::parse($report->created_at)->format('Y-m-d'))
                                    <img src="{{asset('public/uploads/report/'.$report->image)}}" alt="" width="200px">
                                    @endif
                                    @endforeach
                                    @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="col-12 my-2">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="d-flex align-items-center mx-3">
                                <i class="fa-solid fa-eye fa-lg"></i>
                                <p class="ms-2 intarect_font">{{$post->view_count}} Views</p>
                            </div>
                            @if($post->post_Like->contains('u_id',auth()->user()->id))
                            <a href="{{route('forum_post_dislike',[$post->id,auth()->user()->id])}}" class="m-0 ms-3 d-flex  align-items-center btn btn-sm me-3">
                                <i class="fa-solid fa-lg fa-thumbs-up me-2"></i>
                                <!-- <i class="fa-regular fa-lg fa-thumbs-up me-2"></i> -->
                                <p class="ms-2 intarect_font">{{$post->likes_count}} Likes</p>
                            </a>
                            @else
                            <a href="{{route('forum_post_like',[$post->id,auth()->user()->id])}}" class="m-0 ms-3 d-flex  align-items-center btn btn-sm me-3">
                                <!-- <i class="fa-solid fa-lg fa-thumbs-up me-2"></i> -->
                                <i class="fa-regular fa-lg fa-thumbs-up me-2"></i>
                                <p class="ms-2 intarect_font">{{$post->likes_count}} Likes</p>
                            </a>
                            @endif
                            <a href="#comments_section" class="m-0 d-flex  align-items-center btn btn-sm ms-3">
                                <i class="fa-solid fa-lg fa-comments me-2"></i>
                                <p class="ms-2 intarect_font">{{$post->comments_count}} Comments</p>
                            </a>
                            @if($post->u_doc_id == auth()->user()->id)
                            <button type="button" class="btn btn-sm my-0 rounded ms-2 event_action" data-bs-toggle="modal" data-bs-target="#postEdit">
                                <i class="fa-solid fa-pen-to-square fa-lg"></i>
                            </button>
                            <button type="button" class="btn btn-sm my-0 rounded ms-2 event_action" data-bs-toggle="modal" data-bs-target="#postDelete">
                                <i class="fa-solid fa-trash fa-lg"></i>
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-3" id="comments_all_section">
            <h6 class="mb-3">All Comments</h6>
            <div class="border-bottom">
                @foreach($comments as $comment)
                <div class="d-flex mb-3 {{-- $comment->u_id == auth()->user()->id ? 'flex-row-reverse' : '' --}}">
                    <div class="comment_img text-center">
                        @if($comment->comment_user->p_image == null)
                        <img src="{{ asset('assets/img/profile.png')}}" class="img-fluid mt-2 rounded-circle" width="40">
                        @else
                        <img src="{{ asset('public/uploads/doctor/'.$comment->comment_user->p_image)}}" class="mt-2 rounded-circle" width="40" height="40">
                        @endif
                    </div>
                    <div class="comment_body">
                        <div class="border rounded p-2 comment_bg">
                            <p class="post_user_comment">
                                {{$comment->comment_user->fname." ".$comment->comment_user->lname}}
                            </p>
                            <div class="commentTest c_edit{{$comment->id}}">
                                <p class="post_comment">{{$comment->comment}}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-1">
                            <p class="post_time">{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</p>
                            <div class="d-flex">
                                @if($comment->u_id == auth()->user()->id)
                                <button type="button" class="btn p-0 my-0 comment_edit " value="{{$comment->id}}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                @endif
                                @if($comment->main_post->u_doc_id == auth()->user()->id || $comment->u_id == auth()->user()->id)
                                <button type="button" class="btn p-0 my-0  ms-2 me-2 comment_delete" value="{{$comment->id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-12 mt-2" id="comments_section">
            <form action="{{route('add_post_comment',$post->id)}}" class="row align-items-center" method="post">
                @csrf
                <div class="col-10">
                    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Leave a comment here" rows="2" name="postComment"></textarea>
                    <span class="text-danger">@error('postComment') {{$message}} @enderror</span>
                </div>
                <div class="col-2 ps-0">
                    <button type="submit" class="btn btn-sm btn-outline-blue-grey px-3">Comment</button>
                </div>
            </form>
        </div>
    </div>
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

@if($post->post_type == 1)
<!-- Modal -->
<div class="modal fade" id="postEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mb-0" id="exampleModalLabel">Edit Forum Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('update_post')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="modal-body">
                    <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, voluptatum! Modi eos dolor aspernatur magni, molestiae assumenda in quas deleniti? -->
                    <div class="mb-3">
                        <label for="u_description" class="form-label">Description</label>
                        <textarea class="form-control" id="u_description" rows="3" name="u_description" placeholder="Description">{{$post->description}}</textarea>
                        <span class="text-danger">@error('u_description') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Update Image</label>
                        <input class="form-control" type="file" id="formFile" name="u_post_image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Model -->
@endif

@if($post->post_type == 2)
<!-- Modal -->
<div class="modal fade" id="postEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mb-0" id="exampleModalLabel">Edit Article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('update_article')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-8 mb-3">
                            <label for="u_postTitle" class="form-label">Post Title</label>
                            <input type="text" class="form-control" id="u_postTitle" placeholder="Post Title" name="u_postTitle" value="{{$post->post_title}}">
                            <span class="text-danger">@error('u_postTitle') {{$message}} @enderror</span>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="formFile" class="form-label">Update Image</label>
                            <input class="form-control" type="file" id="formFile" name="u_article_image">
                            <span class="text-danger">@error('u_article_image') {{$message}} @enderror</span>
                        </div>
                    </div>
                    <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, voluptatum! Modi eos dolor aspernatur magni, molestiae assumenda in quas deleniti? -->
                    <div class="mb-3">
                        <label for="u_description" class="form-label">Description</label>
                        <textarea class="form-control" id="u_description" rows="5" name="u_description" placeholder="Description">{{$post->post_main}}</textarea>
                        <span class="text-danger">@error('u_description') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="u_summery" class="form-label">Summary</label>
                        <textarea class="form-control" id="u_summery" rows="3" name="u_summery" placeholder="Summery">{{$post->description}}</textarea>
                        <span class="text-danger">@error('u_summery') {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Model -->
@endif

@if($post->post_type == 3)
<!-- Modal -->
<div class="modal fade" id="postEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mb-0" id="exampleModalLabel">Edit Product Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('update_review')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="postTitle" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="postTitle" placeholder="Post Title" name="u_product_Name" value="{{$post->post_title}}">
                        <span class="text-danger">@error('u_product_Name') {{$message}} @enderror</span>
                    </div>
                    <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, voluptatum! Modi eos dolor aspernatur magni, molestiae assumenda in quas deleniti? -->
                    <div class="mb-3">
                        <label for="u_description" class="form-label">Description</label>
                        <textarea class="form-control" id="u_description" rows="5" name="u_description" placeholder="Description">{{$post->description}}</textarea>
                        <span class="text-danger">@error('u_description') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Update Image</label>
                        <input class="form-control" type="file" id="formFile" name="product_image">
                        <span class="text-danger">@error('product_image') {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Model -->
@endif

@if($post->post_type == 4)
<!-- Modal -->
<div class="modal fade" id="postEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mb-0" id="exampleModalLabel">Edit Case Studies</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('update_case')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="u_post_title_c" class="form-label">Post Title</label>
                        <input type="text" class="form-control" id="u_post_title_c" placeholder="Post Title" name="u_post_title_c" value="{{$post->post_title}}">
                        <span class="text-danger">@error('u_post_title_c') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="u_description_c" class="form-label">Short Description/Summery</label>
                        <textarea class="form-control" id="u_description_c" rows="5" name="u_description_c" placeholder="Description">{{$post->description}}</textarea>
                        <span class="text-danger">@error('u_description_c') {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Model -->
@endif

<!-- Modal Delete post -->

<div class="modal fade" id="postDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mb-0" id="exampleModalLabel">Delete Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('delete_post')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('delete')
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure To Delete <span class="text-dark">{{$post->post_title}}</span> Post Information?</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes,Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Model -->

<!-- Modal -->
{{--<div class="modal fade" id="commentEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-md modal-dialog-scrollable modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title mb-0" id="exampleModalLabel">Edit Comment</h5>--}}
{{--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--            </div>--}}
{{--            <form action="{{route('update_post_comment')}}" method="post" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                @method('PUT')--}}
{{--                <input type="hidden" name="comment_id" id="comment-id" value="">--}}
{{--                <div class="modal-body">--}}
{{--                    <div class="mb-3">--}}
{{--                        <label for="u_comment" class="form-label">Comment</label>--}}
{{--                        <textarea class="form-control" id="u_comment" rows="3" name="u_comment" placeholder="Comment"></textarea>--}}
{{--                        <span class="text-danger">@error('u_comment') {{$message}} @enderror</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                    <button type="submit" class="btn btn-primary commentUpbtn">Update</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- End Model -->

<!-- Modal Delete comment -->

<div class="modal fade" id="commentDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mb-0" id="exampleModalLabel">Delete Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('delete_comment')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('delete')
                <input type="hidden" name="comment_id" id="del-comment-id" value="">
                <input type="hidden" name="post_id" id="del-comment-id" value="{{$post->id}}">
                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure, You Want To Delete This Comment?</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes,Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Model -->

@endpush

@push('page-js')
<script>
    $(document).ready(function() {

        @if(Session::has('invalidPostAdd') && count($errors) > 0)
        $('#CreatePostModal').modal('show');
        @endif

        @if(Session::has('invalidPostUP') && count($errors) > 0)
        $('#postEdit').modal('show');
        @endif

        @if(Session::has('invalidArticalUP') && count($errors) > 0)
        $('#postEdit').modal('show');
        @endif

        @if(Session::has('invalidReviewUP') && count($errors) > 0)
        $('#postEdit').modal('show');
        @endif

        @if(Session::has('invalidCaseUP') && count($errors) > 0)
        $('#postEdit').modal('show');
        @endif


        $(document).on('click', '#add_post_field', function() {
            $('#CreatePostModal').modal('show');
        });

        $(document).on('click', '.comment_edit', function() {
            var c_id = $(this).val();
            var url = "{{route('get_post_comment',[':c_id'])}}";
            url = url.replace(':c_id', c_id);

            $('.commentTest').html('');
            $('.comment_body').addClass('w-100');
            $('.commentTest').append('\
                <form action="{{route('update_post_comment')}}" method="post" enctype="multipart/form-data">\
                    @csrf\
                    @method('PUT')\
                    <input type="hidden" name="comment_id" id="comment-id" value="">\
                    <div class="mb-2">\
                        <textarea class="form-control" id="u_comment" rows="2" name="u_comment" placeholder="Pelase Enter Something."></textarea>\
                    </div>\
                    <div class="d-flex justify-content-end">\
                        <a href="" class="btn btn-sm btn-secondary rounded my-0"><i class="fa-solid fa-xmark"></i></a>\
                        <button type="submit" class="btn btn-sm mx-2 btn-primary commentUpbtn"><i class="fa-solid fa-check"></i></button>\
                    </div>\
                </form>\
            ');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    $('#comment-id').val(c_id);
                    $('#u_comment').text(response.comment.comment);
                }
            });
        });

        $(document).on('keyup', '#u_comment', function() {
            if($(this).val() === ''){
                // alert('hello');
                $('.commentUpbtn').attr('disabled',true);
            }else{
                $('.commentUpbtn').attr('disabled',false);
            }
        });

        $(document).on('click', '.comment_delete', function() {
            var deletecommentId = $(this).val();
            // alert(deletecommentId);
            $('#commentDelete').modal('show');
            $('#del-comment-id').val(deletecommentId);
        });

    });
</script>
@endpush
