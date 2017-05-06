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

    <div id="page" class="container">
        <div class="row">
             
                <div class="col-md-offset-1 col-md-9">
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
                          <td colspan="3">ยอดชำระสินค้า </td>
                          <td id="total" ><?=number_format($total,2)?> บาท</td>
                        </tr>
                      </tbody>
                    </table>
                    <?php
                        $sql_qt = "SELECT qt_status.name FROM qt_order LEFT JOIN qt_status ON qt_order.status_qt_id = qt_status.id WHERE id_qt = '{$qt}'";
                        $qt_order = getpdo($con,$sql_qt,1);
                        foreach ($qt_order as $qt) {
                    ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-sm-4" id="status">สถานะ :</label>
                                <div class="col-sm-8">
                                        <label id="name_status"><?= $qt['name'] ?></label>
                                </div>
                            </div>
                        </div>
                        </div>
                    <?php
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
