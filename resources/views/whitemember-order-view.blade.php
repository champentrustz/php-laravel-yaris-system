
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
                <a class="menu-link" href="{{'../product'}}">
                    <span class="icon fa fa-cube"></span>
                    <span class="title">หน้าหลัก</span>
                </a>
            </li>

            <li class="menu-item active">
                <a class="menu-link" href="{{'../order'}}">
                    <span class="icon fa fa-file-text-o"></span>
                    <span class="title">รายการสั่งสินค้า</span>
                </a>
            </li>

            <li class="menu-item ">
                <a class="menu-link" href="{{'../event'}}">
                    <span class="icon fa fa-calendar-check-o"></span>
                    <span class="title">กิจกรรมมิตติ้ง</span>
                </a>
            </li>


            <li class="menu-item">
                <a class="menu-link" href="{{'../profile'}}">
                    <span class="icon ti-user"></span>
                    <span class="title">ข้อมูลส่วนตัว</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{'../change-password'}}">
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




                    <div class="col-md-6">
                            <div class="card ">

                                <h4 class="card-title"><span class="fa fa-cube"></span> รายละเอียดการสั่งซื้อ</h4>

                                <div class="col-md-12">

                                    <div class="card-body">

                                        <table class="table table-hover">

                                            <tbody>


                                            <tr>
                                                <td>
                                                    <b style="font-weight: bold;">ชื่อสินค้า</b>
                                                </td>
                                                <td>
                                                    {{ Session::get('orderDetail')->product->name}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b style="font-weight: bold;">จำนวน</b>
                                                </td>
                                                <td>
                                                    {{ Session::get('orderDetail')->number}} ชิ้น
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b style="font-weight: bold;">ราคารวม</b>
                                                </td>
                                                <td>
                                                    {{Session::get('orderDetail')->product->member_price * Session::get('orderDetail')->number}} บาท
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b style="font-weight: bold;">สถานะ</b>
                                                </td>
                                                @if(Session::get('orderDetail')->status == "WAITING_PAYMENT")
                                                    <td class="text-danger">รอการชำระเงิน</td>
                                                @elseif(Session::get('orderDetail')->status == "WAITING_CONFIRM")
                                                    <td class="text-warning">รอการตรวจสอบการชำระเงิน</td>
                                                @elseif(Session::get('orderDetail')->status == "CONFIRM" && Session::get('orderDetail')->product_id != 3)
                                                    <td class="text-warning">ตรวจสอบแล้ว รอการจัดส่ง</td>
                                                @elseif(Session::get('orderDetail')->status == "CONFIRM" && Session::get('orderDetail')->product_id == 3)
                                                    <td class="text-warning">ตรวจสอบแล้ว รอสั่งสติ๊กเกอร์</td>
                                                @elseif(Session::get('orderDetail')->status == "WAITING_PRODUCTION")
                                                    <td class="text-warning">รอการผลิต</td>
                                                @elseif(Session::get('orderDetail')->status == "FINISHED_PRODUCTION")
                                                    <td class="text-warning">เสร็จสิ้นการผลิต รอการจัดส่ง</td>
                                                @elseif(Session::get('orderDetail')->status == "SUCCESS")
                                                    <td class="text-success">จัดส่งแล้ว</td>
                                                    @endif
                                            </tr>

                                            <tr>
                                                <td>
                                                    <b style="font-weight: bold;">เวลาที่ชำระเงิน</b>
                                                </td>
                                                @if(Session::get('orderDetail')->payment_date == null )
                                                    <td>-</td>
                                                @else
                                                    <td>{{Session::get('orderDetail')->payment_date}}</td>
                                                @endif
                                            </tr>


                                            </tbody>

                                        </table>


                                    </div>

                                </div>

                            </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card ">

                            <h4 class="card-title"><span class="fa fa-home"></span> ที่อยู่ในการจัดส่ง</h4>

                            <div class="col-md-12">

                                <div class="card-body">

                                    <table class="table table-hover">

                                        <tbody>
                                        <tr>
                                            <td>
                                                <b style="font-weight: bold;">บ้านเลขที่</b>
                                            </td>
                                            <td>
                                                {{Session::get('orderDetail')->tempAddress->house_number}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b style="font-weight: bold;">หมู่ที่</b>
                                            </td>
                                            <td>
                                                {{Session::get('orderDetail')->tempAddress->village_number}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b style="font-weight: bold;">ตรอก/ซอบ</b>
                                            </td>
                                            <td>
                                                {{Session::get('orderDetail')->tempAddress->alley}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b style="font-weight: bold;">ถนน</b>
                                            </td>
                                                <td>{{Session::get('orderDetail')->tempAddress->road}}</td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <b style="font-weight: bold;">แขวง/ตำบล</b>
                                            </td>
                                                <td>{{Session::get('orderDetail')->tempAddress->sub_district}}</td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <b style="font-weight: bold;">เขต/อำเภอ</b>
                                            </td>
                                            <td>
                                                {{Session::get('orderDetail')->tempAddress->district}}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <b style="font-weight: bold;">จังหวัด</b>
                                            </td>
                                            <td>
                                                {{Session::get('orderDetail')->tempAddress->province}}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <b style="font-weight: bold;">ประเทศ</b>
                                            </td>
                                            <td>
                                                {{Session::get('orderDetail')->tempAddress->country}}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <b style="font-weight: bold;">รหัสไปรษณีย์</b>
                                            </td>
                                            <td>
                                                {{Session::get('orderDetail')->tempAddress->postal_code}}
                                            </td>
                                        </tr>


                                        </tbody>

                                    </table>

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

