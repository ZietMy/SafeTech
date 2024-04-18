@extends('layouts.admin')

@section('header-sidebar')
@endsection

@section('content')
    @if (session()->has('msg'))
        <script>
            alert("{{ session()->get('msg') }}");
        </script>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">Vui lòng nhập lại</div>
    @endif

    <form class="form-horizontal" method="POST" action="">
        @csrf
        <div class="mb-3 row">
            <label for="status_id" class="col-sm-3 col-form-label">Status name</label>
            <div class="col-sm-9">
                <select class="form-select" id="status_id" name="status_id">
                    @foreach ($orderDetail as $order)
                        <option value="{{ $order->orderStatus->id }}" selected>{{ $order->orderStatus->status_name }}
                        </option>
                    @endforeach
                    @foreach ($statuses as $status)
                        @php
                            $alreadySelected = false;
                            foreach ($orderDetail as $order) {
                                if ($order->status_id == $status->id) {
                                    $alreadySelected = true;
                                    break;
                                }
                            }
                        @endphp
                        @if (!$alreadySelected)
                            <option value="{{ $status->id }}" {{ old('status_id') == $status->id ? 'selected' : '' }}>
                                {{ $status->status_name }}
                            </option>
                        @endif
                    @endforeach
                </select>
                @error('status_id')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-3"></div>
            <div class="col-sm-9 d-flex justify-content-between">
                <a href="{{ route('order') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
    </form>
@endsection
