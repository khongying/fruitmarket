<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<?php
session_start();
require 'condatabase/conDB.php';
$user_id = $_SESSION['id'];
$sql = "UPDATE `users` SET `email`='{$_POST['email']}',`birthday`='{$_POST['date']}',`fullname`='{$_POST['fullname']}',`address`='{$_POST['address']}',`phone`='{$_POST['phone']}' WHERE `id`='$user_id' ";

if((getpdo($con,$sql))){
  $_SESSION['name'] = $_POST['fullname'];
  echo '<script>window.onload = function () {';
  echo 'swal({
        title: "อัพเดทข้อมูลเรียบร้อยแล้ว",
        text: " ",
        type: "success",
        showCancelButton: false,
        confirmButtonColor: "#A4E5D9",
        confirmButtonText: "OK",
        },
        function(isConfirm){
        if (isConfirm) {
        window.location.href = "index.php";
        }
        });}';
  echo '</script>';

}else {

  echo '<script>window.onload = function () {';
  echo 'swal({
        title: "Error!",
        text: " ",
        type: "warning",
        showCancelButton: false,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "OK",
        },
        function(isConfirm){
        if (isConfirm) {
        window.location.href = "index.php";
        }
        });}';
  echo '</script>';
}

?>
