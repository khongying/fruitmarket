<?php 
require 'condatabase/conDB.php';
    session_start();
            if (!isset($_SESSION['admin'])){  //check session
                Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login
                }else{?>
<html>
<head>
    <title>Backend | ระบบจัดการผู้ใช้งาน</title>
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
                        <h2><img src="logo/teams.png" />  ระบบจัดการผู้ใช้งาน</h2><hr/>
                        <div>
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="users.php">ระบบจัดการผู้ใช้งาน</a>
                                </li>
                                <?php
                                    if ($_SESSION['role'] == "power_admin") {
                                ?>
                                <li class="nav-item active">
                                    <a class="nav-link" href="admin.php">ระบบจัดการผู้ดูแลระบบ</a>
                                </li>
                                <?php       
                                    }
                                ?>
                            </ul>
                            
                        </div><br>
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                            <h4 align="center"><img src="logo/employee.png" /> เพิ่มผู้ดูแลระบบ </h4><hr/>
                            <form action="" name="admin" class="form-horizontal" onSubmit="return chkfrom();">
                                 <div class="form-group">
                                    <label class="control-label col-md-4">Username</label>
                                        <div class="col-md-6">
                                            <input type="text" name="username" class="form-control" placeholder="Username" />
                                        </div>
                                 </div>  
                                 <div class="form-group">
                                    <label class="control-label col-md-4">Password</label>
                                        <div class="col-md-6">
                                            <input type="text" name="password" class="form-control" placeholder="Username" />
                                        </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-4">ชื่อ - นามสกุล</label>
                                        <div class="col-md-6">
                                            <input type="text" name="name" class="form-control" placeholder="Username" />
                                        </div>
                                 </div>  
                                 <div class="form-group">
                                    <label class="control-label col-md-4">ตำแหน่ง</label>
                                        <div class="col-md-6" name="role">
                                            <select class="form-control">
                                                <option value="admin">Admin</option>
                                                <option value="power_admin">Power Admin</option>
                                            </select>
                                        </div>
                                 </div>  
                                 <div class="form-group">
                                    <div class="col-md-offset-5">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus fa-lg"></i> Add</button>
                                    </div>
                                </div>
                            </form> 
                            </div>
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

    $("#user").attr({
        "class" : "active"
    });


    function chkfrom()
    {
        if(document.admin.username.value=="")
        {
            swal("กรุณากรอง Username", " ", "warning");
            document.admin.username.focus();
            return false;
        }

        if(document.admin.password.value=="")
        {
            swal("กรุณากรอง Password", " ", "warning");
            document.admin.password.focus();
            return false;
        }

        if(document.admin.name.value=="")
        {
            swal("กรุณากรอง ชื่อ - นามสกุล", " ", "warning");
            document.admin.name.focus();
            return false;
        }

       
    }

</script>
</body>
</html>
<?php } ?>
