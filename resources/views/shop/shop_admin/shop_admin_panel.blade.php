@extends('admin.other.admin_other_master')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="fs-4">My Information</span>
        <a class="crud-btns" href="{{route('shop_admin_edit')}}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
    </div>
    <div class="row">
        <div class="col-6 text-center">
            <!-- <p class="mb-2"> <span class="fw-bolder">Profile Picture:</span> </p> -->
            <img src="{{asset('public/uploads/other/'.auth()->user()->p_image)}}" alt="" width="250px" height="250px">
        </div>
        <div class="col-6">
            <p class="fs-6 mb-2"><span
                        class="fw-bolder">Name:</span> {{auth()->user()->fname." ".auth()->user()->lname}}</p>
            <p class="fs-6 mb-2"><span class="fw-bolder">Email:</span> {{auth()->user()->email}}</p>
            <p class="fs-6 mb-2"><span class="fw-bolder">Contact:</span> {{auth()->user()->phone}}</p>
        </div>
    </div>
@endsection

@section('page-modals')

@endsection

@push('page-js')

@endpush
