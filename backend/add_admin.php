<?php
$host="localhost";
$username="root";
$password="";
$DBname="fruitmarket";
$con=mysqli_connect($host,$username,$password,$DBname);
mysqli_set_charset($con,"utf8");
session_start();

$data = $_POST['addmain'];
$col = array();
$value_arr = array();
     foreach ($data as $key => $value) {
      $col[] = $value["name"];
      $value_arr[]= ($key == 1) ? md5($value["value"]) : $value["value"];

     }

    $column = "(`". implode("`,`", $col) ."`)";
    $str_value = "('".implode("','", $value_arr)."')";

    $sql =  "INSERT INTO `backend` {$column} VALUES {$str_value}";
    if (mysqli_query($con, $sql)) {
        echo "Success";
    }else{
        echo "Error updating record: " . mysqli_error($con);
    }


?>