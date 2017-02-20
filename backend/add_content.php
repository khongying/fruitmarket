<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php
	
	require 'condatabase/conDB.php';
	
	$text = $_POST['text'];
	$sql = "UPDATE `content` SET `text`='$text' WHERE `id`= '1'";

	try{
		$data = getpdo($con,$sql);
			if($data != 0){
					echo '<script>window.onload = function () {';
					echo 'swal({
						title: "แก้ไขเรียบร้อยแล้ว",
						text: " ",
						type: "success",
						showCancelButton: false,
						confirmButtonColor: "#DD6B55",
						confirmButtonText: "OK",
						},
						function(isConfirm){
						if (isConfirm) {
						window.location.href = "home.php";
						}
						});}';
					echo '</script>';
			}
			else{
				echo '<script>window.onload = function () {';
				echo 'swal({
					title: "ผิดพลาด",
					text: " ",
					type: "warning",
					showCancelButton: false,
					confirmButtonColor: "#5cb85c",
					confirmButtonText: "OK",
					},
					function(isConfirm){
					if (isConfirm) {
					window.location.href = "home.php";
					}
					});}';
				echo '</script>';
			}
		}
		catch (PDOException $e) {
		echo 'ERORR: ',  $e->getMessage(), "\n";
		}


?>