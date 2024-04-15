@extends('layouts.client')
@section('title')
    {{ $title }}
@endsection
{{-- @section('sidebar')
  @include('clients.blocks.sidebar')
@endsection --}}
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/clients/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/main.css') }}">
@section('footer')
    @include('clients.blocks.footer')
@endsection
@section('container-fluid')
    <section class="pt-0 poster-section">
        <div class="row">
            <div class="col-3">
                <div class="left-side-contain">
                    <div class="banner-left">
                        <h4>Sale <span class="theme-color">35% Off</span></h4>
                        <h1>New Latest <span>Helmet</span></h1>
                        <p>BUY ONE GET ONE <span class="theme-color">FREE</span></p>
                        <h2>$79.00 <span class="theme-color"><del>$65.00</del></span></h2>
                        <p class="poster-details mb-0">Safety helmets help everyone have a good experience</p>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="poster-image slider-for custome-arrow classic-arrow">
                    <div>
                        <img src="https://nontrum.vn/wp-content/uploads/2020/11/non-rona-son-dino-vang-scaled.jpg"
                            class="img-fluid blur-up lazyload" alt="">
                    </div>
                </div>
                <div class="right-side-contain">
                    <div class="social-image">
                        <h6>Facebook</h6>
                    </div>

                    <div class="social-image">
                        <h6>Instagram</h6>
                    </div>

                    <div class="social-image">
                        <h6>Twitter</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endsection
@section('content1')
<div class="mt-5"></div>
<div class="contanier">
    <div class="row">
        <div class="Frame727"
            style="width: 1170px; height: 103px; justify-content: flex-start; align-items: flex-end; gap: 470px; display: inline-flex">
            <div class="Frame725" style="justify-content: flex-start; align-items: flex-end; gap: 87px; display: flex">
                <div class="Frame626"
                    style="height: 103px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 24px; display: inline-flex">
                    <div class="Frame625"
                        style="justify-content: flex-start; align-items: center; gap: 16px; display: inline-flex">
                        <div class="Rectangle18" style="width: 20px; height: 40px; position: relative">
                            <div class="Rectangle17"
                                style="width: 20px; height: 40px; left: 0px; top: 0px; position: absolute; background: #DB4444; border-radius: 4px">
                            </div>
                        </div>
                        <div class="TodayS"
                            style="color: #DB4444; font-size: 16px; font-family: Poppins; font-weight: 600; line-height: 20px; word-wrap: break-word">
                            Safe Tech</div>
                    </div>
                    <div class="FlashSales"
                        style="color: black; font-size: 36px; font-family: Inter; font-weight: 600; line-height: 48px; letter-spacing: 1.44px; word-wrap: break-word">
                        Our Product </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-5"></div>
<div class="container">
    <div class="row">
        @foreach ($listProduct as $product)
            <div class="col-xl-2 col-lg-2 col-6">
                <div class="product-box">
                    <div class="img-wrapper">
                        <a href="{{ route('clients.detail', ['id' => $product->id]) }}">
                            <img src="{{ $product->image }}" class="w-100 bg-img blur-up lazyload" alt="">
                        </a>
                        <div class="circle-shape"></div>
                        <span class="background-text">Furniture</span>
                        <div class="label-block">
                            <span class="label label-theme"> -{{ $product->discount }}%</span>
                        </div>
                        <div class="cart-wrap">
                            <ul>
                                <li>
                                    <a href="javascript:void(0)" class="addtocart-btn">
                                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href={{ route('clients.detail', ['id' => $product->id]) }}>
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
                                        <li>
                                            <i class="fas fa-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="font-light mb-sm-2 mb-0">{{ $product->name }}</p>
                            <a href="" class="font-default">
                                <h5>{{ $product->details }}</h5>
                            </a>
                            <div class="pb-5"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
<div class="p-3"></div>
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
            This month</div>
    </div>
    <div class="FlashSales"
        style="color: black; font-size: 36px; font-family: Inter; font-weight: 600; line-height: 48px; letter-spacing: 1.44px; word-wrap: break-word">
        For You</div>
</div>
<div class="mt-5"></div>
<div class="container">
    <div class="row">
        @foreach ($listRandomProduct as $products)
            <div class="col-3 mb-5">
                <div class="product-box">
                    <div class="img-wrapper">
                        <a href="{{ route('clients.detail', ['id' => $products->id]) }}">
                            <img src="{{ $products->image }}" class="w-100 bg-img blur-up lazyload" alt="">
                        </a>
                        <div class="circle-shape"></div>
                        <span class="background-text">Fashion</span>
                        <div class="label-block">
                            <span class="label label-theme">-{{ $products->discount }} Off</span>
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
                                    <a href="{{ route('clients.detail', ['id' => $products->id]) }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-style-3 product-style-chair">
                        <div class="product-title d-block mb-0">
                            <div class="r-price">
                                <div class="theme-color">{{ $products->price }} VNĐ</div>
                                <div class="main-price">
                                    <ul class="rating mb-1 mt-0">
                                        <li>
                                            <i class="fas fa-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="font-light mb-sm-2 mb-0">{{ $products->name }}</p>
                            <a href="product/details.html" class="font-default">
                                <h5>{{ $products->details }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="pb-5"></div>
    </div>
</div>

<section class="ratio2_1 banner-style-2">
    <div class="container">
        <div class="row gy-4">
            @foreach ($img as $key => $item)
                <div class="col-lg-4 col-md-6">
                    <div class="collection-banner p-bottom p-center text-center">
                        <a href="#" class="banner-img">
                            <img src="{{ asset('storage/' . $item->img) }}" class="bg-img blur-up lazyload"
                                alt="" height="300px">
                        </a>
                        <div class="banner-detail">
                            <a href="javacript:void(0)" class="heart-wishlist">
                                <i class="far fa-heart"></i>
                            </a>
                            <span class="font-dark-30">26% <span>OFF</span></span>
                        </div>
                        <a href="#" class="contain-banner">
                            <div class="banner-content with-big">
                                <h2 class="mb-2">New Helmet</h2>
                                <span>BUY ONE GET ONE FREE</span>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<div class="mt-5"></div>
<div class="container">
    <div class="row">
        <div class="title-3 text-center">
            <h2>Fashion Top Deals</h2>
            <h5 class="theme-color">Our Collection</h5>
        </div>
        @foreach ($listFlashSale as $products)
            <div class="col-3 mb-5">
                <div class="product-box">
                    <div class="img-wrapper">
                        <a href="{{ route('clients.detail', ['id' => $products->id]) }}">
                            <img src="{{ $products->image }}" class="w-100 bg-img blur-up lazyload" alt="">
                        </a>
                        <div class="circle-shape"></div>
                        <span class="background-text">Fashion</span>
                        <div class="label-block">
                            <span class="label label-theme">-{{ $products->discount }} Off</span>
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
                                    <a href="{{ route('clients.detail', ['id' => $products->id]) }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-style-3 product-style-chair">
                        <div class="product-title d-block mb-0">
                            <div class="r-price">
                                <div class="theme-color">{{ $products->price }} VNĐ</div>
                                <div class="main-price">
                                    <ul class="rating mb-1 mt-0">
                                        <li>
                                            <i class="fas fa-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="font-light mb-sm-2 mb-0">{{ $products->name }}</p>
                            <a href="product/details.html" class="font-default">
                                <h5>{{ $products->details }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="pb-5"></div>
    </div>
</div>
<div class="p-5"></div>
@endsection
@section('script')
<script src={{ asset('assets/clients/js/home.js') }}></script>
@endsection
