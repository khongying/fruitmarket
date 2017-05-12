
<?php
   require 'condatabase/conDB.php';
   $status = $_POST['qt_status'];
?>

<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Fruit Market</title>
	  <link rel="shortcut icon" type="image/png" href="logo/groceries.png">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/profile.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="col-md-offset-2 col-md-7">
  <table class="table table-hover">
    <tr>
      <th>ใบสั่งซื้อ</th>
      <th>ชื่อ-นามสกุล</th>
      <th>ราคา</th>
      <th>สถานะ</th>
    </tr>
    <?php
      $sql_qt = "SELECT qt_order.id_qt,qt_order.create_date,qt_status.name,users.fullname FROM qt_order LEFT JOIN qt_status ON qt_order.status_qt_id = qt_status.id LEFT JOIN users ON qt_order.user_id = users.id  WHERE status_qt_id = '{$status}'";
      $qt_order = getpdo($con,$sql_qt,1);
      if($qt_order != NULL){
          foreach ($qt_order as $qt) {
        ?>
         <tr>
          <td><a href="pay_qt.php?qt=<?= $qt['id_qt']?>"><?= $qt['id_qt'] ?></a></td>
          <td id="name"><?= $qt['fullname'] ?></td>
          <td id="name">
          <?php
          $sql_sum = "SELECT sum(`sum`*`price`) as total FROM list_order WHERE `qt_order_id` = '{$qt['id_qt']}'";
          $total = getpdo($con,$sql_sum,1);
          foreach ($total  as $sum_total) {
          	 $total_sum =  $sum_total['total'];
          	}
          ?>
          <?=  number_format($total_sum,2)?>
          </td>
          <td id="name"><?=$qt['name'] ?></td>
        </tr>

        <?php
        }
        
      }else{
          ?>
            <tr>
              <td colspan="2" id="no_data">**ไม่มีข้อมูล**</td>
            </tr>
          <?php
      }

      $sql_con = "SELECT COUNT(qt_status.name) as num,qt_order.id_qt,qt_order.create_date,qt_status.name FROM qt_order LEFT JOIN qt_status ON qt_order.status_qt_id = qt_status.id WHERE status_qt_id = '{$status}'";
      $sql_con = getpdo($con,$sql_con,1);
        foreach ($sql_con as $row) {
      ?>
      	<label>จำนวนสถานะ : <?=$row['num']?></label>
    <?php
        }
    ?>
    </table>
</div>

</body>
</html>
