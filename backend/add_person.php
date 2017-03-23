<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php
require 'condatabase/conDB.php';

$sql = "INSERT INTO `person`(`full_name`, `address`, `phone`) VALUES ('{$_POST['name']}','{$_POST['address']}','{$_POST['phone']}')";
$data = getpdo($con,$sql);

    if($data != 0){
        echo '<script>window.onload = function () {';
        echo 'swal({
              title: "เพิ่มเรียบร้อยแล้ว",
              text: "",
              type: "success",
              showCancelButton: false,
              confirmButtonColor: "#5cb85c",
              confirmButtonText: "OK",
              },
              function(isConfirm){
              if (isConfirm) {
              window.location.href = "worker.php";
              }
              });}';
        echo '</script>';

    }else {
      echo '<script>window.onload = function () {';
      echo 'swal({
            title: "ไม่สำเร็จ",
            text: " ",
            type: "error",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "OK",
            },
            function(isConfirm){
            if (isConfirm) {
            window.location.href = "worker.php";
            }
            });}';
      echo '</script>';
    }

?>
