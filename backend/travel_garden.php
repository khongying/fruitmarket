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
    label.title{
        font-size: 24pt;
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
                        <h2><img src="logo/fields.png" /> สวนผลไม้ </h2><hr/>
                        <div>
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="travel.php">เพิ่มสวนผลไม้ (เยี่ยมชม)</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="hire_garden.php">เพิ่มสวนผลไม้ (เช่า)</a>
                                </li>

                                <li class="nav-item active">
                                    <a class="nav-link" href="travel_garden.php">สวนผลไม้</a>
                                </li>

                            </ul>
                        </div><br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="title">สวนผลไม้ (เยี่ยมชม)</label>
                                        <table class="table table-hover">
                                          <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>ชื่อผลไม้</th>
                                              <th>แก้ไข / ลบ</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                <?php
                                    $sql_travel = "SELECT * FROM `travel`";
                                    $result=getpdo($con,$sql_travel,1);
                                    $i=0;
                                    foreach ($result as $travel) {
                                ?>
                                            <tr>
                                              <th scope="row"><?php echo ++$i; ?></th>
                                              <td><?= $travel['name'] ?></td>
                                              <td>
                                                <a href="edit_travel.php?travel_id=<?= $travel['id']; ?>" class="btn btn-warning" target="_blank"><i class="fa fa-pencil-square-o"></i></a>

                                                <a class="del_travel btn btn-danger" travel_id="<?=$travel['id']?>"><i class="fa fa-trash"></i></a>
                                              </td>
                                            </tr>          
                                <?php
                                    }
                                 ?>   
                                          </tbody>
                                        </table>
                                </div>

                                <div class="col-md-6">
                                    <label class="title">สวนผลไม้ (เช่า)</label>
                                        <table class="table table-hover">
                                          <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>ชื่อผลไม้</th>
                                              <th>แก้ไข / ลบ</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                <?php
                                    $sql_hire_garden = "SELECT * FROM `hire_garden`";
                                    $data = getpdo($con,$sql_hire_garden,1);
                                    $i=0;
                                    foreach ($data as $garden) {
                                ?>
                                            <tr>
                                              <th scope="row"><?php echo ++$i; ?></th>
                                              <td><?= $garden['name'] ?></td>
                                              <td>
                                              <a href="edit_garden.php?garden_id=<?= $garden['id']; ?>" class="btn btn-warning" target="_blank"><i class="fa fa-pencil-square-o"></i></a>

                                              <a class="del_garden btn btn-danger" garden_id="<?=$garden['id']?>"><i class="fa fa-trash"></i></a>
                                              </td>
                                            </tr>          
                                <?php
                                    }
                                 ?>   
                                          </tbody>
                                        </table>
                                </div>
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

    $("#travel").attr({
        "class" : "active"
    });


    $('.del_travel').click(function(event) {
        var id = $(this).attr('travel_id');
        $.post('del_travel.php', {travel_id: id}, 
            function() {
                
        }).done(function(data){
             location.reload();
        });

        
    });    

    $('.del_garden').click(function(event) {
        var id = $(this).attr('garden_id');
        $.post('del_garden.php', {garden_id: id}, 
            function() {
                
        }).done(function(data){
             location.reload();
        });

        
    });



    </script>
</body>
</html>
<?php } ?>
