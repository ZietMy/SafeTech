@extends('layouts.admin')
@section('content')
<div class="card-header">
    <h2 class="mt-0">Update</h2>
    <div class=" text-sm-end">
        <div class="mx-n1">
        </div>
    </div>
</div>
<div class="container">
    <form action="{{ route('update') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$contactDetails->id}}">
        <select name="status" class="form-select">
            <option value="1" @if($contactDetails->status_id == 1) selected @endif>Chưa liên hệ</option>
            <option value="2" @if($contactDetails->status_id == 2) selected @endif>Đã liên hệ</option>
        </select>
        <button class="btn btn-primary mt-3" type="submit">Update</button>
    </form>    
</div>
@endsection