@extends('layouts.client')
@section ('title')
    {{$title}}
@endsection
@section('sidebar')
  @include('clients.blocks.sidebar')
@endsection
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/clients/css/home.css') }}">
@endsection
@section('footer')
    @include('clients.blocks.footer')
@endsection
<div class="container">
  <div class="row">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($img as $key => $item)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="@if($key === 0) active @endif"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($img as $key => $item)
                <div class="carousel-item @if($key === 0) active @endif">
                    <img class="d-block w-100" src="{{asset('storage/'.$item->img)}}" alt="devbanban">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
  </div>
</div>
@endsection
@section('content1')
<div class="mt-5"></div>
  <div class="contanier">
    <div class="row">
        <div class="Frame727" style="width: 1170px; height: 103px; justify-content: flex-start; align-items: flex-end; gap: 470px; display: inline-flex">
            <div class="Frame725" style="justify-content: flex-start; align-items: flex-end; gap: 87px; display: flex">
              <div class="Frame626" style="height: 103px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 24px; display: inline-flex">
                <div class="Frame625" style="justify-content: flex-start; align-items: center; gap: 16px; display: inline-flex">
                  <div class="Rectangle18" style="width: 20px; height: 40px; position: relative">
                    <div class="Rectangle17" style="width: 20px; height: 40px; left: 0px; top: 0px; position: absolute; background: #DB4444; border-radius: 4px"></div>
                  </div>
                  <div class="TodayS" style="color: #DB4444; font-size: 16px; font-family: Poppins; font-weight: 600; line-height: 20px; word-wrap: break-word">Safe Tech</div>
                </div>
                <div class="FlashSales" style="color: black; font-size: 36px; font-family: Inter; font-weight: 600; line-height: 48px; letter-spacing: 1.44px; word-wrap: break-word">Our Product </div>
              </div>
              
            </div>
        </div>
    </div>
    <div class="mt-5"></div>
    <div class="container">
      <div class="row">
        @foreach($listProduct as $product)
          <div class="col-3 mb-3 ml-3" >
            <a href="{{ route('clients.detail', ['id' => $product->id]) }}" style="text-decoration:none;color:black">
            <div class="card" style="width:18rem;">
              <div style="position: relative;">
                  <div class="heart-container">
                      <svg viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="add-to-wishlist">
                          <path d="M11.0661 2.81728L11.6026 3.45246L12.1391 2.81728C13.2867 1.45859 15.0479 0.600098 16.8697 0.600098C20.0815 0.600098 22.6051 3.13599 22.6051 6.38807C22.6051 8.38789 21.72 10.2564 20.0229 12.3496C18.3175 14.4529 15.8645 16.6977 12.8407 19.4622L12.826 19.4756L12.8249 19.4766L11.6008 20.6001L10.3798 19.4879L10.3783 19.4866L10.3336 19.4457C10.3336 19.4457 10.3336 19.4457 10.3336 19.4457C7.31862 16.6834 4.87347 14.4409 3.17365 12.3404C1.4821 10.25 0.600098 8.38442 0.600098 6.38807C0.600098 3.13599 3.12361 0.600098 6.33544 0.600098C8.15729 0.600098 9.91845 1.45859 11.0661 2.81728Z" stroke="#333333" stroke-width="1"/>
                      </svg>
                  </div>
                  <div class="discount">
                    -{{$product->discount}}%
                  </div>
                  <img src="{{$product->image}}" alt="ảnh" style="width:100%;">
              </div>
              <div class="mt-3"></div>
              <div class="card-body">
                  <h5 class="card-title">{{$product->name}}</h5>
                  <div class="card-text" style="color:#DB4444;font-weight:bold">{{$product->price}} VNĐ</div>
                  <a href="#"><button class="button-48" role="button"><span class="text">Checkout</span></button></a>
              </div>
            </div>   
            </a>    
            </div>
          @endforeach 
      </div>
    </div>
    <div class="Frame626" style="height: 103px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 24px; display: inline-flex">
      <div class="Frame625" style="justify-content: flex-start; align-items: center; gap: 16px; display: inline-flex">
        <div class="Rectangle18" style="width: 20px; height: 40px; position: relative">
          <div class="Rectangle17" style="width: 20px; height: 40px; left: 0px; top: 0px; position: absolute; background: #DB4444; border-radius: 4px"></div>
        </div>
        <div class="TodayS" style="color: #DB4444; font-size: 16px; font-family: Poppins; font-weight: 600; line-height: 20px; word-wrap: break-word">This month</div>
      </div>
      <div class="FlashSales" style="color: black; font-size: 36px; font-family: Inter; font-weight: 600; line-height: 48px; letter-spacing: 1.44px; word-wrap: break-word">For You</div>
    </div>
    <div class="mt-5"></div>
    <div class="container">
      <div class="row">
        @foreach($listRandomProduct as $products)
          <div class="col-3 mb-3 ml-3" >
            <a href="{{ route('clients.detail', ['id' => $products->id]) }}" style="text-decoration:none;color:black">
              <div class="card" style="width:18rem;">
                <div style="position: relative;">
                    <div class="heart-container">
                        <svg viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="add-to-wishlist">
                            <path d="M11.0661 2.81728L11.6026 3.45246L12.1391 2.81728C13.2867 1.45859 15.0479 0.600098 16.8697 0.600098C20.0815 0.600098 22.6051 3.13599 22.6051 6.38807C22.6051 8.38789 21.72 10.2564 20.0229 12.3496C18.3175 14.4529 15.8645 16.6977 12.8407 19.4622L12.826 19.4756L12.8249 19.4766L11.6008 20.6001L10.3798 19.4879L10.3783 19.4866L10.3336 19.4457C10.3336 19.4457 10.3336 19.4457 10.3336 19.4457C7.31862 16.6834 4.87347 14.4409 3.17365 12.3404C1.4821 10.25 0.600098 8.38442 0.600098 6.38807C0.600098 3.13599 3.12361 0.600098 6.33544 0.600098C8.15729 0.600098 9.91845 1.45859 11.0661 2.81728Z" stroke="#333333" stroke-width="1"/>
                        </svg>
                    </div>
                    <div class="discount">
                      -{{$products->discount}}%
                    </div>
                    <img src="{{$products->image}}" alt="ảnh" style="width:100%;">
                </div>
                <div class="mt-3"></div>
                <div class="card-body">
                    <h5 class="card-title">{{$products->name}}</h5>
                    <div class="card-text" style="color:#DB4444;font-weight:bold">{{$products->price}} VNĐ</div>
                    <a href="#"><button class="button-48" role="button"><span class="text">Checkout</span></button></a>
                </div>
              </div>  
            </a>
            </div>
          @endforeach 
      </div>
    </div>
    <hr>
    <hr>
    <div class="Frame727" style="width: 1170px; height: 103px; justify-content: flex-start; align-items: flex-end; gap: 470px; display: inline-flex">
      <div class="Frame725" style="justify-content: flex-start; align-items: flex-end; gap: 87px; display: flex">
        <div class="Frame626" style="height: 103px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 24px; display: inline-flex">
          <div class="Frame625" style="justify-content: flex-start; align-items: center; gap: 16px; display: inline-flex">
            <div class="Rectangle18" style="width: 20px; height: 40px; position: relative">
              <div class="Rectangle17" style="width: 20px; height: 40px; left: 0px; top: 0px; position: absolute; background: #DB4444; border-radius: 4px"></div>
            </div>
            <div class="TodayS" style="color: #DB4444; font-size: 16px; font-family: Poppins; font-weight: 600; line-height: 20px; word-wrap: break-word">Today’s</div>
          </div>
          <div class="FlashSales" style="color: black; font-size: 36px; font-family: Inter; font-weight: 600; line-height: 48px; letter-spacing: 1.44px; word-wrap: break-word">Flash Sales</div>
        </div>
        <div class="Group1000005937" style="width: 302px; height: 50px; position: relative">
          <div class="Frame580" style="width: 46px; left: 0px; top: 0px; position: absolute; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 4px; display: inline-flex">
            <div class="Days" style="width: 31px; color: black; font-size: 12px; font-family: Poppins; font-weight: 500; line-height: 18px; word-wrap: break-word">Days</div>
            <div style="width: 46px; height: 28px; color: black; font-size: 32px; font-family: Inter; font-weight: 700; line-height: 30px; letter-spacing: 1.28px; word-wrap: break-word">03</div>
          </div>
          <div class="Frame581" style="width: 42px; height: 50px; left: 84px; top: 0px; position: absolute; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 4px; display: inline-flex">
            <div class="Hours" style="width: 35px; color: black; font-size: 12px; font-family: Poppins; font-weight: 500; line-height: 18px; word-wrap: break-word">Hours</div>
            <div style="color: black; font-size: 32px; font-family: Inter; font-weight: 700; line-height: 30px; letter-spacing: 1.28px; word-wrap: break-word">23</div>
          </div>
          <div class="Frame582" style="width: 49px; height: 50px; left: 164px; top: 0px; position: absolute; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 4px; display: inline-flex">
            <div class="Minutes" style="width: 49px; color: black; font-size: 12px; font-family: Poppins; font-weight: 500; line-height: 18px; word-wrap: break-word">Minutes</div>
            <div style="width: 39px; height: 28px; color: black; font-size: 32px; font-family: Inter; font-weight: 700; line-height: 30px; letter-spacing: 1.28px; word-wrap: break-word">19</div>
          </div>
          <div class="Frame583" style="width: 51px; height: 50px; left: 251px; top: 0px; position: absolute; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 4px; display: inline-flex">
            <div class="Seconds" style="width: 52px; color: black; font-size: 12px; font-family: Poppins; font-weight: 500; line-height: 18px; word-wrap: break-word">Seconds</div>
            <div style="color: black; font-size: 32px; font-family: Inter; font-weight: 700; line-height: 30px; letter-spacing: 1.28px; word-wrap: break-word">56</div>
          </div>
          <div class="Semiclone" style="left: 63px; top: 26px; position: absolute; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 8px; display: inline-flex">
            <div class="Ellipse17" style="width: 4px; height: 4px; background: #E07575; border-radius: 9999px"></div>
            <div class="Ellipse18" style="width: 4px; height: 4px; background: #E07575; border-radius: 9999px"></div>
          </div>
          <div class="Semiclone" style="left: 143px; top: 26px; position: absolute; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 8px; display: inline-flex">
            <div class="Ellipse17" style="width: 4px; height: 4px; background: #E07575; border-radius: 9999px"></div>
            <div class="Ellipse18" style="width: 4px; height: 4px; background: #E07575; border-radius: 9999px"></div>
          </div>
          <div class="Semiclone" style="left: 230px; top: 26px; position: absolute; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 8px; display: inline-flex">
            <div class="Ellipse17" style="width: 4px; height: 4px; background: #E07575; border-radius: 9999px"></div>
            <div class="Ellipse18" style="width: 4px; height: 4px; background: #E07575; border-radius: 9999px"></div>
          </div>
        </div>
      </div>
  </div>
  <div class="mt-5"></div>
  <div class="container">
    <div class="row">
      @foreach($listFlashSale as $products)
      <div class="col-3 mb-3 ml-3" >
        <a href="{{ route('clients.detail', ['id' => $products->id]) }}" style="text-decoration:none;color:black">
          <div class="card" style="width:18rem;">
            <div style="position: relative;">
                <div class="heart-container">
                    <svg viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="add-to-wishlist">
                        <path d="M11.0661 2.81728L11.6026 3.45246L12.1391 2.81728C13.2867 1.45859 15.0479 0.600098 16.8697 0.600098C20.0815 0.600098 22.6051 3.13599 22.6051 6.38807C22.6051 8.38789 21.72 10.2564 20.0229 12.3496C18.3175 14.4529 15.8645 16.6977 12.8407 19.4622L12.826 19.4756L12.8249 19.4766L11.6008 20.6001L10.3798 19.4879L10.3783 19.4866L10.3336 19.4457C10.3336 19.4457 10.3336 19.4457 10.3336 19.4457C7.31862 16.6834 4.87347 14.4409 3.17365 12.3404C1.4821 10.25 0.600098 8.38442 0.600098 6.38807C0.600098 3.13599 3.12361 0.600098 6.33544 0.600098C8.15729 0.600098 9.91845 1.45859 11.0661 2.81728Z" stroke="#333333" stroke-width="1"/>
                    </svg>
                </div>
                <div class="discount">
                  -{{$products->discount}}%
                </div>
                <img src="{{$products->image}}" alt="ảnh" style="width:100%;">
            </div>
            <div class="mt-3"></div>
            <div class="card-body">
                <h5 class="card-title">{{$products->name}}</h5>
                <div class="card-text" style="color:#DB4444;font-weight:bold">{{$products->price}} VNĐ</div>
                <a href="#"><button class="button-48" role="button"><span class="text">Checkout</span></button></a>
            </div>
          </div>  
        </a>
        </div>
      @endforeach 
    </div>
  </div>
    @endsection
  @section('script')
      
  <script src={{ asset('assets/clients/js/home.js') }}></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  @endsection

