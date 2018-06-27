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





<div class="col-md-6 offset-md-3">
    <div class="card">
        <h4 class="card-title"><span class="fa fa-search"></span> ค้นหาหมายเลขสมาชิก</h4>

        <div class="card-body">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../login">เข้าสู่ระบบ</a></li>
                <li class="breadcrumb-item active text-info">ค้นหาหมายเลขสมาชิก</li>
            </ol>

            <form class="form-type-material" method="POST" action="{{ url('/search-member/search') }}">

                {{ csrf_field() }}

            <div class="form-group">
                <input type="text" class="form-control" id="first-name" name="first_name"  required>
                <label for="first-name" style="font-weight: bold;">ชื่อ <span class="text-danger">*</span></label>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="last-name" name="last_name"  required>
                <label for="last-name" style="font-weight: bold;">นามสกุล <span class="text-danger">*</span></label>
            </div>


                <button type="submit" class="btn btn-block btn-primary" >ค้นหา</button>

            </form>




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
