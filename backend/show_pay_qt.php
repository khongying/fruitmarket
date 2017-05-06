<?php

session_start();
    require 'condatabase/conDB.php';

    $sql="SELECT * FROM `content`";

        $result=getpdo($con,$sql,1);
        foreach ($result as $row) {
                $content = $row['text'];
        }

            if (!isset($_SESSION['admin'])){  //check session
                Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login
                }else{?>
<html>
<head>
    <title>Backend</title>
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

    <div id="page" class="container">
        <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <table class="table table-bordered">
                          <tr id="top">
                            <th>ใบสั่งซื้อ</th>
                            <th>ผู้แจ้งชำระ</th>
                          </tr>
                              <?php
                                $sql_qt = "SELECT * FROM `pay_qt`";
                                $qt_order = getpdo($con,$sql_qt,1);
                                if($qt_order != NULL){
                                    foreach ($qt_order as $qt) {
                                  ?>
                                    <tr>
                                    <td><a href="pay_detail.php?qt=<?= $qt['qt_id']?>"><?= $qt['qt_id'] ?></a></td>
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
