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
                        <div>
                            <ul class="nav nav-tabs">
                                <li class="nav-item active">
                                    <a class="nav-link" href="travel.php">เพิ่มสวนผลไม้ (เยี่ยมชม)</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">เพิ่มสวนผลไม้ (เช่า)</a>
                                </li>

                            </ul>
                        </div><br>




                       <div class="container">
                            <div class="row">
                            <div class="col-md-3"></div>
                                <div class="col-md-6"> <br />
                                    <h4 align="center"> เพิ่มสวนผลไม้ (เยี่ยมชม) </h4>
                                <hr />

                                <form action="travel_add.php" name="product" method="POST" class="form-horizontal" onSubmit="return chkfrom();">
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <p> ชื่อสวนผลไม้ </p>
                                            <input type="text" name="name" class="form-control" placeholder="ชื่อสวนผลไม้" />
                                        </div>

                                        <div class="col-sm-6 info">
                                            <p> รูปปก </p>
                                            <input type="file" name="t_img" accept="image/*" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <p> รายละเอียดสินค้า </p>
                                            <textarea name="detail" class="form-control"  rows="3" placeholder="รายละเอียดสินค้า"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-6 info">
                                            <p> ภาพตัวอย่าง 1 </p>
                                            <input type="file" name="t_img_1" accept="image/*" class="form-control" />
                                        </div>

                                        <div class="col-sm-6 info">
                                            <p> ภาพตัวอย่าง 2 </p>
                                            <input type="file" name="t_img_2" accept="image/*" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-6 info">
                                            <p> ภาพตัวอย่าง 3 </p>
                                            <input type="file" name="t_img_3" accept="image/*" class="form-control" />
                                        </div>

                                        <div class="col-sm-6 info">
                                            <p> ภาพตัวอย่าง 4 </p>
                                            <input type="file" name="t_img_4" accept="image/*" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus fa-lg"></i> เพิ่มสวนผลไม้</button>
                                        </div>
                                    </div>
                                </form>
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
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $("#travel").attr({
        "class" : "active"
    });

    function chkfrom()
    {
        if(document.product.name.value=="")
        {
            swal("กรุณากรองชื่อสวนผลไม้", " ", "warning");
            document.product.name.focus();
            return false;
        }

        if(document.product.t_img.value=="")
        {
            swal("กรุณาใส่รูปปก", " ", "warning");
            document.product.t_img.focus();
            return false;
        }

        if(document.product.detail.value=="")
        {
            swal("กรุณาระบุรายละเอียดสวนผลไม้", " ", "warning");
            document.product.detail.focus();
            return false;
        }

        if(document.product.t_img_1.value=="")
        {
            swal("กรุณาใส่รูปตัวอย่างที่ 1", " ", "warning");
            document.product.t_img_1.focus();
            return false;
        }

        if(document.product.t_img_2.value=="")
        {
            swal("กรุณาใส่รูปตัวอย่างที่ 2", " ", "warning");
            document.product.t_img_2.focus();
            return false;
        }

        if(document.product.t_img_3.value=="")
        {
            swal("กรุณาใส่รูปตัวอย่างที่ 3", " ", "warning");
            document.product.t_img_3.focus();
            return false;
        }

        if(document.product.t_img_4.value=="")
        {
            swal("กรุณาใส่รูปตัวอย่างที่ 4", " ", "warning");
            document.product.t_img_4.focus();
            return false;
        }


    }

    </script>
</body>
</html>
<?php } ?>
