<?php
$host = "localhost";
$username = "root";
$password = "";
$DBname = "fruitmarket";
$con = mysqli_connect($host,$username,$password,$DBname);
mysqli_set_charset($con,"utf8");

	if (isset($_POST['admin_id'])){
		$sql = "UPDATE `backend` SET `status`= 'D' WHERE `id` = '{$_POST['admin_id']}'";
		if(mysqli_query($con,$sql)){
			echo "Success";
		}else{

			echo "Error updating record: " . mysqli_error($con);
		}
	}else{
		echo "Error";
	}
		
	
?>