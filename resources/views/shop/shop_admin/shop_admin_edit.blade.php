@extends('admin.other.admin_other_master')

@section('content')
    <div class="d-flex justify-content-center align-items-center mb-3">
        <span class="fs-4">Edit Profile</span>
    </div>
    <form action="{{route('supplier_update')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <div class="row">
                <input type="hidden" name="shop_id" value="{{auth()->user()->id}}">
                <div class="col-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="s_fname"
                           value="{{auth()->user()->fname}}">
                    <span class="text-danger">@error('s_fname') {{$message}} @enderror</span>
                </div>
                <div class="col-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="s_lname"
                           value="{{auth()->user()->lname}}">
                    <span class="text-danger">@error('s_lname') {{$message}} @enderror</span>
                </div>
                <div class="col-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Shop Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="s_shopName"
                           value="{{auth()->user()->shop->other}}">
                    <span class="text-danger">@error('s_shopName') {{$message}} @enderror</span>
                </div>
                <div class="col-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Contact Number</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="s_phone"
                           value="{{auth()->user()->phone}}">
                    <span class=" text-danger">@error('s_phone') {{$message}} @enderror</span>
                </div>
                <div class="col-6 mb-3">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" type="file" id="formFile" name="s_image">
                    <span class="text-danger">@error('s_image') {{$message}} @enderror</span>
                </div>
                <div class="col-6 mb-3">
                    <img src="{{asset('public/uploads/other/'.auth()->user()->p_image)}}" alt="" width="200px">
                </div>
            </div>
            <input type="hidden" name="cf_status" id="" value="0">
        </div>
        <div class="text-center mb-2">
            <a href="{{route('shop_admin')}}" class="btn btn-sm btn-danger rounded">Discard</a>
            <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
        </div>
    </form>
@endsection

@section('page-modals')

@endsection

@push('page-js')

@endpush
