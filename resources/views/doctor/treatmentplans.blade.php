@extends('master.doc_master')
@push('page-css')

@endpush
@section('content')
<!-- main start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 pe-0 text-break">
            @include('doctor.include.patientLeftSide')
        </div>
        <!-- Profile end -->
        <!-- MidSection start -->
        <div class="col-md-7 pe-0">
            <div class="blank-sec">
                <h6 class="p-2 mb-1 d-flex justify-content-between bg-blue-grey custom-border-radius">
                    <span>Tooth {{$treatment_info->treatment_plans}}</span>
                    <span>Tooth no: {{$treatment_info->tooth_no}}</span>
                </h6>

                <!-- treatmentplans start -->
                <div class="row mx-0">
                    <div class="col-6">
                        <h6 class="d-flex justify-content-center bg-blue-grey custom-border-radius p-2">
                            Tooth Information
                        </h6>
                        <div class="treatment-box text-center   p-2">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="container">
                                        <div class="treatment-info mb-2 ">
                                            @if($tooth_info != null)
                                            <img class="tooth-img" src="{{ asset('assets/img/teeths/all_tooth/'.$tooth_info->img)}}" alt="">
                                            @else
                                            <h6 class="p-3">Multiple Tooth Selected.</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    {{-- <h4>{{$treatment_info->tooth_side}}</h4>--}}
                                    <h4>Tooth No: {{$treatment_info->tooth_no}}</h4>
                                    @if($tooth_info != null)
                                    <h6>{{$tooth_info->Tooth_name}}</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <h6 class="d-flex justify-content-center bg-blue-grey custom-border-radius p-2">
                                    History
                                </h6>
                                <div class="treatment-box p-2">
                                    <p class="fw-bold m-0 ms-1">CC : <span class="fw-normal">{{$treatment_info->chife_complaints}}</span></p>
                                    <p class="fw-bold m-0 ms-1">CF : <span class="fw-normal">{{$treatment_info->clinical_findings}}</span></p>
                                    <p class="fw-bold m-0 ms-1 mb-2">Investigation : <span class="fw-normal">{{$treatment_info->investigation}}</span></p>
                                </div>
                            </div>
                            <div class="col-12 mt-1">
                                <h6 class="py-1 px-2 mb-1 d-flex justify-content-between bg-blue-grey custom-border-radius">
                                    <span>Status</span>
                                    @if($treatment_info->status == 2)
                                    <span>Done</span>
                                    @elseif($treatment_info->status == 1)
                                    <span>Progress</span>
                                    @else
                                    <span>Not Done</span>
                                    @endif
                                </h6>
                                @if($treatment_info->status == 2)
                                <a href="{{route('case_studies',[$doctor_info->id,$patient->id,$treatment_info->id])}}" class="btn btn-outline-blue-grey my-0 w-100 fs-6 rounded">Click Here To Post This Case</a>
                                @else
                                <button type="button" class="btn btn-outline-blue-grey w-100 fs-6 rounded" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="Only Post When The Treatment Is Done!">
                                    Click Here To Post This Case
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-1">
                        <h6 class="d-flex justify-content-center bg-blue-grey custom-border-radius p-2">Previous OT Notes</h6>
                        @if($t_steps->isNotEmpty())
                        @foreach($t_steps as $key=>$t)
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{$key +1}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <p>{{$key + 1}}. {{$t->date}}</p>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne{{$key +1}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul class="mb-2">
                                            <p></p><span></span><br> @nl2br($t->steps)</p>
                                        </ul>
                                        <button class="btn crud-btns t_steps_editbtn" value="{{$t->id}}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button class="btn crud-btns delete-ot_note" value="{{$t->id}}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Previous Treatment OT Note #1
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ol>
                                            <li>There was no previous steps information.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- treatmentplans end -->
            </div>
        </div>
        <!-- MidSection end -->

        <!-- Prescription,Ad & Events start -->
        <div class="col-md-3 page-home">
            @include('doctor.include.patientRightSide')
        </div>
    </div>
</div>

<!-- <style>
    .image_view {
        width: 100px;
        height: 100px;
        cursor: pointer;
    }

    #FullImageView {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        text-align: center;
        z-index: 1200;
    }

    #FullImage {
        padding: 24px;
        max-width: 98%;
        max-height: 98%;
    }

    #CloseBtn {
        position: absolute;
        top: 12px;
        right: 12px;
        font-size: 2rem;
        color: white;
        cursor: pointer;
    }
</style> -->

<!-- <div id="FullImageView">
    <img id="FullImage" />
    <span id="CloseBtn" onclick="FullViewClose()">&times;</span>
</div> -->
<!-- Admin Notice,Ad & Events end -->
@if($treatment_info->status != 2)
<div class="modal fade " id="Next_Appointment_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Add Next Appointment
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('next_appointment')}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="appointment_id" value="{{$appointment_id->id}}" name="appointment_id">
                        <input type="hidden" id="d_id" value="{{$doctor_info->id}}" name="d_id">
                        <input type="hidden" id="p_id" value="{{$patient->id}}" name="p_id">

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" value="{{$patient->name}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" min="{{date('Y-m-d')}}" max="{{\Carbon\Carbon::now()->addDays(5)->format('Y-m-d')}}">
                            <span class="text-danger">@error('date') {{$message}} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Time</label>
                            <input type="time" class="form-control" id="time" name="time">
                            <span class="text-danger">@error('time') {{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <span class="text-center text-danger">Are you sure you want to add next appointment for this patient?</span>
                        <a href="{{route('view_patient',[$doctor_info->id,$patient->id])}}" class="btn btn-sm btn-danger rounded my-0">
                            No,Back
                        </a>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Yes,Add</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
@endif


{{--<!-- Modal For Delete Medicine -->
<div class="modal fade " id="del-Prescription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete Prescription
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('prescription_delete')}}" method="POST">
@csrf
@method('delete')
<div class="mb-3 text-center">
    <h5 class="text-danger">Are You Sure to Delete This information?</h5>
</div>
<input type="hidden" id="del-Prescription-id" name="deletingId">
<!-- Modal Footer -->
<div class="modal-footer">
    <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Delete</button>
    <!-- Modal Footer end -->
</div>
</form>
</div>
<!-- Modal Body end -->
</div>
</div>
</div>
<!-- Modal end -->--}}

<!-- Modal For Report_Add Add -->
<div class="modal fade " id="Report_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Report
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('report',[$doctor_info->id,$patient->id,$treatment_info->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <label for="formFile" class="form-label text-dark">Drop Image</label>
                            <input class="form-control" name="report_image" type="file" id="formFile">
                            <span class="text-danger">@error('report_image') {{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_1">Discard
                        </button>
                        <button type="submit" class="btn btn-sm btn btn-sm btn-outline-blue-grey">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Delete Report -->
<div class="modal fade " id="del-Report" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete Report
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Investigation" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('report_delete')}}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This Report information?</h5>
                    </div>
                    <input type="hidden" id="del-Report-id" name="deletingId">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#Investigation">Close
                        </button>
                        <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Delete</button>
                        <!-- Modal Footer end -->
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For OT Notes update -->
<div class="modal fade " id="Ot_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit OT Notes
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <form action="{{route('update_ot')}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" id="ot_notes_id" name="ot_notes_id" />
                <div class="modal-body px-0">
                    <div class="p-2">
                        <textarea class="form-control" id="ot_note_form" rows="12" name="u_steps"></textarea>
                        <span class="text-danger">@error('u_steps') {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                    <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                </div>
            </form>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Delete ot -->
<div class="modal fade " id="del-ot" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete OT Note
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Investigation" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('delete_ot')}}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This OT information?</h5>
                    </div>
                    <input type="hidden" id="del-OT-id" name="deletingId">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#Investigation">Close
                        </button>
                        <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Delete</button>
                        <!-- Modal Footer end -->
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

@endsection

@push('page-js')
<script>
    $(document).ready(function() {
        $(document).on("click", '#SPatientDetails', function() {
            $(this).attr('id', 'HPatientDetails');
            $(this).text('Hide Details');
            $(this).addClass('mt-2');
            $('#patientInfoList').removeClass('d-none');
        });
        $(document).on("click", '#HPatientDetails', function() {
            $(this).attr('id', 'SPatientDetails');
            $(this).text('Show Details');
            $(this).removeClass('mt-2');
            $('#patientInfoList').addClass('d-none');
        });

        @if(Session::has('invalidReport') && count($errors) > 0)
        $('#Report_Add').modal('show');
        @endif
        $(document).on('click', '.delete-report', function() {
            var deleteReportId = $(this).val();
            // $("#Treatment_Plans").modal('hide');
            // alert(deleteTPId);
            $("#del-Report").modal('show');
            $('#del-Report-id').val(deleteReportId);
        });

        $(document).on('click', '.t_steps_editbtn', function() {
            var ot_id = $(this).val();
            let url = "{{route('ot_notes',[':ot_id'])}}";
            url = url.replace(':ot_id', ot_id);
            // $("#Treatment_Cost").modal('hide');
            // alert(ot_id);
            $("#Ot_Update").modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    // console.log(response.ts1);
                    let t = response.ts;

                    $('#ot_notes_id').val(ot_id);
                    $("textarea#ot_note_form").val(t);
                    // $('#chember-add').val(response.ci.chember_address);
                }
            });
        });

        @if(Session::has('invalidUpdate') && count($errors) > 0)
        // $('#Ot_Update').modal('show');
        $('.t_steps_editbtn').click();
        @endif

        $(document).on('click', '.delete-ot_note', function() {
            var deleteOtId = $(this).val();
            // $("#Treatment_Plans").modal('hide');
            // alert(deleteOtId);
            $("#del-ot").modal('show');
            $('#del-OT-id').val(deleteOtId);
        });
    });
</script>

<!-- <script>
    function FullView(ImgLink) {
        document.getElementById("FullImage").src = ImgLink;
        document.getElementById("FullImageView").style.display = "block";
    }

    function FullViewClose() {
        document.getElementById("FullImageView").style.display = "none";
    }
</script> -->
@endpush