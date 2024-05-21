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
            {{--<div class="col-7">--}}
            {{--    <input type="text" name="" class="form-control" id="add_post_field" placeholder="Let's Share whats going on your mind" readonly>--}}
            {{--</div>--}}
            {{--<div class="col-3 text-center">--}}
            {{--    <button type="button" class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#CreatePostModal">Create Post</button>--}}
            {{--</div>--}}
        </div>
    </div>

    <div class="blank-sec p-0">
        <div class="row m-0">
            @forelse($tutorials as $tutorial)
                <div class="col-12 p-2">
                    <div class="tutorial-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$tutorial->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
                    </div>
                    <p class="tutorialTitle">{{$tutorial->title}}</p>
                    <p class="tutorialBody p-3 mb-2">{{$tutorial->description}}</p>
                    
                </div>
            @empty
                <div class="col-12">
                    <h5 class="text-center my-4">There was no tutorial available.</h5>
                </div>
            @endforelse
        </div>
    </div>

@endsection

@push('page-modals')

@endpush

@push('page-js')

@endpush
