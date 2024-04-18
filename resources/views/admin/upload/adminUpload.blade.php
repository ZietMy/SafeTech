@extends('layouts.admin')
@section('content')
<div class="card shadow border-0 mb-7">
    <div class="card-header">
        <h2 class="mt-0">Upload</h2>
        <div class=" text-sm-end">
            <a href="{{route('uploadImg')}}" class="btn">
                <button type="submit" class="btn btn-primary"><i class="bi bi-plus"></i>Create</button>
            </a>
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
                    <th scope="col">Img</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($img as $key => $item)
                <tr>
                    <td>
                        <img src="{{asset('storage/'.$item->img)}}" alt="ảnh" width="100px" height="100px">
                    </td>
                    <td class="text-end">
                        <a href="{{route('upload-edit', ['id' => $item->id])}}" class="btn btn-sm btn-neutral">Edit</a>
                        <button type="button"
                            class="btn btn-sm btn-square btn-neutral text-danger-hover">
                            <a href="{{route('delete-upload', ['id' => $item->id])}}" class="btn btn-sm btn-neutral"> <i class="bi bi-trash"></i></a>
                           
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection