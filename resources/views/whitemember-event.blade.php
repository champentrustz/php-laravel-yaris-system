
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

            <li class="menu-item active">
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

            <li class="menu-item">
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
                <span class="topbar-btn" data-toggle="dropdown" style="font-size: 15px"><img class="avatar" src="{{ asset('img/avatar/3.jpg') }}" alt="..."> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </span>
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



                @foreach($events as $key => $event)




                    <div class="col-md-4">
                        <div class="card ">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <br>

                                    <div  class="bg-img text-center py-160" style="background-image: url({{asset('storage/img/event/'.$event->id.'.png')}});">
                                        @if($queues[$key] == null )
                                            <div class="text-danger" style="font-size: 150px;">-</div>

                                        @else
                                            <div  class="text-danger"  style="font-size: 150px;">{{$queues[$key]->queue}}</div>

                                        @endif
                                    </div>
                                </div>



                                {{--<img src="{{asset('storage/img/event/'.$event->id.'.png')}}"></div>--}}
                                {{--<img class="avatar avatar-xxl avatar-bordered" src="../assets/img/avatar/1.jpg">--}}
                                <br>



                                <div class="fs-14"><span style="font-weight: bold;">ชื่อกิจกรรม : </span>{{$event->name}}</div>
                                <div class="fs-14"><span style="font-weight: bold;">สถานที่ : </span>{{$event->place}}</div>
                                <div class="fs-14"><span style="font-weight: bold;">วันที่ : </span>{{date('d F Y', strtotime($event->date))  }} </div>
                                <div class="fs-14"><span style="font-weight: bold;">ลำดับคิว : </span>
                                    @if($queues[$key] == null )
                                        ไม่ได้เข้าร่วมกิจกรรม
                                    @else
                                        {{$queues[$key]->queue}}
                                    @endif

                                </div>
                                <div class="row">&nbsp;</div>

                            </div>

                        </div>
                    </div>



                @endforeach


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
<script src="{{ asset('js/qrcode.min.js') }}"></script>

<script>



</script>



</body>
</html>

