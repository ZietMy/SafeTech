@extends('layouts.admin')

@section('content')
@if(session()->has('msg'))
    <script>
        alert("{{ session()->get('msg') }}");
    </script>
@endif
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                            <h2 class="mt-0">Order</h2>
                            <div class=" text-sm-end">
                                <div class="mx-n1">
                                    <a href="{{ route('addOrder') }}" class="btn d-inline-flex btn-sm btn-primary mx-1">
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
                                        <th scope="col">User_id</th>
                                        <th scope="col">Product_id</th>
                                        <th scope="col">Status_id</th>
                                        <th scope="col">Quantity</th>
                                        {{-- <th scope="col">Created_at</th>
                                        <th scope="col">Update_at</th> --}}
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($orderList))
                                        @foreach ($orderList as $item)
                                            <tr>
                                                <td>
                                                    <a class="text-heading font-semibold" href="#">
                                                        {{ $item->user_id }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="text-heading font-semibold" href="#">
                                                        {{ $item->product_id }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="text-heading font-semibold" href="#">
                                                        {{ $item->status_id }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $item->quantity }}
                                                </td>

                                                {{-- <td>
                                                    <a class="text-heading font-semibold" href="#">
                                                        {{ $item->created_at }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $item->updated_at }}
                                                </td> --}}
                                                {{-- <td>
                                        1
                                    </td> --}}
                                                <td class="text-end">
                                                    <a href="{{ route('EditOrder', ['id' => $item->id]) }}"
                                                        class="btn btn-sm btn-neutral">Edit</a>
                                                    <a onclick="return confirm('Bạn có chắc muốn xóa')"
                                                        href="{{ route('delete-Order', ['id' => $item->id]) }}">
                                                        <button type="button"
                                                            class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>Không có người dùng</td>
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
