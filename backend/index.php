<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login to Backend</title>
	<link rel="shortcut icon" type="image/png" href="logo/backend.png">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/index.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css" media="screen">
    	body{
		    font-family: 'Kanit', sans-serif;
		}
    	.form{
    		padding-top:150px;
    		padding-left: 100px;
    	}
    	body.background{
    		background-image: url("img/back.jpg");
    	}
    </style>
</head>
<body class="background">
<div class="container-fluid">
<?php
	if (isset($_GET['err'])) {
		if($_GET['err'] == 1){		
?>	

	<br>	
	<center>
		<div class="alert alert-danger alert-dismissable fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>เตือน!</strong> กรุณากรองข้อมูลให้ครบ
		</div>
		</center>
<?php	
		}
	}
?>
	<div class="form">
		<form action="login.php" method="post" name="login"  onSubmit="return chkfrom();">
			<div class="row">
				<div class="col-md-offset-4 col-md-3 ">
					<div class="form-login">
						<h4> <img src="logo/login.png" /> </h4>
						<h4>Welcome to Backend</h4>
						<input type="text" name="user" id="userName" class="form-control input-sm chat-input" placeholder="Username" />
						</br>
						<input type="password" name="pass" id="userPassword" class="form-control input-sm chat-input" placeholder="Password" />
						</br>
					
						<div class="wrapper">
							<span class="group-btn">
							<button type="submit" class="btn btn-primary btn-md">Login <img src="logo/loginnow.png" /></button>
							</span>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</body>

<script type="text/javascript">
	function chkfrom()
    {
        if($('#userName').val() =="" || $('#userPassword').val() ==""){
            window.location.href = "index.php?err=1";
            return false;
        }


    }
</script>
</html>
