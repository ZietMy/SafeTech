@section('title')
{{$title}}
@endsection
@extends('layouts.client')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/clients/css/contact.css') }}">
@endsection
@section('content1')
    <div class="container">
       @if( $wishlist->isNotEmpty())
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
                    <h3>Your wishlist </h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="../index.htm">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Your wishlist </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
       <div class="mt-5"></div>
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
