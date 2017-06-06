<?php
$host="localhost";
$username="root";
$password="";
$DBname="fruitmarket";
$con=mysqli_connect($host,$username,$password,$DBname);
mysqli_set_charset($con,"utf8");
session_start();


function get_product_by_id($obj_con,$product_id){
  $sql = "SELECT * FROM `product` WHERE `code` = '{$product_id}' LIMIT 1";
  $return = array();
  if ($res = mysqli_query($obj_con,$sql)) {

    while ($row = mysqli_fetch_assoc($res)) {
      $return['status'] = true;
      $return['massage'] = 'get data true';
      $return['data'] = $row;
    }

  }else{
      $return['status'] = fasle;
      $return['massage'] = 'ไม่สามารถ query';
      $return['data'] = array();
  }
  return $return ;

}
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

                      <table class="table">
                        <thead>
                          <tr class="product">
                            <th>#</th>
                            <th>รายการ</th>
                            <th>ราคาต่อชิ้น</th>
                            <th>จำนวนชิ้น</th>
                            <th>ราคารวม</th>
                          </tr>
                       </thead>
                       <tbody>
                         <?php

                         $sum = 0 ;
                         foreach ($_SESSION["product_card"] as $key => $value) {
                            $data_product = get_product_by_id($con,$key);
                            $sum = $sum + $data_product['data']['price']*$value;
                           //  print_r ( $_SESSION["product_card"]);
                            ?>
                           <tr class="product">
                               <td><img src="backend/product/<?=$data_product['data']['img']?>" style="height: 70px;width: 70px;"/></td>
                               <td><?=$data_product['data']['name']?></td>
                               <td><?=$data_product['data']['price']?></td>
                               <td><?=$value?></td>
                               <td><?=number_format($data_product['data']['price']*$value,2)?></td>
                           </tr>

                        <?php
                      }

                         ?>
                          <tr>
                            <td id="total" colspan="5" style="text-align: right;">ยอดรวมสุทธิ <?=number_format($sum,2)?> บาท</td>
                          </tr>
                        </tbody>
                      </table>

                      <div id="button" class="col-md-12">
                        <a class="btn btn-success" href="confirm-card_step2.php">ขั้นตอนต่อไป</a>
                      </div>
                  </div>
                  </div>

            </div>



            </div>
      </div>
  </body>
</html>
