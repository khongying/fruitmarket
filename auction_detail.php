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
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/jquery-countdown/jquery.countdown.js"></script>
    <script type="text/javascript" src="bootstrap/jquery-countdown/jquery.countdown.min.js"></script>
	<script src="https://www.gstatic.com/firebasejs/3.8.0/firebase.js"></script>
	<script type="text/javascript" src="countdown.js"></script>
    <style type="text/css">
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

		<?php 
			$dateArrayEnd = array();
			$sql="SELECT * FROM `auction_product` WHERE `code`= '{$_GET['p_id']}'";

			$result=getpdo($con,$sql,1);
            foreach ($result as $row) {

	            $time_stramp = strtotime($row['end_time']);
	            $dateArrayEnd['y'] = date('Y',$time_stramp)*1;
	            $dateArrayEnd['m'] = (date('m',$time_stramp)*1)-1;
	            $dateArrayEnd['d'] =  date('d',$time_stramp)*1;
	            $dateArrayEnd['h'] = date('H',$time_stramp)*1;
	            $dateArrayEnd['i'] = date('i',$time_stramp)*1;
	            $dateArrayEnd['s'] = date('s',$time_stramp)*1;
		?>
		<script type="text/javascript">
        function cooldown(y,m,d,h,i,s,target){

          var clock = document.getElementById(target)
            , targetDate = new Date(y, m, d,h,i,s); // Jan 1, 2050;

          clock.innerHTML = countdown(targetDate).toString();

            setInterval(function(){
              console.log(clock);
            clock.innerHTML = countdown(targetDate).toString();
            }, 1000);

        }

        $(function(){

        cooldown(<?=$dateArrayEnd['y'] ?>,<?=$dateArrayEnd['m'] ?>,<?=$dateArrayEnd['d'] ?>,<?=$dateArrayEnd['h'] ?>,<?=$dateArrayEnd['i'] ?>,<?=$dateArrayEnd['s'] ?>,'<?= $row['code'] ?>');
        });
      </script>
			<!-- start show product detail -->
			<div class="container">
			<div class="row" align="left">
			<div class="col-md-5">
				<h2><b><?= $row['code'] ?></b></h2>
				<h4><?= $row['name'] ?><br/></h4>
				<h5 id="line"><?= $row['detail'] ?></h5>
				<!-- <a href="#" class="btn btn-primary">
					<i class="fa fa-gavel"></i> ซื้อเลย
				</a> -->
				<img src="backend/product/<?= $row['image'] ?>" width="100%" class="img-thumbnail">
			</div>

      <div class="col-md-6">
					<div class="form-group">
							<label class="control-label col-md-6">สิ้นสุดการประมูลใน : </label>
							<div class="col-md-6" id="<?= $row['code'] ?>" style="font-size: 16pt; color: #0000FF;"></div>
						</div>
				</diV>
				<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-6">ราคาประมูล ณ ปัจจุบัน : </label>
							<div class="col-md-6" id="now_price"></diV>
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
			<?php } 
				date_default_timezone_set("Asia/Bangkok");
				$t = time();
				$date = date("Y-m-d",$t);
				$time = date("H:i:s",$t);
				$time_now = $date.$time;
				$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");

				$naw_date  =  substr($time_now,8,2)." ";
				$naw_date .=  $thaimonth[(substr($time_now,5,2)-1)]." ";
				$naw_date .=  (substr($time_now,0,4)+543)." ";
				$naw_date .=  "เวลา ".substr($time_now,-8);
				// echo $naw_date;
			?>

            <input type="hidden" value="<?= $_GET['p_id'] ?>" id="code" />
            <input type="hidden" value="<?=$_SESSION['id']?>" id="userid" />
            <input type="hidden" value="<?=$_SESSION['name']?>" id="name" />
            <input type="hidden" value="<?=$naw_date?>" id="time" />
			<div class="col-md-5 input-group">
    		<input type="text" class="price form-control" id="price" />
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
