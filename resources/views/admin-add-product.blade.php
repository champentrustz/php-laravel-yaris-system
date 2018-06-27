
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

            <li class="menu-item active">
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
                        <div class="card">
                            <h4 class="card-title"><span class="fa fa-plus-circle"></span> เพิ่มสินค้า</h4>

                            <div class="card-body">

                                <form class="form-type-material" method="POST" enctype="multipart/form-data" action="{{ url('/admin/add-product/add') }}">
                                    {{ csrf_field() }}

                                    <label for="imgage" style="font-weight: bold;">รูปสินค้า</label>
                                    <div class="input-group form-type-round file-group">
                                        <input type="text" class="form-control file-value" placeholder="Choose file..." readonly="" required>
                                        <input type="file" multiple="" name="image" id="imgage" required>
                                        <span class="input-group-btn">
                                                                    <button class="btn btn-light file-browser" type="button"><i class="fa fa-upload"></i></button>
                                                                    </span>
                                    </div>
                                    <br>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name"  required>
                                    <label for="name" style="font-weight: bold;">ชื่อสินค้า <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control" id="member_price" name="member_price" required>
                                    <label for="member_price" style="font-weight: bold;">ราคาสมาชิก (บาท) <span class="text-danger">*</span></label>
                                </div>

                                    <div class="form-group">
                                        <input type="number" class="form-control" id="normal_price" name="normal_price" required>
                                        <label for="normal_price" style="font-weight: bold;">ราคาปกติ (บาท) <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group">
                                        <input type="number" class="form-control" id="delivery_price" name="delivery_price" required>
                                        <label for="delivery_price" style="font-weight: bold;">ราคาจัดส่ง (บาท) <span class="text-danger">*</span></label>
                                    </div>

                                <div class="form-group">
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                    <label for="description" style="font-weight: bold;">คำอธิบายสินค้า</label>
                                </div>

                                    <div class="col-md-6 offset-md-3">
                                        <button type="submit" class="btn btn-block btn-primary" >บันทึก</button>
                                    </div>


                                </form>





                            </div>
                        </div>
                    </div>

            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-title"><span class="fa fa-cubes"></span> สินค้าที่มี</h4>

                    <div class="card-body">

                        <table class="table table-striped table-bordered table-responsive-lg" cellspacing="0" data-page-length='50' data-provide="datatables">
                            <thead>
                            <tr>
                                <th class="text-center" style="font-weight: bold;">ที่</th>
                                <th style="font-weight: bold;">ชื่อ</th>
                                <th style="font-weight: bold;">ราคาสมาชิก</th>
                                <th style="font-weight: bold;">ราคาปกติ</th>
                                <th style="font-weight: bold;">ราคาจัดส่ง</th>
                                <th style="font-weight: bold;">คำอธิบาย</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $key => $product)

                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->member_price}} บาท</td>
                                    <td>{{$product->normal_price}} บาท</td>
                                    <td>{{$product->delivery_price}} บาท</td>
                                    <td>{{$product->description}}</td>
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

