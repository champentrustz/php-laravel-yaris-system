<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    {{--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
    {{--<meta name="description" content="Responsive admin dashboard and web application ui kit. A bar container to put most important action of your app inside the topbar, so they would be more accessable.">--}}
    {{--<meta name="keywords" content="topbar, secondary, menu">--}}

    <title>YARIS ATIV CLUB</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/core.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">

    <!-- Favicons -->
</head>

<body>

<!-- Preloader -->
<div class="preloader">
    <div class="spinner-dots">
        <span class="dot1"></span>
        <span class="dot2"></span>
        <span class="dot3"></span>
    </div>
</div>



<!-- Topbar -->
<header class="topbar topbar-expand-xl topbar-secondary topbar-inverse">
    <div class="topbar-left">
        <span style="font-size: 20px;color: white">YARISATIV</span>

        <div class="topbar-divider d-none d-md-block"></div>

        <nav class="topbar-navigation">
            <ul class="menu">

                <li class="menu-item">
                    <a class="menu-link" href="../index.html">
                        <span class="icon fa fa-home"></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>


                <li class="menu-item">
                    <a class="menu-link" href="#">
                        <span class="icon ti-layout"></span>
                        <span class="title">Menu level</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="menu-submenu">
                        <li class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="title">Blank page</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="title">Topbar</span>
                                <span class="arrow"></span>
                            </a>

                            <ul class="menu-sub-submenu">
                                <li class="menu-item">
                                    <a class="menu-link" href="#">
                                        <span class="title">Default</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a class="menu-link" href="#">
                                        <span class="title">Secondary</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a class="menu-link" href="#">
                                        <span class="title">Horizontal menu</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="title">Sidebar</span>
                                <span class="badge badge-pill badge-cyan">6</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="menu-item">
                    <a class="menu-link" href="#">
                        <span class="icon fa fa-align-left"></span>
                        <span class="title">Content</span>
                        <span class="arrow"></span>
                    </a>

                    <ul class="menu-submenu">
                        <li class="menu-item">
                            <a class="menu-link" href="../content/typography.html">
                                <span class="dot"></span>
                                <span class="title">Typography</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class="menu-link" href="../content/colors.html">
                                <span class="dot"></span>
                                <span class="title">Colors</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class="menu-link" href="../content/icons.html">
                                <span class="dot"></span>
                                <span class="title">Icons</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class="menu-link" href="../content/images.html">
                                <span class="dot"></span>
                                <span class="title">Images</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class="menu-link" href="../content/tables.html">
                                <span class="dot"></span>
                                <span class="title">Tables</span>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>

    </div>

    <div class="topbar-right">

        <div>
            <a class="btn btn-primary" href="{{'./login'}}">เข้าสู่ระบบ</a>
            <a class="btn  btn-outline btn-primary" href="{{'./register'}}">สมัครสมาชิก</a>
        </div>


    </div>
</header>
<!-- END Topbar -->


<!-- Main container -->
<main class="main-container">



    <div class="row no-margin h-fullscreen" style="padding-top: 10%">

        <div class="col-12">
            <div class="card card-transparent center-h text-center">
                <h1 class="text-secondary lh-1" style="font-size: 200px"><i class="fa fa-gear"></i></h1>
                <hr class="w-30px">
                <h3 class="text-uppercase">Under maintenance!</h3>

                <p class="lead">We're sorry for the inconvenience.<br>Please check back later.</p>
            </div>
        </div>


        <footer class="col-12 align-self-end text-center fs-13">
            <p>Copyright © 2017 <a href="http://thetheme.io/theadmin">TheAdmin</a>. All rights reserved.</p>
        </footer>
    </div>


    <!-- Footer -->
    {{--<footer class="site-footer">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-6">--}}
                {{--<p class="text-center text-md-left">Copyright © 2017 <a href="http://thetheme.io/theadmin">TheAdmin</a>. All rights reserved.</p>--}}
            {{--</div>--}}

            {{--<div class="col-md-6">--}}
                {{--<ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="../help/articles.html">Documentation</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="../help/faq.html">FAQ</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="https://themeforest.net/item/theadmin-responsive-bootstrap-4-admin-dashboard-webapp-template/20475359?license=regular&amp;open_purchase_for_item_id=20475359&amp;purchasable=source&amp;ref=thethemeio">Purchase Now</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</footer>--}}
    <!-- END Footer -->

</main>
<!-- END Main container -->






<!-- END Quickviews -->
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->


<!-- Scripts -->
<script src="{{ asset('js/core.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/script.min.js') }}"></script>

</body>
</html>
