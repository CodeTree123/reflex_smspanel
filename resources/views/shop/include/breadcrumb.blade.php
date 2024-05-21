<div class="container-fluid">
    <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';">
        @if(Route::current()->getName() == 'shop')
        <ol class="breadcrumb mb-0 ms-4">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
        @endif

        @if(Route::current()->getName() == 'cart_view')
        <ol class="breadcrumb mb-0 ms-4">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{route('shop')}}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
        @endif

        @if(Route::current()->getName() == 'Order_list')
        <ol class="breadcrumb mb-0 ms-4">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{route('shop')}}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">My Orders</li>
        </ol>
        @endif

        @if(Route::current()->getName() == 'shop_product')
        <ol class="breadcrumb mb-0 ms-4">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{route('shop')}}">Home</a>
            </li>
            @if($name == "sub_subcat_3")
            <li class="breadcrumb-item active" aria-current="page">
                <!-- <a href="#"> {{$breadcrumb->SubsubCat2->SubsubCat1->SubCat->cat->name}} </a> -->
                {{$breadcrumb->SubsubCat2->SubsubCat1->SubCat->cat->name}}
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{route('shop_product',['subcat',$breadcrumb->SubsubCat2->SubsubCat1->SubCat->id])}}">
                    {{$breadcrumb->SubsubCat2->SubsubCat1->SubCat->name}}
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{route('shop_product',['sub_subcat_1',$breadcrumb->SubsubCat2->SubsubCat1->id])}}">
                    {{$breadcrumb->SubsubCat2->SubsubCat1->name}}
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{route('shop_product',['sub_subcat_2',$breadcrumb->SubsubCat2->id])}}">
                    {{$breadcrumb->SubsubCat2->name}}
                </a>
            </li>
            @endif

            @if($name == "sub_subcat_2")
            <li class="breadcrumb-item active" aria-current="page">
                <!-- <a href="#"> {{$breadcrumb->SubsubCat1->SubCat->cat->name}} </a> -->
                {{$breadcrumb->SubsubCat1->SubCat->cat->name}}
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{route('shop_product',['subcat',$breadcrumb->SubsubCat1->SubCat->id])}}">
                    {{$breadcrumb->SubsubCat1->SubCat->name}}
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{route('shop_product',['sub_subcat_1',$breadcrumb->SubsubCat1->id])}}">
                    {{$breadcrumb->SubsubCat1->name}}
                </a>
            </li>
            @endif

            @if($name == "sub_subcat_1")
            <li class="breadcrumb-item active" aria-current="page">
                <!-- <a href="#"> {{$breadcrumb->SubCat->cat->name}} </a> -->
                {{$breadcrumb->SubCat->cat->name}}
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{route('shop_product',['subcat',$breadcrumb->SubCat->id])}}">
                    {{$breadcrumb->SubCat->name}}
                </a>
            </li>
            @endif

            @if($name == "subcat")
            <li class="breadcrumb-item active" aria-current="page">
                <!-- <a href="#"> {{$breadcrumb->cat->name}} </a> -->
                {{$breadcrumb->cat->name}}
            </li>
            @endif

            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{route('shop_product',[$name,$breadcrumb->id])}}"> {{$breadcrumb->name}} </a>
            </li>

        </ol>
        @endif

        @if(Route::current()->getName() == 'shop_single_product')
            <ol class="breadcrumb mb-0 ms-4">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{route('shop')}}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{$cat->name}}</li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{route('shop_product',['subcat',$subcat->id])}}">{{$subcat->name}}</a>
                </li>
                @if($subcat1 != null)
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{route('shop_product',['sub_subcat_1',$subcat1->id])}}">{{$subcat1->name}}</a>
                </li>
                @endif
                @if($subcat2 != null)
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{route('shop_product',['sub_subcat_2',$subcat2->id])}}">{{$subcat2->name}}</a>
                </li>
                @endif
                @if($subcat3 != null)
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{route('shop_product',['sub_subcat_3',$subcat3->id])}}">{{$subcat3->name}}</a>
                </li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{$product->pro_name}}</li>
            </ol>
        @endif

    </nav>
</div>
