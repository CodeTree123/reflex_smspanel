@extends('master.shop_master')

@section('content')
<div class="container mt-3">
    <h4 class="text-bg-blue-grey mb-3 text-center">Cart Lists</h4>
    <div class="text-center">
        <table class="table mt-2 text-center align-middle med_list">
            <thead>
                <tr>
                    <th class="">Action</th>
                    <th class="">Product Image</th>
                    <th class="">Product Name</th>
                    <th class="">Supplier Name</th>
                    <th class="">Supplier Contact</th>
                    <th class="">Product Price</th>
                    <th class="">Product Quantity</th>
                    <th class="">Total</th>

                </tr>
            </thead>
            <tbody>
                @forelse($carts as $cart)
                <tr>
                    <td>
                        <button class="btn crud-btns delete-Cart" data-cart-name="{{$cart->name}}" value="{{$cart->rowId}}">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                    <td>
                        <img src="{{asset('public/uploads/shop_product/'.$cart->options->image)}}" alt="" width="100px" height="100px">
                    </td>
                    <td>{{$cart->name}}</td>
                    <td>{{$cart->options->supplier}}</td>
                    <td>{{$cart->options->supplier_num}}</td>
                    <td>{{$cart->price}}</td>
                    <td>
                        <form action="{{route('CartIncrement')}}" method="post" class="d-flex flex-column align-items-center justify-content-center">
                            @csrf
                            <input type="hidden" value="{{$cart->rowId}}" name="row_id">
                            <div class="d-flex align-items-center input-group input-group-sm mb-1" style="width: 180px">
                                <input type="number" class="form-control rounded text-center cart_input" id="cart_qty" value="{{$cart->qty}}" name="cart_qty" min="1" width="10">
                                <button type="submit" class="btn btn-sm border border-dark rounded cart_btn ms-2" style="width: 30px">
                                    <i class="fa-solid fa-rotate-right"></i>
                                </button>
                            </div>
                            <span class="text-danger cart_error" style="font-size: 12px">*Quantity Can Not Be Below 1.</span>
                        </form>
                    </td>
                    <td>{{$cart->subtotal()}}</td>

                </tr>
                @empty
                <tr>
                    <td colspan="8">There Was No Cart added Yet.</td>
                </tr>
                @endforelse

            </tbody>
            @if(count(Cart::content()) != 0)
            <tfoot class="text-end">
                <tr>
                    <td colspan="7">
                        <p class="fs-6 mb-0 fw-bolder">Sub Total</p>
                    </td>
                    <td>৳ {{Cart::subtotal()}}</td>
                </tr>
                <tr>
                    <td colspan="7">
                        <p class="fs-6 mb-0 fw-bolder">Vat(15%)</p>
                    </td>
                    <td>৳ {{Cart::tax()}}</td>
                </tr>
                <tr>
                    <td colspan="7">
                        <p class="fs-6 mb-0 fw-bolder">Total</p>
                    </td>
                    <td>৳ {{Cart::total()}}</td>
                </tr>
                <tr>
                    <td colspan="8" class="text-center">
                        <p class="fs-6 mb-0 fw-bolder">Chamber Address: {{auth()->user()->cham_add->chember_address." ( ".auth()->user()->cham_add->chember_number." )"}}</p>
                    </td>
                </tr>
            </tfoot>
            @endif
        </table>
        @if(count(Cart::content()) != 0)
        <a href="{{route('shop')}}" class="btn btn-sm border border-dark rounded cart_btn">Back Home</a>
        <a href="{{route('clearCarts')}}" class="btn btn-sm border border-dark rounded cart_btn">Clear All Carts</a>
        <a href="{{route('placeOrder',auth()->user()->id)}}" class="btn btn-sm border border-dark rounded cart_btn">Place Order</a>
        @else
        <a href="{{route('shop')}}" class="btn btn-sm border border-dark rounded cart_btn">
            <i class="fa-solid fa-arrow-left"></i>
            Back Home
        </a>
        @endif
    </div>
</div>

@endsection

@push('page-modals')
<!-- Modal For Delete Cart -->
<div class="modal fade " id="del-Cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Delete Cart
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('deleteCart')}}" method="POST" id="DeleteMedicineForm">
                    @csrf
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This <span id="del_cart_name" class="text-black"></span> information?</h5>
                    </div>
                    <input type="hidden" id="del-cart-id" name="deletingId">
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
@push('page-js')

<script>
    $(document).ready(function() {
        $(document).on('click', '.delete-Cart', function() {
            var deleteCartId = $(this).val();
            var datacCartName = $(this).attr("data-cart-name");
            // alert(drug_id);
            $("#del-Cart").modal('show');
            $('#del-cart-id').val(deleteCartId);
            $('#del_cart_name').text(datacCartName);
        });
    });
</script>
@endpush