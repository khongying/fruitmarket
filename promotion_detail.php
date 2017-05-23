<?php
        require'condatabase/conDB.php';
        session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Fruit Market</title>
    <link rel="shortcut icon" type="image/png" href="logo/groceries.png">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/step.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
    #page{
		    padding-top:55px;
	 }
   #show{
    background-color: #F6F6F6;
   }
   label#title{
    font-size: 30pt;
    color: red;
   }
</style>
<body>

<div id="page">

    <?php include'navbar.php'; ?>

        <div class="container" id="show">
              <div class="row">
                 <div class="col-md-offset-2">
                 <?php
                 $sql = "SELECT * FROM `news_promotion` WHERE `id` ='{$_GET['id']}'";
                 $result=getpdo($con,$sql,1);
                    foreach ($result as $row ) {
                ?>
                <div class="form-group">
                  <div class="col-md-offset-1 col-md-10">
                    <label id="title">[ <?= $row['name_title'] ?> ]</label><br>
                    <img src="backend/news_promotion/<?= $row['img'] ?>">
                    <?= $row['detail'] ?>
                </div>

                <?php
                    }
                ?>
                 </div>     
              </div>
        </div>
</div>

  <?php
  include 'footer.php';
  ?>

<script>
$("#index").attr({
        "class" : "active"
    });
</script>
</body>
</html>
