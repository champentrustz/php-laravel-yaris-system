
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

            <li class="menu-item active">
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


                    <div class="col-md-12">
                        <div class="card ">

                            <h4 class="card-title"><span class="ti-credit-card"></span> รายละเอียดบัญชีในการโอนเงิน</h4>

                            <div class="col-md-12 ">

                                <div class="card-body">

                                    <h7 style="font-weight: bold;">ชื่อบัญชี :</h7><span> ณัฐปคัลภ์ ลิไชยกุล (Nudpakun Leechaikul)</span>
                                    <p></p>
                                    <h7 style="font-weight: bold;">ประเภทบัญชี :</h7><span> สะสมทรัพย์</span>
                                    <p></p>

                                    <table class="table table-striped table-bordered table-responsive-lg" cellspacing="0" >
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="font-weight: bold;">ที่</th>
                                            <th style="font-weight: bold;">ธนาคาร</th>
                                            <th style="font-weight: bold;">สาขา</th>
                                            <th style="font-weight: bold;">เลขบัญชี</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td><img src="{{ asset('img/bank/tfb.gif') }}" alt="logo icon"> ธนาคารกสิกรไทย</td>
                                                    <td>อนุสาวรีย์ชัยสมรภูมิ</td>
                                                    <td>744-2-71746-4</td>

                                                </tr>

                                                <tr>
                                                    <td class="text-center">2</td>
                                                    <td><img src="{{ asset('img/bank/scb.gif') }}" alt="logo icon"> ธนาคารไทยพาณิชย์</td>
                                                    <td>เทคโนโลยีพระจอมเกล้าธนบุรี</td>
                                                    <td>237-210225-5</td>

                                                </tr>

                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td><img src="{{ asset('img/bank/bkb.gif') }}" alt="logo icon"> ธนาคารกรุงเทพ</td>
                                                    <td>เทคโนโลยีพระจอมเกล้าธนบุรี</td>
                                                    <td>037-7-01105-1</td>

                                                </tr>

                                                <tr>
                                                    <td class="text-center">4</td>
                                                    <td><img src="{{ asset('img/bank/ktb.gif') }}" alt="logo icon"> ธนาคารกรุงไทย</td>
                                                    <td>พิทักษ์สันติ</td>
                                                    <td>144-0-16965-9</td>

                                                </tr>

                                                <tr>
                                                    <td class="text-center">5</td>
                                                    <td><img src="{{ asset('img/bank/gsb.gif') }}" alt="logo icon"> ธนาคารออมสิน</td>
                                                    <td>เซ็นทรัล เวสต์เกต</td>
                                                    <td>020-1549-4445-6</td>

                                                </tr>

                                                <tr>
                                                    <td class="text-center">6</td>
                                                    <td><img src="{{ asset('img/bank/bay.gif') }}" alt="logo icon"> ธนาคารกรุงศรี</td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>




                                        </tbody>
                                    </table>


                                </div>

                            </div>

                        </div>
                    </div>




                    <div class="col-md-12 ">
                            <div class="card ">

                                <h4 class="card-title"><span class="fa fa-spinner"></span> รอการดำเนินการ</h4>

                                <div class="col-md-12">

                                    <div class="card-body">

                                        <table class="table table-striped table-bordered table-responsive-lg" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th class="text-center" style="font-weight: bold;">ที่</th>
                                                <th class="text-center" style="font-weight: bold;">รูป</th>
                                                <th style="font-weight: bold;">ผลิตภัณฑ์</th>
                                                <th style="font-weight: bold;">จำนวน</th>
                                                <th style="font-weight: bold;">ราคารวม</th>
                                                <th style="font-weight: bold;">สถานะ</th>
                                                <th class="text-center" style="font-weight: bold;"><span class="fa fa-cog"></span></th>
                                                <th class="text-center" style="font-weight: bold;"><span class="fa fa-cog"></span></th>
                                                <th class="text-center" style="font-weight: bold;"><span class="fa fa-cog"></span></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($ordersWaiting->isEmpty() )
                                                <tr>
                                                    <td colspan="9" class="text-center ">No data available in table</td>
                                                </tr>
                                            @else


                                            @foreach($ordersWaiting as $key => $orderWaiting)
                                            <tr>
                                                <td class="text-center">{{$key+1}}</td>
                                                <td class="text-center"><img src="{{asset('storage/img/product/'.$orderWaiting->product->id.'/'.$orderWaiting->product->id.'.png')}}" style="width: 150px;height: 150px"></td>
                                                <td>{{$orderWaiting->product->name}}</td>
                                                <td>{{$orderWaiting->number}} ชิ้น</td>
                                                <td>{{$orderWaiting->product->member_price * $orderWaiting->number}} บาท</td>
                                                @if($orderWaiting->status == "WAITING_PAYMENT")
                                                    <td class="text-warning">รอการชำระเงิน</td>
                                                @elseif($orderWaiting->status == "WAITING_CONFIRM")
                                                        <td class="text-warning">รอการตรวจสอบ</td>
                                                @elseif($orderWaiting->status == "CONFIRM" && $orderWaiting->product_id == 3)
                                                    <td class="text-warning">ตรวจสอบแล้ว รอสั่งสติ๊กเกอร์</td>
                                                @elseif($orderWaiting->status == "WAITING_PRODUCTION")
                                                    <td class="text-warning">รอการผลิต</td>
                                                @elseif($orderWaiting->status == "FINISHED_PRODUCTION")
                                                    <td class="text-warning">เสร็จสิ้นการผลิต รอการจัดส่ง</td>
                                                @elseif($orderWaiting->status == "CONFIRM" && $orderWaiting->product_id != 3)
                                                    <td class="text-warning">ตรวจสอบแล้ว รอการจัดส่ง</td>
                                                @elseif($orderWaiting->status == "SUCCESS")
                                                    <td class="text-success">จัดส่งแล้ว</td>
                                                @endif


                                                <td class="text-center">


                                                    <form action="{{ url('member/order/view-session') }}" method="post">
                                                        {{ csrf_field() }}

                                                        <input type="hidden" name="order_id" value="{{$orderWaiting->id}}">
                                                         <button type="submit" class="btn btn-xs btn-info">รายละเอียด</button>
                                                    </form>

                                                </td>

                                                <td class="text-center">

                                                    @if($orderWaiting->status == "WAITING_PAYMENT")

                                                    <button class="btn btn-xs btn-warning"   data-toggle="modal" data-target="#modal-small{{$key}}">แจ้งโอนเงิน</button>
                                                        @elseif($orderWaiting->status != "WAITING_PAYMENT")

                                                    <button  class="btn btn-xs btn-warning" disabled>แจ้งโอนเงิน</button>

                                                    @endif
                                                </td>

                                                <td class="text-center">

                                                        @if($orderWaiting->status == "WAITING_PAYMENT")

                                                        <a href="{{url('/member/order/delete/'.$orderWaiting->id)}}" class="btn btn-xs btn-danger">ลบ</a>

                                                        @elseif($orderWaiting->status != "WAITING_PAYMENT")
                                                            <button class="btn btn-xs btn-danger" disabled>ลบ</button>

                                                        @endif

                                                </td>



                                                <form action="{{ url('member/order/upload-payment') }}" enctype="multipart/form-data" method="post">

                                                    {{ csrf_field() }}

                                                <div class="modal fade" id="modal-small{{$key}}" tabindex="-1">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel"><span class="fa fa-file-image-o"></span> อัพโหลดหลักฐานการชำระเงิน</h5>
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body form-type-round">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="select" style="font-weight: bold;">ธนาคาร <span class="text-danger">*</span></label>
                                                                        <select class="form-control " id="select" name="bank">
                                                                            <option value="KASIKORN">ธนาคารกสิกรไทย</option>
                                                                            <option value="SCB">ธนาคารไทยพาณิชย์</option>
                                                                            <option value="KRUNGTHAI">ธนาคารกรุงไทย</option>
                                                                            <option value="BANGKOK">ธนาคารกรุงเทพ</option>
                                                                            <option value="KRUNGSRI">ธนาคารกรุงศรี</option>
                                                                            <option value="GSB">ธนาคารออมสิน</option>
                                                                        </select>
                                                                    </div>
                                                                    <input type="hidden" name="order_id" value="{{$orderWaiting->id}}">
                                                                    <label for="imgage" style="font-weight: bold;">หลักฐานการโอนเงิน <span class="text-danger">*</span></label>
                                                                    <div class="input-group form-type-round file-group">
                                                                        <input type="text" class="form-control file-value" placeholder="Choose file..." readonly="" required>
                                                                        <input type="file" multiple="" name="image" id="imgage" required>
                                                                        <span class="input-group-btn">
                                                                    <button class="btn btn-light file-browser" type="button"><i class="fa fa-upload"></i></button>
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-bold btn-pure btn-primary">Upload</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                </form>


                                            </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>


                                    </div>

                                </div>

                            </div>
                    </div>

                    <div class="col-md-12 ">
                        <div class="card ">

                            <h4 class="card-title"><span class="fa fa-clock-o"></span> ประวัติการสั่งซื้อ</h4>

                            <div class="col-md-12">

                                <div class="card-body">

                                    <table class="table table-striped table-bordered table-responsive-lg" data-page-length='50' data-provide="datatables" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="font-weight: bold;">ที่</th>
                                            <th style="font-weight: bold;">ผลิตภัณฑ์</th>
                                            <th style="font-weight: bold;">จำนวน</th>
                                            <th style="font-weight: bold;">ราคารวม</th>
                                            <th style="font-weight: bold;">สถานะ</th>
                                            <th class="text-center" style="font-weight: bold;"><span class="fa fa-cog"></span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ordersHistory as $key => $orderHistory)
                                            <tr>
                                                <td class="text-center">{{$key+1}}</td>
                                                <td>{{$orderHistory->product->name}}</td>
                                                <td>{{$orderHistory->number}} ชิ้น</td>
                                                <td>{{$orderHistory->product->member_price * $orderHistory->number}} บาท</td>
                                                <td class="text-success">จัดส่งแล้ว</td>
                                                <td class="text-center">


                                                    <form action="{{ url('member/order/view-session') }}" method="post">
                                                        {{ csrf_field() }}

                                                        <input type="hidden" name="order_id" value="{{$orderHistory->id}}">
                                                        <button type="submit" class="btn btn-xs btn-info">รายละเอียด</button>
                                                    </form>

                                                </td>

                                            </tr>
                                        @endforeach
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

