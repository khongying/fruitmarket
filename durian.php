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
                <a href="durian.php"><label id="name" style="font-size: 24pt;">ทุเรียน (Durian)</label></a>
              </div>
              <div class="col-md-2" id="back">
                <a href="recommend.php" class="btn btn-info" style="right: 10px;">กลับ</a>
              </div>
            </div>
            <!-- <br> -->
            <div class="row"><br><br>
              <?php
                   include 'durian/sidebar_durian.php';
               ?>

                 <div class="col-md-10">
                    <div id="detail">
                      <div class="col-md-offset-2 col-md-10"><br>
                        <center><img class="photo" src="durian/d1.jpg"></center><br>
                        <label class="top">ทุเรียน (Durian)</label>
                        ได้รับการยกย่องว่าเป็น “ราชาผลไม้” และเคยมีคนกล่าวไว้ว่า “กลิ่นราวนรก รสชาติเหมือนสวรรค์” เนื่องมาจากกลิ่นรุนแรงเฉพาะตัวของทุเรียน ที่เกิดจากสารหอมระเหยอย่างเอสเทอร์คีโทน และสารประกอบซัลเฟอร์หลายชนิด เป็นกลิ่นที่คนรักทุเรียนจะบอกว่าหอมหวานน่ากิน แต่สำหรับคนที่ไม่ชอบ เพียงแค่ได้กลิ่นเล็กน้อยก็แทบทนไม่ได้ ทว่ารสชาติชาติที่หวานมันของเนื้อทุเรียนก็ทำให้บางคนมองข้ามกลิ่นที่ร้ายกาจไปได้ ทุเรียนจึงเป็นหนึ่งในผลไม้อันดับต้น ๆ ที่ผู้คนชื่นชอบ <br>

                        <label class="top">เส้นใยอาหารมีมากในเนื้อทุเรียน </label> จะช่วยทำความสะอาดให้กับลำไส้ มีวิตามินซีสูง ต่อต้านอนุมูลอิสระ เสริมสร้างภูมิคุ้มกัน มีโพแทสเซียม ช่วยระดับน้ำในร่างกายและเซลล์ให้ปกติสมดุล มีแคลเซียม มีแมกนีเซียม ช่วยบำรุงกระดูกและฟัน ยังมีกรดอะมิโนทริปโตเฟน มีประโยชน์ต่อร่างกายมาก เพราะจะช่วยให้หลับง่าย ลดความซึมเศร้า ช่วยป้องกันความผิดปกติของสารเคมีในร่างกาย ลดความเสี่ยงต่อไมเกรน ลดความเครียด ในขณะเดียวกันเนื้อทุเรียนมีน้ำตาลและคาร์โบไฮเดรตมาก จึงไม่ส่งผลดีต่อผู้ที่เป็นโรคเบาหวาน หรือที่กำลังควบคุมน้ำหนัก หรือควบคุมน้ำตาล
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
