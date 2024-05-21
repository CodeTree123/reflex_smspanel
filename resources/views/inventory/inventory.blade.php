@extends('master.doc_master')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="fs-4">My Inventory List</span>
        <button class="btn btn-sm crud-btns" data-bs-toggle="modal" data-bs-target="#Inventory_Add">
            <i class="bi bi-plus-circle"></i>
        </button>
    </div>

    <table class="table mt-2 text-center align-middle" id="inv_list">
        <thead>
        <tr>
            <th class="">#</th>
            <th class="">Product Name</th>
            <th class="">Product Description</th>
            <th class="">Stock</th>
            <th class="">Stock Alert</th>
            <th class="">Stock Status</th>
            <th class="">Status</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($storages as $key=>$storage)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$storage->product_name}}</td>
                <td>
                    @if($storage->product_description != null)
                    {{$storage->product_description}}
                    @else
                    No Description
                    @endif
                </td>
                <td>{{$storage->product_stock}}</td>
                <td>{{$storage->product_stock_alert}}</td>
                <td>
                    @if($storage->stock_status == 1)
                        <p class="text-success my-0">In Stock</p>
                    @else
                        <p class="text-danger my-0">Out of Stock</p>
                    @endif
                </td>
                <td>
                    @if($storage->status == 1)
                        <p class="text-success my-0">Active</p>
                    @else
                        <p class="text-danger my-0">Inactive</p>
                    @endif
                </td>
                <td>
                    <button class="btn crud-btns Inv_Edit {{"inv_".$storage->id}}" value="{{$storage->id}}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    @if($storage->status == 1)
                        <a href="{{route('inventory_status',[$storage->id])}}" class="btn btn-sm rounded btn-danger my-0">Inactive</a>
                    @else
                        <a href="{{route('inventory_status',[$storage->id])}}" class="btn btn-sm rounded btn-success my-0">Active</a>
                    @endif
                    @if($storage->product_stock_alert >= $storage->product_stock)
                        <button class="mt-1 btn btn-sm crud-btns btn-danger Pro_restock {{"inv_stock".$storage->id}}" data-pro="{{$storage->product_name}}" value="{{$storage->id}}">
                            Restock
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('page-modals')
    <div class="modal fade " id="Inventory_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content new-Product-modal">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Add New Inventory
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('add_inventory')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="pro_name" class="form-label">New Product Name</label>
                                <input type="text" class="form-control" id="pro_name" aria-describedby="emailHelp" name="pro_name">
                                <span class="text-danger">@error('pro_name') {{$message}} @enderror</span>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="pro_qty" class="form-label">Product Quantity</label>
                                    <input type="number" class="form-control" id="pro_qty" aria-describedby="emailHelp" name="pro_qty">
                                    <span class="text-danger">@error('pro_qty') {{$message}} @enderror</span>
                                </div>
                                <div class="col-6">
                                    <label for="pro_alert_qty" class="form-label">Product Alert Quantity</label>
                                    <input type="number" class="form-control" id="pro_alert_qty" aria-describedby="emailHelp" name="pro_alert_qty">
                                    <span class="text-danger">@error('pro_alert_qty') {{$message}} @enderror</span>
                                </div>
                            </div>
                                <div class="mb-3">
                                    <label for="pro_desc" class="form-label">Product Description</label>
                                    <textarea class="form-control" id="pro_desc" rows="4" name="pro_desc"></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-sm btn-black">Confirm</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>

    <div class="modal fade " id="Inventory_Edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content new-Product-modal">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Edit Inventory
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('update_inventory')}}" method="post" id="Update_inv">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <input type="hidden" id="inv_id" name="inv_id">
                            <div class="mb-3">
                                <label for="u_pro_name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="u_pro_name" aria-describedby="emailHelp" name="u_pro_name">
                                <span class="text-danger u_pro_name_error"></span>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="u_pro_qty" class="form-label">Product Quantity</label>
                                    <input type="number" class="form-control" id="u_pro_qty" aria-describedby="emailHelp" name="u_pro_qty">
                                    <span class="text-danger u_pro_qty_error"></span>
                                </div>
                                <div class="col-6">
                                    <label for="u_pro_alert_qty" class="form-label">Product Alert Quantity</label>
                                    <input type="number" class="form-control" id="u_pro_alert_qty" aria-describedby="emailHelp" name="u_pro_alert_qty">
                                    <span class="text-danger u_pro_alert_qty_error"></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="u_pro_desc" class="form-label">Product Description</label>
                                <textarea class="form-control" id="u_pro_desc" rows="4" name="u_pro_desc"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-sm btn-black">Confirm</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>

    <div class="modal fade " id="Inventory_Restock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content new-Product-modal">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Inventory Restock
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('restock_inventory')}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <input type="hidden" name="pro_stock_id" id="ProStock-id" value="">
                            <div class="mb-2">
                                <label for="re_pro_qty" class="form-label">New Quantity Of <span class="pro_name fw-bolder"></span></label>
                                <input type="number" class="form-control" id="re_pro_qty" aria-describedby="emailHelp" name="re_pro_qty" value="{{old('re_pro_qty')}}">
                                <span class="text-danger">@error('re_pro_qty') {{$message}} @enderror</span>
                            </div>
                            <div class="mb-2">
                                <label for="re_pro_alert_qty" class="form-label">New Alert Quantity Of <span class="pro_name fw-bolder"></span></label>
                                <input type="number" class="form-control" id="re_pro_alert_qty" aria-describedby="emailHelp" name="re_pro_alert_qty" value="{{old('re_pro_alert_qty')}}">
                                <span class="text-danger">@error('re_pro_alert_qty') {{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-sm btn-black">Confirm</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
@endpush

@push('page-js')
    <script>
        $(document).ready(function(){
            @if(Session::has('invalidInvAdd') && count($errors) > 0)
            $('#Inventory_Add').modal('show');
            @endif


            $(document).on('click', '.Inv_Edit', function() {
                var inv_id = $(this).val();
                var url = "{{route('edit_inventory',[':inv_id'])}}";
                url = url.replace(':inv_id', inv_id);
                // alert(edit);
                $("#Inventory_Edit").modal('show');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(response) {
                        $('#inv_id').val(inv_id);
                        $('#u_pro_name').val(response.inv.product_name);
                        $('#u_pro_qty').val(response.inv.product_stock);
                        $('#u_pro_alert_qty').val(response.inv.product_stock_alert);
                        $('#u_pro_desc').text(response.inv.product_description);
                    }
                });
            });

            $(document).on('submit', '#Update_inv', function(e) {
                e.preventDefault();

                var url = $(this).attr('action');
                // alert(url);

                var registerForm = $("#Update_inv");
                var formData = registerForm.serialize();

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function(data) {
                        // console.log(data);
                        if (data.status == 200) {
                            $('#Inventory_Edit').load(location.href + " #chife_Complaint_Update>*", "");
                            $('#inv_list').load(location.href + " #inv_list>*", "");
                            $(document).sami_Toast_Append({
                                cus_toast_time: 3000,
                                cus_toast_msg: data.msg
                            });

                            $('#Inventory_Edit').modal('hide');
                        } else {
                            $.each(data.error, function(key, value) {
                                $('.' + key + '_error').text(value);
                            });
                            $('.inv_' + data.id).click();
                        }
                    },
                });
            });

            $(document).on('click', '.Pro_restock', function() {
                var Pro_stockId = $(this).val();
                var ProName = $(this).attr("data-pro");
                // alert(drug_id);
                $("#Inventory_Restock").modal('show');
                $('#ProStock-id').val(Pro_stockId);
                $('.pro_name').text(ProName);
            });

            @if(Session::has('invalidInvRe') && count($errors) > 0)
                let test = {{Session::get('invalidInvRe')}};
                $('.inv_stock' + test).click();
            @endif
        });
    </script>
@endpush
