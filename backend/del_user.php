<?php
$host = "localhost";
$username = "root";
$password = "";
$DBname = "fruitmarket";
$con = mysqli_connect($host,$username,$password,$DBname);
mysqli_set_charset($con,"utf8");

	if (isset($_POST['user_id'])){
		$sql = "UPDATE `users` SET `status`= 'D' WHERE `id` = '{$_POST['user_id']}'";
		if(mysqli_query($con,$sql)){
			echo "Success";
		}else{

			echo "Error updating record: " . mysqli_error($con);
		}
	}else{
		echo "Error";
	}
		
	
?>