<?php
    session_start();
            if (!isset($_SESSION['admin'])){  //check session
                Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login
                }else{?>
<html>
<head>
    <title>Backend | เพิ่มสินค้าสำหรับประมูล</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/sidebar.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
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
                        <h2><img src="logo/auction.png" />  เพิ่มสินค้าสำหรับประมูล</h2><hr/>
                        <div>
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="product.php">เพิ่มผลไม้</a>
                                </li>

                                <li class="nav-item active">
                                    <a class="nav-link" href="auction_product.php">เพิ่มผลไม้(สำหรับประมูล)</a>
                                </li>
                            </ul>
                        </div><br>

                        <div>
                        <!-- form-->

                        <div class="container">
                            <div class="row">
                            <div class="col-md-3"></div>
                                <div class="col-md-6"> <br />
                                    <h4 align="center"> เพิ่มสินค้า </h4>
                                <hr />

                                <form action="add_product_db.php" name="product" method="POST" class="form-horizontal" enctype="multipart/form-data" onSubmit="return chkfrom();">
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <p> รหัสสินค้า</p>
                                            <input type="text"  name="p_code" class="form-control" placeholder="รหัสสินค้า" />
                                        </div>
                                        <div class="col-sm-6">
                                            <p> ชื่อสินค้า</p>
                                            <input type="text"  name="p_name" class="form-control" placeholder="ชื่อสินค้า" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <p> รายละเอียดสินค้า </p>
                                            <textarea name="p_detail" class="form-control"  rows="3" placeholder="รายละเอียดสินค้า"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <p> ราคาเริ่มต้นประมูล </p>
                                            <input type="number"  name="p_price" class="form-control" placeholder="ราคา" />
                                        </div>
                                        <div class="col-sm-3">
                                            <p> เวลาในการประมูล </p>
                                            <input type="time"  name="p_num" class="form-control" placeholder="ราคา" />
                                        </div>
                                        <div class="col-sm-6 info">
                                            <p> ภาพสินค้า </p>
                                            <input type="file" name="p_img" accept="image/*" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus fa-lg"></i> เพิ่มสินค้า </button>
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

    $("#product").attr({
        "class" : "active"
    });

    function chkfrom()
    {
        if(document.product.p_code.value=="")
        {
            swal("กรุณากรองรหัสสินค้า", " ", "warning");
            document.product.p_code.focus();
            return false;
        }

        if(document.product.p_name.value=="")
        {
            swal("กรุณากรองชื่อสินค้า", " ", "warning");
            document.product.p_name.focus();
            return false;
        }

        if(document.product.p_detail.value=="")
        {
            swal("กรุณาระบุรายละเอียดสินค้า", " ", "warning");
            document.product.p_detail.focus();
            return false;
        }

        if(document.product.p_price.value=="")
        {
            swal("กรุณาระบุราคาสินค้า", " ", "warning");
            document.product.p_price.focus();
            return false;
        }

        if(document.product.p_img.value=="")
        {
            swal("กรุณาใส่รูปตัวอย่างสินค้า", " ", "warning");
            document.product.p_img.focus();
            return false;
        }


    }
</script>
</body>
</html>
<?php } ?>
