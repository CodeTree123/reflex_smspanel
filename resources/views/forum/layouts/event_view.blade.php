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
        <div class="col-6">
            <input type="text" name="" class="form-control" id="add_event_field" placeholder="Let's Add Event" readonly>
        </div>
        <div class="col-4 text-center">
            <button type="button" class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#CreatePostModal">Add Event</button>
        </div>
    </div>
</div>

<div class="blank-sec p-0">
    <div class="row m-2 pt-2">
        <div class="col-2 p-0">
            <div class="d-flex flex-column align-items-center bg-light-grey p-3 rounded">
                <div class="forum_event_month fw-bold">{{\Carbon\Carbon::parse($event->eventDate)->format('M')}}</div>
                <div class="forum_event_date">{{\Carbon\Carbon::parse($event->eventDate)->format('d')}}</div>
            </div>
        </div>
        <div class="col-10">
            <p class="fw-bold event_title_head mb-1">{{$event->eventTitle}}</p>
            <div class="d-flex justify-content-start align-items-center  mb-1">
                <i class="fa-brands fa-bandcamp me-3"></i>
                <p>{{$event->location}}</p>
            </div>
            <p class="fw-bold event_title mb-1">
                {{\Carbon\Carbon::parse($event->eventDate)->format('d/M/Y') ." (". \Carbon\Carbon::parse($event->eventDate)->isoFormat('dddd') .") ". \Carbon\Carbon::parse($event->eventTime)->format('h:i a')}}
            </p>
            <p class="mb-0">@nl2br($event->description)</p>
        </div>
    </div>
    @if($event->u_id != auth()->user()->id)
    <div class="d-flex justify-content-end me-2 pb-2">
        @if($event->response->contains('u_id',auth()->user()->id))
        @foreach($event->response as $eResponse)
        @if($eResponse->u_id == auth()->user()->id)
        <a href="{{route('event_response',[$event->id,auth()->user()->id,1])}}" class="btn btn-sm my-0 rounded ms-2 event_action {{$eResponse->status == 1 ? 'event_action_active':''}}">Going</a>
        <a href="{{route('event_response',[$event->id,auth()->user()->id,2])}}" class="btn btn-sm my-0 rounded ms-2 event_action {{$eResponse->status == 2 ? 'event_action_active':''}}">Not Going</a>
        <a href="{{route('event_response',[$event->id,auth()->user()->id,3])}}" class="btn btn-sm my-0 rounded ms-2 event_action {{$eResponse->status == 3 ? 'event_action_active':''}}">May Be</a>
        @endif
        @endforeach
        @else
        <a href="{{route('event_response',[$event->id,auth()->user()->id,1])}}" class="btn btn-sm my-0 rounded ms-2 event_action">Going</a>
        <a href="{{route('event_response',[$event->id,auth()->user()->id,2])}}" class="btn btn-sm my-0 rounded ms-2 event_action">Not Going</a>
        <a href="{{route('event_response',[$event->id,auth()->user()->id,3])}}" class="btn btn-sm my-0 rounded ms-2 event_action">May Be</a>
        @endif
    </div>
    @else
    <div class="d-flex justify-content-end me-2 pb-2">
        <button type="button" class="btn btn-sm my-0 rounded ms-2 event_action" data-bs-toggle="modal" data-bs-target="#eventEdit">
            <i class="fa-solid fa-pen-to-square"></i>
        </button>
        <button type="button" class="btn btn-sm my-0 rounded ms-2 event_action" data-bs-toggle="modal" data-bs-target="#eventDelete">
            <i class="fa-solid fa-trash"></i>
        </button>
    </div>
    @endif

    <div class="m-2 pb-2">
        <div class="mb-2">
            <h6 class="mb-2">Going ({{$go}})</h6>
            <div class="d-flex">
                @forelse($event->response as $eRespon)
                @if($eRespon->status == 1)
                <p class="border border-light rounded-pill p-1 me-1 bg-light-grey text-capitalize">{{$eRespon->user_event->fname . " " . $eRespon->user_event->lname}}</p>
                @endif
                @empty
                <p class="border border-light rounded-pill p-1 me-1 bg-light-grey text-capitalize">No Data Available</p>
                @endforelse
            </div>
        </div>
        <div class="mb-2">
            <h6 class="mb-2">Not Going ({{$notgo}})</h6>
            <div class="d-flex">
                @forelse($event->response as $eRespon)
                @if($eRespon->status == 2)
                <p class="border border-light rounded-pill p-1 me-1 bg-light-grey text-capitalize">{{$eRespon->user_event->fname . " " . $eRespon->user_event->lname}}</p>
                @endif
                @empty
                <p class="border border-light rounded-pill p-1 me-1 bg-light-grey text-capitalize">No Data Available</p>
                @endforelse
            </div>

        </div>
        <div class="mb-2">
            <h6 class="mb-2">May Be ({{$maybe}})</h6>
            <div class="d-flex">
                @forelse($event->response as $eRespon)
                @if($eRespon->status == 3)
                <p class="border border-light rounded-pill p-1 me-1 bg-light-grey text-capitalize">{{$eRespon->user_event->fname . " " . $eRespon->user_event->lname}}</p>
                @endif
                @empty
                <p class="border border-light rounded-pill p-1 me-1 bg-light-grey text-capitalize">No Data Available</p>
                @endforelse
            </div>

        </div>

    </div>
</div>

@endsection

@push('page-modals')
<!-- Modal Add Event -->
<div class="modal fade" id="CreatePostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mb-0" id="exampleModalLabel">Add Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('add_event')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="author_role" value="0">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="eventTitle" class="form-label">Event Title</label>
                        <input type="text" class="form-control" id="eventTitle" placeholder="Event Title" name="eventTitle">
                        <span class="text-danger">@error('eventTitle') {{$message}} @enderror</span>
                    </div>
                    <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, voluptatum! Modi eos dolor aspernatur magni, molestiae assumenda in quas deleniti? -->
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <textarea class="form-control" id="location" rows="2" name="location" placeholder="Add Location"></textarea>
                        <span class="text-danger">@error('location') {{$message}} @enderror</span>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="eventDate" class="form-label">Date</label>
                            <input type="date" class="form-control" id="eventDate" name="eventDate">
                            <span class="text-danger">@error('eventDate') {{$message}} @enderror</span>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="eventTime" class="form-label">Time</label>
                            <input type="time" class="form-control" id="eventTime" name="eventTime">
                            <span class="text-danger">@error('eventTime') {{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="5" name="description" placeholder="Description"></textarea>
                        <span class="text-danger">@error('description') {{$message}} @enderror</span>
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

<!-- Modal Edit Event -->
<div class="modal fade" id="eventEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mb-0" id="exampleModalLabel">Edit Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('edit_event')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="event_id" value="{{$event->id}}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="u_eventTitle" class="form-label">Event Title</label>
                        <input type="text" class="form-control" id="u_eventTitle" placeholder="Event Title" name="u_eventTitle" value="{{old('u_eventTitle',$event->eventTitle)}}">
                        <span class="text-danger">@error('u_eventTitle') {{$message}} @enderror</span>
                    </div>
                    <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, voluptatum! Modi eos dolor aspernatur magni, molestiae assumenda in quas deleniti? -->
                    <div class="mb-3">
                        <label for="u_location" class="form-label">Location</label>
                        <textarea class="form-control" id="u_location" rows="2" name="u_location" placeholder="Add Location">{{old('u_location',$event->location)}}</textarea>
                        <span class="text-danger">@error('u_location') {{$message}} @enderror</span>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="u_eventDate" class="form-label">Date</label>
                            <input type="date" class="form-control" id="u_eventDate" name="u_eventDate" value="{{old('u_eventDate',$event->eventDate)}}">
                            <span class="text-danger">@error('u_eventDate') {{$message}} @enderror</span>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="u_eventTime" class="form-label">Time</label>
                            <input type="time" class="form-control" id="u_eventTime" name="u_eventTime" value="{{old('u_eventTime',$event->eventTime)}}">
                            <span class="text-danger">@error('u_eventTime') {{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="u_description" class="form-label">Description</label>
                        <textarea class="form-control" id="u_description" rows="5" name="u_description" placeholder="Description">{{old('u_description',$event->description)}}</textarea>
                        <span class="text-danger">@error('u_description') {{$message}} @enderror</span>
                    </div>
                    <!-- Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus laboriosam voluptatum molestias, veniam dolorem consequatur commodi cum, maxime possimus corporis aperiam dolor reiciendis voluptatibus cupiditate odio voluptates corrupti? Expedita earum dolores illo deserunt reiciendis nisi possimus repellendus eveniet maxime, autem, numquam, corporis commodi voluptatem sunt totam tempore explicabo asperiores quae molestias? Omnis suscipit assumenda laborum repudiandae beatae neque voluptates quia dolores dolorem magni ex ipsam ut aliquid repellendus veritatis fugiat. -->
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

<!-- Modal Edit Event -->

<div class="modal fade" id="eventDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mb-0" id="exampleModalLabel">Edit Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('delete_event')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('delete')
                <input type="hidden" name="event_id" value="{{$event->id}}">
                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure To Delete <span class="text-dark">{{$event->eventTitle}}</span> Event Information?</h5>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
<script>
    $(document).ready(function() {

        @if(Session::has('invalideventAdd') && count($errors) > 0)
        $('#CreatePostModal').modal('show');
        @endif

        @if(Session::has('invalideventUp') && count($errors) > 0)
        $('#eventEdit').modal('show');
        @endif

        $(document).on('click', '#add_event_field', function() {
            $('#CreatePostModal').modal('show');
        });

    });
</script>
@endpush
