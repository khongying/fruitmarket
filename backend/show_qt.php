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
    <h2><img src="logo/clinic-history.png" />  ใบสั่งซื้อสินค้า</h2><hr/>
    <div>
        <?php
        include 'meun_qt.php';
        ?>
    </div><br>
        <div class="row">
                    <div class="col-md-6">
                    <label class="qt">ใบสั่งซื้อสินค้า</label>
                        <table class="table table-bordered">
                          <tr id="top">
                            <th>ใบสั่งซื้อ</th>
                            <th>สถานะ</th>
                            <th>วันที่สร้างใบสั่งซื้อ</th>
                          </tr>
                              <?php
                                $sql_qt = "SELECT qt_order.id_qt,qt_order.create_date,qt_status.name FROM qt_order LEFT JOIN qt_status ON qt_order.status_qt_id = qt_status.id ORDER BY `id_qt`DESC";
                                $qt_order = getpdo($con,$sql_qt,1);
                                if($qt_order != NULL){
                                    foreach ($qt_order as $qt) {
                                  ?> 
                                    <tr>
                                    <td><a href="show_list_qt.php?qt=<?= $qt['id_qt']?>"><?= $qt['id_qt'] ?></a></td>
                                    <td id="name"><?= $qt['name'] ?></td>
                                    <td id="name"><?= DateThai($qt['create_date']) ?></td>
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
                        <label class="qt">ใบสั่งซื้อสินค้า(จากการประมูล)</label>
                        <table class="table table-bordered">
                          <tr id="top">
                            <th>ใบสั่งซื้อ</th>
                            <th>สถานะ</th>
                            <th>วันที่สร้างใบสั่งซื้อ</th>
                          </tr>
                              <?php
                                $sql_auction = "SELECT qt_auction.id_qt,qt_auction.create_date,qt_status.name FROM qt_auction LEFT JOIN qt_status ON qt_auction.status_qt_id = qt_status.id ORDER BY `id_qt`DESC";
                                $auction = getpdo($con,$sql_auction,1);
                                if($auction != NULL){
                                    foreach ($auction as $qt_auction) {
                                  ?>
                                    <tr>
                                    <td><a href="show_list_qt_qt_auction.php?qt=<?= $qt_auction['id_qt']?>"><?= $qt_auction['id_qt'] ?></a></td>
                                    <td id="name"><?= $qt_auction['name'] ?></td>
                                    <td id="name"><?= DateThai($qt_auction['create_date']) ?></td>
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
    
    $("#cash_qt").attr({ 
        "class" : "active"
    });

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
