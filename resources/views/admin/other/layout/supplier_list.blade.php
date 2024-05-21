@extends('admin.other.admin_other_master')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <span class="fs-4">Supplier List</span>
        <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#supplier_Add">
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>
    <!-- C/C Supplier List-->
    <table class="table table-bordered mt-2 text-center align-middle">
        <thead>
        <tr>
            <th class="">Serial No</th>
            <th class="">Supplier Name</th>
            <th class="">Supplier Email</th>
            <th class="">Status</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($shops as $key=>$shop)
            <tr>
                <td class="p-0">{{$key+1}}</td>
                <td class="p-0">{{$shop->fname." ".$shop->lname}}</td>
                <td class="p-0">{{$shop->email}}</td>
                <td>
                    @if($shop->status == 0)
                        <a href="{{route('supplier_status',[$shop->id])}}" class="btn btn-sm btn-danger my-0">Block</a>
                    @else
                        <a href="{{route('supplier_status',[$shop->id])}}"
                           class="btn btn-sm btn-success my-0">Unblock</a>
                    @endif
                </td>
                <td class="d-flex justify-content-around p-0">
                    {{--<button type="button" class="btn crud-btns supplier_editbtn" href="" value="{{$other->id}}">
                    <i class="fa-solid fa-pen-to-square"></i>
                    </button>--}}
                    <button class="btn crud-btns delete-supplier" href="#" value="{{$shop->id}}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $shops ->links() }}
@endsection

@section('page-modals')
    <!-- Modal For Supplier Add -->
    <div class="modal fade " id="supplier_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Add Supplier
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('supplier_add')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                           name="s_fname">
                                    <span class="text-danger">@error('s_fname') {{$message}} @enderror</span>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                           name="s_lname">
                                    <span class="text-danger">@error('s_lname') {{$message}} @enderror</span>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Shop Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                           name="s_shopName">
                                    <span class="text-danger">@error('s_shopName') {{$message}} @enderror</span>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Contact Number</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1"
                                           name="s_phone">
                                    <span class="text-danger">@error('s_phone') {{$message}} @enderror</span>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input class="form-control" type="file" id="formFile" name="s_image">
                                    <span class="text-danger">@error('s_image') {{$message}} @enderror</span>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email">
                                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1"
                                           name="s_password">
                                    <span class="text-danger">@error('s_password') {{$message}} @enderror</span>
                                </div>
                            </div>
                            <input type="hidden" name="cf_status" id="" value="0">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-sm btn-outline-blue-grey">Add</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Modal For Delete Supplier -->
    <div class="modal fade " id="del-supplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Delete Supplier
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('supplier_delete')}}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                        </div>
                        <input type="text" id="del-supplier-id" name="deletingId">
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
@endsection

@push('page-js')
    <script>
        $(document).ready(function () {
            @if(Session::has('invalidSupplierAdd') && count($errors) > 0)
            $('#supplier_Add').modal('show');
            @endif

            $(document).on('click', '.delete-supplier', function () {
                var deleteReportId = $(this).val();

                $("#del-supplier").modal('show');
                $('#del-supplier-id').val(deleteReportId);
            });

        });
    </script>
@endpush
