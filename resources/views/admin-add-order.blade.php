
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
                <a class="menu-link" href="{{'../dashboard'}}">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>



            <li class="menu-item">
                <a class="menu-link" href="{{'../confirm-order'}}">
                    <span class="icon fa fa-cube"></span>
                    <span class="title">Confirm Order</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{'../confirm-sticker'}}">
                    <span class="icon fa fa-image"></span>
                    <span class="title">Confirm Sticker</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{'../manufacture-sticker'}}">
                    <span class="icon fa fa-industry"></span>
                    <span class="title">Sticker Shop</span>
                </a>
            </li>

            <li class="menu-item ">
                <a class="menu-link" href="{{'../member'}}">
                    <span class="icon fa fa-user"></span>
                    <span class="title">Member</span>
                </a>
            </li>


            <li class="menu-item active">
                <a class="menu-link" href="{{'../add-order'}}">
                    <span class="icon fa fa-shopping-cart"></span>
                    <span class="title">Add Order</span>
                </a>
            </li>



            <li class="menu-item ">
                <a class="menu-link" href="{{'../add-product'}}">
                    <span class="icon fa fa-cubes"></span>
                    <span class="title">Add Product</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{'../except-number'}}">
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

            @if ($errors->has('success'))
                <div class="col-md-12">
                    <div class="callout callout-success" role="alert">
                        <h5>Add order done!</h5>
                        <p class="text-info">{{ $errors->first('success') }}</p>
                    </div>
                </div>
            @endif



                    <div class="col-md-12">
                        <div class="card">
                            <h4 class="card-title"><span class="fa fa-search"></span> ค้นหาสมาชิก</h4>

                            <div class="card-body">

                                <form class="form-type-material" method="POST" enctype="multipart/form-data" action="{{ url('/admin/add-order/find-user')}}">
                                    {{ csrf_field() }}


                                <div class="form-group">
                                    <input type="text" class="form-control" id="code" name="code" required>
                                    @if ($errors->has('wrong-code'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('wrong-code') }}</strong>
                                            </span>
                                    @endif
                                    <label for="code" style="font-weight: bold;">หมายเลขสมาชิก <span class="text-danger">*</span></label>
                                </div>

                                    <div class="col-md-6 offset-md-3">

                                        <button type="submit" class="btn btn-block btn-primary" >ค้นหา</button>

                                    </div>



                                </form>


                            </div>
                        </div>
                    </div>



                <div class="col-md-12">
                    <div class="card ">

                        <h4 class="card-title"><span class="fa fa-shopping-cart"></span> ตะกร้าสินค้า</h4>

                        <div class="col-md-12">

                            <form class="form-type-material" method="POST" action="{{ url('/admin/add-order/add') }}">
                                {{ csrf_field() }}
                                <br>


                                <div class="form-group">
                                    <input type="text" class="form-control" id="user-code" name="user_code" value="{{$user->code}}" readonly>
                                    <label for="user-code" style="font-weight: bold;">หมายเลขสมาชิก</label>
                                </div>

                                <div class="form-group">
                                    <label for="product-name" style="font-weight: bold;">สินค้า <span class="text-danger">*</span></label>
                                    <select class="form-control" id="select" name="product" required>
                                        @foreach(Session::get('productDetail') as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="number" name="number" value="1" >
                                    <label for="number" style="font-weight: bold;">จำนวน (ชิ้น) <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-group">
                                    <label for="note" style="font-weight: bold;">หมายเหตุ</label><br>
                                    <textarea type="text" class="form-control" id="note" name="note" placeholder="ใส่ขนาดไซส์เสื้อหรืออื่นๆ"></textarea>

                                </div>


                                <label style="font-weight: bold;">เลือกที่อยู่ <span class="text-danger">*</span></label>

                                <div class="custom-controls-stacked" >
                                    <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="address" value="old_address" id="old-address" required>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">ที่อยู่ตามที่ลงทะเบียน</span>
                                    </label>

                                    <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="address" value="temp_address" id="temp-address" required>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">ที่อยู่อื่นๆ</span>
                                    </label>

                                </div>

                                <div id="show-address">


                                    <div class="form-group">
                                        <input type="text" class="form-control" id="house-number" name="house_number"  >
                                        <label for="house-number" style="font-weight: bold;">บ้านเลขที่ <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="village-number" name="village_number"  >
                                        <label for="village-number" style="font-weight: bold;">หมู่ที่ <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="alley" name="alley"  >
                                        <label for="alley" style="font-weight: bold;">ตรอก/ซอย <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="road" name="road" >
                                        <label for="road" style="font-weight: bold;">ถนน <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="sub-district" name="sub_district"  >
                                        <label for="sub-district" style="font-weight: bold;">แขวง/ตำบล <span class="text-danger">*</span></label>
                                    </div>


                                    <div class="form-group">
                                        <input type="text" class="form-control" id="district" name="district"  >
                                        <label for="district" style="font-weight: bold;">เขต/อำเภอ <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="province" name="province"  >
                                        <label for="province" style="font-weight: bold;">จังหวัด <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="country" name="country"  >
                                        <label for="country" style="font-weight: bold;">ประเทศ <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="postal-code" name="postal_code"  >
                                        <label for="postal-code" style="font-weight: bold;">รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-3">
                                    <button type="submit" class="btn btn-block btn-primary" >ยืนยันการสั่งซื้อ</button>
                                </div>
                                <br>

                            </form>
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

<script>



        $( "#old-address" ).on( "click", function() {

            $( "#house-number" ).focus();
            $( "#house-number" ).val("{{$user->userAddress->house_number}}");
            $( "#house-number" ).prop( "readonly", true );
            $( "#village-number" ).focus();
            $( "#village-number" ).val("<?php if(!empty(Session::get('userDetail'))) echo Session::get('userDetail')->userAddress->village_number?>");
            $( "#village-number" ).prop( "readonly", true );
            $( "#alley" ).focus();
            $( "#alley" ).val("<?php if(!empty(Session::get('userDetail'))) echo Session::get('userDetail')->userAddress->alley?>");
            $( "#alley" ).prop( "readonly", true );
            $( "#road" ).focus();
            $( "#road" ).val("<?php if(!empty(Session::get('userDetail'))) echo Session::get('userDetail')->userAddress->road?>");
            $( "#road" ).prop( "readonly", true );
            $( "#sub-district" ).focus();
            $( "#sub-district" ).val("<?php if(!empty(Session::get('userDetail'))) echo Session::get('userDetail')->userAddress->sub_district?>");
            $( "#sub-district" ).prop( "readonly", true );
            $( "#district" ).focus();
            $( "#district" ).val("<?php if(!empty(Session::get('userDetail'))) echo Session::get('userDetail')->userAddress->district?>");
            $( "#district" ).prop( "readonly", true );
            $( "#province" ).focus();
            $( "#province" ).val("<?php if(!empty(Session::get('userDetail'))) echo Session::get('userDetail')->userAddress->province?>");
            $( "#province" ).prop( "readonly", true );
            $( "#country" ).focus();
            $( "#country" ).val("<?php if(!empty(Session::get('userDetail'))) echo Session::get('userDetail')->userAddress->country?>");
            $( "#country" ).prop( "readonly", true );
            $( "#postal-code" ).focus();
            $( "#postal-code" ).val("<?php if(!empty(Session::get('userDetail'))) echo Session::get('userDetail')->userAddress->postal_code?>");
            $( "#postal-code" ).prop( "readonly", true );
        });

        $( "#temp-address" ).on( "click", function() {
            $( "#house-number" ).prop( "readonly", false );
            $( "#house-number" ).focus();
            $( "#house-number" ).val("");
            $( "#village-number" ).prop( "readonly", false );
            $( "#village-number" ).focus();
            $( "#village-number" ).val("");
            $( "#alley" ).prop( "readonly", false );
            $( "#alley" ).focus();
            $( "#alley" ).val("");
            $( "#road" ).prop( "readonly", false );
            $( "#road" ).focus();
            $( "#road" ).val("");
            $( "#sub-district" ).prop( "readonly", false );
            $( "#sub-district" ).focus();
            $( "#sub-district" ).val("");
            $( "#district" ).prop( "readonly", false );
            $( "#district" ).focus();
            $( "#district" ).val("");
            $( "#province" ).prop( "readonly", false );
            $( "#province" ).focus();
            $( "#province" ).val("");
            $( "#country" ).prop( "readonly", false );
            $( "#country" ).focus();
            $( "#country" ).val("ไทย");
            $( "#postal-code" ).prop( "readonly", false );
            $( "#postal-code" ).focus();
            $( "#postal-code" ).val("");
            $( "#house-number" ).focus();
        });




</script>



</body>
</html>

