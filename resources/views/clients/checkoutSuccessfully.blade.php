@extends('layouts.client')
@section('content1')
@if(session('success'))
    
<div class="row">
    <div class="col-md-12 text-center">
        <img src="{{asset('assets\clients\images\Flat_tick_icon.png')}}" alt="" style="width:100%">
        <h2>{{ session('success') }}</h2>
        <a href="{{route('home')}}" class="btn btn-primary mt-5">Home</a>
        {{-- <a href="{{route('order.index')}}" class="btn btn-danger mt-5">Go to your order</a> --}}
    </div>
</div>
@endif
@endsection