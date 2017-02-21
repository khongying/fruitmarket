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


        $sql = "INSERT INTO `travel`(`name`, `img_pro`, `detail`, `img_1`, `img_2`, `img_3`, `img_4`) VALUES ('$name','$img_pro','$detail','$img_1','$img_2','$img_3','$img_4')";

				try{
					$data = getpdo($con,$sql);
				if($data != 0){
					echo "<script type='text/javascript'>";
					echo  "alert('เพิ่มเรียบร้อย');";
					echo "window.location='travel.php';";
					echo "</script>";
				}
				else{
					echo "<script type='text/javascript'>";
					echo  "alert('Error!!!');";
					echo "window.location='travel.php';";
					echo "</script>";
				}
				}
				catch (PDOException $e) {
					echo 'ERORR: ',  $e->getMessage(), "\n";
				}



         ?>
