@extends('admin.other.admin_other_master')
@push('page-css')
    <!-- Forum CSS -->
    <link rel="stylesheet" href="{{ asset ('assets/css/forum.css')}}">
@endpush
@section('content')
    <div class="blank-sec p-0">
        <div class="row m-2 py-2 border-bottom">
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
                <p class="mb-0">{{$event->description}}</p>
            </div>
        </div>

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

@section('page-modals')

@endsection

@push('page-js')

@endpush
