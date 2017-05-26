<?php 
    require 'condatabase/conDB.php';
    session_start();
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
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="tinymce/js/tinymce/init-tinymce.js"></script>
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
                        <h2><img src="logo/promotion.png" />  ประชาสัมพันธ์-โปรโมชั่น</h2><hr/>
                        <div>
                        <!-- form-->

                        <div class="row">
                            <div class="col-md-offset-2 col-md-8"> <br />
                                <h4 align="center"> เพิ่มข่าวสาร </h4>
                            <hr />

                                <form action="new_promotion_edit.php" name="new_promotion" method="POST" class="form-horizontal" enctype="multipart/form-data" onSubmit="return chkfrom();">
                                <?php
                                    $sql = "SELECT * FROM `news_promotion` WHERE `id` = '{$_GET['id']}'";
                                    $result=getpdo($con,$sql,1);
                                     foreach ($result as $row) { 
                                ?>

                                    <div class="form-group">
                                        <label class="control-label col-sm-4">ชื่อเรื่อง</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="title" class="form-control" value="<?=$row['name_title'] ?>" />
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="control-label col-sm-4">รายละเอียด</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <textarea class="tinymce" name="detail"><?=$row['detail'] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-4">รูปประกอบ</label>
                                        <div class="col-sm-6">
                                            <input type="file" name="img" class="form-control" />
                                            <input type="hidden" name="id" value="<?=$row['id'] ?>"  />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus fa-lg"></i> อัพเดทข่าวสาร</button>
                                        </div>
                                    </div>
                                <?php      
                                    
                                    }
                                ?>
                                </form>
                                </div>
                            </div>
            

                        <hr/>
                        <footer class="footer">
                        <p>&copy; BSRU 2017</p>
                        </footer>   
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

    $("#new_promotion").attr({
        "class" : "active"
    });

    function chkfrom()
    {
        if(document.new_promotion.title.value=="")
        {
            swal("กรุณากรองชื่อเรื่อง", " ", "warning");
            document.new_promotion.title.focus();
            return false;
        }

        if(document.new_promotion.detail.value=="")
        {
            swal("กรุณากรองรายละเอียด", " ", "warning");
            document.new_promotion.detail.focus();
            return false;
        }


    }
</script>
</body>
</html>
<?php } ?>
