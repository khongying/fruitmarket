<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login to Backend</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/index.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css" media="screen">
    	.form{
    		padding-top:200px;
    		padding-left:50px;
    	}
    </style>
</head>
<body class="background" style="background-color:#BCE0DA;">

	<div class="form">
		<form action="login.php" method="post">
			<div class="container">
			<div class="row">
			<div class="col-md-offset-5 col-md-3">
			<div class="form-login">
			<h4>Welcome</h4>
			<input type="text" name="user" id="userName" class="form-control input-sm chat-input" placeholder="Username" />
			</br>
			<input type="password" name="pass" id="userPassword" class="form-control input-sm chat-input" placeholder="Password" />
			</br>
			<div class="wrapper">
			<span class="group-btn">
			<button type="submit" class="btn btn-primary btn-md">Login <i class="fa fa-sign-in"></i></button>
			</span>
			</div>
			</div>

			</div>
			</div>
			</div>
		</form>
	</div>
</body>
</html>
