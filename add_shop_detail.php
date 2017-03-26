<?php
session_start(); 
// print_r($_POST);
$arr = $_SESSION["product_card"];
print_r($arr);

if(array_key_exists($_POST['id'], $arr)){
    $_SESSION["product_card"][$_POST['id']]+=$_POST['num'];
}else {
    $_SESSION["product_card"][$_POST['id']]=$_POST['num'];
}
?>
