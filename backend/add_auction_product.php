<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">

<?php
		require 'condatabase/conDB.php';

		$p_code 	= addslashes($_POST['p_code']);
		$p_name 	= addslashes($_POST['p_name']);
		$p_detail 	= addslashes($_POST['p_detail']);
		$p_price 	= addslashes($_POST['p_price']);
		$datetime	= addslashes($_POST['p_time']);
		$image 		= "";

		
		if (isset($_FILES['p_img'])) {
		    $SRC = $_FILES['p_img']['tmp_name'];
		    $DEST = "product/".md5(microtime())."."
		            .pathinfo($_FILES['p_img']['name'], PATHINFO_EXTENSION);
		    $image = basename($DEST);

		if (!move_uploaded_file($SRC,$DEST)) {
			echo '<script>window.onload = function () {';
			echo 'swal({
						title: "ย้ายรูปสินค้าไม่สำเร็จ",
						text: " ",
						type: "warning",
						showCancelButton: false,
						confirmButtonColor: "#DD6B55",
						confirmButtonText: "OK",
						},
						function(isConfirm){
						if (isConfirm) {
						window.location.href = "product.php";
						}
						});}';
			echo '</script>';
    }
  }


  $sql="INSERT INTO`auction_product`(`code`, `name`, `detail`, `price`, `end_time`, `image`)";
		$sql .="VALUES ('$p_code','$p_name','$p_detail','$p_price','$datetime','$image')";
		try{
		$data = getpdo($con,$sql);
			if($data != 0){
				echo '<script>window.onload = function () {';
				echo 'swal({
							title: "เพิ่มสินค้าเรียบร้อย",
							text: "",
							type: "success",
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
			else{
				echo '<script>window.onload = function () {';
				echo 'swal({
							title: "เพิ่มสินค้าไม่สำเร็จ",
							text: " ",
							type: "warning",
							showCancelButton: false,
							confirmButtonColor: "#DD6B55",
							confirmButtonText: "OK",
							},
							function(isConfirm){
							if (isConfirm) {
							window.location.href = "auction_product.php";
							}
							});}';
				echo '</script>';
			}
		}
		catch (PDOException $e) {
		echo 'ERORR: ',  $e->getMessage(), "\n";
		}
?>