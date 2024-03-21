<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/layouts/style.css') }}">
    <style type="text/css">
        @yield('css');
    </style>
</head>
<body>
    @include('clients.blocks.header')
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <aside>
                        @section('sidebar')
                        @include('clients.blocks.sidebar')
                        @show
                    </aside>
                </div>
                <div class="col-10">
                    <div class="content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="content1">
                    @yield('content1')
                </div>
            </div>
        </div>
    </main>
    @include('clients.blocks.footer')
    <script src="{{ asset('assets/clients/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/custom.js') }}"></script>
</body>
</html>