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
                <a href="mangosteen.php"><label id="name" style="font-size: 24pt;">ต้นมังคุด (Mangosteen)</label></a>
              </div>
              <div class="col-md-2" id="back">
                <a href="recommend.php" class="btn btn-info" style="right: 10px;">กลับ</a>
              </div>
            </div>
            <!-- <br> -->
            <div class="row"><br><br>
              <?php
                   include 'sidebar_mangosteen.php';
               ?>

                 <div class="col-md-10">
                    <div id="detail">
                      <div class="col-md-offset-2 col-md-10"><br>
                        <center><img class="photo" src="mangosteen/m6.jpg"></center><br>
                        <label class="top">มังคุด (Mangosteen)</label>
                        มังคุดเป็นราชินีผลไม้ที่ชาวสวนนิยมปลูกร่วมกับทุเรียน  มังคุดหยั่งรากลึกช่วยยึดตลิ่งได้ดี  มักปลูกที่แคมร่องสวน  เมื่อโตเต็มที่ต้นจะสูง 10-13 เมตร  กิ่งแผ่สูงขึ้นเป็นทรงฉัตร  ผลสุกเต็มที่จะเป็นสีม่วงเข้มและเนื้อสีขาวสวย รสชาติหวานอมเปรี้ยว  มังคุดมีพันธุ์พื้นเมืองเพียงพันธุ์เดียว แต่ถ้าปลูกต่างบริเวณกันอาจมีความผันแปรไปได้บ้าง โดยมังคุดในแถบภาคกลางหรือมังคุดเมืองนนท์ จะมีลักษณะผลเล็ก ขั้วยาว เปลือกบาง แตกต่างจากมังคุดทางใต้ที่ผลใหญ่กว่า ขั้วผลสั้น เปลือกหนากว่า  มังคุดสามารถขยายพันธุ์ได้ด้วยวิธีการเพาะเมล็ด ตอนกิ่ง และเสียบยอด   มังคุดที่สวนตาก้านจำหน่ายจะเป็นมังคุดเพาะเมล็ด เนื่องจาก มีความแข็งแรงกว่ามังคุดเสียบยอดและมีอายุที่ยืนยาวกว่า 
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
