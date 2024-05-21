@extends('master.doc_master')
@section('content')
<!-- main start -->
<div class="container-fluid h-100 d-flex justify-content-center align-items-center">
    <div class="w-100 mx-0 row justify-content-center align-items-center">
        <div class="col-lg-7 ps-5">
            <div>
                <img class="logo" src="{{asset ('assets/img/reflex_logo.png')}}" alt="Logo" style="width:9rem; height:4.5rem;">
            </div>
            <div>
                <h2>
                    Connecting Communities & <br> Optimizing your clinical workflow
                </h2>
            </div>
        </div>
        <div class="col-lg-5 ps-0">
            <div class="p-4 rounded shadow-lg">
                <form action="{{route('login_user')}}" method="post">
                    @if(Session::has('message'))
                    <div class="alert alert-danger">{{Session::get('message')}}</div>
                    @endif
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">Please log in</h1>

                    <div class="form-floating ">
                        <input type="email" name="email" class="form-control custom-form-control mb-2" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control custom-form-control mb-2" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>

                    <!-- <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                        </div> -->

                    <button class="w-100 btn btn-lg btn-outline-dark btn-outline-blue-grey" type="submit">Login</button>
                </form>
                <a href="{{route('google.login')}}" class="w-100 btn btn-lg btn-outline-dark btn-outline-blue-grey p-1">
                    <img src="{{ asset('assets/img/google.png')}}" class="sign-in-with-google img-fluid">
                    Sign up With Google
                </a>
                <div class=" ">
                    <a href="{{route('registration')}}"> <span class="text-dark"> Don't have an account ?</span> Register</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection