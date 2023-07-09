<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
      {{-- {{ config('app.name', 'Laravel') }} --}}
      Blog
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="position-relative">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                  LOGO
                </a> --}}
                <a class="navbar-brand" href="{{ url('/') }}">

                @if (Auth::user())
                <img
<<<<<<< HEAD
                alt="{{Auth::user()->image_path}}"
                class="rounded-circle"
              />
                @else
                  LOGO
                @endif

=======
                src="{{asset("images/".Auth::user()->image_path)}}"
                alt="{{Auth::user()->image_path}}"
                class="rounded-circle"
              />
                @endif
                LOGO
>>>>>>> df151d144e0d038026970a3e3706c69885aef356
              </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
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
                        <ul class="navbar-nav me-auto px-5">
                          <li class="nav-item">
                            <a class="nav-link text-primary" href="/">Blogs</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-primary" href="/post">{{ Auth::user()->name }} Posts</a>
                          </li>
                        </ul>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  Config
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/profile">Profile</a>
                                @if (Auth::user()->type === 'owner')
                                <a href="/admin" class="dropdown-item">Admin Dashboard</a>
                                <a
                                  href="/categories"
                                  class="dropdown-item">Category section</a>
                                @endif
                                <a class="dropdown-item" href="/"
                                      onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="py-4">
            @yield('content')
        </div>
    </div>
    @if (Auth::user())
    <div>
      @include('layouts.footer')
    </div>
    @endif
</body>
</html>
