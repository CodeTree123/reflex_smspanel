@extends('admin.doctor.admin_doc_master')

@section('content')
    <div class="d-flex justify-content-between aling-items-center">
        <span class="fs-4">Mobile Type List</span>
        <a class="crud-btns me-2 add_medicine" href="" data-bs-toggle="modal" data-bs-target="#MobileType_Add">
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>
    <!-- Medicine List-->
    <table class="table table-bordered mt-2 text-center align-middle MT_list">
        <thead>
        <tr>
            <th class="">#</th>
            <th class="">Name</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mobile_types as $key=>$mobile_type)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$mobile_type->name}}</td>
                <td>
                    <button class="btn crud-btns m_type_editbtn {{"MT_".$mobile_type->id}}" value="{{$mobile_type->id}}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    @if($mobile_type->status == 1)
                    <button class="btn crud-btns m_type_delete" value="{{$mobile_type->id}}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!--Medicine list end -->
    {{ $mobile_types ->links() }}
@endsection

@section('page-modals')
    <!-- Modal For Add Notice -->
    <div class="modal fade " id="MobileType_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Add MobileType
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('mobileType_add')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <input class="form-control" placeholder="Enter Type Name" name="typeName">
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
    <div class="modal fade " id="MType_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{route('update_mobile_type')}}" method="post" id="MT_UpdateForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <input class="form-control" placeholder="Enter Type Name" name="u_typeName" id="u_typeName">
                                <span class="text-danger u_typeName_error"></span>
                            </div>
                            <input type="hidden" class="form-control" name="mType_id" id="mType_id" value="">
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
    <div class="modal fade " id="MobileType_Delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{route('mobile_type_delete')}}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This Mobile Type?</h5>
                        </div>
                        <input type="hidden" id="del-mType-id" name="deletingId">
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

            @if(Session::has('invalidMTAdd') && count($errors) > 0)
            $('#MobileType_Add').modal('show');
            @endif

            //script for Notice Update
            $(document).on('click', '.m_type_editbtn', function () {
                var mType_id = $(this).val();
                var url = "{{route('edit_mobile_type',[':id'])}}";
                url = url.replace(':id', mType_id);
                // alert(mType_id);
                $("#MType_Update").modal('show');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        // console.log(response.notice);
                        $('#mType_id').val(mType_id);
                        $('#u_typeName').val(response.mt.name);
                    }
                });
            });

            $(document).on('submit', '#MT_UpdateForm', function (e) {
                e.preventDefault();

                var url = $(this).attr('action');
                // alert(url);

                var registerForm = $("#MT_UpdateForm");
                var formData = registerForm.serialize();

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        // console.log(data);
                        if (data.status == 200) {
                            $('#MType_Update').load(location.href + " #MType_Update>*", "");
                            $('.MT_list').load(location.href + " .MT_list>*", "");
                            $(document).sami_Toast_Append({
                                cus_toast_time: 3000,
                                cus_toast_msg: data.msg
                            });

                            $('#MType_Update').modal('hide');
                        } else {
                            $.each(data.error, function (key, value) {
                                $('.' + key + '_error').text(value);
                            });
                            $('.MT_' + data.id).click();
                        }
                    },
                });
            });

            // script for Notice delete
            $(document).on('click', '.m_type_delete', function () {
                var deletemTypeId = $(this).val();
                // alert(deletemTypeId);
                $("#MobileType_Delete").modal('show');
                $('#del-mType-id').val(deletemTypeId);
            });
        });
    </script>
@endpush
