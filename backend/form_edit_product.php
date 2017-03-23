<?php
if (isset($_GET['product_id'])){

$product_id = addslashes($_GET['product_id']);

require 'condatabase/conDB.php';

session_start();
            if (!isset($_SESSION['admin'])){  //check session
                Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login
                }else{?>
<html>
<head>
    <title>Backend | คลังสินค้า</title>
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
                      <?php
                          $sql = "SELECT * FROM `product` WHERE `id` = '{$product_id}'";
                          $result=getpdo($con,$sql,1);
                          foreach ($result as $row) {
                      ?>
                      <div class="container">
                          <div class="row">
                          <div class="col-md-3"></div>
                              <div class="col-md-6"> <br />
                                  <h4 align="center"> แก้ไขสินค้า </h4>
                              <hr />
                              <form action="edit_product.php" name="product" method="POST" class="form-horizontal" enctype="multipart/form-data" onSubmit="return chkfrom();">
                                  <div class="form-group">
                                      <div class="col-sm-6">
                                          <p> รหัสสินค้า</p>
                                          <input type="text"  name="p_code" class="form-control" value="<?=$row['code']?>" placeholder="รหัสสินค้า" />
                                      </div>
                                      <div class="col-sm-6">
                                          <p> ชื่อสินค้า</p>
                                          <input type="text"  name="p_name" class="form-control" value="<?=$row['name']?>" placeholder="ชื่อสินค้า" />
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-sm-12">
                                          <p> รายละเอียดสินค้า </p>
                                          <textarea name="p_detail" class="form-control" rows="3" placeholder="รายละเอียดสินค้า"> <?=$row['detail']?> </textarea>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-sm-3">
                                          <p> ราคา (บาท) </p>
                                          <input type="number"  name="p_price" class="form-control" value="<?=$row['price']?>" placeholder="ราคา" />
                                      </div>
                                      <div class="col-sm-3">
                                          <p> จำนวน (ชิ้น) </p>
                                          <input type="number"  name="p_num" value="<?=$row['num']?>" class="form-control" placeholder="ราคา" />
                                      </div>
                                      <div class="col-sm-6 info">
                                          <p> ภาพสินค้า </p>
                                          <input type="file" name="p_img" class="form-control" />
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-sm-12">
                                          <input type="hidden" name="p_id" value="<?=$product_id?>" />
                                          <button type="submit" class="btn btn-success btn-block"><i class="fa fa-pencil-square-o fa-lg"></i> แก้ไขสินค้า </button>
                                      </div>
                                  </div>
                              </form>
                              </div>
                          </div>
                      </div>
                    <?php }

                    ?>


                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
     <!-- Menu Toggle Script -->
    <script>
    $("#list_product").attr({
        "class" : "active"
    });
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>
<?php }
  }
?>
