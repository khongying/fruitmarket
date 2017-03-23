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

                            <div class="col-md-offset-4 col-md-5">
                              <table class="table table-hover">
                              <thead class="thead-default">
                              <tr>
                                <th>#</th>
                                <th>รายการ</th>
                                <th>กิโลกรัม</th>
                              </tr>
                              </thead>
                              <tbody>


                              <?php
                              $sql = "SELECT * FROM worker";
                              $result=getpdo($con,$sql,1);
                              $i = 0;
                              foreach ($result as $row) {
                                ?>
                                <tr>
                                <th scope="row"><?php echo ++$i; ?></th>
                                <td><?=$row['product']?></td>
                                <td><?=$row['kg']?></td>
                                </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                            </table>

                          </div>

                              <div class="col-md-offset-2 col-md-8">
                                <form action="updata_worker.php" method="post">
                                <div class="form-group">
                                  <div class="col-md-6">
                                      <p> ประเภท</p>
                                      <?php
                                      $sql = "SELECT * FROM worker";
                                      $result=getpdo($con,$sql,1);
                                      ?>

                                      <select name="worker" class="selectpicker show-tick form-control">
                                      <?php foreach ($result as $row) {
                                      ?>
                                      <option value="<?= $row['id'] ?>">
                                        <?php echo $row['product']; ?>
                                      </option>
                                      <?php
                                      }

                                      ?>
                                      </select>
                                  </div>
                                  <div class="col-md-6">
                                      <p> กิโลกรัม</p>
                                      <input type="text"  name="kg" class="form-control" placeholder="กิโลกรัม" />
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="col-md-12"><br />
                                      <button type="submit" class="btn btn-primary"><i class="fa fa-arrow-up fa-lg"></i> อัพเดท </button>
                                  </div>
                              </div>

                            </form>
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
    $("#worker").attr({
        "class" : "active"
    });

    $("#worker_up").attr({
        "class" : "active"
    });

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>
<?php } ?>
