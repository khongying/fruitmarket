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

// var_dump($_POST);
$qt_status = $_POST['qt_status'];
$qt_id = $_POST['qt'];


$sql = "SELECT list_order.product_id,list_order.sum FROM list_order LEFT JOIN product ON list_order.product_id = product.code WHERE qt_order_id = '{$qt_id}'";

	if($res = mysqli_query($con,$sql)){
		$row = array();
		while ($rows = mysqli_fetch_assoc($res)) {
		  $row[] = $rows;
		}

		foreach ($row as $key => $value) {
			$sql = "UPDATE `product` SET `num`= num-'{$value['sum']}'  WHERE `code`= '{$value['product_id']}'";
			if($res = mysqli_query($con,$sql)){
				// echo "ผ่าน";
			}else{
				// echo "ไม่ผ่าน";
			}
		}
		 
		$sql_status = "UPDATE `qt_order` SET `status_qt_id`='{$qt_status}' WHERE `id_qt`= '{$qt_id}'";
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
		
	}else{

	}


?>