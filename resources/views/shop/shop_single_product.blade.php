@extends('master.shop_master')

@section('content')
<div class="container-fluid mt-3">
    <div class="row mx-3">
        <div class="col-4">
            <img src="{{asset('public/uploads/shop_product/'.$product->pro_img)}}" alt="" width="100%">
        </div>
        <div class="col-5">
            <div class="ms-3">
                <p class="fs-4">{{$product->pro_name}}</p>
                <p>{{$product->pro_description}}</p>
                <p class="fw-bolder">
                    Supplier Name: <span class="fw-normal">{{$product->supplier->fname." ".$product->supplier->lname}}</span>
                </p>
                <p class="fw-bolder">
                    Contact: <span class="fw-normal">{{$product->supplier->phone}}</span>
                </p>
                <p class="fw-bolder">
                    Stock Status:
                    @if($product->pro_stock->status == 1)
                    <span class="card-text text-success fw-normal">In Stock</span>
                    @else
                    <span class="card-text text-danger fw-normal">Out Of Stock</span>
                    @endif
                </p>
            </div>
        </div>
        <div class="col-3">
            <div class="border border-dark rounded-2">
                <div class="border border-dark rounded-2 m-3 pt-3 text-center fs-6">
                    <p class="fw-bolder">
                        MRP: <span class="fw-normal ms-2">৳ {{$product->pro_price}}</span>
                    </p>
                    <p class="fw-bolder">
                        Price: <span class="fw-normal ms-2">৳ {{$product->pro_price}}</span>
                    </p>
                </div>
                <div class="border border-dark rounded-2 m-3 p-2">
                    <p class="fw-bold fs-5 text-center">To Buy</p>
                    <form action="{{route('addToCart')}}" method="post" class="d-flex flex-column text-center">
                        @csrf
                        <input type="hidden" value="{{$product->id}}" name="pro_id">
                        <div class="d-flex align-items-center input-group input-group-sm mb-3">
                            <label for="cart_qty" class="fw-bold form-label mb-0">Quantity:</label>
                            <button type="button" class="btn btn-sm border border-dark rounded ms-3 me-2 cart_btn" id="dic_btn">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="number" class="form-control rounded text-center cart_input" id="cart_qty" value="1" name="cart_qty" min="1">
                            <button type="button" class="btn btn-sm border border-dark rounded ms-2 cart_btn" id="inc_btn">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                        <span class="text-danger cart_error">Quantity Can Not Be Below 1.</span>
                        <button type="submit" class="btn btn-sm border border-dark rounded cart_btn" {{auth()->user()->role == 2 ? 'disabled' : ''}}>Add To Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-js')

<script>
    $(document).ready(function() {
        $('.cart_error').hide();
        $(document).on('click', '#inc_btn', function() {
            var qty = parseInt($('.cart_input').val());
            if (qty > 0) {
                var new_qty = qty + 1;
                if (new_qty > 1) {
                    $('.cart_error').hide();
                }
                $('.cart_input').val(new_qty);
            }
        });

        $(document).on('click', '#dic_btn', function() {
            var qty = parseInt($('.cart_input').val());
            if (qty > 1) {
                var new_qty = qty - 1;
                $('.cart_input').val(new_qty);
            } else {
                $('.cart_error').show();
            }
        });
    });
</script>
@endpush