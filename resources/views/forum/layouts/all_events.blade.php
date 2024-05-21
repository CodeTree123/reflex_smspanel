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

<div class="scrolling-pagination">
    @foreach($events as $event)
    <div class="blank-sec p-0">
        <a href="{{route('viewEvent',$event->id)}}" class="text-dark">
            <div class="row align-items-center m-2 pt-2">
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
                </div>
            </div>
            <div class="d-flex justify-content-end me-2 pb-2">
                @if($event->u_id != auth()->user()->id)

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

                @endif
            </div>
        </a>
    </div>
    @endforeach

    {{ $events->links() }}
</div>


@endsection

@push('page-modals')
<!-- Modal -->
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
@endpush

@push('page-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
<script>
    $(document).ready(function() {

        @if(Session::has('invalideventAdd') && count($errors) > 0)
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

        $(document).on('click', '#add_event_field', function() {
            $('#CreatePostModal').modal('show');
        });

    });
</script>
@endpush
