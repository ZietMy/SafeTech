@section ('title')
    {{$title}}
@endsection
@extends('layouts.client')
@section('content1')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/clients/css/contact.css') }}">
@endsection
@section('footer')
    @include('clients.blocks.footer')
@endsection
<div class="container">
    <div class="row">
        <div class="col-4"> 
  	        <div class="frame-parent">
                <div class="frame-group">
                    <div class="frame-container">
                        <div class="icons-phone-parent">
                            <img class="icons-phone" alt="" src="{{asset('assets/clients/images/icons-mail.png') }}">
                            <div class="call-to-us">Call To Us</div>
                        </div>
                        <div class="we-are-available-247-7-days-parent">
                            <div class="we-are-available">We are available 24/7, 7 days a week.</div>
                            <div class="emails-customerexclusivecom">Phone: +8801611112222</div>
                        </div>
                    </div>
                    <img class="underline-icon" alt="" src="UnderLine.svg">
                    <div class="frame-container">
                        <div class="icons-phone-parent">
                            <img class="icons-mail" alt="" src="{{asset('assets/clients/images/icons-phone.png') }}">
                            
                            <div class="call-to-us">Write To US</div>
                        </div>
                        <div class="we-are-available-247-7-days-parent">
                            <div class="fill-out-our">Fill out our form and we will contact you within 24 hours.</div>
                            <div class="emails-customerexclusivecom">Emails: customer@exclusive.com</div>
                            <div class="emails-customerexclusivecom">Emails: support@exclusive.com</div>
                        </div>
                    </div>
                </div>
  	        </div>
  	    </div>
        <div class="col-8">
            <div class="frame-parent">
                    <div class="container form">
                        <form action="{{route('post-message')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <div class="md">
                                        <span><label for="">Your name</label></span>
                                        <input type="text" name="name" class="form-control">
                                        @error('name')  
                                            <span style="color: red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="md">
                                        <span><label for="">Your email</label></span>
                                        <input type="text" name="email" class="form-control">
                                        @error('email')  
                                            <span style="color: red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="md">
                                        <span><label for="">Your phone</label></span>
                                        <input type="text" name="phone" class="form-control">
                                        @error('phone')  
                                            <span style="color: red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="md message">
                                <span><label for="">Message</label></span>
                                <input type="text" name="message" class="form-control">
                                @error('message')  
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="button">
                               <button type="submit"><div class="view-all-products">Send Massage</div></button>
                            </div>
                            <div class="mt-3"></div>
                            @if(session('msg'))
                            <div class="alert alert-success">
                                Thông tin của bạn đã được gửi đi
                            </div>
                        @endif
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-5"></div>
<div class="container">
    <div class="row">
        <div class="full-services">
                <div class="services-parent">
                    <img class="services-icon" alt=""src="{{asset('assets\clients\images\Services.png') }}">
                    
                    <div class="free-and-fast-delivery-parent">
                            <div class="free-and-fast">FREE AND FAST DELIVERY</div>
                            <div class="free-delivery-for">Free delivery for all orders over $140</div>
                    </div>
                </div>
                <div class="services-group">
                    <img class="services-icon" alt="" src="{{asset('assets\clients\images\Services (1).png') }}">
                    
                    <div class="free-and-fast-delivery-parent">
                            <div class="free-and-fast">24/7 CUSTOMER SERVICE</div>
                            <div class="friendly-247-customer">Friendly 24/7 customer support</div>
                    </div>
                </div>
                <div class="services-parent">
                    <img class="services-icon" alt="" src="{{asset('assets\clients\images\Services (2).png') }}">
                    
                    <div class="free-and-fast-delivery-parent">
                            <div class="free-and-fast">MONEY BACK GUARANTEE</div>
                            <div class="friendly-247-customer">We reurn money within 30 days</div>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection