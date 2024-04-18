@extends('layouts.admin')
@section('content')
<div class="card shadow border-0 mb-7">
    <div class="card-header">
        <h2 class="mt-0">Contact</h2>
        <div class=" text-sm-end">
            <div class="mx-n1">
            </div>
        </div>
    </div>
    @if(session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-hover table-nowrap">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Message</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contactAd as $key => $item)
                <tr>
                    <td>
                        {{$item->name}}
                    </td>
                    <td>
                        {{$item->email}}
                    </td>
                    <td>
                        {{$item->phone}}
                    </td>
                    <td>
                        {{$item->message}}
                    </td>
                    <td>
                        <select name="status">
                            <option value="{{ $item->status_id }}" @if($item->status_id == $value) selected @endif>
                                @if($item->status_id == 1)
                                    Chưa liên hệ
                                @else
                                    Đã liên hệ
                                @endif
                            </option>
                        </select>  
                    </td>
                    <td class="text-end">
                        <a href="{{route('update-contact', ['id' => $item->id])}}" class="btn btn-sm btn-neutral">Edit</a>
                    </td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
</div>
@endsection