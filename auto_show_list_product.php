<style>
#total{
  font-size: 20pt;
  color: red;
  font-weight:bold;
}
</style>
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

echo '<table class="table" id="myTable">';
  echo '<thead>';
    echo '<tr>';
      echo '<th>สินค้า</th>';
      echo '<th>ราคา</th>';
      echo '<th>จำนวน</th>';
      echo '<th>ลบ</th>';
    echo '</tr">';
$sum = 0 ;
foreach ($_SESSION["product_card"] as $key => $value) {
   $data_product = get_product_by_id($con,$key);
   $sum = $sum + $data_product['data']['price']*$value;
   ?>
  <tr>
      <td><img src="backend/product/<?=$data_product['data']['img']?>" style="height: 70px;width: 70px;"/></td>
      <td class="price"><?=number_format($data_product['data']['price']*$value,2)?></td>
      <td><?=$value?></td>
      <td>
        <div class="delete-product btn btn-success" id="<?=$data_product['data']['code']?>">
        <i class="fa fa-trash fa-lg"></i> ลบ
        </div>
      </td>
  </tr>
<?php
}
echo '<tr id="total">';
  echo '<td></td>';
  echo '<td>ราคารวม</td>';
  echo '<td>'.number_format($sum,2).'</td>';
  echo '<td>บาท</td>'; 
echo '</tr>';

echo "</table>";

?>

<!-- <script>
  $("#btn-cart").click(function(){
    var sum = 0;
  	$.each($(".price"), function(index, val) {
  			sum = sum + (val.innerHTML*1);
  		});
  	$("#output").text(sum);
  	console.log(sum);

  });
</script> -->
