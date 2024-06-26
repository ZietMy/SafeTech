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

    <form class="form-horizontal" method="POST" action="{{ route('postEdit_user') }}">
        @csrf
        <div class="mb-3 row">
            <label for="name" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="name"
                    name="name"value="{{ old('name') ?? $userDetail->name }}">
                @error('name')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-3 col-form-label"> Status</label>
            <div class="col-sm-9">
                <select class="form-select" id="status_id" name="status_id">
                    @foreach ($status as $stat)
                        <option value="{{ $stat->id }}" {{$userDetail->status_id == $stat->id ?'selected':''}}>
                            {{ $stat->name }}
                        </option>
                        {{-- <option value="">
                            </option> --}}
                    @endforeach
                </select>
                @error('status_id')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <div class="mb-3 row">
            <label for="gender" class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-9">
                <select class="form-control" id="gender" name="gender">
                    <option disabled>Choose gender</option>
                    <option value="male" {{$userDetail->gender == 'male' ?'selected':''}} >Male</option>
                    <option value="female" {{$userDetail->gender == 'female' ?'selected':''}}>Female</option>
                </select>
                @error('gender')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div>



        <div class="mb-3 row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email') ?? $userDetail->email }}">
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
