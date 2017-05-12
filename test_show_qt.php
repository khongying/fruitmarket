<?php
   require 'condatabase/conDB.php';
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
   <form method="POST" action="list_qt.php">
      <div class="col-md-3">
          <?php 
            $sql_qt_status =  "SELECT * FROM `qt_status`";
            $data = getpdo($con,$sql_qt_status,1);
          ?>
          <select name="qt_status" class="selectpicker show-tick form-control">
          <?php foreach ($data as $rows) {
          ?>
          <option value="<?= $rows['id'] ?>">
            <?php echo $rows['name']; ?>
          </option>
          <?php
          }

          ?>
          </select>
      </div>
      <div class="col-md-2">
          <button type="submit" class="btn btn-danger">ค้นหา</button>
      </div>
    </form>
  <table class="table table-hover">
    <tr>
      <th>ใบสั่งซื้อ</th>
      <th>สถานะ</th>
    </tr>
    <?php
      $sql_qt = "SELECT qt_order.id_qt,qt_order.create_date,qt_status.name FROM qt_order LEFT JOIN qt_status ON qt_order.status_qt_id = qt_status.id";
      $qt_order = getpdo($con,$sql_qt,1);
      if($qt_order != NULL){
          foreach ($qt_order as $qt) {
        ?>
          <tr>
          <td><a href="pay_qt.php?qt=<?= $qt['id_qt']?>"><?= $qt['id_qt'] ?></a></td>
          <td id="name"><?= $qt['name'] ?></td>
        </tr>
        <?php
        }
      }else{
          ?>
            <tr>
              <td colspan="2" id="no_data">**ไม่มีข้อมูลการสั่งซื้อ**</td>
            </tr>
          <?php
      }
    ?>
    </table>
</div>

</body>
</html>
