@extends('layouts.admin')
@section('content')
<div class="card shadow border-0 mb-7">
    <div class="card-header">
        <h2 class="mt-0">Product</h2>
        <div class=" text-sm-end">
            <div class="mx-n1">
                <a href="{{route('products.create')}}" class="btn d-inline-flex btn-sm btn-primary mx-1">
                    <span class=" pe-2">
                        <i class="bi bi-plus"></i>
                    </span>
                    <span>Create</span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-nowrap">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Details</th>
                    <th scope="col">Category</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>
                        <img alt="..."
                            src="{{$product->image}}"
                            class="avatar avatar-sm rounded-circle me-2">
                        {{$product->name}}
                    </td>
                    <td>
                        {{$product->price}} VND
                    </td>
                    <td>
                        {{$product->quantity}}
                    </td>
                    <td>
                        {{$product->details}}
                    </td>
                    <td>
                        {{ $product->category->name }}
                    </td>
                    <td class="text-end">
                        <a href="{{route('products.edit', ['product' => $product->id])}}" class="btn btn-sm btn-neutral">Edit</a>
                        <a
                        onclick="return confirm('bạn có chắc chắn muốn xóa')" href="{{route('products.destroy',['product'=>$product->id])}}"   
                        method="POST"        
                            class="btn btn-sm btn-square btn-neutral text-danger-hover">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
                    
                @endforeach
                
            </tbody>
        </table>
    </div>
    <div class="card-footer border-0 py-5">
        <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
    </div>
</div>
@endsection
