@extends('admin.doctor.admin_doc_master')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <span class="fs-4">Subscription List</span>
        <h5 class="d-flex align-items-center fs-6">
            Redeem Code Information
            <div class="ms-5">
                <a class="crud-btns me-1" href="" data-bs-toggle="modal" data-bs-target="#Redeem_Add">
                    <i class="bi bi-plus-circle"></i>
                </a>
                <a class="crud-btns ms-1" href="" data-bs-toggle="modal" data-bs-target="#Redeem_list">
                    <i class="bi bi-card-list"></i>
                </a>
            </div>
        </h5>
    </div>
    <!-- Subscription List-->
    <table class="table table-bordered mt-2 text-center align-middle">
        <thead>
        <tr>
            <th class="">#</th>
            <!--<th class="">Doctor Id</th>-->
            <th class="">Doctor Name</th>
            <!-- <th class="">BMDC</th> -->
            <th class="">Package Name</th>
            <th class="">Package Price</th>
            <th class="">Duration</th>
            <th class="">Bkash Number</th>
            <th class="">From</th>
            <th class="">To</th>
            <th class="">Status</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subscription_lists as $key=>$subscription_list)
            <tr>
                <td>{{$key+1}}</td>
                <!--<td>{{$subscription_list->d_id}}</td>-->
                <td>{{$subscription_list->fname." ".$subscription_list->lname}}</td>
                <!--<td>{{$subscription_list->package_name}}</td>-->
                <td>{{$subscription_list->package_name}}</td>
                <td>{{$subscription_list->package_price}}</td>
                <td>{{$subscription_list->duration." ".$subscription_list->duration_types}}</td>
                <td>{{$subscription_list->s_mobile}}</td>
                <td>{{ Carbon\Carbon::parse($subscription_list->start)->format('d/m/Y') }}</td>

                <td>{{ Carbon\Carbon::parse($subscription_list->end)->format('d/m/Y') }}</td>
                <td>
                    @if($subscription_list->status == 1)
                        <p class="btn btn-sm btn-success my-0 rounded-pill" style="cursor: not-allowed;">Paid</p>
                    @else
                        <a href="{{route('subscription_status',[$subscription_list->id])}}"
                           class="btn btn-sm btn-danger my-0">Unpaid</a>
                    @endif
                </td>
                <td class="d-flex justify-content-around">
                    <!-- <button type="button" class="btn crud-btns CC_editbtn" href="" value="" >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button> -->
                    <button class="btn crud-btns delete-subscribtion" data value="{{$subscription_list->id}}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    <!--Subscription list end -->
@endsection

@section('page-modals')
    <!-- Modal For Redeem Code List -->
    <div class="modal fade " id="Redeem_list" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Redeem Code List
                    </h5>
                    <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1"
                            aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Investigation List-->
                    <table class="table table-bordered mt-4 text-center align-middle">
                        <thead>
                        <tr>
                            <th class="">#</th>
                            <th class="">Redeem Code</th>
                            <th class="">Redeem Code Duration</th>
                            <th class="">Status</th>
                            <th class="">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($redeems as $key=>$redeem)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$redeem->redeem_code}}</td>
                                <td>{{$redeem->duration." ".$redeem->duration_type}}</td>
                                <td>
                                    @if($redeem->status == 1)
                                        <a href="{{route('redeem_status',[$redeem->id])}}"
                                           class="btn btn-sm btn-danger my-0">Inactive</a>
                                    @else
                                        <a href="{{route('redeem_status',[$redeem->id])}}"
                                           class="btn btn-sm btn-success my-0">Active</a>
                                    @endif
                                </td>
                                <td class="d-flex justify-content-around  p-0">

                                    <button class="btn crud-btns delete-redeem" data-name="{{$redeem->redeem_code}}"
                                            value="{{$redeem->id}}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!--Investigation list end -->
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Modal For Redeem Code Add -->
    <div class="modal fade " id="Redeem_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header ">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Add Redeem Code
                    </h5>
                    <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1"
                            aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('redeem_add')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3 drug-name">
                                <input class="form-control" list="list" placeholder="Enter New Redeem Code"
                                       name="redeem_code">
                                <span class="text-danger">@error('redeem_code') {{$message}} @enderror</span>
                            </div>
                            <div class="mb-3 drug-name">
                                <input class="form-control" list="list" placeholder="Enter Duration" name="duration">
                                <span class="text-danger">@error('duration') {{$message}} @enderror</span>
                            </div>
                            <div class="mb-3 drug-name">
                                <select class="form-select" aria-label="Default select example" name="duration_type">
                                    <option value="Days">Days</option>
                                    <option value="Months">Months</option>
                                    <option value="Years">Years</option>
                                </select>
                                <span class="text-danger">@error('duration_type') {{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal_1">Discard
                            </button>
                            <button type="submit" class="btn btn-sm btn-outline-blue-grey">Confirm</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->
    <!-- Modal For Delete Redeem Code -->
    <div class="modal fade " id="del-Redeem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Delete Redeem Code
                    </h5>
                    <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Redeem_list"
                            aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('delete_redeem')}}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete <span id="redeem_name"></span> Redeem Code?
                            </h5>
                        </div>
                        <input type="hidden" id="del-Redeem-id" name="deletingId">
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#Redeem_list">Close
                            </button>
                            <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Delete</button>
                            <!-- Modal Footer end -->
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->
@endsection

@push('page-js')

    <script>
        $(document).ready(function () {

            @if(Session::has('invalidRedeemAdd') && count($errors) > 0)
            $('#Redeem_Add').modal('show');
            @endif


            // script for Sub
            $(document).on('click', '.delete-subscribtion', function () {
                var deleteSubscribtionId = $(this).val();
                // alert(deleteSubscribtionId);
                $("#del-Subscribtion").modal('show');
                $('#del-subscribtion-id').val(deleteSubscribtionId);
            });

            // script for Redeem Code delete
            $(document).on('click', '.delete-redeem', function () {
                var deleteRedeemId = $(this).val();
                var deleteRedeemName = $(this).attr('data-name');
                // alert(deleteRedeemId);
                $("#Redeem_list").modal('hide');
                $("#del-Redeem").modal('show');
                $('#del-Redeem-id').val(deleteRedeemId);
                $('#redeem_name').text(deleteRedeemName);
            });

        });
    </script>
@endpush
