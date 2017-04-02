<?php

session_start();
    require 'condatabase/conDB.php';

    $sql="SELECT * FROM `content`";

        $result=getpdo($con,$sql,1);
        foreach ($result as $row) {
                $content = $row['text'];
        }

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
                        <form action="add_content.php" method="post">
                            <h2>ระบบจัดการผู้ใช้งาน</h2><hr/>
                            <div class="col-lg-offset-1 col-lg-10">
                              <table class="table table-hover">
                                <tr>
                                  <th>#</th>
                                  <th>E-mail</th>
                                  <th>ชื่อ-นามสกุล</th>
                                  <th>ลบ</th>
                                </tr>
                                  <?php
                                  $i = 0;
                                  $sql = "SELECT `email`, `fullname` FROM `users`";
                                  $data = getpdo($con,$sql);
                                  foreach ($data as $row) {
                                  ?>
                                <tr>
                                  <td><?php echo ++$i; ?></td>
                                  <td><?=$row['email']?></td>
                                  <td><?=$row['fullname']?></td>
                                  <td><a class="btn btn-danger"> ลบ</a></td>
                                </tr>
                                    <?php
                                    }
                                ?>
                              </table>
                            </div>

                        </form>
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

    $("#users").attr({
        "class" : "active"
    });
    </script>
</body>
</html>
<?php } ?>
