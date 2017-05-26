<?php
require 'condatabase/conDB.php';
	$array_pack_data = array();
  $array_m = array('-01-','-02-','-03-','-04-','-05-','-06-','-07-','-08-','-09-','-10-','-11-','-12-');
  $year = (isset($_POST['year'])) ? $_POST['year'] : date("Y");

  foreach ($array_m as $key => $value) {
    $value = $year.$value;
    $sql = "SELECT sum( (`num`*`price`)) as total_moeny FROM `product_pay` WHERE `date_save`  REGEXP  '{$value}'";
    //echo $sql."<br>";
    $result=getpdo($con,$sql,1);
          foreach ($result as $row) {
            $total_moeny1[] = (($row['total_moeny'] == null) ? 0 : $row['total_moeny']*1);
          }
  }

  foreach ($array_m as $key => $value) {
     $value = $year.$value;
     // $value = "2017-05-";
     $sql = "SELECT sum( (`list_order`.`sum`*`price`)) as total_moeny FROM `list_order` INNER JOIN qt_order ON (list_order.qt_order_id=qt_order.id_qt) WHERE qt_order.status_qt_id = '5' AND qt_order.create_date REGEXP '{$value}'";

     $sql_auction ="SELECT sum(now_price) as total_auction FROM qt_auction WHERE status_qt_id = '5' AND qt_auction.create_date REGEXP '{$value}'";
      $auction = getpdo($con,$sql_auction,1);
            foreach ($auction as $rows){
              $total_auction[] = (($rows['total_auction'] == null) ? 0 : $rows['total_auction']*1);
            }
            

    $result=getpdo($con,$sql,1);
          foreach ($result as $row) {
            $total_moeny2[] = (($row['total_moeny'] == null) ? 0 : $row['total_moeny']*1);
          }
  }


 for ($i=0; $i < 12 ; $i++) { 
      $total[] = $total_auction[$i]+$total_moeny2[$i];
    }

// var_dump($total);

$array_pack_data['total_moeny1'] = $total_moeny1;
$array_pack_data['total_moeny2'] = $total;
$array_pack_data['year'] =  $year;


echo json_encode($array_pack_data);





 ?>
