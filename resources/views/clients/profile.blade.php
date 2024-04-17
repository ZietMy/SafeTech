@section ('title')
    {{$title}}
@endsection
@extends('layouts.client')
@section('content1')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/clients/css/checkout.css') }}">
@endsection
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
                <h3>Profile</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.htm">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="wrapper">
    @if(session('msg'))
        <div class="alert alert-success">
             {{session('msg')}}
        </div>
    @endif
    <div class="row">
        @if($user)
        <div class="col-12 col pt-5">
            <div class="width50 padright">
                <label for="fname">Full name</label>
                <input type="text" name="name" id="name" required disabled value="{{ old('name', $user->name) }}"> 
            </div>
            <div class="width50 padright">
                <label for="tel">User name</label>
                <input type="text" name="username" id="tel" required disabled value="{{ old('username', $user->username) }}">
            </div>
            <div class="width50 padright">
                <label for="tel">Phone numer</label>
                <input type="text" name="phone_number" id="tel" required disabled value="{{ old('phone_number', $user->phone_number) }}">
            </div>
            <div class="width50 padright">
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email" required disabled value="{{ old('email', $user->email) }}">
            </div>
            <div class=" padright">
                <label for="email">Address</label>
                <input type="text" name="email" id="address" required disabled value="{{ old('address', $user->address) }}">
            </div>
        </div>    
        </div>
        <div>
            <button type="submit" class="btn btn-light">
                <a href="{{route('home')}}" style="color: black">
                    <i class="fa fa-check"></i>
                    <span >Go back home</span>
                </a>
            </button>
            <button type="submit" class="btn btn-success">
                <a href="{{route('profile.getEdit')}}" style="color: white">
                    <i class="fa fa-check"></i>
                    <span >Update</span>
                </a>
            </button>
        </div>
    @endif
    </div>
</div>

@endsection