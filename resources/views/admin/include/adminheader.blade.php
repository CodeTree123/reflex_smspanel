    <!-- Header Start -->
    <div class="header  mb-3 shadow">
        <div class="container-fluid pt-1">
            <div class="row align-items-center">
                <!--logo & title start-->

                <div class="col-md-6">
                    @if(auth()->user()->role == 1)
                    <a class="d-flex align-items-center logo" href="{{route('admin')}}">
                        <!-- <img class="logo" src="img/Logo.png" alt="Logo"> -->
                        <img class="logo" src="{{asset ('assets/img/reflex_logo.png')}}" alt="Logo">
                    </a>
                    @endif
                    @if(auth()->user()->role == 2)
                    <a class="d-flex align-items-center logo" href="{{route('shop_admin')}}">
                        <!-- <img class="logo" src="img/Logo.png" alt="Logo"> -->
                        <img class="logo" src="{{asset ('assets/img/reflex_logo.png')}}" alt="Logo">
                    </a>
                    @endif
                </div>
                <!--logo & title end-->

                <!--nav start-->
                @if(auth()->user())
                @if(auth()->user()->role == 1)
                <!--info Bar start-->
                <div class="col-md-6">
                    <nav class="navbar navbar-expand-lg  p-0 ">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav fs-5 pe-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active text-bg-blue-grey" aria-current="page" href="{{route('admin')}}">Doctor Panel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-bg-blue-grey" href="{{route('other_panel')}}">Other Panel</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                            <a class="nav-link text-bg-blue-grey" href="#">Forum</a>
                                        </li> -->
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                @endif
                @endif
                <!--info Bar end-->
            </div>
        </div>
    </div>
    <!-- Header end -->
    <script>
        // var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        // var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        // return new bootstrap.Tooltip(tooltipTriggerEl)
        // })

        // var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        // var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        // return new bootstrap.Popover(popoverTriggerEl)
        // })
    </script>
