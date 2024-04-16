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
            <div class="col-7 col pt-5">
                <div class="width50 padright">
                    <label for="fname">Full name</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="width50 padright">
                    <label for="tel">User name</label>
                    <input type="text" name="username" id="tel" required>
                </div>
                <div class="width50 padright">
                    <label for="tel">Phone numer</label>
                    <input type="text" name="tel" id="tel" required>
                </div>
                <div class="width50 padright">
                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email" required>
                </div>
                <label for="country">Address</label>
                <select name="country" id="country" required>
                    <option value="">Please select a address/option>
                    <option value="Đà Nẵng ">Đà Nẵng</option>
                    <option value="Hồ Chí Minh">Hồ Chính Minh</option>
                </select>
                <label for="notes" class="notes">Order Notes</label>
                <textarea name="notes" id="notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
            </div>
            <div class="col-5 col order">
                <h3 class="topborder"><span>Your Order</span></h3>
                <div class="row">
                    <h4 class="inline">Product</h4>
                    <h4 class="inline alignright">Total</h4>
                </div>
                <div>
                    <p class="prod-description inline">Nice Dress<div class="qty inline"><span class="smalltxt">x</span> 1</div>
                    </p>
                </div>
                <input type="submit" name="submit" value="Place Order" class="redbutton">
                </div>

            </div>
        </form>
    </div>
</div>
@endsection