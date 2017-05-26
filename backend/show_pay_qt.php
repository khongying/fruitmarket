<?php

session_start();
    require 'condatabase/conDB.php';

            if (!isset($_SESSION['admin'])){  //check session
                Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login
                }else{?>
<html>
<head>
    <title>Backend</title>
    <link rel="shortcut icon" type="image/png" href="logo/backend.png">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/sidebar.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
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
        label.qt{
            font-size: 20px;
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
        ?>
    </div><br>
        <div class="row">
                    <div class="col-md-6">
                        <label class="qt">ใบแจ้งชำระสินค้า</label>
                        <table class="table table-bordered">
                          <tr id="top">
                            <th>ใบสั่งซื้อ</th>
                            <th>ผู้แจ้งชำระ</th>
                          </tr>
                              <?php
                                $sql_qt = "SELECT * FROM `pay_qt` ORDER BY `id` DESC";
                                $qt_order = getpdo($con,$sql_qt,1);
                                if($qt_order != NULL){
                                    foreach ($qt_order as $qt) {
                                  ?>
                                    <tr>
                                    <td><?php echo ($qt['view'] == 1 ? "<span id='count_cart'>NEW</span>" : ""); ?>  <a href="pay_detail.php?qt=<?= $qt['qt_id']?>"><?= $qt['qt_id'] ?></a></td>
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
                        <div class="col-md-6">
                        <label class="qt">ใบแจ้งชำระสินค้า(จากการประมูล)</label>
                        <table class="table table-bordered">
                          <tr id="top">
                            <th>ใบสั่งซื้อ</th>
                            <th>ผู้แจ้งชำระ</th>
                          </tr>
                              <?php
                                $sql_auction_qt = "SELECT * FROM `pay_auction_qt` ORDER BY `id` DESC";
                                $auction_qt = getpdo($con,$sql_auction_qt,1);
                                if($auction_qt != NULL){
                                    foreach ($auction_qt as $auction) {
                                  ?>
                                    <tr>
                                    <td> <?php echo ($auction['view'] == 1 ? "<span id='count_cart'>NEW</span>" : ""); ?>  <a href="pay_detail_auction.php?qt=<?= $auction['qt_id']?>"><?= $auction['qt_id'] ?></a></td>
                                    <td id="name"><?= $auction['name'] ?></td>
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
    $("#cash_qt").attr({ 
        "class" : "active"
    });
    
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
