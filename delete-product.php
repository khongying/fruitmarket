<?php

session_start();
$_SESSION["product_card"];
$key = $_POST['id'];

  if(count($_POST)){

      unset($_SESSION["product_card"][$key]);

  }else {


  }

?>
