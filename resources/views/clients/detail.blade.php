<link rel="stylesheet" href="{{ asset('assets/clients/css/detail.css') }}">
@section('title')
    {{ $title }}
@endsection
@extends('layouts.client')
@section('content1')
@section('footer')
    @include('clients.blocks.footer')
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
                <div class="row">
                    <div class="col-4">
                        <div class="image-container">
                            <img src="{{ $productId->image }}" alt="ảnh" class="img-fluid image-with-border">
                            <div class="overlay">
                                <div class="overlay-text">Trắng</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="image-container">
                            <img src="{{ $productId->image }}" alt="ảnh" class="img-fluid image-with-border">
                            <div class="overlay">
                                <div class="overlay-text">Đen</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="image-container">
                            <img src="{{ $productId->image }}" alt="ảnh" class="img-fluid image-with-border">
                            <div class="overlay">
                                <div class="overlay-text">Đỏ</div>
                            </div>
                        </div>
                    </div>
                </div>
                <p style="color:#060303; font-size:bold" class="">Màu sắc</p>
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
                style="color: #DB4444; font-size: 18px; font-family: Poppins, sans-serif; font-weight: 600; line-height: 1.2; word-wrap: break-word; margin-bottom: 10px;">
                Related
            </div>

        </div>
    </div>
    <div class="row">
        <div class="d-flex flex-wrap ">
            @foreach ($getProductRelated as $product)
                <div class="product-box mr-3 mb-3" style="width: 280px;  margin-right: 20px;">
                    <div class="img-wrapper">
                        <a href="{{ route('clients.detail', ['id' => $product->id]) }}">
                            <img src="{{ $product->image }}" class="w-100 blur-up lazyload" alt="">
                        </a>

                        <div class="circle-shape"></div>
                        <span class="background-text">Fashion</span>
                        <div class="label-block">
                            <span class="label label-theme">-{{ $product->discount }} Off</span>
                        </div>
                        <div class="cart-wrap">
                            <ul>
                                <li>
                                    <a href="javascript:void(0)" class="addtocart-btn" data-bs-toggle="modal"
                                        data-bs-target="#addtocart">
                                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('clients.detail', ['id' => $product->id]) }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="product-style-3 product-style-chair">
                        <div class="product-title d-block mb-0">
                            <div class="r-price">
                                <div class="theme-color">{{ $product->price }} VNĐ</div>
                                <div class="main-price">
                                    <ul class="rating mb-1 mt-0">
                                        <li><i class="fas fa-star theme-color"></i></li>
                                        <li><i class="fas fa-star theme-color"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <p class="font-light mb-sm-2 mb-0">{{ $product->name }}</p>
                            <a href="product/details.html" class="font-default">
                                <h5>{{ $product->details }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="pb-5"></div>

<script src={{ asset('assets/clients/js/detail.js') }}></script>
@endsection
