<?php


$id_ask = $_POST['idask'];
$reply_detail = $_POST['detail_reply'];
session_start();

require'condatabase/conDB.php';

date_default_timezone_set("Asia/Bangkok");
$t = time();
$date = date("Y-m-d",$t);
$time = date("H:i:s",$t);


$sql = "INSERT INTO `reply`(`id_reply`, `id_ask`, `create_date`, `user_id`, `detail`) VALUES (NULL,'{$id_ask}','{$date} {$time}','{$_SESSION['id']}','{$reply_detail}')";

  try{
      $data = getpdo($con,$sql);
  }
  catch (PDOException $e) {
      echo 'ERORR: ',  $e->getMessage(), "\n";
  }




?>
