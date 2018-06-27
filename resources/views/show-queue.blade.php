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

<main class="main-container">

    <div class="main-content">

        <div class="container">

            <div class="text-center" style="font-size: 50px;">ลำดับการลงทะเบียน</div>
            <div class="text-center text-danger" style="font-size: 400px; margin-top:200px;">{{$queue}}</div>

        </div>

    </div>

</main>



<!-- Scripts -->
<script src="{{ asset('js/core.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/script.min.js') }}"></script>

</body>
</html>
