@php
$unvarified = unverified();
$subscription_alert = subscription_alert();
@endphp

@if(auth()->user()->role == 1)
<div class="d-flex">
    <div class="d-flex flex-column p-3 bg-light" style="width: 240px;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light nav-pills pt-0">
            <div class="w-100 ms-2">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex align-items-center justify-content-between">
                    <a href="{{route('other_panel')}}" class="text-dark">
                        <span class="fs-4">Dashboard</span>
                    </a>
                    <a href="{{route('logout')}}" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout">
                        <i class="fa-solid fa-power-off fa-xl"></i>
                    </a>
                </div>
                <hr>
                <h4 >Shop</h4>
                <div class="collapse navbar-collapse me-2" id="navbarSupportedContent">
                    <ul class="navbar-nav flex-column mb-2 mb-lg-0 w-100">
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="{{route('supplier_list')}}">Suppler List</a>
                        </li>
                    </ul>
                </div>
                <h4 >Forum</h4>
                <div class="collapse navbar-collapse me-2" id="navbarSupportedContent">
                    <ul class="navbar-nav flex-column mb-2 mb-lg-0 w-100">
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="{{route('normal_post')}}">Normal Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="{{route('case_studies_post')}}">Case Studies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="{{route('article_post')}}">Article</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="{{route('review_post')}}">Product Review</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="{{route('forum_event')}}">Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="">Ebook</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="{{route('tutorial')}}">Tutorial</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link text-white text-center bg-dark my-2" href="{{route('')}}">Pinpoint</a>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="b-example-divider"></div>
</div>
@endif
@if(auth()->user()->role == 2)
<div class="d-flex">
    <div class="d-flex flex-column p-3 bg-light" style="width: 240px;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light nav-pills pt-0">
            <div class="w-100 ms-2">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex align-items-center justify-content-between">
                    <a href="{{route('shop_admin')}}" class="text-dark">
                        <span class="fs-4">Dashboard</span>
                    </a>
                    <a href="{{route('logout')}}" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout">
                        <i class="fa-solid fa-power-off fa-xl"></i>
                    </a>
                </div>
                <hr>
                <div class="collapse navbar-collapse me-2" id="navbarSupportedContent">
                    <ul class="navbar-nav flex-column mb-2 mb-lg-0 w-100">
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="{{route('shop_admin_product_list')}}">Product List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="{{route('shop_order_list')}}">Order List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="{{route('shop_admin')}}">My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center bg-dark my-2" href="{{route('shop')}}">Shop Page</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="b-example-divider"></div>
</div>
@endif
