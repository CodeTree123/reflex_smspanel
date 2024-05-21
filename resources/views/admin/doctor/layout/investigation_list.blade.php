@extends('admin.doctor.admin_doc_master')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <span class="fs-4">Investigation List</span>
        <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Investigation_Add">
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>
    <!-- Investigation List-->
    <table class="table table-bordered mt-2 text-center align-middle invest_list">
        <thead>
        <tr>
            <th class="">Serial No</th>
            <th class="">Investigations</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($investigation_lists as $key=>$investigation_list)
            <tr>
                <td class="p-0">{{$key+1}}</td>
                <td class="p-0">{{$investigation_list->name}}</td>
                <td class="d-flex justify-content-around p-0">
                    <button class="btn crud-btns Investigation_editbtn {{"Invest_".$investigation_list->id}}"
                            value="{{$investigation_list->id}}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="btn crud-btns delete-Investigation" data-invest-name="{{$investigation_list->name}}"
                            value="{{$investigation_list->id}}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    {{ $investigation_lists ->links() }}
    <!--Investigation list end -->
@endsection

@section('page-modals')
    <!-- Modal For Investigation Add -->
    <div class="modal fade " id="Investigation_Add" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Add Investigation
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('add_investigation')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3 drug-name">
                                <input class="form-control" list="list" placeholder="Enter New Investigation"
                                       name="investigation_name">
                                <span class="text-danger">@error('investigation_name') {{$message}} @enderror</span>
                                <input type="hidden" name="investigation_status" id="investigation_status" value="0"
                                       readonly>
                            </div>
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
    <!-- Modal For Investigation update -->
    <div class="modal fade " id="Investigation_Update" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Edit Investigation
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('update_investigation')}}" method="post" id="UpdateInvestForm">
                        @csrf
                        @method('PUT')

                        <input type="hidden" id="InvestigationId" name="investigation_id"/>
                        <div class="modal-body">
                            <div class="mb-3 drug-name">
                                <input class="form-control" list="list" id="Investigation_name"
                                       placeholder="Enter Investigation" name="Uinvestigation_name">
                                <span class="text-danger Uinvestigation_name_error"></span>
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
    <!-- Modal For Delete Investigation -->
    <div class="modal fade " id="del-Investigation" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Delete Investigation
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('delete_investigation')}}" method="POST" id="DeleteInvestForm">
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This <span class="text-dark"
                                                                                      id="del-Invest-name"></span>
                                information?</h5>
                        </div>
                        <input type="hidden" id="del-Investigation-id" name="deletingId">
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#Investigation">Close
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

            @if(Session::has('invalidInvsAdd') && count($errors) > 0)
            $('#Investigation_Add').modal('show');
            @endif

            // script for Investigation

            $(document).on('click', '.Investigation_editbtn', function () {
                var Investigation_id = $(this).val();
                var url = "{{route('edit_investigation',[':Investigation_id'])}}";
                url = url.replace(':Investigation_id', Investigation_id);
                // alert(Investigation_id);
                $("#Investigation_Update").modal('show');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        // console.log(response);
                        $('#InvestigationId').val(Investigation_id);
                        $('#Investigation_name').val(response.inves.name);
                    }
                });
            });

            $(document).on('submit', '#UpdateInvestForm', function (e) {
                e.preventDefault();

                var url = $(this).attr('action');
                // alert(url);

                var registerForm = $("#UpdateInvestForm");
                var formData = registerForm.serialize();

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        // console.log(data);
                        if (data.status == 200) {
                            $('#Investigation_Update').load(location.href + " #Investigation_Update>*", "");
                            $('.invest_list').load(location.href + " .invest_list>*", "");
                            $(document).sami_Toast_Append({
                                cus_toast_time: 3000,
                                cus_toast_msg: data.msg
                            });

                            $('#Investigation_Update').modal('hide');
                        } else {
                            $.each(data.error, function (key, value) {
                                $('.' + key + '_error').text(value);
                            });
                            $('.Invest_' + data.id).click();
                        }
                    },
                });
            });

            $(document).on('click', '.delete-Investigation', function () {
                var deleteInvestigationId = $(this).val();
                let deleteName = $(this).attr('data-invest-name');
                // alert(deleteInvestigationId);
                $("#del-Investigation").modal('show');
                $('#del-Investigation-id').val(deleteInvestigationId);
                $('#del-Invest-name').text(deleteName);
            });

            $(document).on('submit', '#DeleteInvestForm', function (e) {
                e.preventDefault();

                var url = $(this).attr('action');
                // alert(url);

                var registerForm = $("#DeleteInvestForm");
                var formData = registerForm.serialize();

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        // console.log(data);
                        if (data.status == 200) {
                            $('#del-Investigation').load(location.href + " #del-Investigation>*", "");
                            $('.invest_list').load(location.href + " .invest_list>*", "");
                            $(document).sami_Toast_Append({
                                cus_toast_time: 3000,
                                cus_toast_msg: data.msg
                            });

                            $('#del-Investigation').modal('hide');
                        }
                    },
                });
            });
        });
    </script>
@endpush
