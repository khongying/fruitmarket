<?php
        require'condatabase/conDB.php';
        session_start();
?>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Fruit Market</title>
    <link rel="shortcut icon" type="image/png" href="logo/groceries.png">
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>

<style>
body{
    font-family: 'Itim', cursive;
  }
#page{
  padding-top:50px;
}
#name{
  color: #006C9A;
  font-weight:bold;
}
div#back{
  padding-left: 100px;
}
label.top{
    font-size: 18pt;
    text-indent: 3em;
}
  img.photo{
    width: 500px;
    height: 300px;
  }
</style>
<body>

  <div id="page">
      <?php include'navbar.php'; ?>


          <div class="container" id="show"><br>
            <div class="form-group">
              <div class="col-md-10">
                <a href="longkong.php"><label id="name" style="font-size: 24pt;">ลองกอง (Longkong)</label></a>
              </div>
              <div class="col-md-2" id="back">
                <a href="recommend.php" class="btn btn-info" style="right: 10px;"><img src="logo/left-arrow.png" /> กลับ</a>
              </div>
            </div>
            <!-- <br> -->
            <div class="row"><br><br>
              <?php
                   include 'longkong/sidebar_longkong.php';
               ?>

                 <div class="col-md-10">
                    <div id="detail">
                      <div class="col-md-offset-2 col-md-10"><br>
                        <center><img class="photo" src="longkong/l1.jpg"></center><br>
                        <label class="top">ลองกอง (Longkong)</label>
                        เลองกองเป็นผลไม้ที่เจริญเติบโตและให้ผลผลิตดีในสภาพภูมิอากาศร้อนชื้น มีผลทรงกลม ติดผลเป็นช่อ ผลสุกเปลือกสีเหลือง เนื้อในสีขาวใส แบ่งเป็นกลีบ รสหวานหรืออาจอมเปรี้ยวเล็กน้อย และเนื่องจากลองกองไม่สามารถเก็บมาบ่มให้สุกได้ จึงต้องเก็บจากต้นในระยะเวลาที่เหมาะสม คือหลังจากผลเริ่มเปลี่ยนจากสีเขียวเป็นสีเขียวอมเหลืองประมาณ 15-25 วัน เคล็บลับในการแกะเปลือกลองกองคือใช้เล็บจิกตรงกลางก้นผล เพราะเปลือกจะบางกว่าและมียางน้อยกว่าตรงขั้วผล แล้วจึงค่อยฉีกเปลือกออกตามแนวยาวไปยังขั้ว<br><br>

                        <p style="text-indent: 3em;">ลองกองเป็นผลไม้ที่นิยมกินผลสด มากกว่าจะนำไปแปรรูป คุณค่าสารอาหารที่จะได้รับจากการกินลองกอง ได้แก่ แคลเซียมและฟอสฟอรัสซึ่งจะทำงานร่วมกัน ช่วยให้กระดูกและฟันแข็งแรง จึงช่วยป้องกันสภาวะกระดูกพรุน วิตามินซีช่วยให้หลอดเลือดแข็งแรง กระตุ้นระบบภูมิคุ้มกัน และเป็นสารต้านอนุมูลอิสระ รวมถึงสารคาเทชินซึ่งเป็นสารโพลีฟีนอลที่มีคุณสมบัติช่วยลดอาการอักเสบและลดระดับคอเลสเตอรอล นอกจากนี้ลองกองยังมีแมกนีเซียม โพแทสเซียม ทองแดง รวมไปถึงเส้นใยอาหารด้วย<p>
                      </div>
                    </div>
                 </div>
             </div>
        </div>
</div>
<?php
include 'footer.php';
?>

<script>
$("#recommend").attr({
      "class" : "active"
  });
</script>
</body>
</html>
