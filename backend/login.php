<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php
	session_start();
    require 'condatabase/conDB.php';
   	$user = addslashes($_POST['user']);
    $pass = addslashes(md5($_POST['pass']));

    $sql="SELECT * FROM `backend` WHERE `username`= '".$user."' AND `password`= '".$pass."'";
    try{
	$data = getpdo($con,$sql,2);
	if($data != 0){
		$user	= getpdo($con,$sql,1);
		foreach ($user as $row) {
			$role = $row['role'];
			$name = $row['full_name'];
			$status = $row['status'];
		}
		if ($status == 'A') {
			$_SESSION['admin'] 	 		= "admin";
			$_SESSION['role'] 	 		= $role;
			$_SESSION['name_admin'] 	= $name;
			header('location:home.php');
		}else{
			
			echo '<script>window.onload = function () {';
			echo 'swal({
					title: "บัญชีผู้ใช้ถูกระงับการใช้งาน",
					text: " ",
					type: "warning",
					showCancelButton: false,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "OK",
					},
					function(isConfirm){
					if (isConfirm) {
					window.location.href = "index.php";
					}
					});}';
			echo '</script>';
		}
		
	}
	else{
		echo '<script>window.onload = function () {';
		echo 'swal({
					title: "Invalid Username and Passord.",
					text: " ",
					type: "error",
					showCancelButton: false,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "OK",
					},
					function(isConfirm){
					if (isConfirm) {
					window.location.href = "index.php";
					}
					});}';
		echo '</script>';
	}
	}
	catch (PDOException $e) {
    echo 'ERORR: ',  $e->getMessage(), "\n";
	}
?>
