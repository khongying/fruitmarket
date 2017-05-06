<?php
		session_start();
		require 'condatabase/conDB.php';
		if ($_SESSION['id'] === $_GET['user']) {
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
		padding-top:50px;
	}
</style>
<body>

<div id="page">

    <?php require'navbar.php'; ?>

		<?php

				$user_id = $_GET['user'];
				$sql = "SELECT * FROM `users` WHERE `id`='{$user_id}'";

				$data = getpdo($con,$sql,1);
				foreach ($data as $row) {
				?>

            <div class="container">
                <div class="row profile">
            		<div class="col-md-3">
            			<div class="profile-sidebar">
            				<!-- SIDEBAR USERPIC -->
            				<!-- END SIDEBAR USERPIC -->
            				<!-- SIDEBAR USER TITLE -->
            				<div class="profile-usertitle">
            					<div class="profile-usertitle-name">
            						<?=$row['fullname']?>
            					</div>
            					<div class="profile-usertitle-job">
            						<?=$row['email']?>
            					</div>
            				</div>
            				<!-- END SIDEBAR USER TITLE -->


            				<!-- SIDEBAR MENU -->
            				<div class="profile-usermenu">
            					<ul class="nav">
            						<li class="active">
            							<a href="profile.php?<?=$_SESSION['id']?>">
            							<img src="logo/id-card.png" />
            							ข้อมูลส่วนตัว </a>
            						</li>
            						<li>
            							<a href="history_qt.php?user=<?=$_SESSION['id']?>">
            							<img src="logo/list.png" />
            							ประวัติการสั่งซื้อ </a>
            						</li>
            					</ul>
            				</div>
            				<!-- END MENU -->
            			</div>
            		</div>
            		<div class="col-md-9">
                    <div class="profile-content">
					<div class="row">
						<div>
							<h1 id="profile_name"><i class="fa fa-user-circle-o fa-lg"></i>  โปรไฟล์</h1><hr/>
						</div>
							<div class="col-md-offset-2 col-md-7">
								<div class="form-register">
									<form class="form-horizontal" name="register" action="update_profile.php" method="POST" onSubmit="return chkfrom();">
									<div class="form-group">
										<label class="control-label col-sm-4">อีเมลล์</label>
										<div class="col-sm-8">
												<input type="email" class="form-control" name="email" value="<?=$row['email']?>">
										</div>
									</div>
									<div class="form-group">
											<label class="control-label col-sm-4">วันเกิด</label>
											<div class="col-sm-8">
													<input type="date" class="form-control" name="date" value="<?=$row['birthday']?>">
											</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-4">ชื่อ และ นามสกุล</label>
										<div class="col-sm-8">
										<input type="text" class="form-control" name="fullname" value="<?=$row['fullname']?>">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-4">ที่อยู่</label>
										<div class="col-sm-8">
										<textarea class="form-control" name="address"><?=$row['address']?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-4">เบอร์โทรศัพท์</label>
										<div class="col-sm-8">
										<input type="text" name="phone" class="form-control" value="<?=$row['phone']?>">
										</div>
									</div>

									<div class="form-group">
											<div class="col-sm-offset-4 col-sm-8">
												<button type="submit" class="btn btn-warning"><img src="logo/writing.png" /> แก้ไข</button>
											</div>
									</div>

									</form>

								</div>
							 </div>

                        </div>
            		</div>
            	</div>
            </div>

						<?php } ?>
						<?php
					  include 'footer.php';
					  ?>
            <br>
            <br>
    </div>
  </body>

</html>

<?php
		}else {
			Header("Location: 404_error.php");
		}
?>
