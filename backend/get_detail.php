<?php

function DateThai($strDate){
	  $naw_date  =  substr($strDate,8,2)."/";
	  $naw_date .=  substr($strDate,5,2)."/";
	  $naw_date .=  (substr($strDate,0,4)+543)."";
	  return "$naw_date";
	}

$host = "localhost";
$username = "root";
$password = "";
$DBname = "fruitmarket";
$con = mysqli_connect($host,$username,$password,$DBname);
mysqli_set_charset($con,"utf8");

$mount = array(
                'Jan' => '01',
                'Feb' => '02',
                'Mar' => '03',
                'Apr' => '04',
                'May' => '05',
                'Jun' => '06',
                'Jul' => '07',
                'Aug' => '08',
                'Sep' => '09',
                'Oct' => '10',
                'Nov' => '11',
                'Dec' => '12'
            );
$m = $_POST['m'];
$y = $_POST['y'];

$index_m = $mount[$m];

?>
<style type="text/css">
	table#pay{
		background-color: #DAFAF8;
		border
		border-color: #DAFAF8;
	}
	table#revenue{
		background-color: #393E46;
		color: #ffffff;
	}
	label.title{
		font-size: 24pt;
	}
</style>
<div class="col-md-6">
	<label class="title">รายจ่าย</label>
	<table class="table table-bordered" id="pay">
		<tr>
			<th>รหัสสินค้า</th>
			<th>ชื่อสินค้า</th>
			<th>จำนวน</th>
			<th>ราคาต่อชิ้น</th>
			<th>ราคารวม</th>
			<th>วันที่ลงคลังสินค้า</th>
		</tr>
<?php 
	$sql_pay = "SELECT product_pay.date_save,product_pay.name,product_pay.code,product_pay.num,product_pay.price,(product_pay.price*product_pay.num) as price_pay FROM product_pay WHERE  product_pay.date_save REGEXP '{$y}-{$index_m }-' ORDER BY product_pay.id DESC";
	$total_pay = 0;
	if($res_pay = mysqli_query($con,$sql_pay)){
		while ($pay = mysqli_fetch_assoc($res_pay)) {
			$total_pay = $total_pay + $pay['price_pay'];
	?>

		<tr>
			<td><?= $pay['code']?></td>
			<td><?= $pay['name']?></td>
			<td><?= $pay['num']?></td>
			<td><?= number_format($pay['price'],2)?></td>
			<td><?= number_format($pay['price_pay'],2)?></td>
			<td><?= DateThai($pay['date_save']) ?></td>
		</tr>

	<?php
		}
	?>
		<tr>	
			<td colspan="5" style="text-align: right;">ราคารวมทั้งหมด</td>
			<td><?= number_format($total_pay,2) ?></td>
		</tr>

	<?php
	}
?>
</table>
</div>
<div class="col-md-6">
		   	<label class="title">รายรับ</label>
			<table class="table table-bordered" id="revenue">
				<tr>
					<th>รหัสสินค้า</th>
					<th>ชื่อสินค้า</th>
					<th>จำนวน</th>
					<th>ราคาต่อชิ้น</th>
					<th>ราคารวม</th>
					<th>วันที่ขาย</th>
				</tr>
		<?php
$sql_revenue = "SELECT list_order.create_date,list_order.sum,list_order.price,list_order.product_id,(list_order.sum*list_order.price) as price_sum,qt_order.status_qt_id,product.name FROM `list_order` INNER JOIN qt_order ON (list_order.qt_order_id=qt_order.id_qt) INNER JOIN product ON (list_order.product_id =product.code) WHERE qt_order.status_qt_id = 5 AND qt_order.create_date REGEXP '{$y}-{$index_m }-' ORDER BY list_order.id DESC";
				$sum = 0 ;
				if($res = mysqli_query($con,$sql_revenue)){
					while ($data = mysqli_fetch_assoc($res)) {
						$sum = $sum + $data['price_sum'];
		?>
							<tr>
								<td><?= $data['product_id']?></td>
								<td><?= $data['name']?></td>
								<td><?= $data['sum']?></td>
								<td><?= number_format($data['price'],2)?></td>
								<td><?= number_format($data['price_sum'],2)?></td>
								<td><?= DateThai($data['create_date'])?></td>
							</tr>
		<?php
					}

				}else{

					echo "Error updating record: " . mysqli_error($con);
				}
			

		?>
			</table>
		<label>รายรับจากการประมูล</label>
		<table class="table table-bordered" id="revenue">
			<tr>
				<th>รหัสสินค้า</th>
				<th>ชื่อสินค้า</th>
				<th>ราคา</th>
				<th>วันที่ขาย</th>
			</tr>
	<?php

		$sql_auction = "SELECT qt_auction.auction_product_id,qt_auction.now_price,qt_auction.create_date,auction_product.name FROM qt_auction INNER JOIN auction_product ON (qt_auction.auction_product_id=auction_product.code) WHERE qt_auction.status_qt_id = '5' AND qt_auction.create_date REGEXP '{$y}-{$index_m }-' ORDER BY qt_auction.id_qt DESC";
				$sum_auction  = 0 ;
				if($res_auction = mysqli_query($con,$sql_auction)){
					while ($data_auction = mysqli_fetch_assoc($res_auction)) {
						$sum_auction  = $sum_auction + $data_auction['now_price'];
				?>
							<tr>	
								<td><?= $data_auction['auction_product_id']?></td>
								<td><?= $data_auction['name']?></td>
								<td><?= number_format($data_auction['now_price'],2)?></td>
								<td><?= DateThai($data_auction['create_date'])?></td>
								
							</tr>
			<?php
					}
			?>
				<tr>	
					<td colspan="3" style="text-align: right;">ราคารวมทั้งหมด</td>
					<td><?= number_format(($sum+$sum_auction),2) ?></td>
				</tr>

			<?php
				}
			?>
</div>
