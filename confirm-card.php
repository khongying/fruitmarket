<?php
        require'condatabase/conDB.php';
        session_start();

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
    table{
       width: 900px;
       padding-left: 20px;
       padding-right: 20px;
    }
    th {
          background-color: rgb(112, 196, 105);
          color: white;
          font-weight: normal;
          padding: 20px 30px;
          text-align: center;
          font-size: 20pt;
          font-weight: bold;
        }
    td {
       font-size: 16pt;
       text-align: center;
       background-color: rgb(238, 238, 238);
       color:#000000;
       padding: 20px 30px;
      }
    td#total{
      text-align: right;
      font-size: 20pt;
      color:#FF0000;
    }
    div#button{
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
                            <li class="active">
                                <a href="#step-1">
                                  <h4 class="list-group-item-heading">Step 1</h4>
                                  <p class="list-group-item-text">ยืนการสั่งซื้อ</p>
                                </a>
                            </li>
                            <li class="disabled">
                                <a href="#step-2">
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

            <div class="row setup-content" id="step-1">
                <div class="col-md-12 ">
                  <div class="col-md-12 well">
                      <h1><img src="logo/board.png" /> รายการสินค้า</h1>

                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>รายการ</th>
                            <th>ราคาต่อชิ้น</th>
                            <th>จำนวนชิ้น</th>
                            <th>ราคารวม</th>
                          </tr>
                       </thead>
                       <tbody>
                         <?php
                         $sql_qt = "SELECT `id_qt` FROM `qt_order` WHERE user_id = '{$_GET['id']}'";
                         $qt = getpdo($con,$sql_qt,'id_qt');
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
                                <td><img src="backend/product/<?=$img?>" style="height: 50px;width: 50px;"/></td>
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
                            <td id="total" colspan="5">ยอดรวมสุทธิ <?=number_format($total,2)?> บาท</td>
                          </tr>
                        </tbody>
                      </table>

                      <div id="button" class="col-md-12">
                        <button class="btn btn-success">ขั้นตอนไป <img src="logo/right-arrow.png" /></button>
                      </div>
                  </div>
                  </div>

            </div>



            </div>
      </div>
  </body>
</html>
