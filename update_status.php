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

$status = $_POST['qt_status'];
$qt = $_POST['qt'];

			$sql_qt_order = "DELETE FROM `qt_order` WHERE `id_qt`= '{$qt}'";
			if(mysqli_query($con,$sql_qt_order)){

				$sql_list_order = "DELETE FROM `list_order` WHERE `qt_order_id`= '{$qt}'";
				if (mysqli_query($con,$sql_list_order)) {

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
								window.location.href = "history_qt.php?user='.$_SESSION['id'].'";
								}
								});}';
						echo '</script>';

				} else {
					echo "Error updating record: " . mysqli_error($con);
				}

			}else{

					echo "Error updating record: " . mysqli_error($con);
			}
	
?>