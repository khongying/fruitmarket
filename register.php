<html>
    <header>
        <title>Register| Fruit Market</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" type="image/png" href="logo/groceries.png">
        <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
        <!-- <script type="text/javascript" src="jquery.js"></script> -->
        <script src="sweetalert-master/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </header>
<style type="text/css">
    #page{
        padding-top: 50px;
    }
    body{
      font-family: 'Itim', cursive;
    }
</style>

    <body>

    <?php include'navbar.php'; ?>

        <div id="page" class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="form-register">
                        <center>
                            <h1>สมัครสมาชิก</h1><br/>
                        </center>
                        <form class="form-horizontal" name="register" action="add_register.php" method="POST" onSubmit="return chkfrom();">
                            <div class="form-group">
                                <label class="control-label col-sm-4">อีเมลล์</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" placeholder="กรุณาใส่อีเมลล์">
                                </div>
                            </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">รหัสผ่าน</label>
                            <div class="col-sm-8">
                                <input type="password" name="password" id="password" pattern="[\SA-๙]{6,}" title="อย่างน้อย 6 ตัวอักษร รวมทั้งตัวเลข" class="form-control" pattern="{6}" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4">ใส่รหัสผ่านอีกครั้ง</label>
                            <div class="col-sm-8">
                                <input type="password" name="confirm_password" id="confirm_password" pattern="[\SA-๙]{6,}" title="อย่างน้อย 6 ตัวอักษร รวมทั้งตัวเลข" class="form-control" />
                                <span id='message'></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4">เพศ</label>
                            <div class="col-sm-8">
                                <label class="radio-inline"><input type="radio" name="sex" value="M" checked>ชาย</label>
                                <label class="radio-inline"><input type="radio" name="sex" value="F">หญิง</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4">วันเกิด</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="date">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4">ชื่อ และ นามสกุล</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="fullname" placeholder="กรุณาใส่ชื่อ และ นามสกุล">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4">ที่อยู่</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="address"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4">เบอร์โทรศัพท์</label>
                            <div class="col-sm-8">
                                <input type="text" name="phone" id="phone" class="form-control" max="13">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-4">จดหมายข่าว</label>
                            <div class="col-sm-8">
                            <label class="checkbox-inline"><input type="checkbox" name="news" value="T"> ฉันต้องการรับข้อเสนอทางอีเมล</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-info"><img src="logo/clipboard.png" />  สมัครสมาชิก</button>
                            </div>
                        </div>

                        </form>

                    </div>
                    <hr/>
                    <footer class="footer">
                        <p>&copy; BSRU 2017</p>
                    </footer>
                 </div>
            </div>
        </div>

    </body>

</html>
<script type="text/javascript">

$('#phone').mask('000-000-0000');

$('#password, #confirm_password').on('keyup', function () {
    if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('<i class="fa fa-check fa-lg"></i> รหัสผ่านตรงกัน').css('color', 'green');
    } else
        $('#message').html('<i class="fa fa-times fa-lg"></i> รหัสผ่านไม่ตรงกัน').css('color', 'red');
});

    function chkfrom()
    {
        if(document.register.email.value=="")
        {
            swal("กรุณากรองอีเมลล์", " ", "warning");
            document.register.email.focus();
            return false;
        }

        if(document.register.password.value=="")
        {
            swal("กรุณากรองรหัสผ่าน", " ", "warning");
            document.register.password.focus();
            return false;
        }

        if(document.register.confirm_password.value=="")
        {
            swal("กรุณากรองยืนยันรหัสผ่าน", " ", "warning");
            document.register.confirm_password.focus();
            return false;
        }

        if(document.register.confirm_password.value != document.register.password.value)
        {
            swal("รหัสผ่านไม่ตรงกัน", " ", "warning");
            document.register.confirm_password.focus();
            return false;
        }

    }
</script>
