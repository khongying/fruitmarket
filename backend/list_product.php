<?php

require 'condatabase/conDB.php';

session_start();
            if (!isset($_SESSION['admin'])){  //check session
                Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login
                }else{?>
<html>
<head>
    <title>Backend | คลังสินค้า</title>
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
                    <table class="table table-inverse">
                      <thead>
                        <tr>
                          <th width="4%">ลำดับ</th>
                          <th width="5%">&nbsp;</th>
                          <th width="45%">ชื่อสินค้า</th>
                          <th width="20%">ราคา</th>
                          <th width="10%">จำนวน (ชิ้น)</th>
                          <th width="20s%"><center>แก้ไข / ลบ</center></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $sql="SELECT * FROM `product`";

                      $result=getpdo($con,$sql,1);
                      $i=0;
                      foreach ($result as $row) {
                      ?>
                        <tr>
                          <th><?php echo ++$i; ?></th>
                          <th><img src="product/<?= $row['img']; ?>" width="60" height="60"></th>
                          <th><?=$row['name'];?></th>
                          <th><?= number_format($row['price'],2);?></th>
                          <th><center><?=$row['num'];?></center></th>
                          <th>
                            <center>
                              <a href="form_edit_product.php?product_id=<?php echo $row['id']; ?>">แก้ไข</a>
                              /
                              <a href="delete_product.php?product_id=<?php echo $row['id']; ?>">ลบ</a>
                            </center>
                          </th>
                        </tr>
                    <?php
                            }
                   ?>
                  </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
     <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $("#list_product").attr({
        "class" : "active"
    });
    </script>
</body>
</html>
<?php } ?>
