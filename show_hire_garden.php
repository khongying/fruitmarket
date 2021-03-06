 <?php
        session_start();
        require 'condatabase/conDB.php';
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
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
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
		padding-top:20px;
	}
    #show{
        padding-top:50px;
    }

</style>
<body>

<div id="page">
    <?php include'navbar.php'; ?>

        <div class="container" id="show">
        	 <h2><label id="name"><img src="logo/tractor.png"> เช่าสวนผลไม้ ณ เมืองจันทร์ </label></h2>
               <div class="row">
                 <?php
                      include 'sidebar.php';
                  ?>

                    <div class="col-md-10">
                       <?php
                            include'list_hire_garden.php';
                       ?>
                    </div>
                </div>
        </div>

</div>
<?php
include 'footer.php';
?>
<script>
$("#hire").attr({
        "class" : "active"
    });
</script>
</body>
</html>
