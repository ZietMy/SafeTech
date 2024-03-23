<header class="header">
    <div class="container">
        <div class="header__inner">
            <!-- Logo -->
            <img src="{{asset('assets\clients\images\logo.png')}}" alt="SafeTech" class="logo" style="width:56px"/>

            <!-- Navbar -->
            <nav class="navbar">
                <ul class="navbar__list">
                    <li class="navbar__item">
                        <a href="/" class="navbar__link">Home</a>
                    </li>
                    <li class="navbar__item">
                        <a href="Products" class="navbar__link">Products</a>
                    </li>
                    <li class="navbar__item">
                        <a href="{{route('client.contact')}}"  class="navbar__link">Contact</a>
                    </li>
                </ul>
            </nav>

            <!-- Header action -->
            <div class="header-action">
                <div class="search-bar">
                    <input type="search" value="" class="search-bar__input"placeholder="Search products">
                    <span><i class="fas fa-search search-bar__icon"></i></span>
                </div>
                @if (Route::has('login'))
                    @auth
                    <a href="#!" class="ms-2">
                        <span class="position-relative">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2.87187 11.5983C1.79887 8.24832 3.05287 4.41932 6.56987 3.28632C8.41987 2.68932 10.4619 3.04132 11.9999 4.19832C13.4549 3.07332 15.5719 2.69332 17.4199 3.28632C20.9369 4.41932 22.1989 8.24832 21.1269 11.5983C19.4569 16.9083 11.9999 20.9983 11.9999 20.9983C11.9999 20.9983 4.59787 16.9703 2.87187 11.5983Z"
                            stroke="#1A162E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M16 6.69922C17.07 7.04522 17.826 8.00022 17.917 9.12122" stroke="#1A162E"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        </span>
                    </a>
                    <a href="#!" class="ms-2">
                        <span class="position-relative">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.75 3.25L4.83 3.61L5.793 15.083C5.87 16.02 6.653 16.739 7.593 16.736H18.502C19.399 16.738 20.16 16.078 20.287 15.19L21.236 8.632C21.342 7.899 20.833 7.219 20.101 7.113C20.037 7.104 5.164 7.099 5.164 7.099"
                                    stroke="#1A162E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M14.125 10.7949H16.898" stroke="#1A162E" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.15338 20.2031C7.45438 20.2031 7.69738 20.4471 7.69738 20.7471C7.69738 21.0481 7.45438 21.2921 7.15338 21.2921C6.85238 21.2921 6.60938 21.0481 6.60938 20.7471C6.60938 20.4471 6.85238 20.2031 7.15338 20.2031Z"
                                    fill="#1A162E" stroke="#1A162E" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18.4346 20.2031C18.7356 20.2031 18.9796 20.4471 18.9796 20.7471C18.9796 21.0481 18.7356 21.2921 18.4346 21.2921C18.1336 21.2921 17.8906 21.0481 17.8906 20.7471C17.8906 20.4471 18.1336 20.2031 18.4346 20.2031Z"
                                    fill="#1A162E" stroke="#1A162E" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px">
                            9
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </span>
                    </a>
                    <div class="btn-group ms-2">
                        <img src="{{asset('assets\clients\images\logo.png')}}" alt="" class="dropdown-toggle "  data-bs-toggle="dropdown" aria-expanded="false" style="width:60px; height:60px">
                        
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Setting</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">Logout</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="header-action__link">Sign in</a>
                        @endif
                        <a href="{{ route('login') }}" class="btn-btn header-action__btn">Sign up</a>
                    @endauth
                @endif  
                
                
            </div>
            
        </div>
    </div>
</header>