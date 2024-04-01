@extends('layouts.admin')
@section('content')
<form action="{{ route('post-editUpload') }}" method="post" enctype="multipart/form-data">
    @csrf
    @foreach ($img as $item)
    <div>
        <label for="inputGroupFile02">Current Image</label>
        <img src="{{asset('storage/'.$item->img)}}" alt="Current Image" width="100px" height="100px">
    </div>
    @endforeach
    <div>
        <label for="inputGroupFile02">Upload New Image</label>
        <input type="file" class="custom-file-input" id="inputGroupFile02" name="img" accept="image/*" value="{{old('img') ?? $imgDetails->img}}" >
    </div>
    <button class="btn btn-primary mt-3" type="submit">Edit</button>
</form>
@endsection