<?php
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

$sql_revenue = "SELECT list_order.sum,list_order.price,list_order.product_id,(list_order.sum*list_order.price) as price_sum,qt_order.status_qt_id,product.name FROM `list_order` INNER JOIN qt_order ON (list_order.qt_order_id=qt_order.id_qt) INNER JOIN product ON (list_order.product_id =product.code) WHERE qt_order.status_qt_id = 5 AND qt_order.create_date REGEXP '{$y}-{$index_m }-'";
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
			<th>จำนวนชิ้น</th>
			<th>ราคาต่อชิ้น</th>
			<th>ราคารวม</th>
		</tr>
<?php 
	$sql_pay = "SELECT product_pay.name,product_pay.code,product_pay.num,product_pay.price,(product_pay.price*product_pay.num) as price_pay FROM product_pay WHERE  product_pay.date_save REGEXP '{$y}-{$index_m }-'";
	$total_pay = 0;
	if($res_pay = mysqli_query($con,$sql_pay)){
		while ($pay = mysqli_fetch_assoc($res_pay)) {
			$total_pay = $total_pay + $pay['price_pay'];
	?>

		<tr>
			<td><?= $pay['code']?></td>
			<td><?= $pay['name']?></td>
			<td><?= $pay['num']?></td>
			<td><?= $pay['price']?></td>
			<td><?= $pay['price_pay']?></td>
		</tr>

	<?php
		}
	?>
		<tr>
			<td></td>	
			<td></td>	
			<td colspan="2">ราคารวมทั้งหมด</td>
			<td><?= $total_pay ?></td>
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
					<th>จำนวนชิ้น</th>
					<th>ราคาต่อชิ้น</th>
					<th>ราคารวม</th>
				</tr>
		<?php
				$sum = 0 ;
				if($res = mysqli_query($con,$sql_revenue)){
					while ($data = mysqli_fetch_assoc($res)) {
						$sum = $sum + $data['price_sum'];
		?>
							<tr>
								<td><?= $data['product_id']?></td>
								<td><?= $data['name']?></td>
								<td><?= $data['sum']?></td>
								<td><?= $data['price']?></td>
								<td><?= $data['price_sum']?></td>
							</tr>
		<?php
					}
				
			?>	
				<tr>	
					<td colspan="4">ราคารวมทั้งหมด</td>
					<td><?= $sum ?></td>
				</tr>


			<?php
				}else{

					echo "Error updating record: " . mysqli_error($con);
				}
			

		?>
			</table>
</div>
