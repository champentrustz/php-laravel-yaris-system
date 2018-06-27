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
    <br>
    <div class="col-md-12">
        <form class="form-type-material" method="POST" action="{{ url('/checkin-event/confirm') }}">
            {{ csrf_field() }}

            <div class="callout callout-success" role="alert">
                <h1 class="text-success">ยืนยันลำดับการลงทะเบียนมิตติ้ง</h1>
                <h2>หมายเลขสมาชิกของท่านคือ : {{$user->code}}</h2>
                <h2>ชื่อ-สกุล : {{$user->first_name}} {{$user->last_name}}</h2>
                <input type="hidden" name="userID" value="{{$user->id}}">
                <input type="hidden" name="eventID" value="{{$eventID}}">

                <br>
                <button type="submit" class="btn btn-lg btn-block btn-primary" style="height: 70px">ยืนยัน</button>
            </div>
        </form>
    </div>

</div>


<!-- Scripts -->
<script src="{{ asset('js/core.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/script.min.js') }}"></script>

</body>
</html>
