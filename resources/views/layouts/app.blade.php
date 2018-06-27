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
    <link href="{{ asset('css/core.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">

</head>
<body>

<div class="preloader">
    <div class="spinner-dots">
        <span class="dot1"></span>
        <span class="dot2"></span>
        <span class="dot3"></span>
    </div>
</div>


<!-- Sidebar -->
<aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg">
    <header class="sidebar-header" style="background-color:#37404d ">
        <a class="logo-icon" href="./home"><img src="{{ asset('img/LOGO_MPesco.png') }}" alt="logo icon"></a>
        <span class="logo">
          <a href="./home"><h3 style="color: #f7fafc;">YARISATIV.</h3></a>
        </span>
        <span class="sidebar-toggle-fold"></span>
    </header>

    <nav class="sidebar-navigation">
        <ul class="menu">

            <li class="menu-category">MENU</li>

            <li class="menu-item active">
                <a class="menu-link" href="../dashboard/index.html">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>



        </ul>
    </nav>

</aside>
<!-- END Sidebar -->


<!-- Topbar -->
<header class="topbar">
    <div class="topbar-left">
        <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span>

        <a class="topbar-btn d-none d-md-block" href="#" data-provide="fullscreen tooltip" title="Fullscreen">
            <i class="material-icons fullscreen-default">fullscreen</i>
            <i class="material-icons fullscreen-active">fullscreen_exit</i>
        </a>



        <div class="topbar-divider d-none d-md-block"></div>

        {{--<div class="lookup d-none d-md-block topbar-search" id="theadmin-search">--}}
            {{--<input class="form-control w-300px" type="text">--}}
            {{--<div class="lookup-placeholder">--}}
                {{--<i class="ti-search"></i>--}}
                {{--<span data-provide="typing" data-type="<strong>Type</strong> Button|<strong>Type</strong> Slider|<strong>Type</strong> Layout|<strong>Type</strong> Modal|<strong>Try</strong> typing any keyword..." data-loop="false" data-type-speed="90" data-back-speed="50" data-show-cursor="false"></span>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>


    <div class="topbar-right">
        {{--<a class="topbar-btn" href="#qv-global" data-toggle="quickview"><i class="ti-align-right"></i></a>--}}

        {{--<div class="topbar-divider"></div>--}}


        <ul class="topbar-btns">
            <li class="dropdown">
                <span class="topbar-btn" data-toggle="dropdown" style="font-size: 15px"><img class="avatar" src="{{ asset('img/avatar/3.jpg') }}" alt="..."> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="page/profile.html"><i class="ti-user"></i> Profile</a>
                    <a class="dropdown-item" href="page-app/mailbox.html">
                        <div class="flexbox">
                            <i class="ti-email"></i>
                            <span class="flex-grow">Inbox</span>
                            <span class="badge badge-pill badge-info">5</span>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    {{--<a class="dropdown-item" href="page-extra/user-lock-1.html"><i class="ti-lock"></i> Lock</a>--}}
                    <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="ti-power-off"></i> ออกจากระบบ</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    </form>
                </div>
            </li>

            <!-- Notifications -->
            {{--<li class="dropdown d-none d-md-block">--}}
                {{--<span class="topbar-btn has-new" data-toggle="dropdown"><i class="ti-bell"></i></span>--}}
                {{--<div class="dropdown-menu dropdown-menu-right">--}}

                    {{--<div class="media-list media-list-hover media-list-divided media-list-xs">--}}
                        {{--<a class="media media-new" href="#">--}}
                            {{--<span class="avatar bg-success"><i class="ti-user"></i></span>--}}
                            {{--<div class="media-body">--}}
                                {{--<p>New user registered</p>--}}
                                {{--<time datetime="2017-07-14 20:00">Just now</time>--}}
                            {{--</div>--}}
                        {{--</a>--}}

                        {{--<a class="media" href="#">--}}
                            {{--<span class="avatar bg-info"><i class="ti-shopping-cart"></i></span>--}}
                            {{--<div class="media-body">--}}
                                {{--<p>New order received</p>--}}
                                {{--<time datetime="2017-07-14 20:00">2 min ago</time>--}}
                            {{--</div>--}}
                        {{--</a>--}}

                        {{--<a class="media" href="#">--}}
                            {{--<span class="avatar bg-warning"><i class="ti-face-sad"></i></span>--}}
                            {{--<div class="media-body">--}}
                                {{--<p>Refund request from <b>Ashlyn Culotta</b></p>--}}
                                {{--<time datetime="2017-07-14 20:00">24 min ago</time>--}}
                            {{--</div>--}}
                        {{--</a>--}}

                        {{--<a class="media" href="#">--}}
                            {{--<span class="avatar bg-primary"><i class="ti-money"></i></span>--}}
                            {{--<div class="media-body">--}}
                                {{--<p>New payment has made through PayPal</p>--}}
                                {{--<time datetime="2017-07-14 20:00">53 min ago</time>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}

                    {{--<div class="dropdown-footer">--}}
                        {{--<div class="left">--}}
                            {{--<a href="#">Read all notifications</a>--}}
                        {{--</div>--}}

                        {{--<div class="right">--}}
                            {{--<a href="#" data-provide="tooltip" title="Mark all as read"><i class="fa fa-circle-o"></i></a>--}}
                            {{--<a href="#" data-provide="tooltip" title="Update"><i class="fa fa-repeat"></i></a>--}}
                            {{--<a href="#" data-provide="tooltip" title="Settings"><i class="fa fa-gear"></i></a>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</li>--}}
            <!-- END Notifications -->

            <!-- Messages -->
            {{--<li class="dropdown d-none d-md-block">--}}
                {{--<span class="topbar-btn" data-toggle="dropdown"><i class="ti-email"></i></span>--}}
                {{--<div class="dropdown-menu dropdown-menu-right">--}}

                    {{--<div class="media-list media-list-divided media-list-hover media-list-xs scrollable" style="height: 290px">--}}
                        {{--<a class="media media-new1" href="page-app/mailbox-single.html">--}}
                  {{--<span class="avatar status-success">--}}
                    {{--<img src="../assets/img/avatar/1.jpg" alt="...">--}}
                  {{--</span>--}}

                            {{--<div class="media-body">--}}
                                {{--<p><strong>Maryam Amiri</strong> <time class="float-right" datetime="2017-07-14 20:00">23 min ago</time></p>--}}
                                {{--<p class="text-truncate">Authoritatively exploit resource maximizing technologies before technically.</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}

                        {{--<a class="media media-new1" href="page-app/mailbox-single.html">--}}
                  {{--<span class="avatar status-warning">--}}
                    {{--<img src="../assets/img/avatar/2.jpg" alt="...">--}}
                  {{--</span>--}}

                            {{--<div class="media-body">--}}
                                {{--<p><strong>Hossein Shams</strong> <time class="float-right" datetime="2017-07-14 20:00">48 min ago</time></p>--}}
                                {{--<p class="text-truncate">Continually plagiarize efficient interfaces after bricks-and-clicks niches.</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}

                        {{--<a class="media" href="page-app/mailbox-single.html">--}}
                  {{--<span class="avatar status-dark">--}}
                    {{--<img src="../assets/img/avatar/3.jpg" alt="...">--}}
                  {{--</span>--}}

                            {{--<div class="media-body">--}}
                                {{--<p><strong>Helen Bennett</strong> <time class="float-right" datetime="2017-07-14 20:00">3 hours ago</time></p>--}}
                                {{--<p class="text-truncate">Objectively underwhelm cross-unit web-readiness before sticky outsourcing.</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}

                        {{--<a class="media" href="page-app/mailbox-single.html">--}}
                            {{--<span class="avatar status-success bg-purple">FT</span>--}}

                            {{--<div class="media-body">--}}
                                {{--<p><strong>Fidel Tonn</strong> <time class="float-right" datetime="2017-07-14 20:00">21 hours ago</time></p>--}}
                                {{--<p class="text-truncate">Interactively innovate transparent relationships with holistic infrastructures.</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}

                        {{--<a class="media" href="page-app/mailbox-single.html">--}}
                  {{--<span class="avatar status-danger">--}}
                    {{--<img src="../assets/img/avatar/4.jpg" alt="...">--}}
                  {{--</span>--}}

                            {{--<div class="media-body">--}}
                                {{--<p><strong>Freddie Arends</strong> <time class="float-right" datetime="2017-07-14 20:00">Yesterday</time></p>--}}
                                {{--<p class="text-truncate">Collaboratively visualize corporate initiatives for web-enabled value.</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}

                        {{--<a class="media" href="page-app/mailbox-single.html">--}}
                  {{--<span class="avatar status-success">--}}
                    {{--<img src="../assets/img/avatar/5.jpg" alt="...">--}}
                  {{--</span>--}}

                            {{--<div class="media-body">--}}
                                {{--<p><strong>Freddie Arends</strong> <time class="float-right" datetime="2017-07-14 20:00">Yesterday</time></p>--}}
                                {{--<p class="text-truncate">Interactively reinvent standards compliant supply chains through next-generation bandwidth.</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}

                    {{--<div class="dropdown-footer">--}}
                        {{--<div class="left">--}}
                            {{--<a href="#">Read all messages</a>--}}
                        {{--</div>--}}

                        {{--<div class="right">--}}
                            {{--<a href="#" data-provide="tooltip" title="Mark all as read"><i class="fa fa-circle-o"></i></a>--}}
                            {{--<a href="#" data-provide="tooltip" title="Settings"><i class="fa fa-gear"></i></a>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</li>--}}
            <!-- END Messages -->

        </ul>

    </div>
</header>
<!-- END Topbar -->


<!-- Main container -->
<main class="main-container">

    <div class="main-content">
        <div class="row">


            @yield('content')


        </div>
        </div>
    </div><!--/.main-content -->


    <!-- Footer -->
    <footer class="site-footer">
        <div class="row">
            <div class="col-md-6">
                <p class="text-center text-md-left">Copyright © 2017 <a href="http://thetheme.io/theadmin">TheAdmin</a>. All rights reserved.</p>
            </div>

            {{--<div class="col-md-6">--}}
                {{--<ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="../help/articles.html">Documentation</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="../help/faq.html">FAQ</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="https://themeforest.net/item/theadmin-responsive-bootstrap-4-admin-dashboard-webapp-template/20475359?license=regular&open_purchase_for_item_id=20475359&purchasable=source&ref=thethemeio">Purchase Now</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        </div>
    </footer>
    <!-- END Footer -->

</main>
<!-- END Main container -->



<!-- Global quickview -->
<div id="qv-global" class="quickview" data-url="../assets/data/quickview-global.html">
    <div class="spinner-linear">
        <div class="line"></div>
    </div>
</div>
<!-- END Global quickview -->



<!-- Scripts -->
<script src="{{ asset('js/core.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/script.min.js') }}"></script>

    {{--<div id="app">--}}
        {{--<nav class="navbar navbar-default navbar-static-top">--}}
            {{--<div class="container">--}}
                {{--<div class="navbar-header">--}}

                    {{--<!-- Collapsed Hamburger -->--}}
                    {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">--}}
                        {{--<span class="sr-only">Toggle Navigation</span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                    {{--</button>--}}

                    {{--<!-- Branding Image -->--}}
                    {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                        {{--{{ config('app.name', 'Laravel') }}--}}
                    {{--</a>--}}
                {{--</div>--}}

                {{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
                    {{--<!-- Left Side Of Navbar -->--}}
                    {{--<ul class="nav navbar-nav">--}}
                        {{--&nbsp;--}}
                    {{--</ul>--}}

                    {{--<!-- Right Side Of Navbar -->--}}
                    {{--<ul class="nav navbar-nav navbar-right">--}}
                        {{--<!-- Authentication Links -->--}}
                        {{--@guest--}}
                            {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
                            {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
                        {{--@else--}}
                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">--}}
                                    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                                {{--</a>--}}

                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ route('logout') }}"--}}
                                            {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                            {{--Logout--}}
                                        {{--</a>--}}

                                        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                            {{--{{ csrf_field() }}--}}
                                        {{--</form>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--@endguest--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</nav>--}}




    <!-- Scripts -->

</body>
</html>
