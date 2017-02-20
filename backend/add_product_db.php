<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php
		require 'condatabase/conDB.php';

		//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
		date_default_timezone_set('Asia/Bangkok');
		//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
		$date1 = date("Ymd_His");
		//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
		$numrand = (mt_rand());

		//รับชื่อไฟล์จากฟอร์ม 
		$p_code = $_POST['p_code'];
		$p_name = $_POST['p_name'];
		$p_detail = $_POST['p_detail'];
		$p_price = $_POST['p_price'];
		$p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');

		

		$sql="INSERT INTO `product`(`code`, `name`, `detail`, `price`, `img`) VALUES ('$p_code','$p_name','$p_detail','$p_price','$p_img')";
		//var_dump($sql);
		try{
		$data = getpdo($con,$sql);
			if($data != 0){
				echo "<script type='text/javascript'>";
				echo  "alert('เพิ่มสินค้าเรียบร้อย');";
				echo "window.location='product.php';";
				echo "</script>";
			}
			else{
				echo "<script type='text/javascript'>";
				echo  "alert('Error!!!');";
				echo "window.location='product.php';";
				echo "</script>";
			}
		}
		catch (PDOException $e) {
		echo 'ERORR: ',  $e->getMessage(), "\n";
		}

?>