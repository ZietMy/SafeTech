@extends('layouts.admin')
@section('content')
@if(session()->has('msg'))
    <script>
        alert("{{ session()->get('msg') }}");
    </script>
@endif
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
                            <h2 class="mt-0">User</h2>
                            <div class=" text-sm-end">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Role name</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Gender</th>
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
                                                {{-- <td>
                                                    <a class="text-heading font-semibold" href="#">
                                                        {{ $item->name }}
                                                    </a>
                                                </td> --}}
                                                </td> --}}
                                                <td>
                                                    <select name="role_id">
                                                        <option value="1" @if($item->role_id == 1) selected @endif disabled>
                                                            User
                                                        </option>
                                                        <option value="2" @if($item->role_id == 2) selected @endif disabled>
                                                           Admin
                                                        </option>
                                                    </select>  
                                                </td>
                                                <td>
                                                    <a class="text-heading font-semibold" href="#">
                                                        {{ $item->username }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <select name="status">
                                                        <option value="1" @if($item->status_id == 1) selected @endif disabled>
                                                            Enable
                                                        </option>
                                                        <option value="2" @if($item->status_id == 2) selected @endif disabled>
                                                            Disable
                                                        </option>
                                                    </select>  
                                                </td>                                                
                                                
                                                <td>
                                                    <a class="text-heading font-semibold" href="#">
                                                        {{ $item->gender }}
                                                    </a>
                                                </td>
                                                {{-- <td>
                                                {{-- <td>
                                                    {{ $item->phone_number }}
                                                </td> --}}
                                                <td>
                                                    {{ $item->email }}
                                                </td>
                                                {{-- <td>
                                        1
                                    </td> --}}
                                                <td class="text-end">
                                                    <a href="{{route('edit_user',['id'=>$item->id])}}" class="btn btn-sm btn-neutral">Edit</a>
                                                    <a onclick="return confirm('Bạn có chắc muốn xóa')" href="{{ route('delete_user', ['id' => $item->id]) }}">
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
