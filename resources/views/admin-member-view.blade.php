
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

            <li class="menu-item">
                <a class="menu-link" href="{{'../admin/confirm-sticker'}}">
                    <span class="icon fa fa-image"></span>
                    <span class="title">Confirm Sticker</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{'../admin/manufacture-sticker'}}">
                    <span class="icon fa fa-industry"></span>
                    <span class="title">Sticker Shop</span>
                </a>
            </li>

            <li class="menu-item active">
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

                @if ($errors->has('code-duplicate'))

                    <div class="callout callout-danger" role="alert">
                        <h5>Code duplicate!</h5>
                        <p>{{ $errors->first('code-duplicate') }}</p>
                    </div>

                    @elseif ($errors->has('change-success'))

                        <div class="callout callout-success" role="alert">
                            <h5>Success!</h5>
                            <p>{{ $errors->first('change-success') }}</p>
                        </div>


                @endif

                <div class="card">
                    <h4 class="card-title"><span class="fa fa-user"></span> ข้อมูลสมาชิก</h4>

                    <div class="card-body">

                        <table class="table table-striped table-bordered table-responsive-lg" cellspacing="0" data-page-length='50' data-provide="datatables">
                            <thead>
                            <tr>
                                <th style="font-weight: bold;" class="text-center">รหัสสมาชิก</th>
                                <th style="font-weight: bold;" class="text-center">คำนำหน้า</th>
                                <th style="font-weight: bold;" class="text-center">ชื่อ</th>
                                <th style="font-weight: bold;" class="text-center">ชื่อเล่น</th>
                                <th style="font-weight: bold;" class="text-center">จังหวัด</th>
                                <th style="font-weight: bold;" class="text-center">รุ่น</th>
                                <th style="font-weight: bold;" class="text-center">สี</th>
                                <th class="text-center"  style="font-weight: bold;"><span class="fa fa-cog"></span></th>
                                <th class="text-center"  style="font-weight: bold;"><span class="fa fa-cog"></span></th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $key => $user)

                                <tr>
                                    <td class="text-center">#{{$user->code}}</td>
                                    <td class="text-center">{{$user->title_name}}</td>
                                    <td class="text-center">{{$user->first_name}}</td>
                                    <td class="text-center">{{$user->nick_name}}</td>
                                    <td class="text-center">{{$user->userAddress->province}}</td>
                                    <td class="text-center">
                                        @if($user->userCar->secondary_car_generation == "J_ECO")
                                            J ECO
                                        @else
                                            {{$user->userCar->secondary_car_generation}}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($user->userCar->color == "BLACK")
                                            Attitude Black Mica
                                        @elseif($user->userCar->color == "BLUE")
                                            Dark Blue Mica Metallic
                                        @elseif($user->userCar->color == "GREY")
                                            Grey Metallic
                                        @elseif($user->userCar->color == "SILVER")
                                            Silver Metallic
                                        @elseif($user->userCar->color == "BROWN")
                                            Quartz Brown Metallic
                                        @elseif($user->userCar->color == "WHITE")
                                            Super White
                                        @elseif($user->userCar->color == "RED")
                                            Red Mica Metallic
                                        @endif
                                    </td>

                                    <td class="text-center">

                                        <form action="{{ url('admin/member/view-user-session') }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="user_id" value="{{$user->id}}">

                                            <button type="submit" class="btn btn-xs btn-info" >รายละเอียด</button>

                                        </form>
                                    </td>


                                    <td class="text-center">

                                        <button class="btn btn-xs btn-warning" data-provide="tooltip"  data-toggle="modal" data-target="#modal-change-code{{$key}}">เปลี่ยนรหัส</button>
                                    </td>

                                    <div class="modal fade" id="modal-change-code{{$key}}" tabindex="-1">

                                        <form action="{{ url('admin/member/change-code') }}" method="post" >

                                            {{ csrf_field() }}
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel"><span class="fa fa-exchange"></span> เปลี่ยนหมายเลขสมาชิก</h5>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body form-type-round">
                                                        <div class="col-md-12">
                                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                                            <div class="form-group">
                                                                <label for="code" style="font-weight: bold;">หมายเลขสมาชิกใหม่ <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="code" name="code" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-bold btn-pure btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </tr>


                            @endforeach

                            </tbody>

                        </table>





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

