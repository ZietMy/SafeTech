@section('title')
{{$title}}
@endsection
@extends('layouts.client')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/clients/css/contact.css') }}">
@endsection
@section('content1')
    <div class="container">
        <div class="row">
            <div class="Frame727" style="width: 1170px; height: 103px; justify-content: flex-start; align-items: flex-end; gap: 470px; display: inline-flex">
                <div class="Frame725" style="justify-content: flex-start; align-items: flex-end; gap: 87px; display: flex">
                  <div class="Frame626" style="height: 103px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 24px; display: inline-flex">
                    <div class="Frame625" style="justify-content: flex-start; align-items: center; gap: 16px; display: inline-flex">
                      <div class="Rectangle18" style="width: 20px; height: 40px; position: relative">
                        <div class="Rectangle17" style="width: 20px; height: 40px; left: 0px; top: 0px; position: absolute; background: #DB4444; border-radius: 4px"></div>
                      </div>
                      <div class="TodayS" style="color: #DB4444; font-size: 16px; font-family: Poppins; font-weight: 600; line-height: 20px; word-wrap: break-word">Your WishList</div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
       @if( $wishlist->isNotEmpty())
       <table class="table table-hover">
           <thead>
               <tr>
                    <th scope="col">Image</th>
                   <th scope="col">Name</th>
                   <th scope="col">Price</th>
                   <th scope="col">Action</th>
               </tr>
           </thead>
           <tbody>
               @foreach ( $wishlist as $item)
                   <tr>
                        <td>
                            <img src="{{ $item->image }}" alt="" width="100px" height="100px">
                       </td>
                       <td>{{ $item->name }}</td>
                       <td>${{ $item->price }}</td>
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
   @else
       <p>No items in wishlist.</p>
   @endif
   
    </div>
@endsection
