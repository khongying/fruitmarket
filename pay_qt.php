<?php
		session_start();
		require 'condatabase/conDB.php';
		if ($_SESSION['id'] === $_GET['user']) {
?>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Fruit Market</title>
		<link rel="shortcut icon" type="image/png" href="logo/groceries.png">
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/profile.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	body{
      font-family: 'Itim', cursive;
    }
    #page{
		padding-top:50px;
	}
  tr{
    text-align: center;
  }
  th{
    text-align: center;
    font-size: 20pt;
  }
  td#total{
    text-align: right;
  }
</style>
<body>

<div id="page">

    <?php require'navbar.php'; ?>

		<?php

				$user_id = $_GET['user'];
				$sql = "SELECT * FROM `users` WHERE `id`='{$user_id}'";

				$data = getpdo($con,$sql,1);
				foreach ($data as $row) {
				?>

            <div class="container">
                <div class="row profile">
            		<div class="col-md-3">
            			<div class="profile-sidebar">
            				<!-- SIDEBAR USERPIC -->
            				<!-- END SIDEBAR USERPIC -->
            				<!-- SIDEBAR USER TITLE -->
            				<div class="profile-usertitle">
            					<div class="profile-usertitle-name">
            						<?=$row['fullname']?>
            					</div>
            					<div class="profile-usertitle-job">
            						<?=$row['email']?>
            					</div>
            				</div>
            				<!-- END SIDEBAR USER TITLE -->
            <?php } ?>

            				<!-- SIDEBAR MENU -->
            				<div class="profile-usermenu">
            					<ul class="nav">
            						<li>
            							<a href="profile.php?user=<?=$_SESSION['id']?>">
            							<img src="logo/id-card.png" />
            							ข้อมูลส่วนตัว </a>
            						</li>
            						<li class="active">
            							<a href="history_qt.php?user=<?=$_SESSION['id']?>">
            							<img src="logo/list.png" />
            							ประวัติการสั่งซื้อ </a>
            						</li>
            					</ul>
            				</div>
            				<!-- END MENU -->
            			</div>
            		</div>
            		<div class="col-md-9">
                    <div class="profile-content">
													<div class="row">
														<div>
															<h1 id="profile_name"><img src="logo/board.png" />  ประวัติการสั่งซื้อ</h1><hr/>
														</div>
															<div class="col-md-offset-1 col-md-10">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>รายการ</th>
                                      <th>ราคาต่อชิ้น</th>
                                      <th>จำนวนชิ้น</th>
                                      <th>ราคารวม</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   <?php
                                   $qt = $_GET['qt'];
                                   $total = 0 ;
                                   $sql_list_product = "SELECT list_order.product_id,list_order.sum,product.price FROM list_order LEFT JOIN product ON list_order.product_id = product.code WHERE qt_order_id = '{$qt}'";
                                   $data = getpdo($con,$sql_list_product,1);
                                   foreach ($data as $row) {
                                      $sum = $row['sum'];
                                      $price = $row['price'];
                                      $id_pd = $row['product_id'];
                                      $total = $total + $sum*$price;
                                      $sql = "SELECT * FROM `product` WHERE code = '{$id_pd}'";
                                      $product = getpdo($con,$sql,1);
                                      foreach ($product as $rows) {
                                        $name = $rows['name'];
                                        $img = $rows['img'];
                                        ?>
                                        <tr>
                                          <td><?=$name?></td>
                                          <td><?=number_format($price,2)?></td>
                                          <td><?=$sum?></td>
                                          <td><?=number_format($sum*$price,2)?></td>
                                        </tr>

                                  <?php
                                      }
                                   }
                                   ?>
                                    <tr>
                                      <td id="total" colspan="3">ยอดชำระสินค้า </td>
                                      <td id="total" ><?=number_format($total,2)?> บาท</td>
                                    </tr>
                                  </tbody>
                                </table>

															</div>
                              <div class="col-md-offset-3 col-md-6">
                                  <form class="form-horizontal" name="pay" enctype="multipart/form-data" onSubmit="return chkfrom();">
                                      <div class="form-group">
                                        <label class="control-label col-sm-3">ใบสลิป</label>
                                        <div class="col-sm-8">
                                          <input type="file" name="silp" accept="image/*" class="form-control">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-sm-3">เวลาที่โอน</label>
                                        <div class="col-sm-8">
                                          <input type="datetime-local" name="date" class="form-control">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-sm-3">ยอดการโอน</label>
                                        <div class="col-sm-8">
                                          <input type="number" name="price" class="form-control">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-success">ยืนยัน</button>
                                        </div>
                                      </div>
                                  </form>
                              </div>

                        </div>
            		</div>
            	</div>
            </div>


						<?php
					  include 'footer.php';
					  ?>
            <br>
            <br>
    </div>
  </body>
  <script>
  function chkfrom()
  {
      if(document.pay.date.value=="")
      {
          swal("กรุณากรองวันที่โอนชำระสินค้า", " ", "warning");
          document.pay.date.focus();
          return false;
      }

      if(document.pay.price.value=="")
      {
          swal("กรุณาระบุยอดชำระสินค้า", " ", "warning");
          document.pay.price.focus();
          return false;
      }
  }
  </script>

</html>

<?php
		}else {
			Header("Location: 404_error.php");
		}
?>
