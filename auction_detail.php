<?php
session_start();
require'condatabase/conDB.php';
?>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Market | <?= $_GET['p_id'] ?> </title>
    <link rel="shortcut icon" type="image/png" href="logo/groceries.png">
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/jquery-countdown/jquery.countdown.js"></script>
    <script type="text/javascript" src="bootstrap/jquery-countdown/jquery.countdown.min.js"></script>
		<script src="https://www.gstatic.com/firebasejs/3.8.0/firebase.js"></script>
    <style type="text/css">
        body{
          font-family: 'Itim', cursive;
            }
      	#page{
      		padding-top:100px;
      	}
      	#line{
      		line-height : 1.5;
      	}
        div.scroll {
            width: 650px;
            height: 300px;
            overflow: scroll;
        }
				.list{
					text-align: center;
				}
				#now_price,#count_time,#now_user{
					font-size: 16pt;
					color: #0000FF;
				}
				.control-label{
					font-size: 16pt;
				}
	</style>
</head>
<body>
	<div id="page">
		<?php include'navbar.php'; ?>


			<!-- start show product detail -->
			<div class="container">
			<div class="row" align="left">
			<div class="col-md-5">
				<h2><b><?= $_GET['p_id'] ?></b></h2>
				<h4>ชื่อสินค้า : Durian Freezedried(ถุงใหญ่)<br/></h4>
				<h5 id="line"> รายละเอียดสินค้า : ทุเรียนหมอนทอง 100% หอม กรอบ ละลายในปาก ลองรับรองติดใจ ของอร่อยคุณภาพ (ถุงเล็ก110กรัม)</h5>
				<!-- <a href="#" class="btn btn-primary">
					<i class="fa fa-gavel"></i> ซื้อเลย
				</a> -->
				<img src="backend/product/1498d9ac54cacee71d581e37ae9a204c.jpg" width="100%" class="img-thumbnail">
			</div>

      <div class="col-md-6">
					<div class="form-group">
							<label class="control-label col-md-6">สิ้นสุดการประมูลใน : </label>
							<div class="col-md-6" id="count_time">
								<?php
								date_default_timezone_set("Asia/Bangkok");
								$t = time();
								$date = date("Ymd",$t);
								$time = date("H:i:s",$t);
								$now = $date." ".$time;
								echo $now;
								?>
							</div>
						</div>
				</diV>
				<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-6">ราคาประมูล ณ ปัจจุบัน : </label>
							<div class="col-md-6" id="now_price">
								<!-- <p>550 THB</p> -->
							</diV>
          		</diV>
				</div>

				<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-6">ผู้ชนะการประมูล ณ ปัจจุบัน :  </label>
							<div class="col-md-6" id="now_user">
								<!-- <p>550 THB</p> -->
							</diV>
          		</diV>
				</div>

            <input type="hidden" value="<?= $_GET['p_id'] ?>" id="code" />
            <input type="hidden" value="<?=$_SESSION['id']?>" id="userid" />
            <input type="hidden" value="<?=$_SESSION['name']?>" id="name" />
            <input type="hidden" value="<?=$now?>" id="time" />
						<div class="col-md-5 input-group">
                <input type="text" class="price form-control" id="price"/>
									<div class="input-group-btn">
										<button type="button" class="btn btn-search btn-info" id="btn">
										    <span class="fa fa-gavel"></span>
										    <span class="label-icon">ประมูลเลย</span>
										</button>
									</div>
						</div><br />


					<div class="scroll">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>ชื่อผู้ใช้</th>
										<th>ราคาประมูล,THB</th>
										<th>เวลา การประมูล</th>
									</tr>
								</thead>
								<tbody id="list">

								</tbody>
							</table>
					</div>


						<script type="text/javascript" src="app.js"></script>
						<script>
				      $("#btn").click(function() {
				        var price = $(".price").val();
				          if(price > g_price){
				            addOnClick();
				          }else{
										swal({
											title: "คุณเสนอราคาต่ำไป",
											text: " ",
											type: "warning",
											showCancelButton: false,
											confirmButtonColor: "#DD6B55",
											confirmButtonText: "OK",
											});
				          }
				      });
		    </script>
      </div>
  </div>
	</div>
</body>
</html>
