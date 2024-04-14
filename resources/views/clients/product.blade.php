@extends('layouts.client')
@section('title')
    {{ $title }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/clients/css/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/slick/demon2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/slick/demo4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/slick/slick.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    </div>
@section('content1')
    <div class="container">
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
                                Mũ len</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                @if ($product->category_id == 1)
                    <div class="col-3">
                        <div class="product-box" style="width:200px" >
                            <div class="img-wrapper">
                                <a href="{{ route('clients.detail', ['id' => $product->id]) }}">
                                    <img src="{{ $product->image }}" class="w-100  blur-up lazyload" alt="">
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
                @endif
            @endforeach
        </div>
    </div>
    <div class="container mt-5">
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
                                Mũ bảo hiểm</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
            @if ($product->category_id == 2)
            <div class="col-3">
                <div class="product-box" style="width:200px" >
                    <div class="img-wrapper">
                        <a href="{{ route('clients.detail', ['id' => $product->id]) }}">
                            <img src="{{ $product->image }}" class="w-100  blur-up lazyload" alt="">
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
        @endif
            @endforeach
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="Frame727"
                style="width: 1170px; height: 103px; justify-content: flex-start; align-items: flex-end; gap: 470px; display: inline-flex">
                <div class="Frame725"
                    style="justify-content: flex-start; align-items: flex-end; gap: 87px; display: flex">
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
                                Mũ lưỡi trai</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
            @if ($product->category_id == 3)
            <div class="col-3">
                <div class="product-box" style="width:200px" >
                    <div class="img-wrapper"style="width:220px">
                        <a href="{{ route('clients.detail', ['id' => $product->id]) }}">
                            <img src="{{ $product->image }}" class="w-100  blur-up lazyload" alt="" >
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
        @endif
            @endforeach
        </div>
    </div>
@endsection









@section('footer')
    @include('clients.blocks.footer')
@endsection
@section('script')
    <script src={{ asset('assets/clients/js/home.js') }}></script>
    <script src={{ asset('assets/clients/js/custom_slick.js') }}></script>
    <script src={{ asset('assets/clients/js/slick/slick-animation.min.js') }}></script>
    <script src={{ asset('assets/clients/js/slick/slick.min.js') }}></script>
    <script src={{ asset('assets/clients/js/slick/script.min.js') }}></script>
    <script src={{ asset('assets/clients/js/feather/cart_modal_resize.js') }}></script>
    <script src={{ asset('assets/clients/js/feather/feather.min.js') }}></script>
    <script src={{ asset('assets/clients/js/feather/filter.js') }}></script>
    <script src={{ asset('assets/clients/js/feather/ion.rangeSlider.min.js') }}></script>
    <script src={{ asset('assets/clients/js/feather/lazysizes.min.js') }}></script>
    <script src={{ asset('assets/clients/js/feather/newsletter.js') }}></script>
    <script src={{ asset('assets/clients/js/feather/price-filter.js') }}></script>
    <script src={{ asset('assets/clients/js/feather/theme-setting.js') }}></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
    </script>
@endsection
