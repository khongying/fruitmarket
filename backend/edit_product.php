<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php
require 'condatabase/conDB.php';
$code   = addslashes($_POST['p_code']);
$name   = addslashes($_POST['p_name']);
$detail = addslashes($_POST['p_detail']);
$price  = addslashes($_POST['p_price']);
$num    = addslashes($_POST['p_num']);

date_default_timezone_set("Asia/Bangkok");
$t = time();
$date = date("Y-m-d",$t);
$time = date("H:i:s",$t);

if ($_FILES['p_img']["size"] != 0) {

    $image  = " ";

    $IMAGE_UPLOADED = false;

  	if (!empty($_FILES['p_img']['name'])) {
  		$SRC = $_FILES['p_img']['tmp_name'];
  		$DEST = "product/".md5(microtime())."."
  						.pathinfo($_FILES['p_img']['name'], PATHINFO_EXTENSION);
  		$image = basename($DEST);

  		if (!move_uploaded_file($SRC,$DEST)) {
  			echo "ย้ายรูปสินค้าไม่สำเร็จ";
  			die;
  		}
  		else {
  			$IMAGE_UPLOADED = true;
  		}

  	}

  	$sql = "UPDATE `product` SET `code`='{$code}', `name`='{$name}', `detail`='{$detail}', `price`='{$price}'";
    if ($IMAGE_UPLOADED === true) {
  		$sql .= ",img='{$image}'";
      $sql .= ",num='{$num}'";
      $sql .= ",date_save='{$date} {$time}'";
      $sql .= " WHERE id = '{$_POST['p_id']}'";

      try{
  			if(getpdo($con,$sql)){
  				echo '<script>window.onload = function () {';
  				echo 'swal({
  							title: "แก้ไขสินค้าเรียบร้อย",
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
  							title: "แก้ไขสินค้าไม่สำเร็จ",
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
    }

}else {
  $sql = "UPDATE `product` SET `code`='{$code}', `name`='{$name}', `detail`='{$detail}', `price`='{$price}'";
  $sql .= ",num='{$num}'";
  $sql .= ",date_save='{$date} {$time}'";
  $sql .= " WHERE id = '{$_POST['p_id']}'";
  try{
    if(getpdo($con,$sql)){
      echo '<script>window.onload = function () {';
      echo 'swal({
            title: "แก้ไขสินค้าเรียบร้อย",
            text: "",
            type: "success",
            showCancelButton: false,
            confirmButtonColor: "#5cb85c",
            confirmButtonText: "OK",
            },
            function(isConfirm){
            if (isConfirm) {
            window.location.href = "list_product.php";
            }
            });}';
      echo '</script>';
    }
    else{
      echo '<script>window.onload = function () {';
      echo 'swal({
            title: "แก้ไขสินค้าไม่สำเร็จ",
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
}


?>
