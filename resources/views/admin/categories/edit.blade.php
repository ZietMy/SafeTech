@extends('layouts.admin')
@section('content')
    <form action="{{route('post-edit')}}" method="post">
        <label for="">
            Name
        </label>
        <input type="text" class="form-control" id="name" name="name" value="{{old('name') ?? $categoryDetail->name}}"><br>
        @error('name')  
            <span style="color: red;">{{$message}}</span>
        @enderror
        @csrf
        <button type="submit" class="btn btn-primary mt-5">Update</button>
        <a href="{{route('categories')}}" class='btn btn-danger mt-5'>Quay lại</a>
    </form>
@endsection