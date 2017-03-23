<?php
session_start();
?>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>กระทู้ถามขตอบ | Fruit Market</title>
    <link rel="shortcut icon" type="image/png" href="logo/groceries.png">
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
    body{
          font-family: 'Itim', cursive;
    }
    #page{
          padding-top:100px;
    }

    table,th {
          text-align: center;
    }

</style>
  <body>
    <div id="page">

        <?php include'navbar.php'; ?>
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                    <?php
                        if (isset($_SESSION['login']) && $_SESSION['login'] != 'false') {
                    ?>
                          <a href="new_ask.php" class="btn btn-primary"><img src="logo/file.png" /> ตั้งกระทู้ใหม่</a>
                    <?php
                        }else {
                    ?>
                        <a class="btn btn-primary" disabled><img src="logo/file.png" /> ตั้งกระทู้ใหม่</a>
                    <?php
                        }
                    ?>

                    <hr/>
                  </div>
                </div>
          </div>


        <div class="container">
          <div class="row">
            <div class="col-md-offset-3 col-md-6">

                  <table class="table table-striped table-inverse">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>กระทู้</th>
                        <th>สร้างวันที่</th>
                      </tr>
                    </thead>

                    <?php
                    require'condatabase/conDB.php';
                    $sql="SELECT * FROM `ask`";

                    $result=getpdo($con,$sql,1);
                    $i=0;
                    $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                    foreach ($result as $row) {
                      $naw_date  =  substr($row['create_date'],8,2)." ";
                  		$naw_date .=  $thaimonth[(substr($row['create_date'],5,2)-1)]." ";
                  		$naw_date .=  (substr($row['create_date'],0,4)+543)." ";
                  		$naw_date .=  "เวลา ".substr($row['create_date'],-8);
                    ?>
                    <tbody>
                      <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><a href="view_webboard.php?ask_id=<?=$row['id_ask']?>"><?=$row['q_ask']?></a></td>
                        <td><?=$naw_date?></td>
                      </tr>
                    </tbody>
                  <?php } ?>
                  </table>

              </div>
          </div>
        </div>


    </div>
    <?php
    include 'footer.php';
    ?>

  </body>
</html>
