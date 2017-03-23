<?php

    require 'condatabase/conDB.php';


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
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap-select.css">
    <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/dist/js/bootstrap-select.js"></script>
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
                            <h2><img src="logo/team.png" />  ระบบจัดการคนงาน</h2><hr/>
                            <div>
                              <?php
                                  include 'meun_worker.php';
                              ?>
                            </div><br>

                            <div id="page" class="container">
                                <div class="row">
                                    <div class="col-md-offset-2 col-md-6">
                                        <div class="form-register">
                                            <center>
                                                <h1><img src="logo/farmer.png" />  เพิ่มคนงาน</h1><br/>
                                            </center>
                                            <form class="form-horizontal" action="add_person.php" method="POST">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">ชื่อ-นามสกุล</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">ที่อยู่</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="address"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-4">เบอร์โทรศัพท์</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="phone" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-4 col-sm-8">
                                                    <button type="submit" class="btn btn-warning"><img src="logo/user.png" />  เพิ่ม</button>
                                                </div>
                                            </div>

                                            </form>

                                        </div>
                                        <hr/>
                                        <footer class="footer">
                                            <p>&copy; BSRU 2017</p>
                                        </footer>
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
    $("#worker").attr({
        "class" : "active"
    });

    $("#worker_person").attr({
        "class" : "active"
    });
    </script>
</body>
</html>
<?php } ?>
