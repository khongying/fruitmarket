<?php
require 'condatabase/conDB.php';
	$array_pack_data = array();
  $array_m = array('-01-','-02-','-03-','-04-','-05-','-06-','-07-','-08-','-09-','-10-','-11-','-12-');

  foreach ($array_m as $key => $value) {
    $sql = "SELECT sum( (`num`*`price`)) as total_moeny FROM `product` WHERE `date_save`  REGEXP  '{$value}'";
    $result=getpdo($con,$sql,1);
          foreach ($result as $row) {
            $total_moeny1[] = (($row['total_moeny'] == null) ? 0 : $row['total_moeny']*1);
          }
  }

  foreach ($array_m as $key => $value) {
    $sql = "SELECT sum( (`list_order`.`sum`* product.price)) as total_moeny  FROM `list_order` inner JOIN product on (list_order.product_id=product.code)  WHERE `date_save`  REGEXP '{$value}'";
    $result=getpdo($con,$sql,1);
          foreach ($result as $row) {
            $total_moeny2[] = (($row['total_moeny'] == null) ? 0 : $row['total_moeny']*1);
          }
  }
$array_pack_data['total_moeny1'] = $total_moeny1;
$array_pack_data['total_moeny2'] = $total_moeny2;


echo json_encode($array_pack_data);





 ?>
