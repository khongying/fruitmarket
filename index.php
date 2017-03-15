<?php
        require'condatabase/conDB.php';
?>
<!DOCTYPE html>
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
    #show{
        padding-top:50px;
    }

</style>
<body>

<div id="page">

    <?php include'navbar.php'; ?>

        <div class="container">
        	 <div class="row">
                    <div class="col-md-8">
                    <!-- Carousel-->
                    <?php
                        include'carousel.php';
                    ?>
                    <!-- /.carousel -->

                    </div>
                    <div class="col-md-4">
                        <?php
                            include'content.php';
                        ?>
                    </div>

                </div>
        </div>

        <div class="container" id="show">
               <div class="row">
                   <div class="col-md-2">
                        <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#"><i class="fa fa-shopping-cart fa-lg"></i> สินค้า</a></li>
                        <li><a href="#">ประมูลผลไม้</a></li>
                        <li><a href="travel.php"><i class="glyphicon glyphicon-grain"></i> เยี่มชมสวนผลไม้</a></li>
                        <li><a href="#">เช่าสวนปลไม้</a></li>
                        <li><a href="#">Menu 3</a></li>
                        </ul>
                    </div>

                    <div class="col-md-10">
                       <?php
                            include 'showproduct.php';
                        ?>
                    </div>
                </div>
        </div>
</div>

  <?php
  include 'footer.php';
  ?>


</body>
</html>
