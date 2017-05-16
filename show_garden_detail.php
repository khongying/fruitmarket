<?php
session_start();
require'condatabase/conDB.php';

$g_id = $_GET['g_id'];

$sql="SELECT * FROM `hire_garden` WHERE `id`='$g_id' AND `status`='A'";
$result=getpdo($con,$sql,1);
    foreach ($result as $row) {
    	$name   = $row['name'];
    	$detail   = $row['detail'];
    	$img1  = $row['img_pro'];
    	$img2  = $row['img_1'];
    	$img3  = $row['img_2'];
    	$price  = $row['price'];
    	$phone  = $row['phone'];
    	$line = $row['line'];

    }
?>

<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Market | <?=$name?></title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/travel.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="logo/groceries.png">
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk8hXfb10orcATx1g2cvRT3V0s5mIc01o&libraries=places"></script> -->
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <style type="text/css">
      body{
        font-family: 'Itim', cursive;
        }
    	#page{
    		padding-top:100px;
    	}
    	#line{
    		line-height : 1.5;
    		text-indent:50px;
    	}
      #map {
        height: 400px;
        width: 900px;
       }
	</style>
</head>


<body>
	<div id="page">
		<?php include'navbar.php'; ?>

			<div class="container">
				<div class="row" align="left">
				<div class="col-md-5">
				<h2 align="center"><font color="#228B22"><?php echo $name; ?></font></h2><hr/>
				<h4><p id="line"><font color="330066"><?php echo $detail;?></font></p></h4>
				<h4><p><font color="#233142"><label><img src="logo/tag.png"> ราคาค่าเช่า : </label> <?= number_format($price,2) ?> บาท/ปี</font></p></h4>

				<h4><p><font color="#233142"><label><img src="logo/viber.png"> เบอร์โทรศัพท์ : </label> <?= $phone ?></font></p></h4>

				<h4><p><font color="#233142"><label><img src="logo/line.png"> ID - LINE : </label> <?= $line ?></font></p></h4>

				<a class="btn btn-info" href="show_hire_garden.php"><img src="logo/left-arrow.png" /> กลับ</a>

				</div>
				<div class="col-md-7">
					<div class="carousel slide article-slide" id="article-photo-carousel">
						<div class="carousel-inner cont-slider">
							<div class="item active">
								<img alt="" title="" src="backend/hire_garden/<?php echo $img1;?>" style="width:600px; height:400px;">
							</div>
							<div class="item">
								<img alt="" title="" src="backend/hire_garden/<?php echo $img2;?>" style="width:600px; height:400px;">
							</div>
							<div class="item">
								<img alt="" title="" src="backend/hire_garden/<?php echo $img3;?>" style="width:600px; height:400px;">
							</div>
						</div>
						<ol class="carousel-indicators">
							<li class="active" data-slide-to="0" data-target="#article-photo-carousel">
								<img src="backend/hire_garden/<?php echo $img1;?>">
							</li>
							<li class="" data-slide-to="1" data-target="#article-photo-carousel">
								<img src="backend/hire_garden/<?php echo $img2;?>">
							</li>
							<li class="" data-slide-to="2" data-target="#article-photo-carousel">
								<img src="backend/hire_garden/<?php echo $img3;?>">
							</li>
						</ol>
					</div>
				</div>
				
				</div>
			</div>
	</div>


    <?php
    require'footer.php';
    ?>
</body>
</html>
