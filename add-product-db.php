<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php
session_start();
require 'condatabase/conDB.php';
if (isset($_POST) && count($_POST) == 2) {

    date_default_timezone_set("Asia/Bangkok");
    $t = time();
    $date = date("Y-m-d",$t);
    $time = date("H:i:s",$t);
    $sub_query = array();

    $sql_add_qt = "INSERT INTO `qt_order`(`user_id`, `create_date`) VALUES ('{$_SESSION['id']}','{$date} {$time}')";
    $data=getpdo($con,$sql_add_qt,2);
       if ($data != 0) {
         $sql_qt_id = "SELECT id_qt FROM `qt_order` WHERE user_id = '{$_SESSION["id"]}'";
         $qt_id = getpdo($con,$sql_qt_id,'id_qt');

           foreach ($_SESSION["product_card"] as $key => $value) {
           $sql_pirce = "SELECT `price` FROM `product` WHERE `code`='{$key}'";
           $price = getpdo($con,$sql_pirce,'price');
           $sub_query[] = "('{$key}','{$value}','{$price}','{$qt_id}','{$date} {$time}')";

           }
         $sub_query = implode(" , ",$sub_query);
         $sql_list_product = "INSERT INTO `list_order`( `product_id`, `sum`,`price`, `qt_order_id`, `create_date`) VALUES {$sub_query} "  ;
         $data = getpdo($con,$sql_list_product);

         // add ที่อยู่จัดส่ง
         $sql_post = "INSERT INTO `post_qt`(`user_id`, `qt_id`, `address`, `phone`) VALUES ('{$_SESSION['id']}','{$qt_id}','{$_POST['address']}','{$_POST['phone']}')";
         $post = getpdo($con,$sql_post);
        }
        $_SESSION['product_card'] = array();
         header('location:confirm-card_step3.php?qt_id='.$qt_id.'');
}else {
  echo "ไม่มี";
}



?>
