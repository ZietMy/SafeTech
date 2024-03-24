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

<form class="form-horizontal" method="POST" action="{{route('postEdit')}}" >
    @csrf

    

    <div class="mb-3 row">
        <label for="name" class="col-sm-3 col-form-label">User Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="name" name="username"value="{{old('username')?? $userDetail->username}}">
            @error('username')
            <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label for="name" class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')?? $userDetail->name}}">
            @error('name')
            <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <input type="hidden" class="form-control" id="status" name="status_id"value="1">
    {{-- <div class="mb-3 row">
        <label for="name" class="col-sm-3 col-form-label">Role</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="role" name="role"value="{{old('role')?? $userDetail->name}}">
            @error('role')
            <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
    </div> --}}

    <div class="mb-3 row">
        <label for="role" class="col-sm-3 col-form-label">Role</label>
        <div class="col-sm-9">
            <select class="form-select" id="role" name="role">
                <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>User</option>
                <option value="2" {{ old('role') == '2' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role')
            <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label for="password" class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="password" name="password" value="{{old('password')?? $userDetail->password}}">
            @error('password')
            <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label for="address" class="col-sm-3 col-form-label">Address</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="address" name="address" value="{{old('address')?? $userDetail->address}}">
            @error('address')
            <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label for="gender" class="col-sm-3 col-form-label">Gender</label>
        <div class="col-sm-9">
            <select class="form-control" id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            @error('gender')
            <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')?? $userDetail->phone_number}}">
            @error('phone')
            <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label for="email" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
            <input type="email" class="form-control" id="email" name="email" value="{{old('email')?? $userDetail->email}}">
            @error('email')
            <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9 d-flex justify-content-between">
            <a href="{{ route('user') }}" class="btn btn-secondary">Quay lại</a>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
    </div>
</form>
@endsection
