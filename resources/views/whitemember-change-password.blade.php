
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
<aside class="sidebar sidebar-expand-lg sidebar-lg sidebar-iconic sidebar-dark sidebar-color-danger">
    <header class="sidebar-header" style="background-color:white">

         <span class="logo text-center">
          <img src="{{ asset('img/yarisativ-logo.jpg') }}" style="width: 120px;height: 60px" alt="logo">
        </span>

    </header>

    <nav class="sidebar-navigation">
        <ul class="menu">



            <li class="menu-item ">
                <a class="menu-link" href="{{'../member/product'}}">
                    <span class="icon fa fa-cube"></span>
                    <span class="title">หน้าหลัก</span>
                </a>
            </li>

            <li class="menu-item ">
                <a class="menu-link" href="{{'../member/order'}}">
                    <span class="icon fa fa-file-text-o"></span>
                    <span class="title">รายการสั่งสินค้า</span>
                </a>
            </li>

            <li class="menu-item ">
                <a class="menu-link" href="{{'../member/event'}}">
                    <span class="icon fa fa-calendar-check-o"></span>
                    <span class="title">กิจกรรมมิตติ้ง</span>
                </a>
            </li>



            <li class="menu-item">
                <a class="menu-link" href="{{'../member/profile'}}">
                    <span class="icon ti-user"></span>
                    <span class="title">ข้อมูลส่วนตัว</span>
                </a>
            </li>

            <li class="menu-item active">
                <a class="menu-link" href="{{'../member/change-password'}}">
                    <span class="icon fa fa-lock"></span>
                    <span class="title">เปลี่ยนรหัสผ่าน</span>
                </a>
            </li>



        </ul>
    </nav>

</aside>
<!-- END Sidebar -->


<!-- Topbar -->
<header class="topbar topbar-inverse">
    <div class="topbar-left">
        <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span>

        <a class="topbar-btn d-none d-md-block" href="#" data-provide="fullscreen tooltip" title="Fullscreen">
            <i class="material-icons fullscreen-default">fullscreen</i>
            <i class="material-icons fullscreen-active">fullscreen_exit</i>
        </a>



        <div class="topbar-divider d-none d-md-block"></div>


    </div>


    <div class="topbar-right">



        <ul class="topbar-btns">
            <li class="dropdown">
                <span class="topbar-btn" data-toggle="dropdown" style="font-size: 15px"><img class="avatar" src="{{ asset('img/avatar/3.jpg') }}" alt="..."> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                <div class="dropdown-menu dropdown-menu-right">

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="ti-power-off"></i> ออกจากระบบ</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>



        </ul>

    </div>
</header>
<!-- END Topbar -->


<!-- Main container -->
<main class="main-container">

    <div class="main-content">


        <div class="container">

                <div class="row">

                    @if ($errors->has('success'))
                        <div class="col-md-6 offset-md-3">
                            <div class="callout callout-success" role="alert">
                                <h5>Change Password Done!</h5>
                                <p class="text-info">{{ $errors->first('success') }}</p>
                            </div>
                        </div>

                    @endif




                    <div class="col-md-6 offset-md-3">
                            <div class="card ">

                                <h4 class="card-title"><span class="fa fa-lock"></span> เปลี่ยนรหัสผ่าน</h4>

                                <div class="col-md-12">

                                    <div class="card-body">

                                        <form class="form-type-material" method="POST" action="{{ url('/member/change-password/change-pass') }}">

                                            {{ csrf_field() }}

                                        <div class="form-group">
                                            <input type="password" class="form-control" id="old-password" name="old_password" required>
                                            @if ($errors->has('old_error'))
                                                <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('old_error') }}</strong>
                                            </span>
                                            @endif
                                            <label for="old-password" style="font-weight: bold;">รหัสผ่านเก่า<span class="text-danger">*</span></label>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <input type="password" class="form-control" id="password" name="password" required>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif

                                            @if ($errors->has('new_error'))
                                                <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('new_error') }}</strong>
                                            </span>
                                            @endif
                                            <label for="password-conf" style="font-weight: bold;">รหัสผ่านใหม่ (อย่างน้อย 6 ตัว)<span class="text-danger">*</span></label>
                                        </div>


                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
                                            <label for="password-confirm" style="font-weight: bold;">รหัสผ่านใหม่ (ยืนยัน)<span class="text-danger">*</span></label>
                                        </div>

                                                <br>
                                                <button type="submit" class="btn btn-block btn-primary" >ยืนยัน</button>


                                        </form>


                                    </div>

                                </div>

                            </div>
                    </div>

                </div>


            </div>

            </div>

<!--/.main-content -->

<!-- Footer -->
    <footer class="site-footer">

        <p class="text-right ">Copyright 2018, OM FOR YOU Co., Ltd. All rights reserved.</p>

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

<script>


</script>



</body>
</html>

