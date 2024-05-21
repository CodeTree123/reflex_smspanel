@extends('master.shop_master')

@section('content')
<div class="container-fluid">
    <div class="my-3">
        <div class="profile blue-grey-border-thin">
            <h4 class="p-2 mb-3 d-flex justify-content-center bg-blue-grey custom-border-radius">Top Sell</h4>
            <div class="d-flex flex-wrap justify-content-center">
                @foreach($products as $product)
                <a href="{{route('shop_single_product',$product->id)}}" class="mb-3 px-2">
                    <div class="card" style="width: 230px;">
                        <img src="{{asset('public/uploads/shop_product/'.$product->pro_img)}}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h6 class="card-title">{{$product->pro_name}}</h6>
                            <p class="card-text mb-2">Price: {{$product->pro_price}} Taka</p>
                            <p class="card-text mb-2">{{$product->supplier->fname." ".$product->supplier->lname}}</p>
                            @if($product->pro_stock->status == 1)
                            <p class="card-text text-success">In Stock</p>
                            @else
                            <p class="card-text text-danger ">Out Of Stock</p>
                            @endif
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

    </div>

</div>
@endsection
