<?php 
    session_start();
            if (!isset($_SESSION['admin'])){  //check session 
                Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login
                }else{?>
<html>
<head>
    <title>Backend</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/sidebar.css" rel="stylesheet">
    <link href="bootstrap/font-awesome/css/font-awesome.css" rel="stylesheet">
    <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css" media="screen">
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
                        <div>
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="product.php">เพิ่มผลไม้</a>
                                </li>

                                <li class="nav-item active">
                                    <a class="nav-link" href="product2.php">เพิ่มผลไม้แปลรูป</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">เพิ่มผลไม้(สำหรับประมูล)</a>
                                </li>
                            </ul>
                        </div><br>

                        <div>
                        <!-- form-->

                        <div class="container">
                            <div class="row">
                            <div class="col-md-3"></div>
                                <div class="col-md-6"> <br />
                                    <h4 align="center"> เพิ่มผลไม้แปลรูป </h4>
                                <hr />

                                <form action="add_product_db.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <p> รหัสสินค้า</p>
                                            <input type="text"  name="p_code" class="form-control" required placeholder="รหัสสินค้า" />
                                        </div>  
                                        <div class="col-sm-6">
                                            <p> ชื่อสินค้า</p>
                                            <input type="text"  name="p_name" class="form-control" required placeholder="ชื่อสินค้า" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <p> รายละเอียดสินค้า </p>
                                            <textarea name="p_detail" class="form-control"  rows="3"  required placeholder="รายละเอียดสินค้า"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <p> ราคา (บาท) </p>
                                            <input type="number"  name="p_price" class="form-control" required placeholder="ราคา" />
                                        </div>
                                        <div class="col-sm-8 info">
                                            <p> ภาพสินค้า </p>
                                            <input type="file" name="p_img" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus fa-lg"></i> เพิ่มสินค้า </button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>


                        <!-- form-->
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
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>   
<?php } ?>