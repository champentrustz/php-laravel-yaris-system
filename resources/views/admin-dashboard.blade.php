
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



            <li class="menu-item active">
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



                <div class="col-md-4">


                    <div class="card card-body">
                        <div class="flexbox mb-1">
                      <span>
                        <i class="fa fa-calendar fs-20 text-warning"></i><br>
                        ออร์เดอร์ทั้งหมดประจำวันนี้
                      </span>
                            <span class="text-warning fs-40">{{$ordersNew->count()}}</span>
                        </div>

                    </div>

                </div>

                <div class="col-md-4">


                    <div class="card card-body">
                        <div class="flexbox mb-1">
                      <span>
                        <i class="fa fa-bitcoin fs-20 text-warning"></i><br>
                        ยอดขายวันนี้
                      </span>
                            <span class="text-warning fs-40">{{$todaySell}} บาท</span>
                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                </div>

                <div class="col-md-4">


                    <div class="card card-body">
                        <div class="flexbox mb-1">
                      <span>
                        <i class="fa fa-calendar fs-20 text-info"></i><br>
                        ออร์เดอร์ทั้งหมดประเดือนนี้
                      </span>
                            <span class="text-info fs-40">{{$ordersMonth->count()}}</span>
                        </div>

                    </div>

                </div>

                <div class="col-md-4">


                    <div class="card card-body">
                        <div class="flexbox mb-1">
                      <span>
                        <i class="fa fa-bitcoin fs-20 text-info"></i><br>
                        ยอดขายเดือนนี้
                      </span>
                            <span class="text-info fs-40">{{$monthSell}} บาท</span>
                        </div>

                    </div>

                </div>



                <div class="col-md-12">
                    <div class="card">
                        <h4 class="card-title"><span class="fa fa-file-text-o"></span> รายการออร์เดอร์</h4>

                        <div class="card-body">

                            <table class="table table-striped table-bordered table-responsive-lg" data-page-length='50' cellspacing="0" data-provide="datatables">
                                <thead>
                                <tr>
                                    <th class="text-center" style="font-weight: bold;">ที่</th>
                                    <th style="font-weight: bold;">ผลิตภัณฑ์</th>
                                    <th style="font-weight: bold;">จำนวน</th>
                                    <th style="font-weight: bold;">ราคา (รวมค่าจัดส่ง)</th>
                                    <th style="font-weight: bold;">ผู้ซื้อ</th>
                                    <th style="font-weight: bold;">สถานะ</th>
                                    <th style="font-weight: bold;">วันที่</th>
                                    <th class="text-center"  style="font-weight: bold;"><span class="fa fa-cog"></span></th>
                                    <th class="text-center"  style="font-weight: bold;"><span class="fa fa-cog"></span></th>
                                    <th class="text-center"  style="font-weight: bold;"><span class="fa fa-cog"></span></th>
                                    <th class="text-center"  style="font-weight: bold;"><span class="fa fa-cog"></span></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($orders as $key => $order)

                                    <tr>


                                        <td class="text-center">{{$key+1}}</td>
                                        <td>{{$order->product->name}}</td>
                                        <td>{{$order->number}} ชิ้น</td>
                                        <td>{{($order->product->member_price * $order->number) + $order->product->delivery_price }} บาท</td>
                                        <td>{{$order->user->first_name}} {{$order->user->last_name}}</td>
                                        @if($order->status == "WAITING_PAYMENT")
                                            <td class="text-danger">รอการชำระเงิน</td>
                                        @elseif($order->status == "WAITING_CONFIRM")
                                            <td class="text-warning">รอการตรวจสอบการชำระเงิน</td>
                                        @elseif($order->status == "CONFIRM" && $order->product_id == 3)
                                            <td class="text-warning">ตรวจสอบแล้ว รอสั่งสติ๊กเกอร์</td>
                                        @elseif($order->status == "WAITING_PRODUCTION")
                                            <td class="text-warning">รอการผลิต</td>
                                        @elseif($order->status == "FINISHED_PRODUCTION")
                                            <td class="text-warning">เสร็จสิ้นการผลิต รอการจัดส่ง</td>
                                        @elseif($order->status == "CONFIRM" && $order->product_id != 3)
                                            <td class="text-warning">ตรวจสอบแล้ว รอการจัดส่ง</td>
                                        @elseif($order->status == "SUCCESS")
                                            <td class="text-success">จัดส่งแล้ว</td>
                                        @endif

                                        <td>{{substr($order->created_at,0,10)}}</td>


                                        <td class="text-center">

                                            <form action="{{ url('admin/dashboard/view-order-session') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="order_id" value="{{$order->id}}">

                                                <button type="submit" class="btn btn-xs btn-info" >รายละเอียด</button>

                                            </form>
                                        </td>


                                        <td class="text-center">

                                            <button class="btn btn-xs btn-warning" data-provide="tooltip"  data-toggle="modal" data-target="#modal-medium{{$key}}">ตรวจสอบ</button>
                                        </td>


                                        <td class="text-center">
                                            <a href="{{url('/admin/dashboard/order-delete/'.$order->id)}}"class="btn btn-xs btn-danger" >ลบ</a>
                                        </td>
                                        @if($order->status == "WAITING_PAYMENT")
                                            <td class="text-center">
                                                <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-small2{{$key}}">อัพโหลด</button>
                                            </td>

                                        @else
                                            <td class="text-center">
                                                <button  class="btn btn-xs btn-primary" disabled>อัพโหลด</button>
                                            </td>
                                        @endif
                                    </tr>








                                    <div class="modal fade" id="modal-small2{{$key}}" tabindex="-1">

                                        <form action="{{ url('admin/dashboard/upload-payment') }}" enctype="multipart/form-data" method="post">

                                            {{ csrf_field() }}
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
                                                            <input type="hidden" name="order_id" value="{{$order->id}}">
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
                                        </form>
                                    </div>


                                    <div class="modal fade" id="modal-medium{{$key}}" tabindex="-1">
                                        <div class="modal-dialog modal-md">
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
                                                            <label style="font-weight: bold;">ธนาคารที่โอนเข้ามา : </label>


                                                            @if($order->bank == "KASIKORN")
                                                                <label style="font-weight: bold;" class="text-success">ธนาคารกสิกรไทย</label>
                                                            @elseif($order->bank == "SCB")
                                                                <label style="font-weight: bold;" class="text-success">ธนาคารไทยพาณิชย์</label>
                                                            @elseif($order->bank == "KRUNGTHAI")
                                                                <label style="font-weight: bold;" class="text-success">ธนาคารกรุงไทย</label>
                                                            @elseif($order->bank == "BANGKOK")
                                                                <label style="font-weight: bold;" class="text-success">ธนาคารกรุงเทพ</label>
                                                            @elseif($order->bank == "KRUNGSRI")
                                                                <label style="font-weight: bold;" class="text-success">ธนาคารกรุงศรี</label>
                                                            @elseif($order->bank == "GSB")
                                                                <label style="font-weight: bold;" class="text-success">ธนาคารออมสิน</label>
                                                            @endif

                                                        </div>

                                                        <label style="font-weight: bold;">หลักฐานการโอนเงิน</label>
                                                        <img src="{{asset('storage/img/payment/'.$order->id.'/'.$order->id.'.png')}}">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
                                                        @if($order->status != "WAITING_CONFIRM")
                                                            <button class="btn btn-bold btn-pure btn-primary" disabled>Confirm Payment</button>
                                                        @else
                                                            <a href="{{url('/admin/dashboard/confirm-payment/'.$order->id)}}" class="btn btn-bold btn-pure btn-primary">Confirm Payment</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>






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

