<?php 

require'../condatabase/conDB.php';
$code = $_POST['code'];
$sql = "UPDATE `auction_product` SET`status`= 'D' WHERE `code` = '{$code}'";

if((getpdo($con,$sql))){
	  echo "true";
}else{
	echo "false";
}
// var_dump($code);
?>