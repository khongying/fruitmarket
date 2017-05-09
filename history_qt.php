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
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/profile.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
  #page{
		padding-top:50px;
	}
  tr{
    text-align: center;
  }
  th{
    text-align: center;
    font-size: 20pt;
    background-color:#76E2F4;
  }
  td#name{
    color: #FF0000;
  }
  td#no_data{
    color: #FF0000;
    font-size: 20pt;
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
															<div class="col-md-offset-2 col-md-7">
                                <table class="table table-hover">
                                  <tr>
                                    <th>ใบสั่งซื้อ</th>
                                    <th>สถานะ</th>
                                  </tr>
                                  <?php
                                    $sql_qt = "SELECT qt_order.id_qt,qt_order.create_date,qt_status.name FROM qt_order LEFT JOIN qt_status ON qt_order.status_qt_id = qt_status.id WHERE qt_order.user_id = '{$_SESSION['id']}'";
                                    $qt_order = getpdo($con,$sql_qt,1);
                                    if($qt_order != NULL){
                                        foreach ($qt_order as $qt) {
                                      ?>
                                        <tr>
                                        <td><a href="pay_qt.php?qt=<?= $qt['id_qt']?>&user=<?=$_SESSION['id']?>"><?= $qt['id_qt'] ?></a></td>
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
                                  <tr>
                                    <th colspan="2">ใบสั่งซื้อ(จากการประมูล)</th>
                                  </tr>
                                  <?php
                                    $sql_action = "SELECT qt_auction.id_qt,qt_status.name FROM qt_auction LEFT JOIN qt_status ON qt_auction.status_qt_id = qt_status.id WHERE qt_auction.user_id = '{$_SESSION['id']}'";
                                    $action = getpdo($con,$sql_action,1);
                                    if($qt_order != NULL){
                                        foreach ($action as $list) {
                                  ?>
                                      <tr>
                                        <td><a href="pay_action.php?qt=<?= $list['id_qt'] ?>&user=<?=$_SESSION['id']?>"><?= $list['id_qt'] ?></a></td>
                                        <td id="name"><?= $list['name'] ?></td>
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
  $("#history_qt").attr({
  		"class" : "active"
  });
  </script>

</html>

<?php
		}else {
			Header("Location: 404_error.php");
		}
?>
