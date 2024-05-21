@extends('master.shop_master')

@push('page-css')
    <style>
        .bar_style{
            background-color: #ddd;
            padding: 3px 0px;
        }
    </style>
@endpush
@section('content')
    <div class="container mt-3">
        <h4 class="text-bg-blue-grey mb-3 text-center">My Order Lists</h4>
        <div class="text-center">
            <table class="table mt-2 text-center align-middle">
                <thead>
                <tr>
                    <th class="">Order Number</th>
                    <th class="">Total Items</th>
                    <th class="">Sub Total</th>
                    <th class="">Vat(15%)</th>
                    <th class="">Total Amount</th>
                    <th class="">Status</th>
                    <th class="">Action</th>

                </tr>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{'INV-' . str_pad((int)$order->id, 4, '0', STR_PAD_LEFT)}}</td>
                        <td>{{$order->total_quantity}}</td>
                        <td>{{$order->net_total}}</td>
                        <td>{{$order->vat}}</td>
                        <td>{{$order->total_amount}}</td>
                        <td>
                            @if($order->status == 0)
                                <p class="text-warning my-0">Pending Order</p>
{{--                                <div class="bar_style mt-1"></div>--}}
                            @elseif($order->status == 1)
                                <p class="text-success my-0">Order Confirmed</p>
                            @else
                                <p class="text-danger my-0">Order Canceled</p>
                            @endif
                        </td>
                        <td>
                            @if($order->status == 1)
                            <a href="{{route('order_invoice',$order->id)}}" class="btn crud-btns my-0" data-bs-toggle="tooltip" data-bs-placement="left" title="View Invoice">
                                <i class="fa-solid fa-file-lines"></i>
                            </a>
                            @endif
                            @if($order->status == 0)
                            <button class="btn crud-btns delete-Cart" data-cart-name="{{$order->id}}" value="{{$order->id}}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            @endif
                        </td>

                    </tr>
{{--                    @foreach($order->sub_order as $key=>$test)--}}
{{--                        @if($test->status == 0)--}}
{{--                            @once--}}
{{--                            <input type="text" value="{{$order->total_quantity}}" id="bar_style_count">--}}
{{--                            @endonce--}}
{{--                            <input type="text" class="bar_count">--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
                @empty
                    <tr>
                        <td colspan="8">There Was No Order added Yet.</td>
                    </tr>
                @endforelse

                </tbody>
            </table>
            <a href="{{route('shop')}}" class="btn btn-sm border border-dark rounded cart_btn">
                <i class="fa-solid fa-arrow-left"></i>
                Back Home
            </a>
        </div>
    </div>

@endsection

@push('page-modals')
    <!-- Modal For Delete Cart -->
    <div class="modal fade " id="del-Cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Delete Cart
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('deleteCart')}}" method="POST" id="DeleteMedicineForm">
                        @csrf
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This <span id="del_cart_name" class="text-black"></span> information?</h5>
                        </div>
                        <input type="hidden" id="del-cart-id" name="deletingId">
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
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
@endpush
@push('page-js')

    <script>
        // $(document).ready(function() {
        //     let t = $('#bar_style_count').val();
        //     let t2 = $('.bar_count').length;
        //     let test = t-t2;
        //     let test2 = 100 / t;
        //     let test3 = test2*test;
        //
        //     console.log(t,t2,test);
        // });

    </script>
@endpush
