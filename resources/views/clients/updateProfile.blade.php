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
    <div class="row">
        <form action="{{route('profile.edit')}}" method="POST">
            @csrf
        @if($user)
            <div class="col-12 col pt-5">
                <div class="width50 padright">
                    <label for="fname">Full name</label>
                    <input type="text" name="name" id="name"  value="{{ old('name', $user->name) }}"> 
                    @error('name')  
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="width50 padright">
                    <label for="tel">User name</label>
                    <input type="text" name="username" id="username"  value="{{ old('username', $user->username) }}">
                    @error('username')  
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="width50 padright">
                    <label for="tel">Phone numer</label>
                    <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                    @error('phone_number')  
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="width50 padright">
                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email"  value="{{ old('email', $user->email) }}">
                    @error('email')  
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <label for="country">Address</label>
                <select name="address" id="address" value="{{ old('address', $user->address) }}">
                    <option value="">Please select a address/option>
                    <option value="Đà Nẵng ">Đà Nẵng</option>
                    <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                </select>
                @error('address')  
                    <span style="color: red;">{{$message}}</span>
                @enderror
            </div>    
            <div>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i>
                        <span >Update</span>
                </button>
            </div>
        @endif
        </form>
    </div>
</div>

@endsection