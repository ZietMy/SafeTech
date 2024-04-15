@extends('layouts.client')
@section('css')
<style>
    .h-logo {
        max-width: 185px !important;
    }

    .f-logo {
        max-width: 220px !important;
    }

    @media only screen and (max-width: 600px) {
        .h-logo {
            max-width: 110px !important;
        }
    }
</style>
<link rel="stylesheet" href="{{ asset('assets/clients/css/detail.css') }}">
@endsection
@section('title')
    {{ $title }}
@endsection
@section('footer')
    @include('clients.blocks.footer')
@endsection
@section('content1')

<div class="container m-0">
    <div class="row product-data">
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
                <div class="details-image-concept">
                    <h2>{{ $productId->name }}</h2>
                </div>
                <h3 class="price-detail">{{ $productId->discounted_price }}VND <del>{{ $productId->price }}VND</del><span>{{ $productId->discount }}% off</span></h3>
                <p>{{ $productId->details }}</p>
                <div class="col-4">
                    <h6 class="product-title product-title-2 d-block">Quantity</h6>
                    <div class="input-group">
                        <button class="input-group-text bg-danger decrement-btn">-</button>
                        <input type="text" style=" height:35px;"class="form-control text-center bg-white input-qty" disabled value="1">
                        <button class="input-group-text bg-danger increment-btn">+</button>
                    </div>
                </div>
                <h6 class="product-title product-title-2 d-block">Available product: <span class="available-qty">{{$productId->quantity}}</span>
                </h6>
                <div class="d-flex mt1">
                    <form action="{{ route('add-wish-list') }}" method="POST" id="add-wishlist-form">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $productId->id }}">
                        <button type="submit" style="border: none; background-color: transparent;">
                            <i class="far fa-heart js-heart heart" style="font-size: xx-large;" name="addList"></i>
                        </button>
                    </form>
                </div>
                <div class="product-buttons">
                    <button class="btn btn-solid hover-solid btn-animation addToCartBtn">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Add To Cart</span>
                    </button>
                    {{-- <a href="javascript:void(0)"                                            
                        id="cartEffect" class="btn btn-solid hover-solid btn-animation">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Add To Cart</span>
                        <form id="addtocart" method="post"
                            action="cart.store">
                            @csrf
                            <input ype="hidden" name="id" value="1">
                            <input type="hidden" name="name" value="Autem Repudiandae Accusantium Blanditiis">
                            <input type="hidden" name="price" value="13">
                            <input type="hidden" name="quantity" id="qty" value="1">
                        </form>
                    </a> --}}
                    <a href="javascript:void(0)" class="btn btn-solid">
                        <i class="fa fa-check fz-16 me-2"></i>
                        <span>Checkout</span>
                    </a>
                </div>
                {{-- <div class="d-flex mt">
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
                </div> --}}
            </div>
        @endforeach
        <div class="col-1"></div>
    </div>
</div>
<div class="mt-5"></div>
<div class="container m-0" >
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


@endsection
@section('script')
<script src={{ asset('assets/clients/js/detail.js') }}></script>
@endsection