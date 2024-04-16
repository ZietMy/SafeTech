@extends('layouts.client')
@section('title')
    Cart
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
              <h3>Cart</h3>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                          <a href="{{route('home')}}">
                              <i class="fas fa-home"></i>
                          </a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Cart</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
</section>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<!-- Cart Section Start -->
<section class="cart-section section-b-space">
    <div class="container">
        @if ($cartItems->count()>0)
            <div class="row">
                <div class="col-md-12 text-center">
                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">quantity</th>
                                <th scope="col">total</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                            <tr>
                                <td>
                                    <a href="{{route('clients.detail', ['id' => $item->product->id])}}">
                                        <img src="{{$item->product->image}}" class="blur-up lazyloaded"
                                            alt="{{$item->product->name}}">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('clients.detail', ['id' => $item->product->id])}}">{{$item->product->name}}</a>
                                </td>
                                <td>
                                    <h2  class="price-detail">{{$item->product->discounted_price}} <del>{{ $item->product->price }}VND</del></h2>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group row">
                                            @if ($item->product->quantity ==0)
                                                <span class="text-danger">out of stock</span>
                                            @else
                                                
                                            <div class="input-group d-flex  align-items-center gap-2 ">
                                                <form action="{{ route('cart.decrement', ['cartId' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="input-group-text bg-danger decrement-btn col-2 pe-4 fs-4 text-center fw-bold">
                                                        -
                                                    </button>
                                                </form>
                                                <input type="text" style="height:35px;width:35px;" class="form-control text-center bg-white input-qty" disabled min="1" max="{{ $item->quantity_purchase }}" value="{{ $item->quantity_purchase }}">
                                                <form action="{{ route('cart.increment', ['cartId' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="input-group-text bg-danger increment-btn col-2 pe-4 text-center fs-4 fw-bold">
                                                        +
                                                    </button>
                                                </form>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="td-color">{{$item->total}}</h2>
                                </td>
                                <td>
                                    <a href="{{ route('cart.delete', ['cartId' => $item->id]) }}">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 mt-md-5 mt-4">
                    <div class="row">
                        <div class="col-sm-7 col-5 order-1">
                            <div class="left-side-button text-end d-flex d-block justify-content-end">
                                <a href="{{ route('cart.deleteAll')}}"
                                    class="text-decoration-underline theme-color d-block text-capitalize">clear
                                    all items</a>
                            </div>
                        </div>
                        <div class="col-sm-5 col-7">
                            <div class="left-side-button float-start">
                                <a href="{{route('product')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                    <i class="fas fa-arrow-left"></i> Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart-checkout-section">
                    <div class="row g-4 justify-content-end">
                        <div class="col-lg-4">
                            <div class="cart-box">
                                <div class="cart-box-details">
                                    <div class="total-details">
                                        <div class="top-details">
                                            <h3>Cart Totals</h3>
                                            <h5>Total <span class="text-danger"><b>{{$total}}.000 VND</b></span></h5>
                                        </div>
                                        <div class="bottom-details">
                                            <a href="checkout">Process Checkout <i class="fas fa-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else 
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Your cart is empty</h2>
                    <h5 class="mt-3">Add items to it now</h5>
                    <a href="{{route('product')}}" class="btn btn-danger mt-5">Shop now</a>
                </div>
            </div>
        @endif
      </div> 
</section>

@endsection