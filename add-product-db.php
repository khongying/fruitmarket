<?php
session_start();
require 'condatabase/conDB.php';

$sql_qt = "SELECT user_id FROM `qt_order` WHERE user_id = '{$_SESSION["id"]}'";
$data=getpdo($con,$sql_qt,2);
 if ($data != 0) {
   echo "มีแล้ว";
 }else {
   $sql_add_qt = "INSERT INTO `qt_order`(`user_id`, `create_date`) VALUES ([value-2],[value-3],[value-4])"
 }

foreach ($_SESSION["product_card"] as $key => $value) {


}
?>
