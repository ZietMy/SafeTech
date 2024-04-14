@section('title')
{{$title}}
@endsection
@extends('layouts.client')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/clients/css/contact.css') }}">
@endsection
@section('content1')
    <div class="container">
        <div class="container1">
            <span class="text1">Your wishlist</span>
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
