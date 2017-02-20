<?php 
	session_start();
    require 'condatabase/conDB.php';
   	$user = $_POST['user'];
    $pass = md5($_POST['pass']);

    $sql="SELECT * FROM `backend` WHERE `username`= '".$user."' AND `password`= '".$pass."'";
    try{
	$data = getpdo($con,$sql,2);
	if($data != 0){
		$admin				= getpdo($con,$sql);
		$_SESSION['admin'] 	= "admin";
		header('location:home.php');
	}
	else{
		header('location:index.php');
	}
	}
	catch (PDOException $e) {
    echo 'ERORR: ',  $e->getMessage(), "\n";
	}
?>