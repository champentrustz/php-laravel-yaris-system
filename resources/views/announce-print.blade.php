<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    {{--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
    {{--<meta name="description" content="Responsive admin dashboard and web application ui kit. A bar container to put most important action of your app inside the topbar, so they would be more accessable.">--}}
    {{--<meta name="keywords" content="topbar, secondary, menu">--}}

    <title>YARIS ATIV CLUB</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/core.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">

    <!-- Favicons -->
</head>

<body>

<div class="container">

    <br>


<div class="col-md-12">
    <div class="card">
        <h4 class="card-title"><span class="fa fa-user"></span> ข้อมูลสมาชิก</h4>

        <div class="card-body">

            <table class="table table-striped table-bordered table-responsive-lg" cellspacing="0">
                <thead>
                <tr>
                    <th style="font-weight: bold;" class="text-center">รหัสสมาชิก</th>
                    <th style="font-weight: bold;" class="text-center">คำนำหน้า</th>
                    <th style="font-weight: bold;" class="text-center">ชื่อ</th>
                    <th style="font-weight: bold;" class="text-center">ชื่อเล่น</th>
                    <th style="font-weight: bold;" class="text-center">จังหวัด</th>
                    <th style="font-weight: bold;" class="text-center">รุ่น</th>
                    <th style="font-weight: bold;" class="text-center">สี</th>

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

                    </tr>


                @endforeach

                </tbody>

            </table>





        </div>
    </div>
</div>

</div>


<!-- Scripts -->
<script src="{{ asset('js/core.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/script.min.js') }}"></script>

</body>
</html>
