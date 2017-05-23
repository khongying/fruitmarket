<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php
require 'condatabase/conDB.php';
$id     = addslashes($_POST['id']);
$title      = addslashes($_POST['title']);
$detail   = addslashes($_POST['detail']);


if ($_FILES['img']["size"] != 0) {

    $image  = " ";

    $IMAGE_UPLOADED = false;

  	if (!empty($_FILES['img']['name'])) {
  		$SRC = $_FILES['img']['tmp_name'];
  		$DEST = "news_promotion/".md5(microtime())."."
  						.pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
  		$image = basename($DEST);

  		if (!move_uploaded_file($SRC,$DEST)) {
  			echo "ย้ายรูปสินค้าไม่สำเร็จ";
  			die;
  		}
  		else {
  			$IMAGE_UPLOADED = true;
  		}

  	}

  	$sql = "UPDATE `news_promotion` SET `name_title`='{$title}',`detail`='{$detail}'";
    if ($IMAGE_UPLOADED === true) {
  		$sql .= ",img='{$image}'";
      $sql .= " WHERE id = '{$id}'";

      try{
  			if(getpdo($con,$sql)){
  				echo '<script>window.onload = function () {';
  				echo 'swal({
  							title: "แก้ไขเรียบร้อย",
  							text: "",
  							type: "success",
  							showCancelButton: false,
  							confirmButtonColor: "#5cb85c",
  							confirmButtonText: "OK",
  							},
  							function(isConfirm){
  							if (isConfirm) {
  							window.location.href = "list_new_promotion.php";
  							}
  							});}';
  				echo '</script>';
  			}
  			else{
  				echo '<script>window.onload = function () {';
  				echo 'swal({
  							title: "แก้ไขไม่สำเร็จ",
  							text: " ",
  							type: "warning",
  							showCancelButton: false,
  							confirmButtonColor: "#DD6B55",
  							confirmButtonText: "OK",
  							},
  							function(isConfirm){
  							if (isConfirm) {
  							window.location.href = "list_new_promotion.php";
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
  $sql = "UPDATE `news_promotion` SET `name_title`='{$title}',`detail`='{$detail}'";
  $sql .= " WHERE id = '{$id}'";
  try{
    if(getpdo($con,$sql)){
      echo '<script>window.onload = function () {';
      echo 'swal({
            title: "แก้ไขเรียบร้อย",
            text: "",
            type: "success",
            showCancelButton: false,
            confirmButtonColor: "#5cb85c",
            confirmButtonText: "OK",
            },
            function(isConfirm){
            if (isConfirm) {
            window.location.href = "list_new_promotion.php";
            }
            });}';
      echo '</script>';
    }
    else{
      echo '<script>window.onload = function () {';
      echo 'swal({
            title: "แก้ไขไม่สำเร็จ",
            text: " ",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "OK",
            },
            function(isConfirm){
            if (isConfirm) {
            window.location.href = "list_new_promotion.php";
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
