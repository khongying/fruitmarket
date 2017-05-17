<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php
	if (isset($_POST)){
	require 'condatabase/conDB.php';
	
	$sql = "UPDATE `hire_garden` SET `name`='{$_POST['name']}',`detail`='{$_POST['detail']}',`price`='{$_POST['price']}',`phone`='{$_POST['phone']}',`line`='{$_POST['line']}' WHERE `id` ='{$_POST['id']}'";
	
		try{
		    if(getpdo($con,$sql)){
		      echo '<script>window.onload = function () {';
		      echo 'swal({
		            title: "แก้ไขเรียบร้อย",
		            text: "",
		            type: "success",
		            showCancelButton: false,
		            confirmButtonColor: "#5cb85c",
		            confirmButtonText: "OK",
		            },
		            function(isConfirm){
		            if (isConfirm) {
		            window.location.href = "travel_garden.php";
		            }
		            });}';
		      echo '</script>';
	    	}
		    else{
		      echo '<script>window.onload = function () {';
		      echo 'swal({
		            title: "แก้ไขไม่สำเร็จ",
		            text: " ",
		            type: "warning",
		            showCancelButton: false,
		            confirmButtonColor: "#DD6B55",
		            confirmButtonText: "OK",
		            },
		            function(isConfirm){
		            if (isConfirm) {
		            window.location.href = "travel_garden.php";
		            }
		            });}';
		      echo '</script>';
		    }
	  }
	  catch (PDOException $e) {
	  echo 'ERORR: ',  $e->getMessage(), "\n";
	  }

}
?>