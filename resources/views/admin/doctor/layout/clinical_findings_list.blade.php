@extends('admin.doctor.admin_doc_master')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <span class="fs-4">Clinical Findings List</span>
        <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Clinical_Finding_Add">
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>
    <!-- C/F Clinical Findings List-->
    <table class="table table-bordered mt-2 text-center align-middle cf_list">
        <thead>
        <tr>
            <th class="">Serial No</th>
            <th class="">Clinical Findings</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lc_fs as $key=>$lcf)
            <tr>
                <td class="p-0">{{$key+1}}</td>
                <td class="p-0">{{$lcf->name}}</td>
                <td class="d-flex justify-content-around p-0">
                    <button class="btn crud-btns CF_editbtn {{"CF_".$lcf->id}}" value="{{$lcf->id}}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="btn crud-btns delete-cf" data-cf-name="{{$lcf->name}}" value="{{$lcf->id}}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $lc_fs ->links() }}
    <!--C/F Clinical Findings list end -->

@endsection

@section('page-modals')
    <!-- Modal For C/F Clinical Findings Add -->
    <div class="modal fade " id="Clinical_Finding_Add" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Add Clinical Finding
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('add_clinical_finding')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3 drug-name">
                                <input class="form-control" list="list" placeholder="Enter New Clinical Finding"
                                       name="cf_name">
                                <span class="text-danger">@error('cf_name') {{$message}} @enderror</span>
                            </div>
                            <input type="hidden" name="cf_status" id="" value="0">
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
    <!-- Modal For C/F Clinical Findings update -->
    <div class="modal fade " id="Clinical_Finding_Update" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Edit Clinical Finding
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('update_clinical_finding')}}" method="post" id="UpdateCFForm">
                        @csrf
                        @method('PUT')

                        <input type="hidden" id="CFId" name="c_f_id"/>
                        <div class="modal-body">
                            <div class="mb-3 drug-name">
                                <input class="form-control" list="list" id="uc_f_name"
                                       placeholder="Enter New Clinical Finding" name="Ucf_name">
                                <span class="text-danger Ucf_name_error"></span>
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
    <!-- Modal For Delete C/F Clinical Findings -->
    <div class="modal fade " id="del-CF" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Delete C/F Clinical Findings
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('delete_clinical_finding')}}" method="POST" id="DeleteCFForm">
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This <span class="text-dark"
                                                                                      id="del-cf-name"></span>
                                information?</h5>
                        </div>
                        <input type="hidden" id="del-cf-id" name="deletingId">
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#Clinical_Findings">Close
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

            @if(Session::has('invalidCFAdd') && count($errors) > 0)
            $('#Clinical_Finding_Add').modal('show');
            @endif

            // script for C/F Clinical Findings
            $(document).on('click', '.CF_editbtn', function () {
                var cf_id = $(this).val();
                var url = "{{route('edit_clinical_finding',[':cf_id'])}}";
                url = url.replace(':cf_id', cf_id);
                // alert(cf_id);
                $("#Clinical_Finding_Update").modal('show');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        // console.log(response);
                        $('#CFId').val(cf_id);
                        $('#uc_f_name').val(response.cf.name);
                    }
                });
            });

            $(document).on('submit', '#UpdateCFForm', function (e) {
                e.preventDefault();

                var url = $(this).attr('action');
                // alert(url);

                var registerForm = $("#UpdateCFForm");
                var formData = registerForm.serialize();

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        // console.log(data);
                        if (data.status == 200) {
                            $('#Clinical_Finding_Update').load(location.href + " #Clinical_Finding_Update>*", "");
                            $('.cf_list').load(location.href + " .cf_list>*", "");
                            $(document).sami_Toast_Append({
                                cus_toast_time: 3000,
                                cus_toast_msg: data.msg
                            });

                            $('#Clinical_Finding_Update').modal('hide');
                        } else {
                            $.each(data.error, function (key, value) {
                                $('.' + key + '_error').text(value);
                            });
                            $('.CF_' + data.id).click();
                        }
                    },
                });
            });

            $(document).on('click', '.delete-cf', function () {
                var deleteCFId = $(this).val();
                let deleteName = $(this).attr('data-cf-name');
                // alert(deleteName);
                $("#del-CF").modal('show');
                $('#del-cf-id').val(deleteCFId);
                $('#del-cf-name').text(deleteName);
            });

            $(document).on('submit', '#DeleteCFForm', function (e) {
                e.preventDefault();

                var url = $(this).attr('action');
                // alert(url);

                var registerForm = $("#DeleteCFForm");
                var formData = registerForm.serialize();

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        // console.log(data);
                        if (data.status == 200) {
                            $('#del-CF').load(location.href + " #del-CF>*", "");
                            $('.cf_list').load(location.href + " .cf_list>*", "");
                            $(document).sami_Toast_Append({
                                cus_toast_time: 3000,
                                cus_toast_msg: data.msg
                            });

                            $('#del-CF').modal('hide');
                        }
                    },
                });
            });
        });
    </script>
@endpush
