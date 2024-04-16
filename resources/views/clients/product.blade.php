@extends('layouts.client')
@section('title')
    {{ $title }}
@endsection
<link rel="stylesheet" href="{{ asset('assets/clients/css/detail.css') }}">
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
              <h3>Shop</h3>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                          <a href="../index.htm">
                              <i class="fas fa-home"></i>
                          </a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Shop</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
</section>
<div class="pt-5"></div>
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
                                style="color: #DB4444; font-size: 18px; font-family: Poppins; font-weight: 600; line-height: 20px; word-wrap: break-word">
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
                        <div class="product-box" style="width:200px">
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
                                            <form action="{{ route('cart.store') }}" method="POST">
                                                @csrf
                                                <div>
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="quantity_purchase" value="1" min="1">
                                                </div>
                                                <button type="submit"><i class="fa fa-shopping-basket" aria-hidden="true"></i></button>
                                            </form>
                                            
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
                                        <div class="theme-color ">{{ $product->discounted_price }} VNĐ <del class="fw-light text-body-tertiary fs-6">{{ $product->price }}VND</del></div>
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
                                style="color: #DB4444; font-size: 18px; font-family: Poppins; font-weight: 600; line-height: 20px; word-wrap: break-word">
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
                        <div class="product-box" style="width:200px">
                            <div class="img-wrapper"style="width:220px">
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
                                            <form action="{{ route('cart.store') }}" method="POST">
                                                @csrf
                                                <div>
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="quantity_purchase" value="1" min="1">
                                                </div>
                                                <button type="submit"><i class="fa fa-shopping-basket" aria-hidden="true"></i></button>
                                            </form>
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
                                        <div class="theme-color ">{{ $product->discounted_price }} VNĐ <del class="fw-light text-body-tertiary fs-6">{{ $product->price }}VND</del></div>
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
                              style="color: #DB4444; font-size: 18px; font-family: Poppins; font-weight: 600; line-height: 20px; word-wrap: break-word">
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
                        <div class="product-box" style="width:200px">
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
                                            <form action="{{ route('cart.store') }}" method="POST">
                                                @csrf
                                                <div>
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="quantity_purchase" value="1" min="1">
                                                </div>
                                                <button type="submit"><i class="fa fa-shopping-basket" aria-hidden="true"></i></button>
                                            </form>
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
                                        <div class="theme-color ">{{ $product->discounted_price }} VNĐ <del class="fw-light text-body-tertiary fs-6">{{ $product->price }}VND</del></div>
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

