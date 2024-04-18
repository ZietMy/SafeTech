@extends('layouts.client')
@section('title')
    {{$title}}
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
              <h3> {{$title}}</h3>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                          <a href="{{route('home')}}">
                              <i class="fas fa-home"></i>
                          </a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page"> {{$title}}</li>
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
        @if( $wishlists->isNotEmpty())
            <div class="row">
                <div class="col-md-12 text-center">
                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wishlists as $item)
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
                                    <h2 class="price-detail">{{$item->product->discounted_price}}</h2>
                                </td>
                                <td>
                                    <form action="{{route('delete-wish-list', ['id' => $item->id])}}" method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else 
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Your Wish List is empty</h2>
                    <h5 class="mt-3">Add items to it now</h5>
                    <a href="{{route('product')}}" class="btn btn-danger mt-5">Shop now</a>
                </div>
            </div>
        @endif
      </div> 
</section>

@endsection