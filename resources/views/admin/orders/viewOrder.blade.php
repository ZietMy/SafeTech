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
                                {{ $product->name }} <br>
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
    <div class="container mt-3">
        <a href="{{ route('order') }}" class="btn btn-secondary">Back to Orders</a>
    </div>
@endsection
