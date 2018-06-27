{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Login</div>--}}

                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" method="POST" action="{{ route('login') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-8 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Login--}}
                                {{--</button>--}}

                                {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                    {{--Forgot Your Password?--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
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
<body class="min-h-fullscreen bg-img center-vh p-20 pace-done" style="background-image: url({{ asset('img/meeting-fmfg-bg.jpg') }});" data-overlay="7">
<div class="row min-h-fullscreen center-vh p-20 m-0">
    <div class="col-12">

        @if ($errors->has('register-success'))
            <div class="col-md-4 offset-md-4">
            <div class="callout callout-success" role="alert">
                <h5>Register done!</h5>
                <p class="text-info">{{ $errors->first('register-success') }}</p>
            </div>
        </div>

            @elseif ($errors->has('change-pass-success'))
                <div class="col-md-4 offset-md-4">
                    <div class="callout callout-success" role="alert">
                        <h5>Change Password done!</h5>
                        <p class="text-info">{{ $errors->first('change-pass-success') }}</p>
                    </div>
                </div>

        @endif

        <div class="card card-shadowed px-50 py-30 w-400px mx-auto" style="max-width: 100%">

            <br>
            <div class="text-center">
                <img src="{{ asset('img/yarisativ-logo.jpg') }}" style="width: 200px;height: 150px">
            </div>
            {{--<h5 class="text-uppercase text-primary text-center">Sign in</h5>--}}
            <br>
            <br>


            <form class="form-type-material" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" id="code" name="code" required autofocus>
                    @if ($errors->has('code'))
                    <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('code') }}</strong>
                    </span>
                    @endif
                    <label for="code">หมายเลขสมาชิก</label>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" id="password" name="password" required>
                    @if ($errors->has('password'))
                    <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    <label for="password">รหัสผ่าน</label>
                </div>

                <div class="form-group flexbox flex-column flex-md-row">

                    <a class="text-info fs-13 mt-2 mt-md-0" href="{{'./register'}}">ลงทะเบียน</a>
                    <a class="text-info fs-13 mt-2 mt-md-0" href="{{'./search-member'}}">ลืมหมายเลขสมาชิก</a>

                </div>


                <div class="form-group">
                    <button class="btn btn-bold btn-block btn-primary" type="submit">เข้าสู่ระบบ</button>
                </div>
            </form>




    </div>
  </div>
</div>



<!-- Scripts -->

<script src="{{ asset('js/core.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/script.min.js') }}"></script>
</body>
</html>

{{--@endsection--}}