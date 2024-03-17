<header class='py-2 border shadow'>
    <div class="container">
        <div class='row d-flex justify-content-between align-items-center'>
            <div class='col-2'>
                <a class="navbar-brand" href="home">
                    <img src="{{asset('assets/clients/images/logo.png')}}" alt="SafeTech"style="width:4rem;">
                </a>
            </div>
            <div class='col-6 d-flex justify-content-center align-items-center'>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    
                </ul>
            </div>

            <div class="col-2 d-flex justify-content-end align-items-center">
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="#!">
                            <i class="fas fa-cart-plus"></i>
                        </a>

                        {{-- <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a> --}}
                    @else
                        <a href="{{ route('login') }}">
                            <button type="button" class="btn btn-danger mx-1">Login</button>
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">
                                <button type="button" class="btn btn-light">Register</button>
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
                
               
            </div>
        </div>
    </div>

</header>