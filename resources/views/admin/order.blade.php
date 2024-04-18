@extends('layouts.admin')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                            <h2 class="mt-0">Order</h2>
                            <div class=" text-sm-end">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">User name</th>
                                        <th scope="col">Status name</th>
                                        {{-- <th scope="col">Quantity</th>   --}}
                                        <th scope="col">Total Amount</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($orderList))
                                        @foreach ($orderList as $item)
                                            <tr>
                                                <td>
                                                    <a class="text-heading font-semibold" href="#">
                                                        {{ $item->id }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="text-heading font-semibold" href="#">
                                                        {{ $item->users->name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="text-heading font-semibold" href="#">
                                                        {{ $item->orderStatus->status_name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="text-heading font-semibold" href="#">
                                                        {{ $item->total_amount }}
                                                    </a>
                                                </td>
                                                
                                                <td class="text-end">
                                                    
                                                    <a href="{{ route('viewOrderDetail', ['id' => $item->id]) }}" class="btn btn-sm btn-neutral">Update</a>
                                                    {{-- <a href="{{ route('EditOrder', ['id' => $item->id]) }}" class="btn btn-sm btn-neutral">Edit</a>
                                                    </a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7">Không có đơn hàng</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
