@extends('layouts.admin')

@section('header-sidebar')
@endsection

@section('content')
    @if (isset($msg))
        <div class="alert alert-success">
            {{ $msg }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">Vui lòng nhập lại</div>
    @endif

    <form class="form-horizontal" method="POST" action="">

        @csrf
        <div class="mb-3 row">
            <label for="user_id" class="col-sm-3 col-form-label">User ID</label>
            <div class="col-sm-9">
                <select class="form-select" id="user_id" name="user_id">
                    {{-- <option value="">Chọn User</option> --}}
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div>        
        <div class="mb-3 row">
            <label for="product_id" class="col-sm-3 col-form-label">Product ID</label>
            <div class="col-sm-9">
                <select class="form-select" id="product_id" name="product_id">
                    {{-- <option value="">Chọn Product</option> --}}
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}</option>
                    @endforeach
                </select>
                @error('product_id')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="status_id" class="col-sm-3 col-form-label">Status ID</label>
            <div class="col-sm-9">
                <select class="form-select" id="status_id" name="status_id">
                    {{-- <option value="">Chọn Status</option> --}}
                    @foreach ($statuses as $status)
                        <option value="{{ $status->id }}" {{ old('status_id') == $status->id ? 'selected' : '' }}>
                            {{ $status->status_name }}</option>
                    @endforeach
                </select>
                @error('status_id')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="quantity" name="quantity" value="{{ isset($orderDetail[0]->quantity) ? $orderDetail[0]->quantity : '' }}">
                @error('quantity')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="mb-3 row">
            <div class="col-sm-3"></div>
            <div class="col-sm-9 d-flex justify-content-between">
                <a href="{{ route('order') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
    </form>
@endsection
