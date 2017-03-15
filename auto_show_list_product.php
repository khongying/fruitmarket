<?php
$host="localhost";
$username="root";
$password="";
$DBname="fruitmarket";
$con=mysqli_connect($host,$username,$password,$DBname);
mysqli_set_charset($con,"utf8");
session_start();
 //var_dump($_SESSION);
 // $_POST['id'] = 'T-0001';


//var_dump($_SESSION);


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

foreach ($_SESSION["product_card"] as $key => $value) {
   $data_product = get_product_by_id($con,$key);
   ?>

  <tr>
      <td><img src="backend/product/<?=$data_product['data']['img']?>" style="height: 70px;width: 70px;"/></td>
      <td><?=number_format($data_product['data']['price']*$value,2)?></td>
      <td><?=$value?></td></td>
      <td>
        <div class="delete-product btn btn-success" id="<?=$data_product['data']['code']?>">
        <i class="fa fa-trash fa-lg"></i> ลบ
        </div>
      </td>
  </tr>

<?php
}
echo "</table>";



?>
