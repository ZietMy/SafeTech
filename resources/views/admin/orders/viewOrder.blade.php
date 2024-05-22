@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="mt-0">Order Details</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Name User</th>
                        <td>{{ $order->users->name }}</td>
                    </tr>
                    <tr>
                        <th>Product name</th>
                        <td>
                            @foreach ($order->products as $product)
                                {{ $product->name }}<br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Status order</th>
                        <td>{{ $order->orderStatus->status_name }}</td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td>{{ $order->orderItems->sum('quantity') }}</td>
                    </tr>                    
                    <tr>
                        <th>Total Price</th>
                        <td>{{ $order->total_amount }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mt-3 col">
            <a href="{{ route('order') }}" class="btn btn-secondary">Back to Orders</a>
        </div>
        <div class="mt-3 col">
            <form action="{{ route('admin.update.order', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="status_id" value="2">
                <button type="submit" class="btn btn-primary {{$order->status_id == 2 || $order->status_id == 3 || $order->status_id == 4 ? 'd-none' : ''}}">
                    Confirm 
                </button>
            </form>
        </div>
        <div class="mt-3 col">
            <form action="{{ route('admin.update.order', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="status_id" value="3">
                <button type="submit" class="btn btn-success {{$order->status_id == 1 || $order->status_id == 3 || $order->status_id == 4 ? 'd-none' : ''}}">
                    Xác nhận đã giao
                </button>
            </form>
        </div>
        <div class="mt-3 col">
            <form action="{{ route('admin.update.order', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="status_id" value="4">
                <button type="submit" class="btn btn-danger {{$order->status_id == 2 || $order->status_id == 3 || $order->status_id == 4 ? 'd-none' : ''}}">
                    Hủy đơn hàng
                </button>
            </form>
        </div>
    </div>
@endsection
