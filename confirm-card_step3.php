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
    div#button{
       text-align: right;
    }
    table.table{
      width: 700px;
    }
    tr{
      text-align: center;
    }
    th{
      text-align: center;
      font-size: 20pt;
    }
    td#total{
      text-align: right;
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
                            <li>
                                <a href="#step-2">
                                  <h4 class="list-group-item-heading">Step 2</h4>
                                  <p class="list-group-item-text">ข้อมูลการจัดส่ง</p>
                                </a>
                            </li>
                            <li class="active">
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
                          <h2><img src="logo/payment-method.png" />  แจ้งชำระสินค้า</h2>
                      </div>
                      <div class="col-md-offset-2 col-md-6">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>รายการ</th>
                            <th>ราคาต่อชิ้น</th>
                            <th>จำนวนชิ้น</th>
                            <th>ราคารวม</th>
                          </tr>
                       </thead>
                       <tbody>
                         <?php
                         $qt = $_GET['qt_id'];
                         $total = 0 ;
                         $sql_list_product = "SELECT list_order.product_id,list_order.sum,product.price FROM list_order LEFT JOIN product ON list_order.product_id = product.code WHERE qt_order_id = '{$qt}'";
                         $data = getpdo($con,$sql_list_product,1);
                         foreach ($data as $row) {
                            $sum = $row['sum'];
                            $price = $row['price'];
                            $id_pd = $row['product_id'];
                            $total = $total + $sum*$price;
                            $sql = "SELECT * FROM `product` WHERE code = '{$id_pd}'";
                            $product = getpdo($con,$sql,1);
                            foreach ($product as $rows) {
                              $name = $rows['name'];
                              $img = $rows['img'];
                              ?>
                              <tr>
                                <td><?=$name?></td>
                                <td><?=number_format($price,2)?></td>
                                <td><?=$sum?></td>
                                <td><?=number_format($sum*$price,2)?></td>
                              </tr>

                        <?php
                            }
                         }
                         ?>
                          <tr>
                            <td id="total" colspan="3">ยอดชำระสินค้า </td>
                            <td id="total" ><?=number_format($total,2)?> บาท</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="col-md-offset-3 col-md-6">
                        <form class="form-horizontal" name="pay" action="payment.php" method="POST" enctype="multipart/form-data" onSubmit="return chkfrom();">
                            <div class="form-group">
                              <label class="control-label col-sm-3">ใบสลิป</label>
                              <div class="col-sm-8">
                                <input type="file" name="slip" accept="image/*" class="form-control">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3">ชื่อผู้โอน</label>
                              <div class="col-sm-8">
                                <input type="text" name="name" class="form-control">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3">เวลาที่โอน</label>
                              <div class="col-sm-8">
                                <input type="datetime-local" name="date" class="form-control">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-3">ยอดการโอน</label>
                              <div class="col-sm-8">
                                <input type="number" name="price" class="form-control">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-sm-offset-4 col-sm-8">
                              <button type="submit" class="btn btn-success">ยืนยัน</button>
                              </div>
                            </div>
                        </form>
                    </div>



                    </div>

                  </div>
                </div>
            </div>



            </div>
      </div>

</body>
<script>
function chkfrom()
{
    if(document.pay.slip.value=="")
    {
        swal("กรุณาใส่รูปหลักฐานการโอน", " ", "warning");
        document.pay.slip.focus();
        return false;
    }

    if(document.pay.name.value=="")
    {
        swal("กรุณาระบุชื่อผู้โอน", " ", "warning");
        document.pay.name.focus();
        return false;
    }

    if(document.pay.date.value=="")
    {
        swal("กรุณากรองวันที่โอนชำระสินค้า", " ", "warning");
        document.pay.date.focus();
        return false;
    }

    if(document.pay.price.value=="")
    {
        swal("กรุณาระบุยอดชำระสินค้า", " ", "warning");
        document.pay.price.focus();
        return false;
    }
}
</script>
</html>
