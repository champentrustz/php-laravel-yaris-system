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
<div class="container">

        {{--<div class="gap-items-2 gap-y">--}}
            {{--<a class="btn btn-primary" href="{{ asset('data/loader-1.html') }}" data-provide="loader" data-target="#loader-target">Link element</a>--}}
            {{--<button class="btn btn-primary" data-provide="loader" data-url="{{ asset('data/loader-2.html') }}" data-target="#loader-target">Button element</button>--}}
            {{--<button class="btn btn-primary" data-provide="loader" data-url="{{ asset('data/loader-3.html') }}" data-target="#loader-target" data-spinner="<div class=&quot;spinner-circle mx-auto&quot;></div>">Using data-spinner</button>--}}
        {{--</div>--}}


        {{--<br><br>--}}
        {{--<div  id="loader-target">Click above buttons to load content here</div>--}}



            <div class="row min-h-fullscreen center-vh p-20 m-0">



                <div class="col-md-8 md-offset-2">


                    <div class="callout callout-danger" role="alert">
                        <h4 class="text-danger">ลงทะเบียนสมาชิก</h4>
                        ยินดีต้อนรับเข้าสู่ Yaris ATIV 2017 Club
                        <br>
                        <span class="text-danger">*</span> สมัครฟรีตลอดชีพ <span class="text-danger">*</span>
                        <br>

                        การลงทะเบียนคลับนี้มีความประสงค์ให้สมาชิกคลับทุกท่านสามารถติดต่อกันได้สะดวกขึ้น โดยไม่มีค่าใช้จ่ายใดๆ ทั้งสิ้น
                        <br>

                        <span class="text-danger">*</span>กิจกรรมใดที่มีค่าใช้จ่ายทางคลับจะแจ้งล่วงหน้า
                        <br>

                        ทั้งนี้คลับสร้างขึ้นเพื่อให้เกิดการแชร์ประสบการณ์การใช้รถ Yaris ATIV และช่วยเหลือกันในเวลาคับขันเมื่อเกิดปัญหาฉุกเฉินจะได้ช่วยเหลือกันได้ในระยะทางที่ใกล้เคียง พร้อมทั้งร่วมกิจกรรม รับส่วนลด และสิทธิพิเศษมากมายจากทางคลับและร้านค้าร่วมรายการ
                        <br>

                        สำหรับหมายเลขรับสติกเกอร์คลับจะรันตามลำดับเลขที่ลงทะเบียนเข้ามาในคลับ
                        <br>

                        คลับนี้จะไม่รับผิดชอบใดๆ ต่อการกระทำผิดของสมาชิกคลับอันก่อให้เกิดความเสียหายต่างๆ อันผิดต่อสถาบันชาติ ศาสนา พระมหากษัตริย์ คุณธรรมและจริยธรรมอันดีงาม และกฎหมาย
                        <br>
                        ข้อมูลของท่านจะไม่ถูกเปิดเผยสู่สาธารณะโดยไม่ได้รับอนุญาต ยกเว้นพบว่ามีการกระทำผิดกฎหมายหรือมีหมายศาลเพื่อดำเนินคดีความ
                        <br>

                        หากต้องการแจ้ง/ร้องเรียนสมาชิกคลับได้ที่
                        <br>
                        - Line Official: @dbp1258i
                        <br>
                        - Facebook: <a href="https://www.facebook.com/YarisATIV2017Club" target="_blank">fb.com/YarisATIV2017Club</a>
                        <br>
                    </div>






                    <form class="form-type-material" method="POST" action="{{ route('register') }}">

                    <div class="card ">


                        <div class="card-header ">
                            <h4 class="card-title text-info"><span class="fa fa-user"></span> ข้อมูลทั่วไป</h4>
                        </div>




                                <div class="card-body">




                                    {{ csrf_field() }}


                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        <label for="email" style="font-weight: bold;">อีเมล์</label>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input type="password" class="form-control" id="password" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                        <label for="password-conf" style="font-weight: bold;">รหัสผ่าน (อย่างน้อย 6 ตัว)<span class="text-danger">*</span></label>
                                    </div>


                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
                                        <label for="password-confirm" style="font-weight: bold;">รหัสผ่าน (ยืนยัน) <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="title-name" name="title_name" value="{{ old('title_name') }}" required>
                                        <label for="title-name" style="font-weight: bold;">คำนำหน้า <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="first-name" name="first_name" value="{{ old('first_name') }}" required>
                                        <label for="first-name" style="font-weight: bold;">ชื่อ <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="last-name" name="last_name" value="{{ old('last_name') }}" required>
                                        <label for="last-name" style="font-weight: bold;">นามสกุล <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="nick-name" name="nick_name" value="{{ old('nick_name') }}" required>
                                        <label for="nick-name" style="font-weight: bold;">ชื่อเล่น <span class="text-danger">*</span></label>
                                    </div>

                                    <br>

                                    <label style="font-weight: bold;">เพศ</label>

                                    <div class="custom-controls-stacked" >
                                        <label class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="gender" value="MALE" required>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">ชาย</span>
                                        </label>

                                        <label class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="gender" value="FEMALE" required>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">หญิง</span>
                                        </label>

                                    </div>

                                    <br>

                                    <label style="font-weight: bold;">วันเกิด</label>

                                    <div class="form-group">
                                        <div class="row">
                                        <div class="col-md-2">
                                        <select class="form-control" id="day" name="day"  >
                                            <option value="{{null}}" readonly selected>วัน</option>
                                            @for($i=1;$i<=31;$i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                         </div>
                                        <div class="col-md-2">
                                        <select class="form-control" id="month" name="month" >
                                            <option value="{{null}}" readonly selected>เดือน</option>
                                            @for($i=1;$i<=12;$i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                            </select>
                                        </div>
                                         <div class="col-md-4">
                                            <select class="form-control" id="year" name="year" >
                                                <option value="{{null}}" readonly selected>ปี</option>
                                                @for($i=\Carbon\Carbon::now()->format('Y') + 543 - 100;$i<=\Carbon\Carbon::now()->format('Y') + 543;$i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor

                                            </select>
                                         </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <input type="number" name="telephone" class="form-control" id="telephone" value="{{ old('telephone') }}"  required>
                                        <label for="telephone" style="font-weight: bold;">เบอร์ติดต่อ <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="facebook" class="form-control" value="{{ old('facebook') }}"  id="facebook">
                                        <label for="telephone" style="font-weight: bold;">Facebook</label>
                                    </div>

                                    <br>

                                    <label style="font-weight: bold;">ชนิดของ LINE <span class="text-danger">*</span></label>

                                    <div class="custom-controls-stacked" >
                                        <label class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="line_id_type" value="LINE_ID" required>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Line ID</span>
                                        </label>

                                        <label class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="line_id_type" value="PHONE_NUMBER" required>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Phone Number</span>
                                        </label>

                                    </div>

                                    <br>

                                    <div class="form-group">
                                        <input type="text" name="line_id" class="form-control" id="line" value="{{ old('line_id') }}"  required>
                                        <label for="line" style="font-weight: bold;">LINE ID <span class="text-danger">*</span></label>
                                    </div>







                    </div>



                    </div>

                        <div class="card ">


                            <div class="card-header ">
                                <h4 class="card-title text-info"><span class="fa fa-home"></span> ข้อมูลที่อยู่</h4>
                            </div>




                            <div class="card-body">




                                <div class="form-group">
                                <input type="text" class="form-control" id="house-number" name="house_number" value="{{ old('house_number') }}" >
                                <label for="house-number" style="font-weight: bold;">บ้านเลขที่ <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-group">
                                <input type="text" class="form-control" id="village-number" name="village_number" value="{{ old('village_number') }}" >
                                <label for="village-number" style="font-weight: bold;">หมู่ที่ <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-group">
                                <input type="text" class="form-control" id="alley" name="alley" value="{{ old('alley') }}" >
                                <label for="alley" style="font-weight: bold;">ตรอก/ซอย <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-group">
                                <input type="text" class="form-control" id="road" name="road" value="{{ old('road') }}" >
                                <label for="road" style="font-weight: bold;">ถนน <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-group">
                                <input type="text" class="form-control" id="sub-district" name="sub_district" value="{{ old('sub_district') }}" >
                                <label for="sub-district" style="font-weight: bold;">แขวง/ตำบล <span class="text-danger">*</span></label>
                                </div>


                                <div class="form-group">
                                <input type="text" class="form-control" id="district" name="district" value="{{ old('district') }}" >
                                <label for="district" style="font-weight: bold;">เขต/อำเภอ <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-group">
                                <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" >
                                <label for="province" style="font-weight: bold;">จังหวัด <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-group">
                                <input type="text" class="form-control" id="country" name="country" value="ไทย" required>
                                <label for="country" style="font-weight: bold;">ประเทศ <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-group">
                                <input type="text" class="form-control" id="postal-code" name="postal_code" value="{{ old('postal_code') }}" >
                                <label for="postal-code" style="font-weight: bold;">รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                                </div>



                            </div>



                        </div>

                        <div class="card ">


                            <div class="card-header ">
                                <h4 class="card-title text-info"><span class="fa fa-car"></span> ข้อมูลรถยนต์</h4>
                            </div>




                            <div class="card-body">


                                <label style="font-weight: bold;">รถรุ่นหลัก <span class="text-danger">*</span></label>

                                <div class="custom-controls-stacked" >
                                <label class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="main_car_generation" value="YARIS_ATIV" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Yaris ATIV</span>
                                </label>

                                <label class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="main_car_generation" value="YARIS" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Yaris Hatchback</span>
                                </label>

                                </div>

                                <br>


                                <label style="font-weight: bold;">รถรุ่นรอง <span class="text-danger">*</span></label>



                                <div class="custom-controls-stacked"  >
                                <label class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="secondary_car_generation" value="S" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">S</span>
                                </label>

                                <label class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="secondary_car_generation" value="G" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">G</span>
                                </label>

                                <label class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="secondary_car_generation" value="E" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">E</span>
                                </label>

                                <label class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="secondary_car_generation" value="J" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">J</span>
                                </label>

                                <label class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="secondary_car_generation" value="J_ECO" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">J Eco</span>
                                </label>

                                </div>

                                <div class="form-group">
                                    <select class="form-control" id="color" name="color" required>
                                        <option value="BLACK">Attitude Black Mica</option>
                                        <option value="BLUE">Dark Blue Mica Metallic</option>
                                        <option value="GREEN">Citrus Mica Metallic</option>
                                        <option value="ORANGE">Orange Metallic</option>
                                        <option value="GREY">Grey Metallic</option>
                                        <option value="SILVER">Silver Metallic</option>
                                        <option value="BROWN">Quartz Brown Metallic</option>
                                        <option value="WHITE">Super White</option>
                                        <option value="RED">Red Mica Metallic</option>
                                    </select>
                                <label for="color" style="font-weight: bold;">สีรถ <span class="text-danger">*</span></label>
                                </div>

                                <label style="font-weight: bold;">รุ่นโฉม <span class="text-danger">*</span></label>

                                <div class="custom-controls-stacked"  >
                                <label class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="manufacture_year" value="2017" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">2017</span>
                                </label>


                                </div>


                            </div>


                        </div>

                        <button type="submit" class="btn btn-block btn-primary" >สมัครสมาชิก</button>

                    </form>
                    <p class="text-center text-muted fs-13 mt-20">หากคุณเคยลงทะเบียนแล้ว? <a class="text-primary fw-500" href="{{'./login'}}">เข้าสู่ระบบ</a></p>
                </div>

            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Register</div>--}}

                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" method="POST" action="{{ route('register') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                            {{--<label for="name" class="col-md-4 control-label">Name</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}

                                {{--@if ($errors->has('name'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

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
                            {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Register--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}

</div>



</div>

<script src="{{ asset('js/core.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/script.min.js') }}"></script>

</body>
</html>
