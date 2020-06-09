{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->firstname }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html> --}}
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="widget">
                    <div class="foot-logo">
                        <div class="logo">
                            <a href="index-2.html" title=""><img src="images/logo.png" alt=""></a>
                        </div>
                        <p>
                            The trio took this simple idea and built it into the world’s leading carpooling platform.
                        </p>
                    </div>
                    <ul class="location">
                        <li>
                            <i class="ti-map-alt"></i>
                            <p>33 new montgomery st.750 san francisco, CA USA 94105.</p>
                        </li>
                        <li>
                            <i class="ti-mobile"></i>
                            <p>+1-56-346 345</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <div class="widget">
                    <div class="widget-title">
                        <h4>follow</h4>
                    </div>
                    <ul class="list-style">
                        <li><i class="fa fa-facebook-square"></i> <a href="https://web.facebook.com/shopcircut/"
                                title="">facebook</a></li>
                        <li><i class="fa fa-twitter-square"></i><a href="https://twitter.com/login?lang=en"
                                title="">twitter</a></li>
                        <li><i class="fa fa-instagram"></i><a href="https://www.instagram.com/?hl=en"
                                title="">instagram</a></li>
                        <li><i class="fa fa-google-plus-square"></i> <a href="https://plus.google.com/discover"
                                title="">Google+</a></li>
                        <li><i class="fa fa-pinterest-square"></i> <a href="https://www.pinterest.com/"
                                title="">Pintrest</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <div class="widget">
                    <div class="widget-title">
                        <h4>Navigate</h4>
                    </div>
                    <ul class="list-style">
                        <li><a href="about.html" title="">about us</a></li>
                        <li><a href="contact.html" title="">contact us</a></li>
                        <li><a href="terms.html" title="">terms & Conditions</a></li>
                        <li><a href="#" title="">RSS syndication</a></li>
                        <li><a href="sitemap.html" title="">Sitemap</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <div class="widget">
                    <div class="widget-title">
                        <h4>useful links</h4>
                    </div>
                    <ul class="list-style">
                        <li><a href="#" title="">leasing</a></li>
                        <li><a href="#" title="">submit route</a></li>
                        <li><a href="#" title="">how does it work?</a></li>
                        <li><a href="#" title="">agent listings</a></li>
                        <li><a href="#" title="">view All</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <div class="widget">
                    <div class="widget-title">
                        <h4>download apps</h4>
                    </div>
                    <ul class="colla-apps">
                        <li><a href="https://play.google.com/store?hl=en" title=""><i
                                    class="fa fa-android"></i>android</a></li>
                        <li><a href="https://www.apple.com/lae/ios/app-store/" title=""><i
                                    class="ti-apple"></i>iPhone</a></li>
                        <li><a href="https://www.microsoft.com/store/apps" title=""><i
                                    class="fa fa-windows"></i>Windows</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer><!-- footer -->
