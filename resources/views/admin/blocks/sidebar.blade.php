<nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg"
id="navbarVertical">
<div class="container-fluid">
    <!-- Toggler -->
    <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand -->
    <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
        <img src="https://preview.webpixels.io/web/img/logos/clever-primary.svg" alt="...">
    </a>
    <!-- User menu (mobile) -->
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidebarCollapse">
        <!-- Navigation -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin')}}">
                    <i class="bi bi-house"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user')}}">
                    <i class="fa fa-user" aria-hidden="true"></i> Management User
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('products.index')}}">
                    <i class="fa fa-list-ul" aria-hidden="true"></i> Management Product
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('categories')}}">
                    <i class="fa fa-list-ul" aria-hidden="true"></i> Management Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('order')}}">
                    <i class="bi bi-people"></i> Management Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('contact-admin')}}">
                    <i class="bi bi-people"></i> Management Contacts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('upload')}}">
                    <i class="fa fa-list-ul" aria-hidden="true"></i> Management Upload 
                </a>
            </li>
        </ul>
        <!-- Divider -->
        <hr class="navbar-divider my-5 opacity-20">
        <!-- Navigation -->

        <!-- Push content down -->
        <div class="mt-auto"></div>
        <!-- User (md) -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-person-square"></i> Account
                </a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                    this.closest('form').submit();"> <i class="bi bi-box-arrow-left"></i>Logout</a>
                </form>
                
            </li>
        </ul>
    </div>
</div>
</nav>