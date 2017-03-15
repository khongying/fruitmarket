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
                            <h2><i class="fa fa-users"></i>  จัดการคนงาน</h2><hr/>
                            <div>
                                <ul class="nav nav-tabs">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="worker.php">เพิ่ม</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#">ค้นหา</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="up_worker.php">แก้ไขค่าแรง</a>
                                    </li>
                                </ul>
                            </div><br>


                            <div class="col-md-offset-2 col-md-8">
                                  <div class="form-group">
                                      <div class="col-md-4">
                                          <p> ชือลูกจ้าง</p>
                                          <input type="text"  name="p_code" class="form-control" placeholder="ชื่อลูกจ้าง" />
                                      </div>
                                      <div class="col-md-4">
                                          <p> เก็บอะไร</p>
                                          <?php
                                          $sql = "SELECT * FROM worker";
                                          $result=getpdo($con,$sql,1);
                                          ?>

                                          <select name="worker" class="form-control">
                                          <?php foreach ($result as $row) {
                                          ?>
                                          <option value=" <?php $row['id']; ?> ">
                                            <?php echo $row['product']; ?>
                                          </option>
                                          <?php
                                          }

                                          ?>
                                          </select>
                                      </div>

                                      <div class="col-md-4">
                                          <p> กิโลกรัม</p>
                                          <input type="text"  name="p_code" class="form-control" placeholder="กิโลกรัม" />
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
    </script>
</body>
</html>
<?php } ?>
