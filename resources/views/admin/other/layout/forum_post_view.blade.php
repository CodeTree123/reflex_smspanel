@extends('admin.other.admin_other_master')

@section('content')
    <div class="blank-sec p-0">
        <div class="row align-items-center p-3">
            <div class="col-12">
                <div class="border-bottom ">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex my-2">
                            <div class="mx-1">
                                @if($post->doc_post->p_image == null)
                                    <img src="{{ asset('assets/img/profile.png')}}" class="img-fluid rounded-circle"
                                         width="50">
                                @else
                                    <img src="{{ asset('public/uploads/doctor/'.$post->doc_post->p_image)}}"
                                         class=" rounded-circle" width="50" height="50">
                                @endif
                            </div>
                            <div class="ms-2">
                                <p class="post_user_name">{{$post->doc_post->fname . " " . $post->doc_post->lname}}</p>
                                <p class="post_time">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-12">
                            @if($post->post_type != 4)
                                <div class="row ">
                                    <div class="col-3 d-flex justify-content-center align-items-center p-2">
                                        @if($post->post_img == null)
                                            <img src="{{ asset('assets/img/Logo.png')}}" class="rounded shadow"
                                                 width="100" height="100">
                                        @elseif($post->post_type == 2)
                                            <img src="{{ asset('public/uploads/forum/article/'.$post->post_img)}}"
                                                 class="rounded shadow" width="100" height="100">
                                        @elseif($post->post_type == 3)
                                            <img src="{{ asset('public/uploads/forum/product/'.$post->post_img)}}"
                                                 class="rounded shadow" width="100" height="100">
                                        @else
                                            <img src="{{ asset('public/uploads/forum/post/'.$post->post_img)}}"
                                                 class="rounded shadow" width="100" height="100">
                                        @endif
                                    </div>
                                    <div class="col-9">
                                        <div class="border-top border-bottom">
                                            <div class="mx-2 mt-2">
                                                <p class="post_title">{{$post->post_title}}</p>
                                            </div>
                                            <div class="m-2 ms-0 me-0">
                                                <p class="mx-2 text-break">
                                                    {{$post->post_main}}
                                                </p>
                                            </div>
                                            <div class="m-2 ms-0 me-0">
                                                <p class="mx-2 text-break">
                                                    {{$post->description}}
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
                                                {{$post->description}}
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
                                                <p class="mb-2 fw-bolder"><span class="border-bottom border-dark">Day {{$key + 1}} :</span>
                                                </p>
                                                <p class="mb-3 text-break">{{$ot->steps}}</p>
                                                @foreach($reports as $report)
                                                    @if(\Carbon\Carbon::parse($ot->date)->format('Y-m-d') == \Carbon\Carbon::parse($report->created_at)->format('Y-m-d'))
                                                        <img src="{{asset('public/uploads/report/'.$report->image)}}"
                                                             alt="" width="200px">
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
                                <div class="m-0 ms-3 d-flex  align-items-center btn btn-sm me-3">
                                    <i class="fa-solid fa-lg fa-thumbs-up me-2"></i>
                                    <!-- <i class="fa-regular fa-lg fa-thumbs-up me-2"></i> -->
                                    <p class="ms-2 intarect_font">{{$post->likes_count}} Likes</p>
                                </div>
                                <div class="m-0 d-flex  align-items-center btn btn-sm ms-3">
                                    <i class="fa-solid fa-lg fa-comments me-2"></i>
                                    <p class="ms-2 intarect_font">{{$post->comments_count}} Comments</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3" id="comments_all_section">
                <h6 class="mb-3">All Comments</h6>
                <div class="border-bottom">
                    @foreach($comments as $comment)
                        <div
                            class="d-flex mb-3 {{-- $comment->u_id == auth()->user()->id ? 'flex-row-reverse' : '' --}}">
                            <div class="comment_img text-center">
                                @if($comment->comment_user->p_image == null)
                                    <img src="{{ asset('assets/img/profile.png')}}"
                                         class="img-fluid mt-2 rounded-circle" width="40">
                                @else
                                    <img src="{{ asset('public/uploads/doctor/'.$comment->comment_user->p_image)}}"
                                         class="mt-2 rounded-circle" width="40" height="40">
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
                                            <button type="button" class="btn p-0 my-0 comment_edit "
                                                    value="{{$comment->id}}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        @endif
                                        @if($comment->main_post->u_doc_id == auth()->user()->id || $comment->u_id == auth()->user()->id)
                                            <button type="button" class="btn p-0 my-0  ms-2 me-2 comment_delete"
                                                    value="{{$comment->id}}">
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
        </div>
    </div>
@endsection

@section('page-modals')

@endsection

@push('page-js')

@endpush
