<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php
	require 'condatabase/conDB.php';
    session_start();

		$qt 	 = addslashes($_POST['qt']);
		$name 	 = addslashes($_POST['name']);
		$date	 = addslashes($_POST['date']);
		$price	 = addslashes($_POST['price']);
		$address = addslashes($_POST['address']);
		$phone	 = addslashes($_POST['phone']);
		$image 	 = "";


		if (isset($_FILES['slip'])) {
    $SRC = $_FILES['slip']['tmp_name'];
    $DEST = "payment/".md5(microtime())."."
            .pathinfo($_FILES['slip']['name'], PATHINFO_EXTENSION);
    $image = basename($DEST);

    if (!move_uploaded_file($SRC,$DEST)) {
			echo '<script>window.onload = function () {';
			echo 'swal({
						title: "ไม่สำเร็จ",
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




		$sql="INSERT INTO `pay_auction_qt`(`user_id`, `qt_id`, `name`, `total`, `img`, `date_time`, `address`, `phone`)";
		$sql .="VALUES ('{$_SESSION['id']}','{$qt}','{$name}','{$price}','{$image}','{$date}','{$address}','{$phone}')";
		try{
		$data = getpdo($con,$sql);
			if($data != 0){
        $sql_update_qt =" UPDATE `qt_auction` SET `status_qt_id`='2' WHERE `id_qt`='{$qt}'";
        if((getpdo($con,$sql_update_qt))){

          echo '<script>window.onload = function () {';
  				echo 'swal({
  							title: "แจ้งชำระเรียบร้อย",
  							text: "",
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
        }

			}
			else{
				echo '<script>window.onload = function () {';
				echo 'swal({
							title: "ไม่สำเร็จ",
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
