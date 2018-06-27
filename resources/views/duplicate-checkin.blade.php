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
        <div class="callout callout-danger" role="alert">
            <h1 class="text-danger">ผิดพลาด!</h1>
            <p class="text-info h2">ขออภัย คุณได้ลงทะเบียนแล้ว</p>
            <p>
                <a class="btn" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="ti-power-off"></i> ออกจากระบบ
                </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            </p>
        </div>
    </div>

</div>


<!-- Scripts -->
<script src="{{ asset('js/core.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/script.min.js') }}"></script>

</body>
</html>
