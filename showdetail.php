<?php
require'condatabase/conDB.php';

$p_id = $_GET['p_id'];

$sql="SELECT * FROM `product` WHERE `id`='$p_id '";
$result=getpdo($con,$sql,1);
    foreach ($result as $row) {
    	$code   = $row['code'];
    	$name   = $row['name'];
		$img 	= $row['img'];
		$price 	= $row['price'];
    	$detail = $row['detail'];
    }
?>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Fruit Market</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
	#page{
		padding-top:100px;
	}
	#line{
		line-height : 1.5;
	}
	</style>
</head>
<body>
	<div id="page">
		<?php include'navbar.php'; ?>


			<!-- start show product detail -->
			<div class="container">
			<div class="row" align="left">
			<div class="col-xs-12 col-sm-4 col-md-4">
			<img src="backend/product/<?php echo $img;?>" width="100%" class="img-thumbnail">
			</div>

			<div class="col-xs-12 col-sm-8 col-md-8">
			<!-- show product detail -->
			<h3><b><?php echo $code;?></b><br/></h3>
			<h4>ชื่อสินค้า : <?php echo $name;?><br/></h4>
			<h4 id="line">รายละเอียดสินค้า : <?php echo $detail;?></h4>
			<hr/>
			<h2>
			<font color="#0000FF">฿<?php echo number_format($price,2); ?></font>
			<font color="#00FF00">มีสินค้า</font>
			</h2>
			<hr/>
			<a class="btn btn-primary"><i class="glyphicon glyphicon-shopping-cart"></i> ใส่ตะกร้าสินค้า</a>
			<a href="index.php" class="btn btn-success"><i class="glyphicon glyphicon-arrow-left"></i> กลับไปหน้าหลัก</a>



			</div>


			</div>
			</div>
			<!-- end show product detail -->
	</div>
</body>
</html>
