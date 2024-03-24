@extends('layouts.admin')
@section('content')
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                            <h2 class="mt-0">User</h2>
                            <div class=" text-sm-end">
                                <div class="mx-n1">
                                    <a href="{{route('add')}}" class="btn d-inline-flex btn-sm btn-primary mx-1">
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
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Role ID</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">ID_status</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($userList))
                                        @foreach ($userList as $item)
                                            <tr>
                                                <td>
                                                    <img alt="..." src="https://img.freepik.com/premium-photo/cute-asian-girl-kawaii-anime-avatar-ai-generative-art_225753-9233.jpg" width="40px" height="30px">
                                                </td>
                                                <td>
                                                    <a class="text-heading font-semibold" href="#">
                                                        {{ $item->name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="text-heading font-semibold" href="#">
                                                        {{ $item->role_id }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="text-heading font-semibold" href="#">
                                                        {{ $item->username }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $item->status_id }}
                                                </td>
                                                <td>
                                                    {{ $item->address }}
                                                </td>
                                                
                                                <td>
                                                    <a class="text-heading font-semibold" href="#">
                                                        {{ $item->gender }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $item->phone_number }}
                                                </td>
                                                <td>
                                                    {{ $item->email }}
                                                </td>
                                                {{-- <td>
                                        1
                                    </td> --}}
                                                <td class="text-end">
                                                    <a href="{{route('edit',['id'=>$item->id])}}" class="btn btn-sm btn-neutral">Edit</a>
                                                    <a onclick="return confirm('Bạn có chắc muốn xóa')" href="{{ route('delete', ['id' => $item->id]) }}">
                                                        <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
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
