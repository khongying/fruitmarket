<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php

require 'condatabase/conDB.php';

$sql = "UPDATE `worker` SET `id`={$_POST['worker']},`day`={$_POST['day']} WHERE `id`={$_POST['worker']} ";

    if((getpdo($con,$sql))){
      echo '<script>window.onload = function () {';
      echo 'swal({
            title: "อัพเดทเรียบร้อยแล้ว",
            text: "",
            type: "success",
            showCancelButton: false,
            confirmButtonColor: "#5cb85c",
            confirmButtonText: "OK",
            },
            function(isConfirm){
            if (isConfirm) {
            window.location.href = "up_worker.php";
            }
            });}';
      echo '</script>';
    }else {
      echo '<script>window.onload = function () {';
      echo 'swal({
            title: "Error!!",
            text: "",
            type: "error",
            showCancelButton: false,
            confirmButtonColor: "#5cb85c",
            confirmButtonText: "OK",
            },
            function(isConfirm){
            if (isConfirm) {
            window.location.href = "up_worker.php";
            }
            });}';
      echo '</script>';
    }
?>
