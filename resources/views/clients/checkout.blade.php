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
            @csrf
            <div class="col-5 col pt-5">
                <div class="width padright">
                    <label for="fname">Name</label>
                    <input type="text" name="name" id="name" required disabled value="{{Auth::user()->name}}">
                </div>
                <div class="width50 padright">
                    <label for="tel">Phone number</label>
                    <input type="text" name="tel" id="tel" required disabled value="{{Auth::user()->phone_number}}">
                </div>
                <div class="width50 padright">
                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email" required disabled value="{{Auth::user()->email}}">
                </div>
                <div class="padright">
                    <label for="email">Address</label>
                    <input type="text" name="address" id="address" required disabled value="{{Auth::user()->address}}">
                </div>
                
                {{-- <div class="left-side-button float-start">
                    <a href="{{route('profile.getEdit')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                        <i class="fas fa-arrow-right"></i>update infor</a>
                </div> --}}
            </div>
            <div class="col-7 col order">
                <div class="row">
                    <form action="placeolder" method="post">
                        <h3 class="topborder"><span>Your Order</span></h3>

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

                                    @foreach ($cartShopping as $item)
                                    <tr>
                                        <td scope="row" class="text-center">
                                            <span style=""><img src="{{$item['image']}}" alt="" width="100px" height="100px"></span>
                                            <span style="">{{$item['name']}}</span>
                                        </td>
                                        <td class="text-center" style="text-align: center;">
                                            <span class="fs-5 fw-semibold">{{$item['discounted_price']}}VND</span>
                                            <p class="text-decoration-line-through fw-light">{{$item['price']}}VND</p>
                                        </td>
                                        <td class="text-align-center">{{$item['quantity']}}</td>
                                        <td class="fw-bolder fs-5 text-align-end">{{$item['total']}}.000VND</td>
                                    </tr>       
                                    @endforeach
                            </tbody>
                        </table>
                        <div style="display: flex; justify-content: space-between;">
                            <h5 style="text-align: left; margin-right: 10px;">Total</h5>
                            <span style="text-align: right;">
                                <h5 style="color: #df4246;font-weight:bold" class="fs-3">{{$total}}.000 VND</h5>
                            </span>
                        </div>   

                        <button type="submit" name="submit"  class="btn btn-danger mt-5">PLACE ORDER</button>
                                   
                    </form>
                </div>
                

            </div>
        </form>
    </div>
</div>
@endsection