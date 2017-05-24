<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php
	session_start();
    require 'condatabase/conDB.php';

   	$mail = $_POST['email'];
    $pass = md5($_POST['pass']);


    $sql="SELECT * FROM `users` WHERE `email`='$mail' AND `password`='$pass'";

    try{
	$data = getpdo($con,$sql,2);
	if($data != 0){
		$user	= getpdo($con,$sql,1);
		foreach ($user as $row) {
			$fullname = $row['fullname'];
			$mail = $row['email'];
			$id = $row['id'];
			$status = $row['status']; 
		}
		if ($status == 'A') {
			$_SESSION['name'] = $fullname;
			$_SESSION['email'] = $mail;
			$_SESSION['id'] = $id;
			$_SESSION['login'] 	= "user";
			$_SESSION['product_card'] = array();
			header('location:index.php');	
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
						window.location.href = "formlogin.php";
						}
						});}';
			echo '</script>';
		}
	}
	else{
		echo '<script>window.onload = function () {';
		echo 'swal({
					title: "อีเมลล์หรือรหัสผ่านไม่ถูกต้อง",
					text: " ",
					type: "warning",
					showCancelButton: false,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "OK",
					},
					function(isConfirm){
					if (isConfirm) {
					window.location.href = "formlogin.php";
					}
					});}';
		echo '</script>';
	}
	}
	catch (PDOException $e) {
    echo 'ERORR: ',  $e->getMessage(), "\n";
	}
?>
