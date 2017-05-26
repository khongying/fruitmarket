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
      th {
            background-color: rgb(112, 196, 105);
            color: white;
            font-weight: normal;
            padding: 20px 30px;
            text-align: center;
          }
      td {
         background-color: rgb(238, 238, 238);
         color: rgb(111, 111, 111);
         padding: 20px 30px;
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

                            <div class="col-md-offset-2 col-md-8">
                              <?php $sql = "SELECT * FROM `person_worker` WHERE id = '{$_GET['id']}'";
                                $result=getpdo($con,$sql,1);
                                $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                foreach ($result as $row) {
                                  $naw_date  =  substr($row['date'],8,2)." ";
                                  $naw_date .=  $thaimonth[(substr($row['date'],5,2)-1)]." ";
                                  $naw_date .=  substr($row['date'],0,4)+543;

                                }
                                $sql_person = "SELECT * FROM `person` WHERE id = '{$row['person_id']}'";
                                $person =getpdo($con,$sql_person,1);
                                foreach ($person as $rows) {
                                ?>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">ชื่อ-นามสกุล</label>
                                    <div class="col-sm-10">
                                      <label><?= $rows['full_name'] ?></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2">ที่อยู่</label>
                                    <div class="col-sm-10">
                                      <label><?= $rows['address'] ?></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2">เบอร์โทรศัพท์</label>
                                    <div class="col-sm-10">
                                      <label><?= $rows['phone'] ?></label>
                                    </div>
                                </div>

                                <?php
                                }
                                ?>
                            </div>
                            <?php
                            $sql_worker = "SELECT * FROM `worker` WHERE id = '{$row['id_worker']}'";
                            $worker = getpdo($con,$sql_worker,1);
                            foreach ($worker as $data) {
                            }
                            ?>
                            <div class="col-md-offset-2 col-md-10">
                            <hr/>

                              <div class="form-group">
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>ประจำวันที่ : <?= $naw_date ?></label>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>เก็บผลผลิต : <?= $data['product'] ?></label>
                                    </div>

                                </div>
                              </div>
                            </div>

                          <div class="col-md-offset-2 col-md-7">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th colspan="2"><h4>รายได้</h4></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>ค่าจ้าง</td>
                                  <td align="right"><?= number_format($row['labor_cost'],2) ?></td>
                                </tr>
                                <tr>
                                  <td align="right" colspan="2">รวมทั้งสิน&nbsp;&nbsp;&nbsp;<?= number_format($row['labor_cost'],2) ?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>

                          <div class="col-md-offset-2 col-md-7">
                            <a target="_blank" class="btn btn-success" href="slip_worker.php?id=<?=$_GET['id']?>"><img src="logo/invoice.png" />  พิมพ์สลิป</a>
                            <a class="btn btn-warning" href="worker_search.php"><img src="logo/left-arrow.png" /> กลับ</a>
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

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>
<?php } ?>

?>
