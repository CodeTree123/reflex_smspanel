@extends('master.doc_master')
@section('content')

<!-- main start -->
<div class="container-fluid dental_bg">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-5 mt-5">
            <form action="{{route('register_user')}}" method="post">
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating ">
                    <input type="name" name="fname" class="form-control custom-form-control mb-2" id="floatingInput" placeholder="name@example.com" value="{{ old('fname') }}">
                    <label for="floatingInput">First Name</label>
                </div>
                <span class="text-danger">@error('fname') {{$message}} @enderror</span>
                <div class="form-floating ">
                    <input type="name" name="lname" class="form-control custom-form-control mb-2" id="floatingInput" placeholder="name@example.com" value="{{ old('lname') }}">
                    <label for="floatingInput">Last Name</label>
                </div>
                <span class="text-danger">@error('lname') {{$message}} @enderror</span>
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
                <!-- <div class="form-floating">
            <input type="password" class="form-control custom-form-control mb-2" id="floatingConfirmPassword" placeholder=" Confirm Password">
            <label for="floatingConfirmPassword">Confirm Password</label>
        </div> -->

                <!-- <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        </div> -->

                <button class="w-100 btn btn-lg btn-outline-dark btn-outline-blue-grey mb-2" type="submit">Sign Up</button>

                <div class=" my-3">

                    <a href="{{route('login')}}"> <span class="text-dark"> Already have an account ?</span> Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection