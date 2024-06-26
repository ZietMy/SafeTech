@extends('layouts.client')
@section('title')
    History Order
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/clients/css/slick/demo4.css') }}">
@endsection
@section('content1')
<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
  <ul class="circles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
  </ul>
  <div class="container">
      <div class="row">
          <div class="col-12">
              <h3>History Order</h3>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                          <a href="{{route('home')}}">
                              <i class="fas fa-home"></i>
                          </a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">History Order</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
</section>
<!-- Cart Section Start -->
<section class="cart-section section-b-space">
    <div class="container">
        @if (!$orders->isEmpty())
        <div class="row">
            {{-- <h3 class="topborder"><span>Your Order</span></h3> --}}
            <table class="table cart-table">
                <thead>
                    <tr class="table-head">
                        <th scope="col"  style="text-align: left; margin-right: 10px;">Id</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Status order</th>
                        <th scope="col" >Created at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr id="order-{{ $order->id }}">
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->total_amount }}</td>
                            <td>{{ $order->orderStatus->status_name }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                @if ($order->orderStatus->id==1)
                                
                                <form action="{{ route('cancel-order', ['id' => $order->id]) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-outline-danger">
                                       Cancel order
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        <tr class="pl-5">
                            <td colspan="4" >
                                <h4>Chi tiết đơn hàng</h4>
                                <tr>
                                    <th scope="col">Image</th>
                                    {{-- <th scope="col">Name</th> --}}
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                               
                                <tbody>
                                    @foreach ($order->orderItems as $item)
                                    {{-- <li>{{ $item->product_id }} - {{ $item->quantity }}</li> --}}
                                    
                                    <tr>
                                        <td scope="row" class="text-start">
                                            <span style=""><img src="{{$item->product->image}}" alt="" width="100px" height="100px"></span>
                                            <span style="">{{$item->product->name}}</span>
                                        </td>
                                        <td class="text-start">
                                            <span class="fs-5 fw-semibold">{{$item->price}}VND</span>
                                        </td>
                                        <td class="text-start">{{$item->quantity}}</td>
                                        <td class="fw-bolder fs-5 text-align-end">{{$item->total}}VND</td>
                                    </tr>       
                                    @endforeach
                                </tbody> 
                                   
                            </td>
                        </tr>
                        <tr class="table-light">
                            <td class="table-light"colspan="5" ></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else 
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Your History Order is empty</h2>
                    <a href="{{route('product')}}" class="btn btn-danger mt-5">Buy now</a>
                </div>
            </div>
        @endif
      </div> 
</section>

@endsection
@section('script')
<script src={{ asset('assets/clients/js/historyOrder.js') }}></script>
@endsection