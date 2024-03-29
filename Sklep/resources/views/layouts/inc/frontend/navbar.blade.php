<div class="autohide main-navbar navbar-expand-lg shadow-sm sticky-top">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <a href="{{ url('/') }}"><img src="/XD-kom.png" width="100%" height="100%"></a>
                </div>
                <div class="col-md-5 my-auto">
                    <form action="{{ url('search') }}" method="GET" role="search">
                        <div class="input-group">
                            <input type="search" name="search" value="{{ Request::get('search') }}"
                                placeholder="Search for product" class="form-control" />
                            <button class="btn bg-white" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 my-auto">
                    <ul class="nav justify-content-end">

                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe"></i>
                                {{ Config::get('languages')[App::getLocale()] }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
                                @endif
                            @endforeach
                            </div>
                        </li>

                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else

                        <li>
                            <a class="nav-link" href="{{ url('wishlist') }}"><i class="fa fa-heart"></i> {{ __('Wishlist') }} (
                                <livewire:frontend.wishlist-count />)
                            </a>
                        </li>

                        <li>
                            <a class="nav-link" href="{{ url('cart') }}"><i class="fa fa-shopping-cart"></i> {{ __('Your cart') }}</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->role_as == 1)
                                    <li><a class="dropdown-item" href="/admin/dashboard"><i class="fa fa-user"></i> {{ __('Dashboard') }}</a></li>
                                @endif
                                <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> {{ __('Profile') }}</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg gradient-custom">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/collections/pcs') }}">{{ __('Computers') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/collections/laptops') }}">{{ __('Laptops') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/collections/mobiles') }}">{{ __('Mobiles') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/collections/smartwatches') }}">{{ __('Smartwatches') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/collections/consoles') }}">{{ __('Consoles') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>