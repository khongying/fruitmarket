<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php
require 'condatabase/conDB.php'; 

$sql_worker ="SELECT day FROM `worker` WHERE id = '{$_POST['worker']}' Limit 1 ";
$sum = getpdo($con,$sql_worker,'day');



date_default_timezone_set("Asia/Bangkok");
$t = time();
$date = date("Y-m-d",$t);



$sql = "INSERT INTO `person_worker`(`id`, `id_worker`, `person_id`, `labor_cost` , `date`) VALUES (NULL,'{$_POST['worker']}','{$_POST['person']}','{$sum}','{$date}')";
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
              window.location.href = "worker_calculation.php";
              }
              });}';
        echo '</script>';

    }else {
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
            window.location.href = "worker.php";
            }
            });}';
      echo '</script>';
    }

?>
