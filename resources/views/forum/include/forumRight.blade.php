<div class="info-box-col mb-3 pb-1 pt-3">

    <a href="{{route('all_events')}}" class="d-flex align-items-center m-3 text-dark">
        <p class="mx-2">Events</p>
        <i class="mx-2 fa-solid fa-arrow-right"></i>
    </a>
    @php
    $newevents = App\Models\forum_event::where('status',1)->orderBy('created_at', 'desc')->take(2)->get();
    @endphp

    @foreach($newevents as $newevent)
    <div class="row align-items-center m-3 text-dark">
        <div class="col-2 p-0">
            <div class="d-flex flex-column align-items-center bg-light-grey p-3 rounded">
                <div class="forum_event_month fw-bold">{{\Carbon\Carbon::parse($newevent->eventDate)->format('M')}}</div>
                <div class="forum_event_date">{{\Carbon\Carbon::parse($newevent->eventDate)->format('d')}}</div>
            </div>
        </div>
        <div class="col-10">
            <p class="fw-bold event_title mb-1">{{$newevent->eventTitle}}</p>
            <div class="d-flex justify-content-start align-items-center  mb-1">
                <i class="fa-brands fa-bandcamp me-3"></i>
                <p>{{$newevent->location}}</p>
            </div>
            <div class="d-flex justify-content-between  mb-1">
                @if($newevent->u_id != auth()->user()->id)

                @if ($newevent->response->contains('u_id',auth()->user()->id))
                @foreach($newevent->response as $eResponse)
                @if($eResponse->u_id == auth()->user()->id)
                <a href="{{route('event_response',[$newevent->id,auth()->user()->id,1])}}" class="btn btn-sm my-0 rounded event_action_side {{$eResponse->status == 1 ? 'event_action_active':''}}">Going</a>
                <a href="{{route('event_response',[$newevent->id,auth()->user()->id,2])}}" class="btn btn-sm my-0 rounded event_action_side {{$eResponse->status == 2 ? 'event_action_active':''}}">Not Going</a>
                <a href="{{route('event_response',[$newevent->id,auth()->user()->id,3])}}" class="btn btn-sm my-0 rounded event_action_side {{$eResponse->status == 3 ? 'event_action_active':''}}">May Be</a>
                @endif
                @endforeach
                @else
                <a href="{{route('event_response',[$newevent->id,auth()->user()->id,1])}}" class="btn btn-sm my-0 rounded event_action_side">Going</a>
                <a href="{{route('event_response',[$newevent->id,auth()->user()->id,2])}}" class="btn btn-sm my-0 rounded event_action_side">Not Going</a>
                <a href="{{route('event_response',[$newevent->id,auth()->user()->id,3])}}" class="btn btn-sm my-0 rounded event_action_side">May Be</a>
                @endif

                @endif
            </div>
        </div>
    </div>
    @endforeach
    <!-- <div class="row align-items-center m-3">
        <div class="col-2 p-0">
            <div class="d-flex flex-column align-items-center bg-light-grey p-3 rounded">
                <div class="forum_event_month fw-bold">FEB</div>
                <div class="forum_event_date">7</div>
            </div>
        </div>
        <div class="col-10">
            <p class="fw-bold event_title mb-1">Hand on by PPT Foundation</p>
            <div class="d-flex justify-content-start align-items-center  mb-1">
                <i class="fa-brands fa-bandcamp me-3"></i>
                <p>Le Méridien Dhaka</p>
            </div>
            <div class="d-flex justify-content-between  mb-1">

                <input type="radio" class="btn-check" name="going_status" id="going" autocomplete="off">
                <label class="p-1 btn-outline-dark rounded-pill event_label" for="going">Going</label>

                <input type="radio" class="btn-check" name="going_status" id="not_going" autocomplete="off">
                <label class="p-1 btn-outline-dark rounded-pill event_label" for="not_going">Not
                    Going</label>

                <input type="radio" class="btn-check" name="going_status" id="maybe" autocomplete="off">
                <label class="p-1 btn-outline-dark rounded-pill event_label" for="maybe">May Be</label>
            </div>
        </div>
    </div> -->

    <!--  -->
    <!--  -->
</div>
<div class="info-box-col info-box-col-ad py-3 mb-3">

    <div class="d-flex align-items-center m-3">
        <p class="mx-2">Pinpoint</p>
        <i class="mx-2 fa-solid fa-arrow-right"></i>
    </div>

    <div class="row align-items-center m-2">
        <div class="col-3  ">
            <div class="">
                <img src="{{asset('public/assets/img/Logo.png')}}" class="img-fluid rounded shadow" width="100">
            </div>
        </div>
        <div class="col-7">
            <p class="fw-bold">Selling a business and scalling another amidst tragedy</p>
            <p>by Michele Hansen</p>
        </div>
        <div class="col-2">
            <i class="mx-2 fa-solid fa-arrow-right"></i>
        </div>
    </div>

    <div class="row align-items-center m-2">
        <div class="col-3  ">
            <div class="">
                <img src="{{asset('public/assets/img/Logo.png')}}" class="img-fluid rounded shadow" width="100">
            </div>
        </div>
        <div class="col-7">
            <p class="fw-bold">Selling a business and scalling another amidst tragedy</p>
            <p>by Michele Hansen</p>
        </div>
        <div class="col-2">
            <i class="mx-2 fa-solid fa-arrow-right"></i>
        </div>
    </div>

</div>
<!-- <div class="info-box-col mb-3">
                    <h6 class="p-2 d-flex justify-content-center bg-blue-grey custom-border-radius">Upcoming Events</h6>

                </div> -->