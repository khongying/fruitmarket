<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php
        require 'condatabase/conDB.php';

        $name		  =	 addslashes($_POST['name']);
        $img_pro	=	 addslashes($_POST['t_img']);
        $detail		=	 addslashes($_POST['detail']);
        $img_1		=	 addslashes($_POST['t_img_1']);
        $img_2		=	 addslashes($_POST['t_img_2']);
        $img_3		=	 addslashes($_POST['t_img_3']);
        $img_4		=	 addslashes($_POST['t_img_4']);
        $lat		=	 addslashes($_POST['lat']);
        $lng		=	 addslashes($_POST['lng']);


        $sql = "INSERT INTO `travel`(`name`, `img_pro`, `detail`, `img_1`, `img_2`, `img_3`, `img_4`, `lat`, `lng`) VALUES ('{$name}','{$img_pro}','{$detail}','{$img_1}','{$img_2}','{$img_3}','{$img_4}','{$lat}' ,'{$lng}' )";

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
								window.location.href = "travel_garden.php";
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
								window.location.href = "travel_garden.php";
								}
								});}';
					echo '</script>';
				}
				}
				catch (PDOException $e) {
					echo 'ERORR: ',  $e->getMessage(), "\n";
				}



         ?>
