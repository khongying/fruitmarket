<?php

session_start();
    require 'condatabase/conDB.php';
    require '../service/datetime.php';



            if (!isset($_SESSION['admin'])){  //check session
                Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login
                }else{?>
<html>
<head>
    <title>Backend</title>
    <link rel="shortcut icon" type="image/png" href="logo/backend.png">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/sidebar.css" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap-select.css">
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/dist/js/bootstrap-select.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css" media="screen">
        body{
            font-family: 'Itim', cursive;
        }
        #wrapper{
            padding-top:50px;
        }
        table,thead,tr,tbody,th,td {
            text-align: center;
        }
        tr#top{
            background-color: #DAFAF8;
        }
        td#total{
            background-color: #F6A9CE;
        }
        label#name_status{
            font-size: 20pt;
            color: red;
        }
        label#status{
            font-size: 20pt;
        }
        label.qt{
          font-size: 20pt;
          color: red;
        }
        #img{
          width: 550px;
          height: 550px;
        }
    </style>
</head>
<body>
    <diV id="navbar">
        <?php
                include 'navbar.php';
        ?>
    </diV>
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            include 'sidebar.php';
        ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
<div class="col-lg-12">
    <h2><img src="logo/payment-method.png" />  ตรวจสอบการแจ้งชำระสินค้า</h2><hr/>
    <div>
        <?php
        include 'meun_qt.php';

        $sql_view = "UPDATE `pay_qt` SET `view`= '0' WHERE `qt_id` = '{$_GET['qt']}'";
        (getpdo($con,$sql_view));
        ?>
    </div><br>
        <div class="row">
                <?php
                $qt = $_GET['qt'];
                $sql_pay = "SELECT * FROM `pay_qt` WHERE `qt_id` = '{$qt}' ";
                $qt_pay = getpdo($con,$sql_pay,1);
                  foreach ($qt_pay as $row) {
                    $strDate = $row['date_time'];
                    $thaiDate = DateThai($strDate);
                ?>
                <div class="col-md-12">
                    <label class="qt">ใบแจ้งชำระสินค้า : <?=$row['qt_id']?></label>
                </div>
                <div class="col-md-offset-2 col-md-8">
                      <div class="form-group">
                        <label class="control-label col-sm-3">ใบสลิป</label>
                        &nbsp;
                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">
                          สลิปการโอน
                        </button>
                        
                          <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">สลิปการโอน</h4>
                                </div>
                                <div class="modal-body">
                                <center>
                                  <img id="img" src="../payment/<?=$row['img']?>" />
                                </center>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                </div>
                              </div>
                              
                            </div>
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3">ชื่อผู้โอน</label>
                        <label class="control-label col-md-9"><?=$row['name']?></label>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3">เวลาที่โอน</label>
                        <label class="control-label col-md-9"><?=$thaiDate?></label>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3">ยอดการโอน</label>
                        <label class="control-label col-md-9"><?=number_format($row['total'],2)?></label>
                      </div>
                </div>
                <?php
                  }
                  $qt_id =  $row['qt_id'];
                ?>
                
                <div class="col-md-11">
                <hr/>
                <label class="qt">ใบสั่งซื้อ : <?=$qt_id?></label>
                </div>
                <div class="col-md-offset-2 col-md-8">
                    <table class="table table-bordered">
                      <thead>
                        <tr id="top">
                          <th>รายการ</th>
                          <th>ราคาต่อชิ้น</th>
                          <th>จำนวนชิ้น</th>
                          <th>ราคารวม</th>
                        </tr>
                     </thead>
                     <tbody>
                       <?php
                       $total = 0 ;
                       $sql_list_product = "SELECT list_order.product_id,list_order.sum,list_order.price FROM list_order LEFT JOIN product ON list_order.product_id = product.code WHERE qt_order_id = '{$qt_id}'";
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
                          <td colspan="3">ยอดชำระสินค้า </td>
                          <td id="total" ><?=number_format($total,2)?> บาท</td>
                        </tr>
                      </tbody>
                    </table>
                    <?php
                        $sql_qt = "SELECT qt_status.id,qt_status.name FROM qt_order LEFT JOIN qt_status ON qt_order.status_qt_id = qt_status.id WHERE id_qt = '{$qt}'";
                        $qt_order = getpdo($con,$sql_qt,1);
                        foreach ($qt_order as $qt) {
                          if($qt['id'] == 5){
                    ?>
                      <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3" id="status">สถานะ :</label>
                                <div class="col-md-5">
                                    <label id="name_status"><?= $qt['name'] ?></label>
                                </div>
                            </div>
                      </div>
                    <?php
                          }else{
                    ?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3" id="status">สถานะ :</label>
                                <div class="col-md-4">
                                    <label id="name_status"><?= $qt['name'] ?></label>
                                </div>
                                <form method="POST" action="update_cut_stock.php">
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
                                      <input type="hidden" name="qt" value="<?=$qt_id?>">
                                      <button type="submit" class="btn btn-danger">อัพเดทสถานะ</button>
                                  </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    <?php
                          }
                            }
                    ?>

                </div>
                <div class="col-md-12">
                <hr/>
                <footer class="footer">
                    <p>&copy; BSRU 2017</p>
                </footer>
                </div>
    </div>
</div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
     <!-- Menu Toggle Script -->
    <script>
    $("#qt_pay").attr({
        "class" : "active"
    });

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>
<?php } ?>
