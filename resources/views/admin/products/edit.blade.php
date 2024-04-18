@extends('layouts.admin')
@section('content')
@if (isset($msg))
    <div class="alert alert-success">
        {{ $msg }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger"> @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach</div>
@endif

    <form action="{{route('products.update',['product' => $id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3 row">
            <label for="Name" class="col-sm-3 col-form-label">name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')??$product->name}}">
                @error('name')
                <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="price" class="col-sm-3 col-form-label">price</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="price" name="price" value="{{old('price')??$product->price}}">
                @error('price')
                <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="price" class="col-sm-3 col-form-label">Discount(%)</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="discount" name="discount" value="{{old('discount')??$product->discount}}">
                @error('discount')
                <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="quantity" class="col-sm-3 col-form-label">quantity</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{old('quantity')??$product->quantity}}">
                @error('quantity')
                <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="detatils" class="col-sm-3 col-form-label">Details</label>
            <div class="col-sm-9">
                <textarea class="form-control" id="details" name="details" value="">{{old('details') ?? $product->details}}</textarea>
                @error('details')
                <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="category" class="col-sm-3 col-form-label">category</label>
            <div class="col-sm-9">
                <select class="form-control" id="category" name="category">
                    <option value="" disabled>Chose a category</option>
                    
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{ $category->id == $product->category_id ? 'selected' :'' }}>{{$category->name}}</option>
                    @endforeach
                    
                </select>
                @error('category')
                <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        @csrf
        <button type="submit" class="btn btn-primary mt-5">Update</button>
        <a href="{{route('products.index')}}" class='btn btn-danger mt-5'>Quay lại</a>
    </form>
@endsection