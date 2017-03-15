<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php
session_start();
require'condatabase/conDB.php';

date_default_timezone_set("Asia/Bangkok");
$t = time();
$date = date("Y-m-d",$t);
$time = date("H:i:s",$t);


$sql = "INSERT INTO `ask`(`id_ask`, `create_date`, `q_ask`, `detail`, `user_id`)";
$sql .= "VALUES (NULL,'{$date} {$time}','{$_POST['ask']}','{$_POST['detail_ask']}','{$_SESSION['id']}')";

try{
$data = getpdo($con,$sql);
  if($data != 0){
    echo '<script>window.onload = function () {';
    echo 'swal({
          title: "สร้างกระทู้เรียบร้อย",
          text: "",
          type: "success",
          showCancelButton: false,
          confirmButtonColor: "#5cb85c",
          confirmButtonText: "OK",
          },
          function(isConfirm){
          if (isConfirm) {
          window.location.href = "webboard.php";
          }
          });}';
    echo '</script>';
  }
  else{
    echo '<script>window.onload = function () {';
    echo 'swal({
          title: "Error!!!",
          text: " ",
          type: "warning",
          showCancelButton: false,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "OK",
          },
          function(isConfirm){
          if (isConfirm) {
          window.location.href = "webboard.php";
          }
          });}';
    echo '</script>';
  }
}
catch (PDOException $e) {
echo 'ERORR: ',  $e->getMessage(), "\n";
}
?>
