@extends('master.doc_master')

@push('page-css')
<style>
    .signature {
        border-top: 1px solid #000;
        padding: 5px 10px 0 10px;
    }

    .leftSideButton {
        position: fixed;
        top: 40%;
        text-align: end;
    }

    .leftSideButton .templateBtn {
        width: 80px;
        border-radius: 0 5px 5px 0;
        -webkit-border-radius: 0 5px 5px 0;
        -moz-border-radius: 0 5px 5px 0;
        -ms-border-radius: 0 5px 5px 0;
        -o-border-radius: 0 5px 5px 0;
        -webkit-transition: all 0.3s ease;
        transition: all 0.5s ease;
    }

    .leftSideButton .templateBtn:hover {
        width: 95px;
        padding: 6px 15px;
    }
</style>
@endpush

@section('content')

<div class="container">
    <div class="text-center mb-2">
        <select class="form-select mt-2 w-25 mx-auto chamber d-print-none" id="chember" aria-label="Default select example">
            <option hidden>Select Chamber Name</option>
            @foreach($chambers as $chamber)
            <option value="{{$chamber->id}}">{{$chamber->chember_name}}</option>
            @endforeach

        </select>
        <h3 id="chem_name"></h3>
        <p id="chem_add"></p>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="text-center w-50 pt-2">
            <h4>
                @if($dates != null)
                <span>Monthly Income Sheet</span>
                @else
                <span>Daily Income Sheet</span>
                @endif
            </h4>
            <div class="text-end">
                <p class="">Date:
                    <span>
                        @if($dates != null)
                        {{\Carbon\Carbon::parse($date)->format('F, Y')}}
                        @else
                        {{\Carbon\Carbon::parse($date)->format('F d, Y')}}
                        @endif
                    </span>
                </p>
            </div>
            @if($dates != null)
            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <th class="py-1">Date</th>
                        <th class="py-1">Paid</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dates as $d)
                    @php
                    $m_paidd = App\Models\treatment_payment::where('date','=', $d)->where('d_id', $d_id)->get();
                    @endphp
                    <tr>
                        <td class="py-1">{{\Carbon\Carbon::parse($d)->format('d-m-y')}}</td>
                        <td class="py-1">{{$m_paidd->sum('paid_amount')}}</td>
                    </tr>
                    @endforeach
                    <tr class="fw-bold">
                        <td class="text-end py-0">Total</td>
                        <td class="py-0">{{$total_income}}</td>
                    </tr>
                </tbody>
            </table>
            @else
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Paid</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($total_income as $patient)
                    <tr>
                        <td class="py-1">{{$patient->patient_data->name}}</td>
                        <td class="py-1">
                            @php
                            echo App\Models\treatment_payment::where('date','=',$date)->where('d_id', $d_id)->where('p_id',$patient->p_id)->sum('paid_amount');
                            @endphp
                        </td>
                    </tr>
                    @endforeach
                    <tr class="fw-bold">
                        <td class="text-end py-0">Total</td>
                        <td class="py-0">
                            @php
                            echo App\Models\treatment_payment::where('date','=',$date)->where('d_id', $d_id)->sum('paid_amount');
                            @endphp
                        </td>
                    </tr>
                </tbody>
            </table>
            @endif
            <div class="text-end mt-5 pt-4 mb-3">
                <p class="fw-bolder">
                    <span class="signature">
                        {{auth()->user()->fname." ".auth()->user()->lname}}
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="leftSideButton">
    <div class="d-flex flex-column align-items-start">
        <button class=" btn btn-primary d-print-none mb-3 templateBtn" id="printpagebutton">
            <i class="fa-solid fa-print"></i>
            Print
        </button>
        <a href="{{route('doctor')}}" class="btn btn-primary mt-3 templateBtn text-white">
            <i class="fa-solid fa-arrow-left-long"></i>
            Back
        </a>

    </div>
</div>

@endsection

@push('page-js')
<script>
    $(document).ready(function() {
        $('#chember').change(function() {
            var chember_id = $(this).val();
            var url = "{{route('select_chamber',[':chember_id'])}}";
            url = url.replace(':chember_id', chember_id);
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    $('#chem_name').text(response.c_info.chember_name);
                    $('#chem_add').text(response.c_info.chember_address);
                }
            });

        });
        $(document).on('click', '#printpagebutton', function() {
            let cham_name = $('#chem_name').text();
            if (cham_name === '') {
                let msg = "Please Add Chamber Information First!"
                $(document).sami_Toast_Append({
                    cus_toast_status: 'fail',
                    cus_toast_time: 3000,
                    cus_toast_msg: msg
                });
            } else {
                // $('.test1').css('opacity', 0);
                window.print();
            }
        });
    });
</script>
@endpush