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
                                <li class="nav-item active">
                                    <a class="nav-link" href="users.php">ระบบจัดการผู้ใช้งาน</a>
                                </li>
                                <?php
                                    if ($_SESSION['role'] == "power_admin") {
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="admin.php">ระบบจัดการผู้ดูแลระบบ</a>
                                </li>
                                <?php       
                                    }
                                ?>
                            </ul>
                        </div><br>
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                    <table class="table table-inverse">
                                      <thead>
                                        <tr>
                                          <th align="center">ลำดับ</th>
                                          <th>อีเมล์</th>
                                          <th>ชื่อผู้ใช้</th>
                                          <th>ลบ</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                      $sql="SELECT * FROM `users` WHERE `status`= 'A'";
                                      $result=getpdo($con,$sql,1);
                                      $i=0;
                                      foreach ($result as $row) {
                                      ?>
                                        <tr>
                                            <td align="center"><?php echo ++$i; ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['fullname'] ?></td>
                                            <td><a class="del_user btn btn-danger" user_id="<?=$row['id']?>"><i class="fa fa-trash"></i></a></td>
                                        </tr>
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

     $('.del_user').click(function(event) {
        var id = $(this).attr('user_id');
        $.post('del_user.php', {user_id: id}, 
            function() {
                
        }).done(function(data){
             location.reload();
        });
     });   

</script>
</body>
</html>
<?php } ?>
