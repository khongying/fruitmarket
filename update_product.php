<?php
session_start();
// print_r($_POST);
$arr = $_SESSION["product_card"];
print_r($arr);


var_dump($_POST);
var_dump($_SESSION);
$new_product = array($_POST['id']=>$_POST['num']);


if(array_key_exists($_POST['id'], $arr)){
  $_SESSION["product_card"][$_POST['id']] = $_POST['num'];

}else {
    $_SESSION["product_card"][$_POST['id']]=$_POST['num'];
}
//print_r($_SESSION["product_card"]);
var_dump($_SESSION);
?>
