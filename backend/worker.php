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
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
    <!-- <script type="text/javascript" src="bootstrap/js/jquery.js"></script> -->
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
                                            <form class="form-horizontal" action="add_person.php" name="worker" method="POST" onSubmit="return chkfrom();">
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
                                                    <input type="text" name="phone" id="phone" class="form-control" max="13">
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

    $('#phone').mask('000-000-0000');

    function chkfrom()
    {
        if(document.worker.name.value=="")
        {
            swal("กรุณากรองชื่อ-นามสกุล", " ", "warning");
            document.worker.name.focus();
            return false;
        }

        if(document.worker.address.value=="")
        {
            swal("กรุณากรองที่อยู่", " ", "warning");
            document.worker.address.focus();
            return false;
        }

        if(document.worker.phone.value=="")
        {
            swal("กรุณากรองเบอร์โทรศัพท์", " ", "warning");
            document.worker.phone.focus();
            return false;
        }

    }

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
