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
                <a href="rambutan.php"><label id="name" style="font-size: 24pt;">เงาะ (Rambutan)</label></a>
              </div>
              <div class="col-md-2" id="back">
                <a href="recommend.php" class="btn btn-info" style="right: 10px;"><img src="logo/left-arrow.png" /> กลับ</a>
              </div>
            </div>
            <!-- <br> -->
            <div class="row"><br><br>
              <?php
                   include 'rambutan/sidebar_rambutan.php';
               ?>

                 <div class="col-md-10">
                    <div id="detail">
                      <div class="col-md-offset-2 col-md-10"><br>
                        <center><img class="photo" src="rambutan/r1.jpg"></center><br>
                        <label class="top">เงาะ (Rambutan)</label>
                        เงาะเป็นไม้ผลยืนต้นขนาดกลางถึงใหญ่ เป็นไม้ผลเมืองร้อน เจริญเติบโตได้ดีในที่ที่มีความชื้นค่อนข้างสูง แต่ไม่มีน้ำท่วมขัง ควรเลือกแหล่งปลูกที่มีน้ำเพียงพอตลอดปี มีอุณหภูมิที่เหมาะสมประมาณ 25-30 องศาเซลเซียส มีปริมาณน้ำฝนมากกว่า 1,500 มิลลิเมตรต่อปี มีความชื้นในอากาศสูง เงาะมีถิ่นกำเนิดจากประเทศอินโดนีเซีย และมาเลเซีย ในประเทศไทยมักนิยมปลูกเงาะกันมากในทางภาคตะวันออก และทางภาคใต้ ซึ่งมีอยู่หลายสายพันธุ์ เช่น พันธุ์สีทอง พันธุ์น้ำตาลกรวด พันธุ์สีชมพู พันธุ์โรงเรียน และพันธุ์เจ๊ะมง เป็นต้น ส่วนพันธุ์ที่นิยมปลูกเป็นการค้า เช่น พันธุ์โรงเรียน พันธุ์สีทอง และพันธุ์สีชมพู ส่วนพันธุ์อื่นๆ อาจมีปลูกกันบ้างประปรายเพื่อการบริโภคในครัวเรือน หรือเพื่อประโยชน์ในด้านการศึกษาทางวิชาการ ลักษณะดินที่ใช้ปลูกต้องเป็นดินร่วนปนทราย มีความอุดมสมบูรณ์สูง ระบายน้ำได้ดี มีค่าความเป็นกรด-ด่าง ประมาณ 5.0-5.7
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
