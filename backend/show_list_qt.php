<?php

session_start();
    require 'condatabase/conDB.php';

            if (!isset($_SESSION['admin'])){  //check session
                Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login
                }else{?>
<html>
<head>
    <title>Backend</title>
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
        label#status{
            font-size: 20pt;
            color: red;
        }
        label#user_qt{
           font-size: 20pt;
           color: #301781;
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
    <h2><img src="logo/clinic-history.png" />  ใบสั่งซื้อสินค้า</h2><hr/>
    <div>
        <?php
        include 'meun_qt.php';
        ?>
    </div><br>
        <div class="row">
             
                <div class="col-md-offset-1 col-md-9">
                <?php 
                $qt = $_GET['qt'];
                $sql_user = "SELECT qt_order.id_qt,users.fullname FROM qt_order LEFT JOIN users ON qt_order.user_id = users.id WHERE id_qt = '{$qt}'";
                $data_user = getpdo($con,$sql_user,1);
                foreach ($data_user as $user) {
                  $name_qt =  $user['fullname'];
                ?>
                <label id="user_qt">ใบสั่งซื้อของ : คุณ <?= $name_qt ?></label>
                <?php
                }
                ?>

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
                       $sql_list_product = "SELECT list_order.product_id,list_order.sum,list_order.price FROM list_order LEFT JOIN product ON list_order.product_id = product.code WHERE qt_order_id = '{$qt}'";
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
                        $id_status = $qt['id'];
                        if($id_status == 5 ){
                      ?>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-6" id="status">สถานะ : <?= $qt['name'] ?></label>
                            </div>
                        </div>
                    <?php
                        }else{
                    ?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-6" id="status">สถานะ : <?= $qt['name'] ?></label>
                                <form method="POST" action="update_status.php">
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
                                      <input type="hidden" name="qt" value="<?=$_GET['qt']?>">
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
                <div class="col-lg-12">
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
    $("#qt_order").attr({
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
