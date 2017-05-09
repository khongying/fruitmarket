<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php

$host = "localhost";
$username = "root";
$password = "";
$DBname = "fruitmarket";
$con = mysqli_connect($host,$username,$password,$DBname);
mysqli_set_charset($con,"utf8");
session_start();

$qt_status = $_POST['qt_status'];
$qt_id = $_POST['qt'];

$sql_status = "UPDATE `qt_auction` SET `status_qt_id`='{$qt_status}' WHERE `id_qt`= '{$qt_id}'";
		if (mysqli_query($con,$sql_status)) {

				echo '<script>window.onload = function () {';
				echo 'swal({
						title: "อัพเดทข้อมูลเรียบร้อยแล้ว",
						type: "success",
						showCancelButton: false,
						confirmButtonColor: "#5cb85c",
						confirmButtonText: "OK",
						},
						function(isConfirm){
						if (isConfirm) {
						window.location.href = "show_qt.php";
						}
						});}';
				echo '</script>';

		} else {
			echo "Error updating record: " . mysqli_error($con);
		}