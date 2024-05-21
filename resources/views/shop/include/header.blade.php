@php
$menus = cat();
$submenus = subcat();
$sSubmenu1s = subsubcat1();
$sSubmenu2s = subsubcat2();
$sSubmenu3s = subsubcat3();
//$carts = cart();
@endphp

<div class="header  mb-3 shadow">
    <div class="container-fluid pt-2">
        <div class="row align-items-center">
            <div class="col-4">
                <a class="d-flex align-items-center logo" href="{{route('shop')}}">

                    <img class=" logo" src="{{asset ('assets/img/reflex_logo.png')}}" alt="Logo">

                </a>
            </div>
            <div class="col-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <button class="input-group-text" id="basic-addon2">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>
            <div class="col-4">
                <nav class="navbar navbar-expand-lg p-0">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="main_nav">
                            <ul class="navbar-nav ms-auto align-items-center">
                                <!-- <li class="nav-item"><a class="nav-link" href="#"> Menu item </a></li> -->
                                {{-- <li class="nav-item dropdown">--}}
                                {{-- @if(auth()->user()->p_image != null)--}}
                                {{-- <img src="{{asset('public/uploads/doctor/'.auth()->user()->p_image)}}" alt="" class="pic_logo dropdown-toggle text-bg-blue-grey p-0" data-bs-toggle="dropdown">--}}
                                {{-- @else--}}
                                {{-- <img src="{{asset('public/assets/img/profile.png')}}" alt="" class="pic_logo dropdown-toggle text-bg-blue-grey p-0" data-bs-toggle="dropdown">--}}
                                {{-- @endif--}}
                                {{-- <ul class="dropdown-menu dropdown-menu-end">--}}
                                {{-- <li><a class="dropdown-item" href="{{route('Order_list')}}"> My Orders </a></li>--}}
                                {{-- <li><a class="dropdown-item" href="{{route('doctor')}}"> Back To Doctor </a></li>--}}
                                {{-- </ul>--}}
                                {{-- </li>--}}

                                @if(auth()->user()->role == 2)
                                <li class="nav-item dropdown">
                                    <button type="button" class="btn p-0 ms-3">
                                        <a class="nav-link btn btn-sm my-0 p-1 rounded bg-blue-grey p-0 shop_actionBtn" href="{{route('shop_admin')}}">
                                            Back To Admin
                                        </a>
                                    </button>
                                </li>
                                @else
                                <li class="nav-item dropdown">
                                    <button type="button" class="btn p-0 ms-3">
                                        <a class="nav-link text-bg-blue-grey p-0 shop_actionBtn1" href="{{route('Order_list')}}">
                                            <i class="fs-3 fa-solid fa-list"></i>
                                        </a>
                                    </button>
                                </li>
                                <li class="nav-item dropdown">
                                    <button type="button" class="btn p-0 ms-3">
                                        <a class="nav-link text-bg-blue-grey p-0 shop_actionBtn1" href="{{route('cart_view')}}">
                                            <i class="fs-3 fa-solid fa-cart-shopping"></i>
                                            @if(count(Cart::content()) != 0)
                                            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger rounded-circle text-black">{{count(Cart::content())}}</span>
                                            @endif
                                        </a>
                                    </button>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-12 pt-2">
                <nav class="navbar navbar-expand-lg p-0">
                    <div class="container-fluid">
                        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button> -->
                        <div class="collapse navbar-collapse justify-content-center align-items-center" id="main_nav">
                            <ul class="navbar-nav">
                                <!-- <li class="nav-item active">
                                        <a class="nav-link text-uppercase text-bg-blue-grey" href="#">
                                            Home
                                        </a>
                                    </li> -->
                                @foreach ($menus as $menu)
                                <li class="nav-item dropdown has-megamenu">
                                    <a class="nav-link dropdown-toggle text-uppercase text-bg-blue-grey test" href="#" data-bs-toggle="dropdown">
                                        {{$menu->name}}
                                    </a>
                                    <div class="dropdown-menu megamenu" role="menu">
                                        <div class="row g-3">
                                            @foreach ($submenus as $submenu)
                                            @if($menu->id == $submenu->cat_id)
                                            <div class="col-lg-3 col-6">
                                                <div class="col-megamenu">
                                                    <a href="{{route('shop_product',['subcat',$submenu->id])}}" class="text-decoration-none text-secondary title">{{$submenu->name}}</a>
                                                    <ul class="list-unstyled ms-3">
                                                        @foreach($sSubmenu1s as $sSubmenu1)
                                                        @if($submenu->id == $sSubmenu1->sub_cat_id)
                                                        <li>
                                                            <a href="{{route('shop_product',['sub_subcat_1',$sSubmenu1->id])}}" class="text-decoration-none text-secondary">{{$sSubmenu1->name}}</a>
                                                            <ul class="list-unstyled ms-3">
                                                                @foreach($sSubmenu2s as $sSubmenu2)
                                                                @if($sSubmenu1->id == $sSubmenu2->sub_subcat1_id )
                                                                <li>
                                                                    <a href="{{route('shop_product',['sub_subcat_2',$sSubmenu2->id])}}" class="text-decoration-none text-info">{{$sSubmenu2->name}}</a>
                                                                    <ul class="list-unstyled ms-3">
                                                                        @foreach($sSubmenu3s as $sSubmenu3)
                                                                        @if($sSubmenu2->id == $sSubmenu3->sub_subcat2_id)
                                                                        <li>
                                                                            <a href="{{route('shop_product',['sub_subcat_3',$sSubmenu3->id])}}" class="text-decoration-none text-success">{{$sSubmenu3->name}}</a>
                                                                        </li>
                                                                        @endif
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                                @endif
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        @endif
                                                        @endforeach
                                                    </ul>
                                                </div> <!-- col-megamenu.// -->
                                            </div><!-- end col-3 -->
                                            @endif
                                            @endforeach
                                        </div><!-- end row -->
                                    </div> <!-- dropdown-mega-menu.// -->
                                </li>
                                @endforeach
                            </ul>
                        </div> <!-- navbar-collapse.// -->
                    </div> <!-- container-fluid.// -->
                </nav>
            </div>
        </div>
    </div>
</div>