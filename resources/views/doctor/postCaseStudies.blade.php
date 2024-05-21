@extends('master.doc_master')

@push('page-css')

@endpush

@section('content')
<div class="container">
    <div class="blank-sec ">
        <h6 class="p-2 mb-1 d-flex justify-content-center bg-blue-grey custom-border-radius">
            Treatment Case Study
        </h6>

        <form action="{{route('add_case_studies')}}" method="post">
            @csrf
            <div class="p-3 pb-0">

                <div class="mb-3">
                    <label for="post_title" class="form-label">Post Title</label>
                    <textarea class="form-control" id="post_title" rows="2" name="post_title"></textarea>
                </div>
                <h5 class="mb-3">{{$treat_info->treatment_plans ." (Tooth No: ". $treat_info->tooth_no.")"}}:</h5>
                <div class="px-4">
                    @foreach($ots as $key =>$ot)
                    <h6 class="mb-2"><span class="border-bottom border-dark">Day {{$key + 1}} :</span> </h6>
                    <p class="mb-3">{{$ot->steps}}</p>
                    @foreach($reports as $report)
                    @if(\Carbon\Carbon::parse($ot->date)->format('Y-m-d') == \Carbon\Carbon::parse($report->created_at)->format('Y-m-d'))
                    <img src="{{asset('public/uploads/report/'.$report->image)}}" alt="" width="200px">
                    @endif
                    @endforeach
                    @endforeach
                </div>
                <input type="hidden" name="patient_id" value="{{$treat_info->p_id}}">
                <input type="hidden" name="treatment_id" value="{{$treat_info->id}}">
                <input type="hidden" name="treatment_name" value="{{$treat_info->treatment_plans}}">

                <div class="mb-3">
                    <label for="description" class="form-label">Short Description/Summery</label>
                    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                </div>

            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-outline-blue-grey mt-2">Submit</button>
                <a href="{{route('treatments',[$d_id,$p_id,$t_id,$treat_info->treatment_plans])}}" class="btn btn-outline-blue-grey rounded mt-2 ms-3 mb-0">Back</a>
            </div>

        </form>

    </div>
</div>
@endsection

@push('page-modals')

@endpush

@push('page-js')

@endpush