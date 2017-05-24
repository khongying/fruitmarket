<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php
		require 'condatabase/conDB.php';

		$p_code 	= addslashes($_POST['p_code']);
		$p_name 	= addslashes($_POST['p_name']);
		$p_detail = addslashes($_POST['p_detail']);
		$p_price 	= addslashes($_POST['p_price']);
		$p_num 		= addslashes($_POST['p_num']);
		$p_category = addslashes($_POST['p_category']);
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

		$sql="INSERT INTO `product`(`code`, `name`, `detail`, `price`, `img`, `num`, `category_product`)";
		$sql .="VALUES ('$p_code','$p_name','$p_detail','$p_price','$image','$p_num','$p_category')";
		try{
		$data = getpdo($con,$sql);
			if($data != 0){
				$sql_product_pay = "INSERT INTO `product_pay`(`code`, `name`, `num`, `price`) VALUES ('$p_code','$p_name', '$p_num', '$p_price')";
				$res = getpdo($con,$sql_product_pay);
				if($res != 0){
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
							window.location.href = "product.php";
							}
							});}';
				echo '</script>';
			}
		}
		catch (PDOException $e) {
		echo 'ERORR: ',  $e->getMessage(), "\n";
		}

?>
