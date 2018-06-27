<div class="form-group">
    <input type="email" class="form-control" id="email" name="email" required>
    <label for="email" style="font-weight: bold;">อีเมลล์</label>
</div>

<div class="form-group">
    <input type="password" class="form-control" id="password" name="password" required>
    <label for="password-conf" style="font-weight: bold;">รหัสผ่าน</label>
</div>


<div class="form-group">
    <input type="password" class="form-control" id="password-conf" required>
    <label for="password-conf" style="font-weight: bold;">รหัสผ่าน (ยืนยัน)</label>
</div>

<div class="form-group">
    <input type="text" class="form-control" id="first-name" name="first-name" required>
    <label for="first-name" style="font-weight: bold;">ชื่อ</label>
</div>

<div class="form-group">
    <input type="text" class="form-control" id="last-name" name="last-name" required>
    <label for="last-name" style="font-weight: bold;">นามสกุล</label>
</div>

<div class="form-group">
    <input type="text" class="form-control" id="nick-name" name="nick-name" required>
    <label for="nick-name" style="font-weight: bold;">ชื่อเล่น</label>
</div>

<br>

<label style="font-weight: bold;">เพศ</label>

<div class="custom-controls-stacked" required >
    <label class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" name="radio-gender" value="MALE">
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description">ชาย</span>
    </label>

    <label class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" name="radio-gender" value="FEMALE">
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description">หญิง</span>
    </label>

</div>

<br>

<div class="form-group">
    <input type="text" id="birthday" name="birthday" class="form-control" data-provide="datepicker" data-date-today-highlight="true">
    <label for="birthday" style="font-weight: bold;">วันเกิด</label>
</div>

<div class="form-group">
    <input type="number" name="telephone" class="form-control" id="telephone" required>
    <label for="telephone" style="font-weight: bold;">เบอร์ติดต่อ</label>
</div>

<div class="form-group">
    <input type="text" name="facebook" class="form-control" id="facebook">
    <label for="telephone" style="font-weight: bold;">facebook</label>
</div>

<br>

<label style="font-weight: bold;">ชนิดของ LINE</label>

<div class="custom-controls-stacked" required >
    <label class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" name="radio-line-id-type" value="LINE_ID">
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description">Line ID</span>
    </label>

    <label class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" name="radio-line-id-type" value="PHONE_NUMBER">
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description">Phone Number</span>
    </label>

</div>

<br>

<div class="form-group" required>
    <input type="text" name="line" class="form-control" id="line">
    <label for="line" style="font-weight: bold;">LINE ID</label>
</div>



<br>
<button class="btn btn-block btn-primary" onclick="nextState()">ดำเนินการต่อ</button>