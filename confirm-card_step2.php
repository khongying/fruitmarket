<?php
session_start();
require'condatabase/conDB.php';
?>
 <html>
  <head>
  	<meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Home | Fruit Market</title>
      <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
      <script src="sweetalert-master/dist/sweetalert.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
      <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  </head>
  <style type="text/css">
    #page{
    		padding-top:100px;
    	}
    div#button{
       text-align: right;
    }
    tr.product{
      text-align: center;
    }
    th{
      text-align: center;
      font-size: 20pt;
    }
  </style>
  <body>
      <div id="page">
        <?php include'navbar.php'; ?>

            <div class="container">


            	<div class="row form-group">
                    <div class="col-xs-12">
                        <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                            <li>
                                <a href="confirm-card.php">
                                  <h4 class="list-group-item-heading">Step 1</h4>
                                  <p class="list-group-item-text">ยืนการสั่งซื้อ</p>
                                </a>
                            </li>
                            <li class="active">
                                <a href="confirm-card_step2.php">
                                  <h4 class="list-group-item-heading">Step 2</h4>
                                  <p class="list-group-item-text">ข้อมูลการจัดส่ง</p>
                                </a>
                            </li>
                            <li class="disabled">
                                <a href="#step-3">
                                  <h4 class="list-group-item-heading">Step 3</h4>
                                  <p class="list-group-item-text">แจ้งชำระสินค้า</p>
                                </a>
                            </li>
                        </ul>
                    </div>
            	</div>

            <div class="row setup-content" id="step-2">
                <div class="col-md-12 ">
                  <div class="col-md-12 well">
                      <div class="col-md-offset-4 col-md-6">
                          <h2><img src="logo/delivery-truck.png" />  ข้อมูลจัดส่งสินค้า</h2>
                      </div>
                    <div id="page" class="container">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-6">
                              <form class="form-horizontal" action="add-product-db.php" name="add_product" method="POST" onSubmit="return chkfrom();">
                                <?php
                                $sql = "SELECT  `address`, `phone` FROM users WHERE id = '{$_SESSION['id']}'";
                                $result=getpdo($con,$sql,1);
                                foreach ($result as $row) {
                                ?>

                                <div class="form-group">
                                  <label class="control-label col-sm-4">ที่อยู่</label>
                                  <div class="col-sm-8">
                                    <textarea class="form-control" name="address"><?=$row['address']?></textarea>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-sm-4">เบอร์โทรศัพท์</label>
                                  <div class="col-sm-8">
                                    <input type="text" name="phone" id="phone" class="form-control" value="<?=$row['phone']?>" max="13">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-sm-offset-4 col-sm-8">
                                  <button type="submit" class="btn btn-success">ยืนยัน</button>
                                  </div>
                                </div>
                                <?php
                                }
                                ?>
                              </form>
                            </div>
                          </div>
                        </div>


                  </div>
                  </div>

            </div>



            </div>
      </div>
  <script type="text/javascript">
  $('#phone').mask('000-000-0000');

  function chkfrom()
  {
      if(document.add_product.address.value=="")
      {
          swal("กรุณากรองให้ครบ", " ", "warning");
          document.add_product.address.focus();
          return false;
      }

      if(document.add_product.phone.value=="")
      {
          swal("กรุณากรองให้ครบ", " ", "warning");
          document.add_product.phone.focus();
          return false;
      }
  }
  </script>
</body>
</html>
