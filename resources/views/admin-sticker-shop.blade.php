
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

        <span class="logo">
          <img src="{{ asset('img/yarisativ-logo.jpg') }}" alt="logo">
        </span>

    </header>

    <nav class="sidebar-navigation">
        <ul class="menu">



            <li class="menu-item ">
                <a class="menu-link" href="{{'../admin/dashboard'}}">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>



            <li class="menu-item ">
                <a class="menu-link" href="{{'../admin/confirm-order'}}">
                    <span class="icon fa fa-cube"></span>
                    <span class="title">Confirm Order</span>
                </a>
            </li>

            <li class="menu-item ">
                <a class="menu-link" href="{{'../admin/confirm-sticker'}}">
                    <span class="icon fa fa-image"></span>
                    <span class="title">Confirm Sticker</span>
                </a>
            </li>

            <li class="menu-item active">
                <a class="menu-link" href="{{'../admin/manufacture-sticker'}}">
                    <span class="icon fa fa-industry"></span>
                    <span class="title">Sticker Shop</span>
                </a>
            </li>

            <li class="menu-item ">
                <a class="menu-link" href="{{'../admin/member'}}">
                    <span class="icon fa fa-user"></span>
                    <span class="title">Member</span>
                </a>
            </li>

            <li class="menu-item ">
                <a class="menu-link" href="{{'../admin/add-order'}}">
                    <span class="icon fa fa-shopping-cart"></span>
                    <span class="title">Add Order</span>
                </a>
            </li>

            <li class="menu-item ">
                <a class="menu-link" href="{{'../admin/add-product'}}">
                    <span class="icon fa fa-cubes"></span>
                    <span class="title">Add Product</span>
                </a>
            </li>

            <li class="menu-item ">
                <a class="menu-link" href="{{'../admin/add-order'}}">
                    <span class="icon fa fa-shopping-cart"></span>
                    <span class="title">Add Order</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="{{'../admin/except-number'}}">
                    <span class="icon fa fa-ban"></span>
                    <span class="title">Except Number</span>
                </a>
            </li>

            {{--<li class="menu-item">--}}
                {{--<a class="menu-link" href="{{'../member/profile'}}">--}}
                    {{--<span class="icon ti-user"></span>--}}
                    {{--<span class="title">ข้อมูลส่วนตัว</span>--}}
                {{--</a>--}}
            {{--</li>--}}


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




            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-title"><span class="fa fa-industry"></span> สติกเกอร์ที่ส่งไปผลิต</h4>

                    <div class="card-body">
                        <form class="form-type-material" method="POST" action="{{ url('/admin/manufacture-sticker/finished') }}">
                            {{ csrf_field() }}

                            <table class="table table-striped table-bordered table-responsive-lg" cellspacing="0" data-page-length='50' data-provide="datatables">
                                <thead>
                                <tr>
                                    <th class="text-center" style="font-weight: bold;">ที่</th>
                                    <th class="text-center" style="font-weight: bold;">หมายเลขสมาชิก</th>
                                    <th class="text-center" style="font-weight: bold;">จำนวน</th>
                                    <th class="text-center" style="font-weight: bold;">สถานะ</th>
                                    <th class="text-center" style="font-weight: bold;">วันที่</th>
                                    <th class="text-center" style="font-weight: bold;">เวลา</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($manufactureStickers as $key => $manufactureSticker)

                                    <tr>
                                        <input type="hidden" name="id_orders[]" value="{{$manufactureSticker->id}}">
                                        <td class="text-center">{{$key+1}}</td>
                                        <td class="text-center">{{$manufactureSticker->user->code}}</td>
                                        <td class="text-center">{{$manufactureSticker->number}} ชิ้น</td>
                                        <td class="text-warning text-center">รอการผลิต</td>
                                        <td class="text-center">{{substr($manufactureSticker->updated_at,0,10)}}</td>
                                        <td class="text-center">{{substr($manufactureSticker->updated_at,11,5)}}</td>


                                    </tr>


                                @endforeach



                                </tbody>

                            </table>
                            <br>
                            <div class="col-md-6 offset-md-3">
                            <button type="submit" class="btn btn-block btn-primary" >เสร็จสิ้นการผลิต</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-title"><span class="fa fa-clock-o"></span> สติกเกอร์ที่รอการจัดส่ง</h4>

                    <div class="card-body">



                        <table class="table table-striped table-bordered table-responsive-lg" cellspacing="0" data-page-length='50' data-provide="datatables">
                            <thead>
                            <tr>
                                <th class="text-center" style="font-weight: bold;">ที่</th>
                                <th class="text-center" style="font-weight: bold;">หมายเลขสมาชิก</th>
                                <th class="text-center" style="font-weight: bold;">จำนวน</th>
                                <th class="text-center" style="font-weight: bold;">สถานะ</th>
                                <th class="text-center" style="font-weight: bold;"><span class="fa fa-cog"></span></th>
                                <th class="text-center" style="font-weight: bold;"><span class="fa fa-cog"></span></th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($finishedStickers as $key => $finishedSticker)



                                <tr>
                                    <input type="hidden" name="id_orders[]" value="{{$finishedSticker->id}}">
                                    <td class="text-center">{{$key+1}}</td>
                                    <td class="text-center">{{$finishedSticker->user->code}}</td>
                                    <td class="text-center">{{$finishedSticker->number}} ชิ้น</td>
                                    <td class="text-warning text-center">เสร็จสิ้นการผลิต รอการจัดส่ง</td>
                                    <td class="text-center">

                                        <form action="{{ url('admin/confirm-sticker/view-order-session') }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="order_id" value="{{$finishedSticker->id}}">
                                            <button type="submit" class="btn btn-xs btn-info">รายละเอียด</button>
                                        </form>
                                    </td>

                                    <td class="text-center">

                                            <a href="{{ url('admin/manufacture-sticker/delivery/'.$finishedSticker->id) }}" class="btn btn-xs btn-success">จัดส่ง</a>
                                    </td>


                                </tr>




                            @endforeach



                            </tbody>

                        </table>
                        <br>

                    </div>
                </div>
            </div>


                </div>


</div>

    </div><!--/.main-content -->

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



</body>
</html>

