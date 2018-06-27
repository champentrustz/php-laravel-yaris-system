
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



                <li class="menu-item ">
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

                <li class="menu-item active">
                    <a class="menu-link" href="{{'../member'}}">
                        <span class="icon fa fa-user"></span>
                        <span class="title">Member</span>
                    </a>
                </li>

                <li class="menu-item ">
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

                    @if ($errors->has('update-success'))

                            <div class="callout callout-success" role="alert">
                                <h5>Update done!</h5>
                                <p class="text-info">{{ $errors->first('update-success') }}</p>
                            </div>


                    @endif


                    <div class="card">



                        <h4 class="card-title"><span class="icon ti-user"></span> ข้อมูลส่วนตัว</h4>

                        <div class="card-body">

                            <form class="form-type-material">

                    <div class="row">



                        <div class="col-md-4">



                            <div class="text-info" style="font-weight: bold;">ข้อมูลทั่วไป</div>

                                <br>

                            <div class="form-group">
                                <input type="text" class="form-control" id="first-name" name="first_name" value="{{Session::get('dashboardUserDetail')->code}}" required>
                                <label for="first-name" style="font-weight: bold;">เลขสมาชิก <span class="text-danger">*</span></label>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="first-name" name="first_name" value="{{Session::get('dashboardUserDetail')->first_name}}" required>
                                <label for="first-name" style="font-weight: bold;">ชื่อ <span class="text-danger">*</span></label>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="last-name" name="last_name" value="{{ Session::get('dashboardUserDetail')->last_name }}" required>
                                <label for="last-name" style="font-weight: bold;">นามสกุล <span class="text-danger">*</span></label>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="nick-name" name="nick_name" value="{{ Session::get('dashboardUserDetail')->nick_name }}" required>
                                <label for="nick-name" style="font-weight: bold;">ชื่อเล่น <span class="text-danger">*</span></label>
                            </div>

                            <br>

                            <label style="font-weight: bold;">เพศ <span class="text-danger">*</span></label>

                            <div class="custom-controls-stacked" >


                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="gender" value="MALE" <?php if(Session::get('dashboardUserDetail')->gender == "MALE")echo "checked"?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">ชาย</span>
                                </label>

                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="gender" value="FEMALE" <?php if(Session::get('dashboardUserDetail')->gender == "FEMALE")echo "checked"?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">หญิง</span>
                                </label>

                            </div>

                            <br>

                            <label style="font-weight: bold;">วันเกิด</label>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <select class="form-control" id="day" name="day"  >
                                            <option value="{{null}}" readonly selected>วัน</option>
                                            @for($i=1;$i<=31;$i++)
                                                <option value="{{$i}}" @if(substr(Session::get('dashboardUserDetail')->birthday,8,2) == $i) selected @endif>{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" id="month" name="month" >
                                            <option value="{{null}}" readonly selected>เดือน</option>
                                            @for($i=1;$i<=12;$i++)
                                                <option value="{{$i}}" @if(substr(Session::get('dashboardUserDetail')->birthday,5,2) == $i) selected   @endif>{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" id="year" name="year" >
                                            <option value="{{null}}" readonly selected>ปี</option>
                                            @for($i=\Carbon\Carbon::now()->format('Y') + 543 - 100;$i<=\Carbon\Carbon::now()->format('Y') + 543;$i++)
                                                <option value="{{$i}}" @if(substr(Session::get('dashboardUserDetail')->birthday,0,4) == $i) selected @endif>{{$i}}</option>
                                            @endfor

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <input type="number" name="telephone" class="form-control" id="telephone" value="{{ Session::get('dashboardUserDetail')->telephone }}"  required>
                                <label for="telephone" style="font-weight: bold;">เบอร์ติดต่อ <span class="text-danger">*</span></label>
                            </div>

                            <div class="form-group">
                                <input type="text" name="facebook" class="form-control" value="{{ Session::get('dashboardUserDetail')->facebook }}"  id="facebook">
                                <label for="telephone" style="font-weight: bold;">Facebook</label>
                            </div>

                            <br>

                            <label style="font-weight: bold;">ชนิดของ LINE <span class="text-danger">*</span></label>

                            <div class="custom-controls-stacked" >
                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="line_id_type" value="LINE_ID" <?php if(Session::get('dashboardUserDetail')->line_id_type == "LINE_ID")echo "checked";?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Line ID</span>
                                </label>

                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="line_id_type" value="PHONE_NUMBER" <?php if(Session::get('dashboardUserDetail')->line_id_type == "PHONE_NUMBER")echo"checked";?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Phone Number</span>
                                </label>

                            </div>

                            <br>

                            <div class="form-group">
                                <input type="text" name="line_id" class="form-control" id="line" value="{{ Session::get('dashboardUserDetail')->line_id }}"  required>
                                <label for="line" style="font-weight: bold;">LINE ID <span class="text-danger">*</span></label>
                            </div>


                        </div>




                        <div class="col-md-4">


                            <div class="text-info" style="font-weight: bold;">ข้อมูลที่อยู่</div>

                            <br>

                            <div class="form-group">
                                <input type="text" class="form-control" id="house-number" name="house_number" value="{{ Session::get('dashboardUserDetail')->userAddress->house_number }}" required>
                                <label for="house-number" style="font-weight: bold;">บ้านเลขที่ <span class="text-danger">*</span></label>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="village-number" name="village_number" value="{{ Session::get('dashboardUserDetail')->userAddress->village_number }}" required>
                                <label for="village-number" style="font-weight: bold;">หมู่ที่ <span class="text-danger">*</span></label>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="alley" name="alley" value="{{ Session::get('dashboardUserDetail')->userAddress->alley }}" required>
                                <label for="alley" style="font-weight: bold;">ตรอก/ซอย <span class="text-danger">*</span></label>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="road" name="road" value="{{ Session::get('dashboardUserDetail')->userAddress->road }}" required>
                                <label for="road" style="font-weight: bold;">ถนน <span class="text-danger">*</span></label>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="sub-district" name="sub_district" value="{{ Session::get('dashboardUserDetail')->userAddress->sub_district }}" required>
                                <label for="sub-district" style="font-weight: bold;">แขวง/ตำบล <span class="text-danger">*</span></label>
                            </div>


                            <div class="form-group">
                                <input type="text" class="form-control" id="district" name="district" value="{{ Session::get('dashboardUserDetail')->userAddress->district }}" required>
                                <label for="district" style="font-weight: bold;">เขต/อำเภอ <span class="text-danger">*</span></label>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="province" name="province" value="{{ Session::get('dashboardUserDetail')->userAddress->province }}" required>
                                <label for="province" style="font-weight: bold;">จังหวัด <span class="text-danger">*</span></label>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="country" name="country" value="{{ Session::get('dashboardUserDetail')->userAddress->country }}" required>
                                <label for="country" style="font-weight: bold;">ประเทศ <span class="text-danger">*</span></label>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="postal-code" name="postal_code" value="{{ Session::get('dashboardUserDetail')->userAddress->postal_code }}" required>
                                <label for="postal-code" style="font-weight: bold;">รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                            </div>


                        </div>




                        <div class="col-md-4">

                            <div class="text-info" style="font-weight: bold;">ข้อมูลรถยนต์</div>

                            <br>

                            <label style="font-weight: bold;">รถรุ่นหลัก <span class="text-danger">*</span></label>

                            <div class="custom-controls-stacked" >
                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="main_car_generation" value="YARIS_ATIV"  <?php if(Session::get('dashboardUserDetail')->userCar->main_car_generation == "YARIS_ATIV")echo"checked";?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Yaris ATIV</span>
                                </label>

                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="main_car_generation" value="YARIS"  <?php if(Session::get('dashboardUserDetail')->userCar->main_car_generation == "YARIS")echo"checked";?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Yaris</span>
                                </label>

                            </div>

                            <br>


                            <label style="font-weight: bold;">รถรุ่นรอง <span class="text-danger">*</span></label>



                            <div class="custom-controls-stacked"  >
                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="secondary_car_generation" value="S" <?php if(Session::get('dashboardUserDetail')->userCar->secondary_car_generation == "S")echo"checked";?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">S</span>
                                </label>

                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="secondary_car_generation" value="G" <?php if(Session::get('dashboardUserDetail')->userCar->secondary_car_generation == "G")echo"checked";?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">G</span>
                                </label>

                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="secondary_car_generation" value="E" <?php if(Session::get('dashboardUserDetail')->userCar->secondary_car_generation == "E")echo"checked";?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">E</span>
                                </label>

                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="secondary_car_generation" value="J" <?php if(Session::get('dashboardUserDetail')->userCar->secondary_car_generation == "J")echo"checked";?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">J</span>
                                </label>

                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="secondary_car_generation" value="J_ECO" <?php if(Session::get('dashboardUserDetail')->userCar->secondary_car_generation == "J_ECO")echo"checked";?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">J Eco</span>
                                </label>

                            </div>

                            <div class="form-group">
                                <select class="form-control" id="color" name="color" required>
                                    <option value="BLACK" <?php if(Session::get('dashboardUserDetail')->userCar->color == "BLACK") echo "selected"?>>Attitude Black Mica</option>
                                    <option value="BLUE" <?php if(Session::get('dashboardUserDetail')->userCar->color == "BLUE") echo "selected"?>>Dark Blue Mica Metallic</option>
                                    <option value="GREY" <?php if(Session::get('dashboardUserDetail')->userCar->color == "GREY") echo "selected"?>>Grey Metallic</option>
                                    <option value="SILVER" <?php if(Session::get('dashboardUserDetail')->userCar->color == "SILVER") echo "selected"?>>Silver Metallic</option>
                                    <option value="BROWN" <?php if(Session::get('dashboardUserDetail')->userCar->color == "BROWN") echo "selected"?>>Quartz Brown Metallic</option>
                                    <option value="WHITE" <?php if(Session::get('dashboardUserDetail')->userCar->color == "WHITE") echo "selected"?>>Super White</option>
                                    <option value="RED" <?php if(Session::get('dashboardUserDetail')->userCar->color == "RED") echo "selected"?>>Red Mica Metallic</option>
                                </select>
                                <label for="color" style="font-weight: bold;">สีรถ <span class="text-danger">*</span></label>
                            </div>

                            <label style="font-weight: bold;">ปีผลิต <span class="text-danger">*</span></label>

                            <div class="custom-controls-stacked"  >
                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="manufacture_year" value="2017" <?php if(Session::get('dashboardUserDetail')->userCar->manufacture_year == "2017")echo"checked";?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">2017</span>
                                </label>

                        </div>
                    </div>

                        <div class="col-md-6 offset-md-3">
                            <br>
                        </div>
                </div>
                            </form>
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
<script src="{{ asset("js/core.min.js") }}"></script>
<script src="{{ asset("js/app.js") }}"></script>
<script src="{{ asset("js/script.min.js") }}"></script>


<!-- Scripts -->

</body>
</html>

