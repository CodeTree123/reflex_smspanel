@extends('admin.doctor.admin_doc_master')

@section('content')
    <span class="fs-4">Welcome To The Admin Dashboard.</span>
    <div class="row mt-3">
        <div class="col-3">
            <div class="card text-center">
                <div class="card-header">
                    <span class="fs-5">Verified Doctor's</span>
                </div>
                <div class="card-body">
                    <h4>{{$varified_doctors}}</h4>
                </div>
                <div class="card-footer">
                    <a href="" class="text-decoration-none text-dark">
                    <span class="d-flex justify-content-between align-items-center">
                        View Details
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-center">
                <div class="card-header">
                    <span class="fs-5">Unverified Doctor's</span>
                </div>
                <div class="card-body">
                    @if($unvarified_doctors > 1)
                        <h4 class="text-danger">{{$unvarified_doctors}}</h4>
                    @else
                        <h4 class="text-dark">{{$unvarified_doctors}}</h4>
                    @endif
                </div>
                <div class="card-footer">
                    <a href="" class="text-decoration-none text-dark">
                    <span class="d-flex justify-content-between align-items-center">
                        View Details
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-center">
                <div class="card-header">
                    <span class="fs-5">Subscriped Doctor's</span>
                </div>
                <div class="card-body">
                    <h4>{{$subscriped}}</h4>
                </div>
                <div class="card-footer">
                    <a href="" class="text-decoration-none text-dark">
                    <span class="d-flex justify-content-between align-items-center">
                        View Details
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-center">
                <div class="card-header">
                    <span class="fs-5">Unsubscriped Doctor's</span>
                </div>
                <div class="card-body">
                    <h4>{{$unsubscriped}}</h4>
                </div>
                <div class="card-footer">
                    <a href="" class="text-decoration-none text-dark">
                    <span class="d-flex justify-content-between align-items-center">
                        View Details
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-modals')

@endsection

@push('page-js')

@endpush
