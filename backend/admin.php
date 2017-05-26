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
                                    <a href="add_admin.php" class="btn btn-info"><img src="logo/employee.png" /> เพิ่มผู้ดูแลระบบ</a>
                                    <?php
                                          $sql="SELECT * FROM `backend` WHERE `status`= 'A' AND `role` = 'admin'";
                                          $result=getpdo($con,$sql,1);
                                          if ($result != NULL) {
                                    ?>
                                    <table class="table table-inverse">
                                      <thead>
                                        <tr>
                                          <th>ผู้ดูแล</th>
                                          <th>ตำแหน่ง</th>
                                          <th>ลบ</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                    <?php
                                          foreach ($result as $row) {
                                          ?>
                                            <tr>
                                                <td><?= $row['full_name'] ?></td>
                                                <td><?= $row['role'] ?></td>
                                                <td><a class="del_admin btn btn-danger" admin_id="<?=$row['id']?>"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                    <?php
                                        }
                                    }else{
                                    ?>
                                        <center>
                                            <h1><label>**ยังไม่มีผู้ดูแลระบบ**</label></h1> 
                                        </center>
                                    <?php
                                    }
                                   ?>
                                
                                  </tbody>
                                </table>
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

     $('.del_admin').click(function(event) {
        var id = $(this).attr('admin_id');
        $.post('del_admin.php', {admin_id: id}, 
            function() {
                
        }).done(function(data){
             location.reload();
        });
     });   

</script>
</body>
</html>
<?php } ?>
