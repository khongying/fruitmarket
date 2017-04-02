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
                            <h2><img src="logo/team.png" />  ระบบจัดการคนงาน</h2><hr/>
                            <div>
                              <?php
                                  include 'meun_worker.php';

                              ?>
                            </div><br>


                          <div class="col-md-offset-2 col-md-8">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <p><img src="logo/worker.png" />  ค้นหาชือลูกจ้าง</p>
                                    <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="กรอกชื่อลูกจ้าง" />
                                </div>
                            </div>
                          </div>


                          <div class="col-md-offset-2 col-md-8">
                          <hr/>
                          </div>



                            <div class="col-md-offset-2 col-md-8">
                              <table class="table table-hover" id="myTable">
                              <thead class="thead-default">
                                <tr>
                                  <th>ชื่อ</th>
                                  <th>เก็บผลผลิต</th>
                                  <th>วันที่มาทำงาน</th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                $sql = "SELECT person_worker.id,person_worker.date,person.full_name,worker.product FROM person_worker LEFT JOIN person ON person_worker.id_worker = person.id LEFT JOIN worker ON person_worker.id_worker = worker.id";
                                $result=getpdo($con,$sql,1);
                                $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");

                                foreach ($result as $row) {

                                $naw_date  =  substr($row['date'],8,2)." ";
                                $naw_date .=  $thaimonth[(substr($row['date'],5,2)-1)]." ";
                                $naw_date .=  substr($row['date'],0,4)+543;


                                  ?>
                                  <tr id="aa">
                                  <td><a class="navbar-link" href="worker_dailymoney.php?id=<?=$row['id']?>"><?=$row['full_name']?></a></td>
                                  <td><?=$row['product']?></td>
                                  <td><?=$naw_date?></td>
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
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
     <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

        function myFunction() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
              if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                }
                else {
                tr[i].style.display = "none";
                }
              }
          }
}

$("#worker").attr({
    "class" : "active"
});

$("#worker_search").attr({
    "class" : "active"
});
</script>

</body>
</html>

<?php } ?>
