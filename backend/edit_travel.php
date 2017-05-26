<?php
    if (isset($_GET['travel_id'])){
    require 'condatabase/conDB.php';
    $id = $_GET['travel_id'];
    session_start();
            if (!isset($_SESSION['admin'])){  //check session
                Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login
                }else{

?>
<html>
<head>
    <title>Backend</title>
    <link rel="shortcut icon" type="image/png" href="logo/backend.png">
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
        label.title{
            font-size: 24pt;
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
                        <h2><img src="logo/fields.png" />  แก้ไขสวนผลไม้ (เยี่ยมชม)</h2><hr/>
                        

                            <div class="row">
                            <div class="col-md-3"></div>
                                <div class="col-md-6"> <br />
                            <?php
                                $sql = "SELECT * FROM `travel` WHERE `id` = '{$id}'";
                                $result=getpdo($con,$sql,1);
                                foreach ($result as $row) {
                            ?>
                                <form action="travel_edit.php" name="product" method="POST" class="form-horizontal" onSubmit="return chkfrom();">
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <p> ชื่อสวนผลไม้ </p>
                                            <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>" />

                                            <input type="hidden" name="id" class="form-control" value="<?= $row['id'] ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <p> รายละเอียดสวนผลไม้ </p>
                                            <textarea name="detail" class="form-control"  rows="5" ><?= $row['detail']?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4 info">
                                            <p> ตำแหน่ง Lat </p>
                                            <input type="text" name="lat" class="form-control" value="<?= $row['lat']?>" />
                                        </div>

                                        <div class="col-sm-4 info">
                                            <p> ตำแหน่ง Lng </p>
                                            <input type="text" name="lng" class="form-control" value="<?= $row['lng']?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> อัพเดท </button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            <?php 
                                }

                            ?>
                            </div>
                            <hr/>
                            <footer class="footer">
                            <p>&copy; BSRU 2017</p>
                            </footer>


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


    }

    </script>
</body>
</html>
<?php 
    }
}
 ?>
