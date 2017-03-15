<?php
session_start();
print_r( $_SESSION["product_card"]);



foreach ($_SESSION["product_card"] as $key => $value) {

  // $sql = INSERT INTO `list_order`(`user_id`, `product_id`, `sum`, `price`, `qt_order_id`)
  //       VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])

}
?>
