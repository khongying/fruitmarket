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
    <link href="bootstrap/css/profile.css" rel="stylesheet">
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
                <div class="row profile">
            		<div class="col-md-3">
            			<div class="profile-sidebar">
            				<!-- SIDEBAR USERPIC -->
            				<!-- END SIDEBAR USERPIC -->
            				<!-- SIDEBAR USER TITLE -->
            				<div class="profile-usertitle">
            					<div class="profile-usertitle-name">
            						Marcus Doe
            					</div>
            					<div class="profile-usertitle-job">
            						Developer
            					</div>
            				</div>
            				<!-- END SIDEBAR USER TITLE -->


            				<!-- SIDEBAR MENU -->
            				<div class="profile-usermenu">
            					<ul class="nav">
            						<li class="active">
            							<a href="#">
            							<i class="glyphicon glyphicon-home"></i>
            							ข้อมูลส่วนตัว </a>
            						</li>
            						<li>
            							<a href="#">
            							<i class="glyphicon glyphicon-user"></i>
            							ประวัติการสั่งซื้อ </a>
            						</li>
            					</ul>
            				</div>
            				<!-- END MENU -->
            			</div>
            		</div>
            		<div class="col-md-9">
                        <div class="profile-content">
            			   Some user related content goes here...
                        </div>
            		</div>
            	</div>
            </div>
						<?php
					  include 'footer.php';
					  ?>
            <br>
            <br>
    </div>
  </body>
</html>
