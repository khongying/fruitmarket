<?php 
require 'condatabase/conDB.php';
    session_start();
            if (!isset($_SESSION['admin'])){  //check session
                Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login
                }else{?>
<html>
<head>
    <title>Backend | ระบบจัดการผู้ดูแลระบบ</title>
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
                        <h2><img src="logo/teams.png" />  ระบบจัดการผู้ดูแลระบบ</h2><hr/>
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
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addAdmin"><img src="logo/employee.png" /> เพิ่มผู้ดูแลระบบ</button>
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
<!-- Modal -->
  <div class="modal fade" id="addAdmin" role="dialog">
    <div class="modal-dialog">
    
<!-- Modal content-->
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2><img src="logo/teams.png" />  เพิ่มผู้ดูแลระบบ</h2>
    </div>
    <div class="modal-body">
        <form action="" name="admin" class="form-horizontal">
             <div class="form-group">
                <label class="control-label col-md-4">Username</label>
                    <div class="col-md-6">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" />
                    </div>
             </div>  
             <div class="form-group">
                <label class="control-label col-md-4">Password</label>
                    <div class="col-md-6">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" />
                    </div>
             </div>
             <div class="form-group">
                <label class="control-label col-md-4">ชื่อ - นามสกุล</label>
                    <div class="col-md-6">
                        <input type="text" id="full_name" name="full_name" class="form-control" placeholder="ชื่อ - นามสกุล" />
                    </div>
             </div>  
             <div class="form-group">
                <label class="control-label col-md-4">ตำแหน่ง</label>
                    <div class="col-md-6"">
                        <select class="form-control" name="role">
                            <option value="admin">Admin</option>
                            <option value="power_admin">Power Admin</option>
                        </select>
                    </div>
             </div> 
                  
            </div>
            <div class="modal-footer">
                <button type="button" id="Admin" class="btn btn-primary"><img src="logo/user.png" /> Add</button>
            </div>
    </form> 
</div>
<!-- Modal content-->


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

 
     $('#Admin').click(function(event) {
        if ($('#username').val()  !== "" && $('#password').val() !=="" && $('#full_name').val() !== "") {
            var addmain = $('form').serializeArray();
                $.post('add_admin.php', {addmain: addmain}, function(data, textStatus, xhr) {
                    /*optional stuff to do after success */
                }).done(function(data){
                    location.reload();
                });
        }else{
            swal("กรุณากรองข้อมูลให้ครบ!!", " ", "warning");
        }
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
