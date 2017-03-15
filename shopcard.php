<?php
$host="localhost";
$username="root";
$password="";
$DBname="fruitmarket";
$con=mysqli_connect($host,$username,$password,$DBname);
mysqli_set_charset($con,"utf8");
session_start();

 // var_dump($_SESSION);
 // $_POST['id'] = 'T-0001';
  if (isset($_SESSION["product_card"][$_POST['id']])) {
  $_SESSION["product_card"][$_POST['id']]+=1;
}else{

    $_SESSION["product_card"][$_POST['id']]=1;
}

function get_product_by_id($obj_con,$product_id){
  $sql = "SELECT * FROM `product` WHERE `code` = '{$product_id}' LIMIT 1";
  $return = array();
  if ($res = mysqli_query($obj_con,$sql)) {

    while ($row = mysqli_fetch_assoc($res)) {
      $return['status'] = true;
      $return['massage'] = 'get data true';
      $return['data'] = $row;
    }
    # code...
  }else{
      $return['status'] = fasle;
      $return['massage'] = 'ไม่สามารถ query';
      $return['data'] = array();
  }
  return $return ;

}

echo '<table class="table">';
  echo '<thead>';
    echo '<tr>';
      echo '<td>สินค้า</td>';
      echo '<td>ราคา</td>';
      echo '<td>จำนวน</td>';
      echo '<td>ลบ</td>';
    echo '</tr>';
  echo '</thead>';

foreach ($_SESSION["product_card"] as $key => $value) {
   $data_product = get_product_by_id($con,$key);

  echo '<tbody>';
    echo "<tr>";
      echo "<td>"."<img src='backend/product/{$data_product['data']['img']}' style='height: 70px;width: 70px;'/>"."</td>";
      echo "<td>".number_format($data_product['data']['price']*$value,2)."</td>";
      echo "<td>".$value."</td>";
      echo "<td>"."<div class='delete-product btn btn-success' id='{$data_product['data']['code']}'>
        <i class='fa fa-trash fa-lg'></i> ลบ
      </div>"."</td>";
    echo "</tr>";
  echo '</tbody>';
}
echo "</table>";




?>
