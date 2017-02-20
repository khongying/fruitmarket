<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php
	require'condatabase/conDB.php';


	$mail			= 		$_POST['email'];
	$pass 		= 		md5($_POST['password']);
	$date 		= 		$_POST['date'];
	$address 	= 		$_POST['address'];
	$name 		= 		$_POST['fullname'];
	$phone 		= 		$_POST['phone'];
	$sex    	=			$_POST['sex'];
	$news 		= 		(isset($_POST['news']) ? $_POST['news'] : 'F');


	$chkmail = "SELECT * FROM `users` WHERE `email`='$mail'";

	$chkm = getpdo($con,$chkmail,2);
	if($chkm != 0){

		echo '<script>window.onload = function () {';
		echo 'swal({
					title: "อีเมลล์นี้มีผู้ใช้แล้ว",
					text: " ",
					type: "warning",
					showCancelButton: false,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "OK",
					},
					function(isConfirm){
					if (isConfirm) {
					window.location.href = "register.php";
					}
					});}';
		echo '</script>';

	}else{

		$sql ="INSERT INTO `users`(`email`, `password`, `fullname`, `birthday`, `address`, `phone`, `sex`, `news`) VALUES ('$mail','$pass','$name','$date','$address','$phone','$sex','$news')";

		$data = getpdo($con,$sql,2);
		if($data != 0){
		echo '<script>window.onload = function () {';
		echo 'swal({
					title: "สมัครสมาชิกเรียบร้อยแล้ว",
					text: "กรุณาเข้าสู่ระบบ",
					type: "success",
					showCancelButton: false,
					confirmButtonColor: "#5cb85c",
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




/*
	if($mail == null && $pass == null){

		echo '<script>window.onload = function () {';
		echo 'swal({
					title: "สมัครสมาชิกเรียบร้อยแล้ว",
					text: "กรุณาเข้าสู่ระบบ",
					type: "success",
					showCancelButton: false,
					confirmButtonColor: "#5cb85c",
					confirmButtonText: "OK",
					},
					function(isConfirm){
					if (isConfirm) {
					window.location.href = "index.php";
					}
					});}';
		echo '</script>';

	}else{

		echo '<script>window.onload = function () {';
		echo 'swal({
					title: "ผิดพลาด",
					text: "กรองข้อมูลไม่ถูกต้อง",
					type: "warning",
					showCancelButton: false,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "OK",
					},
					function(isConfirm){
					if (isConfirm) {
					window.location.href = "register.php";
					}
					});}';
		echo '</script>';
	}*/




/*	$sql ="INSERT INTO `users`(`email`, `password`, `fullname`, `birthday`, `address`, `phone`, `sex`, `news`) VALUES ('$mail','$pass','$name','$date','$address','$phone','$sex ','$news')";


	try{
	$data = getpdo($con,$sql,2);
	if($data != 0){

		echo '<script>window.onload = function () {';
		echo 'swal({
					title: "สมัครสมาชิกเรียบร้อยแล้ว",
					text: "กรุณาเข้าสู่ระบบ",
					type: "success",
					showCancelButton: false,
					confirmButtonColor: "#5cb85c",
					confirmButtonText: "OK",
					},
					function(isConfirm){
					if (isConfirm) {
					window.location.href = "index.php";
					}
					});}';
		echo '</script>';



	}
	else{
		 print "no";
	}
	}
	catch (PDOException $e) {
    echo 'ERORR: ',  $e->getMessage(), "\n";
	}*/
?>
