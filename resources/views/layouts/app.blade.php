<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Skew Soft">
    <link rel="icon" href="/img/favicon.ico">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ladium') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- Begin Nav
================================================== -->
        <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top mediumnavigation">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container">
                <!-- Begin Logo -->
                <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{ asset('img/logo.png') }}" alt="logo">
                </a>
                <!-- End Logo -->
                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <!-- Begin Menu -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                        <a class="nav-link" href="index.html">Stories <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="post.html">Post</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="author.html">Author</a>
                        </li>
                    </ul>
                    <!-- End Menu -->
                    <!-- Begin Search -->
                    <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search">
                            <span class="search-icon"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M20.067 18.933l-4.157-4.157a6 6 0 1 0-.884.884l4.157 4.157a.624.624 0 1 0 .884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z"></path></svg></span>
                        </form>
                        <!-- End Search -->
                    {{-- Start right menu --}}
                    <ul class="ml-auto navbar-nav">
                        @if(Auth::user())
                            <li class="nav-item dropdown">
                              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                <img class="rounded-circle u-box-shadow-sm mr-2" width="35" height="35" src="https://htmlstream.com/preview/stream-ui-kit/assets/img-temp/ava/img3.jpg" alt="Htmlstream"> John Doe <i class="fa fa-angle-down small ml-1"></i>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Account Settings</a>
                                <a class="dropdown-item" href="#">Newsletter</a>
                                <div class="dropdown-divider"></div>
                                <form method="post" action="{{ url('/logout') }}">
                                    @csrf
                                    <input type="submit" class="dropdown-item" value="Sign Out">
                                </form>
                              </div>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                    <img class="rounded-circle u-box-shadow-sm mr-2" width="35" height="35" src="https://htmlstream.com/preview/stream-ui-kit/assets/img-temp/ava/img3.jpg" alt="Htmlstream"> Sign in <i class="fa fa-password small ml-1"></i>
                                    </a>
                                    <div class="dropdown-menu hide" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#"><i class="fa fa-google"></i> Google Account</a>
                                    <a class="dropdown-item" href="{{ url('/login/facebook') }}"><i class="fa fa-facebook-square"></i> Facebook Account</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-twitter"></i> Twitter Account</a>
                                    <div class="dropdown-divider"></div>
                                    <!-- Load Login Vue Modal -->
                                    <login-component></login-component>
                                    </div>
                                </li>
                        @endif
                    </ul>
                          {{-- end right menu --}}
                </div>
            </div>
            </nav>
            <!-- End Nav
            ================================================== -->
        {{-- yielding main content --}}
        <div class="container">
            @yield('content')

            <!-- Begin Footer
            ================================================== -->
            <div class="footer">
                <p class="pull-left">
                    Copyright &copy; 2019 Ladium
                </p>
                <p class="pull-right">
                    A product by <a target="_blank" href="https://www.skewsoft.com">Skew Soft</a>
                </p>
                <div class="clearfix">
                </div>
            </div>
            <!-- End Footer
            ================================================== -->
        </div>
    
    </div> <!-- end app div for vue -->

    <!-- Begin Modals -->
        
    <!-- End Modals -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Global Footer Sript -->
    <script> @yield('footer-script') </script>
</body>
</html>
