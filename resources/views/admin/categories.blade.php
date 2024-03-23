@extends('layouts.admin')
@section('content')
<div class="card shadow border-0 mb-7">
    <div class="card-header">
        <h2 class="mt-0">Category</h2>
        <div class=" text-sm-end">
            <div class="mx-n1">
                <a href="{{route('categories.create')}}" class="btn d-inline-flex btn-sm btn-primary mx-1">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-plus"></i>Create</button>
                </a>
            </div>
        </div>
    </div>
    @if(session('msg'))
            <div class="alert alert-success">
                Nhập dữ liệu thành công
            </div>
    @endif
    <div class="table-responsive">
        <table class="table table-hover table-nowrap">
            <thead class="thead-light">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listCategories as $key => $item)
                <tr>
                    <td>
                        {{$item->id}}
                    </td>
                    <td>
                        {{$item->name}}
                    </td>
                    <td class="text-end">
                        <a href="{{route('categories.edit', ['id' => $item->id])}}" class="btn btn-sm btn-neutral">Edit</a>
                        <button type="button"
                            class="btn btn-sm btn-square btn-neutral text-danger-hover">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
</div>
@endsection
