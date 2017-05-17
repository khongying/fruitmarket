<?php
$host = "localhost";
$username = "root";
$password = "";
$DBname = "fruitmarket";
$con = mysqli_connect($host,$username,$password,$DBname);
mysqli_set_charset($con,"utf8");

	if (isset($_POST['travel_id'])){
		$sql = "DELETE FROM `travel` WHERE `id` = '{$_POST['travel_id']}' ";
		if(mysqli_query($con,$sql)){
			echo "Success";
		}else{

			echo "Error updating record: " . mysqli_error($con);
		}
	}else{
		echo "Error";
	}
		
	
?>