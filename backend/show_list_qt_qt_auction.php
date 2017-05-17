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
                <div class=row>
                  <div class="col-md-9">
                  <?php 
                  $qt = $_GET['qt'];
                  $sql_user = "SELECT qt_auction.id_qt,users.fullname FROM qt_auction LEFT JOIN users ON qt_auction.user_id = users.id WHERE id_qt = '{$qt}'";
                  $data_user = getpdo($con,$sql_user,1);
                  foreach ($data_user as $user) {
                    $name_qt =  $user['fullname'];
                  ?>
                  <label id="user_qt">ใบสั่งซื้อของ : คุณ <?= $name_qt ?></label>
                  <?php
                  }
                  ?>
                  </div>
                  <div class="col-md-3">
                     <a href="../slip_qt_action.php?qt=<?=$qt?>" target="_blank" class="btn btn-info"><img src="logo/printer.png"> พิมพ์ใบสั่งซื้อ</a>
                  </div>
                </div><br>
                  <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>รายการ</th>
                          <th>จำนวนชิ้น</th>
                          <th>ราคา</th>
                        </tr>
                     </thead>
                     <tbody>
                       <?php
                       $qt = $_GET['qt'];
                       $total = 0 ;
                       $sql_list_product = "SELECT qt_auction.id_qt,qt_auction.auction_product_id,qt_auction.now_price,auction_product.name FROM qt_auction LEFT JOIN auction_product ON qt_auction.auction_product_id = auction_product.code WHERE `id_qt`='{$qt}'";
                       $data = getpdo($con,$sql_list_product,1);
                       foreach ($data as $row) {
                          $sum = 1 ;
                          $price = $row['now_price'];
                          $id_pd = $row['id_qt'];
                          $name =  $row['name'];
                          $total = $sum*$price;
                        ?>
                        <tr>
                          <td><?=$name?></td>
                          <td><?=$sum?></td>
                          <td><?=$price?></td>
                        </tr>
                      <?php  
                       }
                       ?>
                        <tr>
                          <td id="total" colspan="2">ยอดชำระสินค้า </td>
                          <td id="total" ><?=number_format($total,2)?> บาท</td>
                        </tr>
                      </tbody>
                    </table>
                    <?php
                        $sql_qt = "SELECT qt_status.id,qt_status.name FROM qt_auction LEFT JOIN qt_status ON qt_auction.status_qt_id = qt_status.id WHERE id_qt = '{$qt}'";
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
                                <form method="POST" action="update_auction.php">
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
