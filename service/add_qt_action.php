<?php 
require'../condatabase/conDB.php';

$code = $_POST['code'];
$user_id = $_POST['user_id']; 
$now_price = $_POST['price'];
$sql = "UPDATE `auction_product` SET`status`= 'D' WHERE `code` = '{$code}'";

if((getpdo($con,$sql))){ 

	date_default_timezone_set("Asia/Bangkok");
    $t = time();
    $date = date("Y-m-d",$t);
    $time = date("H:i:s",$t);
	$sql_qt = "INSERT INTO `qt_auction`(`user_id`, `auction_product_id`, `now_price`, `create_date`) VALUES ('{$user_id}','{$code}','{$now_price}','{$date} {$time}')";
	$data = getpdo($con,$sql_qt);
	echo "สำเร็จ";
}else{
	echo "false";
}

?>