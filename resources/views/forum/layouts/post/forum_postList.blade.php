@foreach($posts as $post)
<div class="blank-sec p-0">
    <div class="row align-items-center p-3">
        <div class="col-12 mb-auto">
            <div class="d-flex justify-content-between">
                <div class="d-flex my-2">
                    <div class="mx-1">
                        @if($post->doc_post->p_image == null)
                        <img src="{{ asset('assets/img/profile.png')}}" class="img-fluid rounded-circle" width="50">
                        @else
                        <img src="{{ asset('public/uploads/doctor/'.$post->doc_post->p_image)}}" class=" rounded-circle" width="50" height="50">
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
                                <div class="m-2 ms-0 me-0">
                                    <div class="mx-2">
                                        {{Str::limit($post->description,220)}}
                                        <a href="{{route('forum_post_view',$post->id)}}" class="fst-italic fw-bold">See More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-2">
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
                        <a href="{{route('post_view',$post->id."#comments_section")}}" class="m-0 d-flex  align-items-center btn btn-sm ms-3">
                            <i class="fa-solid fa-lg fa-comments me-2"></i>
                            <p class="ms-2 intarect_font">{{$post->comments_count}} Comments</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach