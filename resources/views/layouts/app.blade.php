<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{--font awesome--}}
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
            @if (!Auth::guest())
                <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="">
                                <i class="fa fa-tachometer" aria-hidden="true"></i>
                                <span>Tổng quan</span>
                            </a>
                        </li>
                        {{--<li class="dropdown show-on-hover">--}}
                        {{--<a href="" class="dropdown-toggle" data-toggle="dropdown">--}}
                        {{--<i class="fa fa-list-alt"></i> <span> Quan</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                        {{--<li>--}}
                        {{--<a href=""><i class="fa fa-reply-all" aria-hidden="true"></i> Tất cả</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href=""><i class="fa fa-archive" aria-hidden="true"></i> Đóng hàng</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href=""><i class="fa fa-truck" aria-hidden="true"></i> Chuyển hàng</a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</li>--}}
                        @if(\App\User::find(Auth::id())->role == 1 || \App\User::find(Auth::id())->role == 2)
                            <li>
                                <a href="{{ url('admin/user') }}">
                                    <i class="fa fa-address-book-o" aria-hidden="true"></i>
                                    <span>Quản lý tài khoản</span>
                                </a>
                            </li>

                        @else
                        @endif
                        @if(\App\User::find(Auth::id())->role == 1 || \App\User::find(Auth::id())->role == 2 || \App\User::find(Auth::id())->role == 3)
                            <li>
                                <a href="">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>Đăng bài</span>
                                </a>
                            </li>
                        @else
                        @endif
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bar-chart-o"></i> <span>Thống kê </span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="">Truyện xem nhiều nhất</a>
                                </li>
                                <li>
                                    <a href="">Lượt online</a>
                                </li>
                                <li>
                                    <a href="">Xu hướng</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
            @else
            @endif

            <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                <i class="fa fa-user-o"></i>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->

{{--jquery--}}
<script src="{{ asset('jquery/jquery.min.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
