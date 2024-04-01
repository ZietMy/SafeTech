@extends('layouts.admin')
@section('content')
    <form action="{{route('post-upload')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Upload</label>
            <input type="file" class="custom-file-input" id="inputGroupFile02" name="img">
        </div>
        <button class="btn btn-primary mt-3" type="submit">Create</button>
    </form>
@endsection