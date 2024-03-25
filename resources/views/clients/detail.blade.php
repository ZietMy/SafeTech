@section('title')
    {{ $title }}
@endsection
@extends('layouts.client')
{{-- @section('content')
<h1>Hihdo</h1>
@endsection --}}
@section('content1')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/clients/css/detail.css') }}">
@endsection
<div class="container">
    <div class="row">
        @foreach ($detailId as $productId)
            <div class="col-2 mt-4">
                <img src="{{ $productId->image }}" alt="ảnh" style="width:110%;padding-bottom:20px"
                    class="mg-fluid image-with-border">
                <img src="{{ $productId->image }}" alt="ảnh" style="width:110%" class="mg-fluid image-with-border">
            </div>
            <div class="col-4 mt-4">
                <img src="{{ $productId->image }}" alt="ảnh" style="width:110%" class="mg-fluid image-with-border">
            </div>
            <div class="col-1"></div>
            <div class="col-4">
                <h2 style="font-weight:bold;color:#000000" class="mt-4">{{ $productId->name }}</h2>
                <span style="display: flex">
                    <p style="font-weight:bold;color:#db4444" class="mt-2">{{ $productId->price }}VNĐ</p>
                </span>
                <p>{{ $productId->details }}</p>
                <div class="d-flex mt1">
                    <form action="{{ route('add-wish-list') }}" method="POST" id="add-wishlist-form">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $productId->id }}">
                        <button type="submit" style="border: none; background-color: transparent;">
                            <i class="far fa-heart js-heart heart" style="font-size: xx-large;" name="addList"></i>
                        </button>
                    </form>  
                </div>
                <div class="d-flex mt">
                    <div class="cont">
                        <div class="crtdiv" style="margin-right: 20px">
                            <button id="btn" type="button" class="cart"><i class="fa fa-shopping-cart"
                                    aria-hidden="true"></i> Add to cart</button>
                        </div>
                    </div>
                    <div class="cont">
                        <div class="crtdiv1">
                            <button id="btn" type="button" class="cart1"><i class="fa fa-check"
                                    aria-hidden="true"></i> Go to checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-1"></div>
    </div>
</div>
<div class="mt-5"></div>
<div class="container">
    <div class="Frame626"
        style="height: 103px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 24px; display: inline-flex">
        <div class="Frame625" style="justify-content: flex-start; align-items: center; gap: 16px; display: inline-flex">
            <div class="Rectangle18" style="width: 20px; height: 40px; position: relative">
                <div class="Rectangle17"
                    style="width: 20px; height: 40px; left: 0px; top: 0px; position: absolute; background: #DB4444; border-radius: 4px">
                </div>
            </div>
            <div class="TodayS"
                style="color: #DB4444; font-size: 16px; font-family: Poppins; font-weight: 600; line-height: 20px; word-wrap: break-word">
                Related</div>
        </div>
    </div>
    <div class="row">
        @foreach ($getProductRelated as $product)
            <div class="col-3 mb-3 ml-3">
                <a href="{{ route('clients.detail', ['id' => $product->id]) }}"
                    style="text-decoration:none;color:black">
                    <div class="card" style="width:18rem;">
                        <div style="position: relative;">
                            <div class="heart-container">
                                <svg viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="add-to-wishlist">
                                    <path
                                        d="M11.0661 2.81728L11.6026 3.45246L12.1391 2.81728C13.2867 1.45859 15.0479 0.600098 16.8697 0.600098C20.0815 0.600098 22.6051 3.13599 22.6051 6.38807C22.6051 8.38789 21.72 10.2564 20.0229 12.3496C18.3175 14.4529 15.8645 16.6977 12.8407 19.4622L12.826 19.4756L12.8249 19.4766L11.6008 20.6001L10.3798 19.4879L10.3783 19.4866L10.3336 19.4457C10.3336 19.4457 10.3336 19.4457 10.3336 19.4457C7.31862 16.6834 4.87347 14.4409 3.17365 12.3404C1.4821 10.25 0.600098 8.38442 0.600098 6.38807C0.600098 3.13599 3.12361 0.600098 6.33544 0.600098C8.15729 0.600098 9.91845 1.45859 11.0661 2.81728Z"
                                        stroke="#333333" stroke-width="1" />
                                </svg>
                            </div>
                            <div class="discount">
                                -{{ $product->discount }}%
                            </div>
                            <img src="{{ $product->image }}" alt="ảnh" style="width:100%;">
                        </div>
                        <div class="mt-3"></div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <div class="card-text" style="color:#DB4444;font-weight:bold">{{ $product->price }} VNĐ
                            </div>
                            <a href="#"><button class="button-48" role="button"><span
                                        class="text">Checkout</span></button></a>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
<script src={{ asset('assets/clients/js/detail.js') }}></script>
@endsection
