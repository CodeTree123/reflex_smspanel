@extends('admin.doctor.admin_doc_master')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <span class="fs-4">Treatment Plans List</span>
        <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Plan_Add">
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>
    <!-- T/P Treatment Plans List-->
    <table class="table table-bordered mt-2 text-center align-middle TP_list">
        <thead>
        <tr>
            <th class="">Serial No</th>
            <th class="">Treatment Plans</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lt_ps as $key=>$ltp)
            <tr>
                <td class="p-0">{{$key+1}}</td>
                <td class="p-0">{{$ltp->name}}</td>
                <td class="d-flex justify-content-around p-0">
                    <button class="btn crud-btns TP_editbtn {{"TP_".$ltp->id}}" value="{{$ltp->id}}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="btn crud-btns delete-tp" data-tp-name="{{$ltp->name}}" value="{{$ltp->id}}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    {{ $lt_ps ->links() }}
    <!--T/P Treatment Plans list end -->
@endsection

@section('page-modals')
    <!-- Modal For T/P Treatment Plans Add -->
    <div class="modal fade " id="Treatment_Plan_Add" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Add Treatment Plan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('admin_add_tp')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="tp_status" id="" value="0">
                            <div class="mb-3 drug-name">
                                <input class="form-control" list="list" placeholder="Enter New Treatment Plan"
                                       name="tp_name">
                                <span class="text-danger">@error('tp_name') {{$message}} @enderror</span>
                            </div>
                            <input type="hidden" name="tp_status" id="tp_status" value="0" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-sm btn-outline-blue-grey">Confirm</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->
    <!-- Modal For T/P Treatment Plans update -->
    <div class="modal fade " id="Treatment_Plan_Update" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Edit Treatment Plan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('admin_update_tp')}}" method="post" id="UpdateTPForm">
                        @csrf
                        @method('PUT')

                        <input type="hidden" id="TPId" name="t_p_id"/>
                        <div class="modal-body">
                            <div class="mb-3 drug-name">
                                <input class="form-control" list="list" id="Ut_p_name"
                                       placeholder="Enter New Treatment Plan" name="Utp_name">
                                <span class="text-danger Utp_name_error"></span>
                            </div>
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
    <!-- Modal For Delete T/P Treatment Plans -->
    <div class="modal fade " id="del-TP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Delete T/P Treatment Plans
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('admin_delete_tp')}}" method="POST" id="DeleteTPForm">
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This <span class="text-dark"
                                                                                      id="del-TP-name"></span>
                                information?</h5>
                        </div>
                        <input type="hidden" id="del-TP-id" name="deletingId">
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#Treatment_Plans">Close
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
        $(document).ready(function () {

            @if(Session::has('invalidTPAdd') && count($errors) > 0)
            $('#Treatment_Plan_Add').modal('show');
            @endif

            // script for T/P Treatment Plans update/edit

            $(document).on('click', '.TP_editbtn', function () {
                var tp_id = $(this).val();
                var url = "{{route('admin_edit_tp',[':tp_id'])}}";
                url = url.replace(':tp_id', tp_id);
                // alert(tp_id);
                $("#Treatment_Plan_Update").modal('show');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        // console.log(response);
                        $('#TPId').val(tp_id);
                        $('#Ut_p_name').val(response.tp.name);
                        // $('#t_p_cost').val(response.tp.cost);
                    }
                });
            });

            $(document).on('submit', '#UpdateTPForm', function (e) {
                e.preventDefault();

                var url = $(this).attr('action');
                // alert(url);

                var registerForm = $("#UpdateTPForm");
                var formData = registerForm.serialize();

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        // console.log(data);
                        if (data.status == 200) {
                            $('#Treatment_Plan_Update').load(location.href + " #Treatment_Plan_Update>*", "");
                            $('.TP_list').load(location.href + " .TP_list>*", "");
                            $(document).sami_Toast_Append({
                                cus_toast_time: 3000,
                                cus_toast_msg: data.msg
                            });

                            $('#Treatment_Plan_Update').modal('hide');
                        } else {
                            $.each(data.error, function (key, value) {
                                $('.' + key + '_error').text(value);
                            });
                            $('.TP_' + data.id).click();
                        }
                    },
                });
            });

            $(document).on('click', '.delete-tp', function () {
                var deleteTPId = $(this).val();
                let deleteName = $(this).attr('data-tp-name');
                // alert(deleteTPId);
                $("#del-TP").modal('show');
                $('#del-TP-id').val(deleteTPId);
                $('#del-TP-name').text(deleteName);
            });

            $(document).on('submit', '#DeleteTPForm', function (e) {
                e.preventDefault();

                var url = $(this).attr('action');
                // alert(url);

                var registerForm = $("#DeleteTPForm");
                var formData = registerForm.serialize();

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        // console.log(data);
                        if (data.status == 200) {
                            $('#del-TP').load(location.href + " #del-Investigation>*", "");
                            $('.TP_list').load(location.href + " .TP_list>*", "");
                            $(document).sami_Toast_Append({
                                cus_toast_time: 3000,
                                cus_toast_msg: data.msg
                            });

                            $('#del-TP').modal('hide');
                        }
                    },
                });
            });
        });
    </script>
@endpush
