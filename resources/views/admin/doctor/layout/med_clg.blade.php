@extends('admin.doctor.admin_doc_master')

@section('content')
    <div class="d-flex justify-content-between aling-items-center">
        <span class="fs-4">Medical College List</span>
        <a class="crud-btns me-2 add_medicine" href="" data-bs-toggle="modal" data-bs-target="#MedClg_Add">
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>
    <!-- Medicine List-->
    <table class="table table-bordered mt-2 text-center align-middle MC_list">
        <thead>
        <tr>
            <th class="">#</th>
            <th class="">Name</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($med_clgs as $key=>$med_clg)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$med_clg->name}}</td>
                <td>
                    <button class="btn crud-btns m_c_editbtn {{"MC_".$med_clg->id}}" value="{{$med_clg->id}}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    @if($med_clg->status == 1)
                        <button class="btn crud-btns m_c_delete" value="{{$med_clg->id}}">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!--Medicine list end -->
    {{ $med_clgs ->links() }}
@endsection

@section('page-modals')
    <!-- Modal For Add Notice -->
    <div class="modal fade " id="MedClg_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Add Medical College
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('med_clg_add')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <input class="form-control" placeholder="Enter Medical College Name" name="typeName">
                                <span class="text-danger">@error('typeName') {{$message}} @enderror</span>
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

    <!-- Modal For Update Notice -->
    <div class="modal fade " id="MClg_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Update Mobile Type
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('update_med_clg')}}" method="post" id="MC_UpdateForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <input class="form-control" placeholder="Enter Type Name" name="u_typeName" id="u_typeName">
                                <span class="text-danger u_typeName_error"></span>
                            </div>
                            <input type="hidden" class="form-control" name="mClg_id" id="mClg_id" value="">
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

    <!-- Modal For Delete Notice -->
    <div class="modal fade " id="Med_Clg_Delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Delete Mobile Type
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('med_clg_delete')}}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This Medical College?</h5>
                        </div>
                        <input type="hidden" id="del-mClg-id" name="deletingId">
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close
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

            @if(Session::has('invalidMCAdd') && count($errors) > 0)
            $('#MedClg_Add').modal('show');
            @endif

            //script for Notice Update
            $(document).on('click', '.m_c_editbtn', function () {
                var mClg_id = $(this).val();
                var url = "{{route('edit_med_clg',[':id'])}}";
                url = url.replace(':id', mClg_id);
                // alert(mClg_id);
                $("#MClg_Update").modal('show');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        // console.log(response.notice);
                        $('#mClg_id').val(mClg_id);
                        $('#u_typeName').val(response.mc.name);
                    }
                });
            });

            $(document).on('submit', '#MC_UpdateForm', function (e) {
                e.preventDefault();

                var url = $(this).attr('action');
                // alert(url);

                var registerForm = $("#MC_UpdateForm");
                var formData = registerForm.serialize();

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        // console.log(data);
                        if (data.status == 200) {
                            $('#MClg_Update').load(location.href + " #MClg_Update>*", "");
                            $('.MC_list').load(location.href + " .MC_list>*", "");
                            $(document).sami_Toast_Append({
                                cus_toast_time: 3000,
                                cus_toast_msg: data.msg
                            });

                            $('#MClg_Update').modal('hide');
                        } else {
                            $.each(data.error, function (key, value) {
                                $('.' + key + '_error').text(value);
                            });
                            $('.MC_' + data.id).click();
                        }
                    },
                });
            });

            // script for Notice delete
            $(document).on('click', '.m_c_delete', function () {
                var deletemClgId = $(this).val();
                // alert(deletemClgId);
                $("#Med_Clg_Delete").modal('show');
                $('#del-mClg-id').val(deletemClgId);
            });
        });
    </script>
@endpush
