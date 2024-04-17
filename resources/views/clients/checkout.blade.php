@extends('layouts.client')
@section('title')
    {{ $title }}
@endsection
{{-- @section('sidebar')
  @include('clients.blocks.sidebar')
@endsection --}}
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/clients/css/checkout.css') }}">
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
                <h3>Checkout </h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.htm">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="wrapper">
    <div class="row">
        <form method="post">
            <div class="col-5 col pt-5">
                <div class="width50 padright">
                    <label for="fname">Full name</label>
                    <input type="text" name="name" id="name" required disabled>
                </div>
                <div class="width50 padright">
                    <label for="tel">User name</label>
                    <input type="text" name="username" id="tel" required disabled>
                </div>
                <div class="width50 padright">
                    <label for="tel">Phone numer</label>
                    <input type="text" name="tel" id="tel" required disabled>
                </div>
                <div class="width50 padright">
                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email" required disabled>
                </div>
                <div class="padright">
                    <label for="email">Address</label>
                    <input type="text" name="address" id="address" required disabled>
                </div>
                <label for="notes" class="notes">Order Notes</label>
                <textarea name="notes" id="notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
            </div>
            <div class="col-7 col order">
                <h3 class="topborder"><span>Your Order</span></h3>
                <div class="row">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" style="text-align: left; margin-right: 10px;">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col" >Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td scope="row" class="text-center">
                                <span style=""><img src="{{asset('assets\clients\images\ảnh.png') }}" alt="" width="100px" height="100px"></span>
                                <span style="">Mũ Len Đẹp</span>
                            </td>
                            <td class="text-center" style="text-align: center;">
                                <span class="fs-5 fw-semibold">125.000 VND</span>
                                <p class="text-decoration-line-through fw-light">100.000 VND</p>
                            </td>
                            <td class="text-align-center">2</td>
                            <td class="fw-bolder fs-5 text-align-end">200.000VND</td>
                          </tr>
                        </tbody>
                      </table>
                      <div style="display: flex; justify-content: space-between;">
                        <h5 style="text-align: left; margin-right: 10px;">Total</h5>
                        <span style="text-align: right;"><h5 style="color: #df4246;font-weight:bold" class="fs-3">200.000 vnd</h5></span>
                    </div>                    
                </div>
                <input type="submit" name="submit" value="Place Order" class="redbutton">

            </div>
        </form>
    </div>
</div>
@endsection