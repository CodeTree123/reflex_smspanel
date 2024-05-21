@extends('master.doc_master')
@section('content')

@php
$subscription = subscription();
$sub_remain = sub_remain();
$notices = notices();
$total_cost = total_cost();
$total_paid = total_paid();
$total_due = total_due();
@endphp

@push('page-css')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

@endpush

<!-- body -->
<!-- body part 1 -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 pe-0">
            @include('doctor.include.docLeftSide')
        </div>

        <!-- body part 1 end-->
        <!-- body part 2 -->

        <div class="col-md-7 pe-0">
            <div class="blank-sec">
                <div class="d-flex justify-content-between align-items-center p-2">
                    <h4>Appointment List</h4>
                    <button class="btn btn-outline-blue-grey crud-btns Appointment" value="" data-bs-toggle="modal" data-bs-target="#Appointment_form">
                        <!-- <i class="fa-solid fa-pen-to-square"></i> -->
                        Set Appointment
                    </button>
                </div>

                <div class="p-2 mt-3" id="calendar">

                </div>


                {{-- @if(Session::has('fail'))--}}
                {{-- <div class="d-flex justify-content-between align-items-center alert alert-danger alert-dismissible fade show" role="alert">--}}
                {{-- {{Session::get('fail')}}--}}
                {{-- </div>--}}
                {{-- @endif--}}
                {{-- <table class="table table-bordered mt-2 text-center">--}}
                {{-- <thead>--}}
                {{-- <tr>--}}
                {{-- <th class="">#</th>--}}
                {{-- <th class="">Name</th>--}}
                {{-- <th class="">Mobile</th>--}}
                {{-- <th class="">Appointment Date</th>--}}
                {{-- <th class="">Appointment Time</th>--}}
                {{-- <th class="">Status</th>--}}
                {{-- <th class="">Action</th>--}}
                {{-- </tr>--}}
                {{-- </thead>--}}
                {{-- <tbody>--}}
                {{-- @foreach($appointment as $key=>$a)--}}
                {{-- <tr>--}}
                {{-- <td>{{$key +1}}</td>--}}
                {{-- <td>{{$a->name}}</td>--}}
                {{-- <td>{{$a->mobile}}</td>--}}
                {{-- <td>{{Carbon\Carbon::parse($a->date)->format('d/m/Y')}}</td>--}}
                {{-- <td>{{$a->time}}</td>--}}
                {{-- <td>--}}
                {{-- @if($a->status == 1)--}}
                {{-- <a href="#" class="btn btn-sm btn-danger my-0">Done</a>--}}
                {{-- @else--}}
                {{-- <a href="#" class="btn btn-sm btn-success my-0">Pending</a>--}}
                {{-- @endif--}}
                {{-- </td>--}}
                {{-- <td class="d-flex justify-content-around">--}}
                {{-- <button class="btn crud-btns app_editbtn" href="" value="{{$a->id}}">--}}
                {{-- <i class="fa-solid fa-pen-to-square"></i>--}}
                {{-- </button>--}}
                {{-- <button class="btn crud-btns delete-appointment" href="#" value="{{$a->id}}">--}}
                {{-- <i class="fa-solid fa-trash"></i>--}}
                {{-- </button>--}}
                {{-- </td>--}}
                {{-- </tr>--}}
                {{-- @endforeach--}}
                {{-- </tbody>--}}
                {{-- </table>--}}
                {{-- @foreach($date_lists as $date_list)--}}
                {{-- @if($date_list >= Carbon\Carbon::now()->format('d/M/Y'))--}}
                {{-- <div class="m-3">--}}
                {{-- <h5>{{$date_list}}</h5>--}}
                {{-- <hr>--}}
                {{-- <div class="row">--}}
                {{-- @foreach($appointment as $key=>$a)--}}
                {{-- @if($date_list == Carbon\Carbon::parse($a->date)->format('d/M/Y'))--}}
                {{-- <div class="col-3 my-2 Appointment-details blue-grey-border-thin App_list">--}}
                {{-- <div class="p-2 d-flex align-items-center justify-content-around">--}}
                {{-- <div class="Appointment-Patient-img1">--}}
                {{-- @if($a->image == null)--}}
                {{-- <img src="{{ asset('assets/img/profile.png')}}">--}}
                {{-- @else--}}
                {{-- <img src="{{url('public/uploads/patient/'.$a->image)}}">--}}
                {{-- @endif--}}
                {{-- </div>--}}
                {{-- <div class="d-flex flex-column align-items-center">--}}
                {{-- <button class="btn btn-sm crud-btns app_editbtn {{'App_'.$a->id}}" value="{{$a->id}}">--}}
                {{-- <i class="fa-solid fa-pen-to-square"></i>--}}
                {{-- </button>--}}
                {{-- <button class="btn btn-sm crud-btns delete-appointment" value="{{$a->id}}">--}}
                {{-- <i class="fa-solid fa-trash"></i>--}}
                {{-- </button>--}}
                {{-- </div>--}}
                {{-- </div>--}}
                {{-- <div class="text-center">--}}
                {{-- <p>{{$a->name}}</p>--}}
                {{-- <p>{{$a->time}}</p>--}}
                {{-- </div>--}}
                {{-- </div>--}}
                {{-- @endif--}}
                {{-- @endforeach--}}
                {{-- </div>--}}
                {{-- </div>--}}
                {{-- @endif--}}
                {{-- @endforeach--}}
            </div>
        </div>
        <!-- body part 2 end -->
        <!-- body part 3 -->

        <!-- Admin Notice,Ad & Events start -->
        <div class="col-md-3 page-home">

            <div class="info-box-col mb-3">
                @include('doctor.include.docRightSide')
            </div>
            <!-- body part 3 end -->

        </div>
    </div>
    <!-- body end-->

    @push('page-modals')

    <!-- Modal For Appointment -->
    <div class="modal fade " id="Appointment_List" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Appointment For <span id="app_date"></span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <table class="table table-bordered mt-2 text-center align-middle">
                        <thead>
                            <tr>
                                <th class="">Image</th>
                                <th class="">Name</th>
                                <th class="">Contact</th>
                                <th class="">Time</th>
                                <th class="">Action</th>
                            </tr>
                        </thead>
                        <tbody id="app_list_tbl">

                        </tbody>
                    </table>

                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Modal For Appointment -->
    <div class="modal fade " id="Appointment_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Add Appointment
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('appointment')}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <input type="hidden" id="d_id" value="{{$doctor_info->id}}" name="d_id">
                            <input type="hidden" id="p_id" value="" name="p_id">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <select class="form-control custom-form-control multi" id="phone" name="" aria-label="Default select example" style="width:100%;">
                                    <option value="">Nothing To Select</option>
                                    @foreach($patient_list as $t_p)
                                    <option value="{{$t_p->id}}">{{$t_p->mobile." (".$t_p->m_type->name.")"}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" min="{{date('Y-m-d')}}" max="{{\Carbon\Carbon::now()->addDays(365)->format('Y-m-d')}}">
                                <span class="text-danger">@error('date') {{$message}} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="time" class="form-label">Time</label>
                                <input type="time" class="form-control" id="time" name="time">
                                <span class="text-danger">@error('time') {{$message}} @enderror</span>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="appointment_sms" id="registration_sms" value="on">
                                <label class="form-check-label" for="appointment_sms">Send SMS to Patient?</label>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-sm btn-outline-blue-grey">Appointment</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->
    <!-- Modal For Edit Appointment -->
    <div class="modal fade " id="Appointment_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Edit Appointment
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('update_appointment')}}" method="post" id="UpdateAppForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <input type="hidden" id="appointment_id" value="" name="appointment_id">
                            <div class="mb-3">
                                <label for="e_phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="e_phone" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="e_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="e_name" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="e_date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="e_date" name="date" min="{{date('Y-m-d')}}" max="{{\Carbon\Carbon::now()->addDays(5)->format('Y-m-d')}}">
                                <span class="text-danger date_error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="e_time" class="form-label">Time</label>
                                <input type="time" class="form-control" id="e_time" name="time">
                                <span class="text-danger time_error"></span>
                            </div>

                            {{-- <label for="patient_id" class="form-label">Patient ID</label>--}}
                            {{-- <input type="text" class="form-control" id="e_patient_id" readonly>--}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Modal For Delete Appointment -->
    <div class="modal fade " id="del-Appointment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Delete Appointment Information
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('delete_appointment')}}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                        </div>
                        <input type="hidden" id="del-Appointment-id" name="deletingId">
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
    <!-- Modal end -->

    @endpush

    @endsection

    @push('page-js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <script>
        $(document).ready(function() {
            var appointments = @json($events);
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek',
                },
                events: appointments,
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDays) {
                    var select_date = moment(start).format('YYYY-MM-DD');
                    var url = "{{route('view_appointment',[':select_date'])}}";
                    url = url.replace(':select_date', select_date);
                    $.ajax({
                        url: url,
                        type: "GET",
                        success: function(response) {
                            // console.log(response.app_list);
                            $('#Appointment_List').modal('show');

                            $('#app_date').text(response.date);

                            $('#app_list_tbl').html("");
                            $.each(response.app_list, function(index, value) {
                                $('#app_list_tbl').append('\
                                    <tr>\
                                        <td><img src="/../public/uploads/patient/' + value.image + '" alt="" width="50px" height="50px"> </td>\
                                        <td>' + value.name + '</td>\
                                        <td>' + value.mobile + '</td>\
                                        <td>' + value.time + '</td>\
                                        <td>\
                                            <button class="btn btn-sm crud-btns app_editbtn App_' + value.id + '" value="' + value.id + '">\
                                                <i class="fa-solid fa-pen-to-square"></i>\
                                            </button>\
                                            <button class="btn btn-sm crud-btns delete-appointment" value="' + value.id + '">\
                                                <i class="fa-solid fa-trash"></i>\
                                            </button>\
                                        </td>\
                                    </tr>\
                                ');
                            });
                        }
                    });
                }


            });

            $('.fc-event').css('font-size', '20px');
            $('.fc-event').css('text-align', 'center');

            $(".multi").select2({
                dropdownParent: $("#Appointment_form")
            });

            @if(Session::has('invalidAppAdd') && count($errors) > 0)
            $('#Appointment_form').modal('show');
            @endif

            $('#phone').change(function() {
                var id = $(this).val();
                // alert(id);
                var d_id = $('#d_id').val();
                var url = "{{route('get_patient_info',[':d_id',':id'])}}";
                url = url.replace(':d_id', d_id);
                url = url.replace(':id', id);
                // console.log(url);
                //  alert(d_id);
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(response) {
                        $('#p_id').val(response.p_info.id)
                        $('#name').val(response.p_info.name);
                    }
                });

            });

            $(document).on('click', '.app_editbtn', function() {
                var app_id = $(this).val();
                $("#Appointment_List").modal('hide');
                var url = "{{route('edit_appointment',[':app_id'])}}";
                url = url.replace(':app_id', app_id);
                // alert(app_id);
                $("#Appointment_edit").modal('show');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(response) {
                        // console.log(response.f_date);
                        $('#appointment_id').val(app_id);
                        $('#e_phone').val(response.app.mobile);
                        $('#e_name').val(response.app.name);
                        $('#e_date').val(response.f_date);
                        $('#e_time').val(response.f_time);
                    }
                });
            });

            // $(document).on('submit', '#UpdateAppForm', function(e) {
            //     e.preventDefault();
            //
            //     var url = $(this).attr('action');
            //     // alert(url);
            //
            //     var registerForm = $("#UpdateAppForm");
            //     var formData = registerForm.serialize();
            //
            //     $.ajax({
            //         url: url,
            //         type: 'POST',
            //         data: formData,
            //         success: function(data) {
            //             // console.log(data);
            //             if (data.status == 200) {
            //                 $('#Appointment_edit').load(location.href + " #Appointment_edit>*", "");
            //                 $('.App_list').load(location.href + " .App_list>*", "");
            //                 $(document).sami_Toast_Append({
            //                     cus_toast_time: 3000,
            //                     cus_toast_msg: data.msg
            //                 });
            //
            //                 $('#Appointment_edit').modal('hide');
            //                 $("#Appointment_List").modal('show');
            //             } else {
            //                 $.each(data.error, function(key, value) {
            //                     $('.' + key + '_error').text(value);
            //                 });
            //                 $('.App_' + data.id).click();
            //             }
            //         },
            //     });
            // });

            $(document).on('click', '.delete-appointment', function() {
                var deleteDoctorId = $(this).val();
                // alert(deleteCCId);
                $("#del-Appointment").modal('show');
                $("#Appointment_List").modal('hide');
                $('#del-Appointment-id').val(deleteDoctorId);
            });
        });
    </script>
    @endpush