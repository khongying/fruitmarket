<?php
$host="localhost";
$username="root";
$password="";
$DBname="fruitmarket";
$con=mysqli_connect($host,$username,$password,$DBname);
mysqli_set_charset($con,"utf8");

?>

<html>
  <head>
  	<meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Home | Fruit Market</title>
      <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
      <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
      <script src="sweetalert-master/dist/sweetalert.min.js"></script>
      <script type="text/javascript" src="jquery.js"></script>
      <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  </head>
  <style type="text/css">
    	body{
          font-family: 'Itim', cursive;
        }
    #page{
    		padding-top:100px;
    	}
  </style>
  <body>
      <div id="page">
        <?php include'navbar.php'; ?>

            <div class="container">


            	<div class="row form-group">
                    <div class="col-xs-12">
                        <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                            <li class="active">
                                <a href="#step-1">
                                  <h4 class="list-group-item-heading">Step 1</h4>
                                  <p class="list-group-item-text">ยืนการสั่งซื้อ</p>
                                </a>
                            </li>
                            <li class="disabled">
                                <a href="#step-2">
                                  <h4 class="list-group-item-heading">Step 2</h4>
                                  <p class="list-group-item-text">ข้อมูลการจัดส่ง</p>
                                </a>
                            </li>
                            <li class="disabled">
                                <a href="#step-2">
                                  <h4 class="list-group-item-heading">Step 3</h4>
                                  <p class="list-group-item-text">แจ้งชำระสินค้า</p>
                                </a>
                            </li>
                        </ul>
                    </div>
            	</div>

            <div class="row setup-content" id="step-1">
                <div class="col-md-12 ">
                  <div class="col-md-offset-2 col-md-8 well">
                      <h1>รายการสินค้า</h1>
                      
                  </div>
                  </div>
                  <div class="col-md-12 ">
                    <button class="btn btn-success">ขั้นตอนไป</button>
                  </div>
            </div>



            </div>
      </div>
  </body>
</html>
