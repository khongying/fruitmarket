<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">

<?php
		require 'condatabase/conDB.php';

		$category 	= addslashes($_POST['category']);
		$title 	    = addslashes($_POST['title']);
		$detail 	= addslashes($_POST['detail']);
		$image 		= "";

		
		if (isset($_FILES['img'])) {
		    $SRC = $_FILES['img']['tmp_name'];
		    $DEST = "news_promotion/".md5(microtime())."."
		            .pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
		    $image = basename($DEST);

		if (!move_uploaded_file($SRC,$DEST)) {
			echo '<script>window.onload = function () {';
			echo 'swal({
						title: "ย้ายรูปไม่สำเร็จ",
						text: " ",
						type: "warning",
						showCancelButton: false,
						confirmButtonColor: "#DD6B55",
						confirmButtonText: "OK",
						},
						function(isConfirm){
						if (isConfirm) {
						window.location.href = "new_promotion.php";
						}
						});}';
			echo '</script>';
    }
  }


		$sql = "INSERT INTO `news_promotion`(`name_title`, `detail`, `img`, `status_category`) VALUES ('{$title}','{$detail}','{$image}','{$category}')";
 
		try{
		$data = getpdo($con,$sql);
			if($data != 0){
				echo '<script>window.onload = function () {';
				echo 'swal({
							title: "เพิ่มเรียบร้อย",
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
							title: "เพิ่มไม่สำเร็จ",
							text: " ",
							type: "warning",
							showCancelButton: false,
							confirmButtonColor: "#DD6B55",
							confirmButtonText: "OK",
							},
							function(isConfirm){
							if (isConfirm) {
							window.location.href = "new_promotion.php";
							}
							});}';
				echo '</script>';
			}
		}
		catch (PDOException $e) {
		echo 'ERORR: ',  $e->getMessage(), "\n";
		}
?>
?>