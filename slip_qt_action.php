<?php
  require_once("mpdf/mpdf.php");
  require 'condatabase/conDB.php';
  session_start();

  ob_start();
?>
<style>
div.post{
  font-size: 15pt;
  width: 250px;
  padding-top: 5px;
  padding-left: 50px;
}
div.silp{
  padding-top: 10px;
  padding-left: 300px;
  padding-bottom: 50px;
  font-size: 20pt;
  font-weight: bold;

}
div.post_user{
  /*padding-left: 300px;*/
  font-size: 15pt;
  width: 250px;
  /*padding-top: 5px;*/
  padding-left: 50px;
}
div.top_post{
  padding-left: 20px;
  padding-bottom: 50px;
}
td.border{
  padding-top: 5px;
  border-style: solid;
  border-width: 1px;
}
div.list{
   padding-left: 20px;
   padding-right: 20px;
}

table.table_list{
   width: 900px;
   padding-left: 20px;
   padding-right: 20px;
   padding-top: 50px;
   text-align: center;
}
th.list_top{
      font-weight: normal;
      padding: 20px 30px;
      font-size: 20pt;
      font-weight: bold;
    }
td.list_detail{
   font-size: 16pt;
   padding: 20px 30px;
  }
table.table_list, th.list_top, td.list_detail {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
<body>
    <div style="font-size: 30pt; font-weight: bold; padding-left: 200px; padding-top: 20px;">
       ระบบบริหารการจัดการสวนผลไม้
    </div>
    <div class="silp">
      <label>ใบสั่งซื้อ / ORDERS</label>
    </div>
    <div class="top_post">
      <table>
        <tr>
          <td class="border" style="width:300px; ">
              <div class="post">
                  <label>ระบบบริหารการจัดการสวนผลไม้</label><br>
                  <label>ที่อยู่ : </label>20/1 พุทธมณฑลสาย2 ซอย10 ซอยเปี่ยมทองคำ2 เขตบางแค แขวงบางแคเหนือ กรุงเทพมหานคร 10160 <br>
                  <label>เบอร์โทรศัทพ์ : </label>02-999-9999


              </div>
          </td>
          <td style="width:150px; "></td>
          <td class="border" style="width:300px; ">
              <div class="post_user">
                  <?php
                    $sql_post = "SELECT `name`,`address`,`phone` FROM `pay_auction_qt` WHERE `qt_id`= '{$_GET['qt']}'";
                    $data_post = getpdo($con,$sql_post,1);
                    foreach ($data_post as $row) {
                          $name = $row['name'];
                          $address = $row['address'];
                          $phone = $row['phone']; 
                    ?>
                        <label>ผู้ซื้อสินค้า : </label><?= $name ?><br>
                        <label>ที่อยู่จัดส่ง : </label><?= $address ?><br>
                        <label>เบอร์โทรศัทพ์ : </label><?= $phone ?>
                    <?php
                    }
                  ?>
              </div>
          </td>
        </tr>
      </table>
    </div>

    <div class="list">
        <table class="table_list">
          <thead>
            <tr id="top">
              <th class="list_top">รายการ</th>
              <th class="list_top">จำนวนชิ้น</th>
              <th class="list_top">ราคารวม</th>
            </tr>
          </thead>
          <tbody>
          <?php
         $qt = $_GET['qt'];
         $total = 0 ;
         $sql_list_product = "SELECT qt_auction.id_qt,qt_auction.auction_product_id,qt_auction.now_price,auction_product.name FROM qt_auction LEFT JOIN auction_product ON qt_auction.auction_product_id = auction_product.code WHERE `id_qt`='{$qt}'";
         $data = getpdo($con,$sql_list_product,1);
         foreach ($data as $row) {
            $sum = 1 ;
            $price = $row['now_price'];
            $id_pd = $row['id_qt'];
            $name =  $row['name'];
            $total = $sum*$price;
          ?>
          <tr>
            <td class="list_detail"><?=$name?></td>
            <td class="list_detail"><?=$sum?></td>
            <td class="list_detail"><?=$price?></td>
          </tr>
        <?php  
         }
         ?>
          <tr>
            <td class="list_detail" colspan="2">ยอดชำระสินค้า </td>
            <td class="list_detail" ><?=number_format($total,2)?> บาท</td>
          </tr>
        </tbody>
      </table>
    </div>
      
</body>

<?php
  $html = ob_get_contents();
  ob_end_clean();

	//new mPDF($mode, $format, $font_size, $font, $margin_left, $margin_right, $margin_top, $margin_bottom, $margin_header, $margin_footer, $orientation);
	$mpdf=new mPdf('th', 'A4', '0', 'th_sarabunnew', 0, 0,0, 0);
	// $mpdf->SetAutoFont();
	$mpdf->SetDisplayMode('fullpage');
	// $mpdf->SetHTMLHeader('<div style="text-align: right; font-weight: bold;">{PAGENO}/{nbpg}<div style="text-align: right; font-weight: bold;">', 'O',true);
	// $mpdf->setHTMLFooter('<hr style="margin-bottom: -3;" /><table style="width:100%;"><tr><td valign="top" align="left"><div>'.$organization_name.'</div><div>'.$university_name.'</div></td><td valign="top" align="right">GENERATED: '.date("d/m/Y H:i:s").'</td></tr></table>','0',true);

	$mpdf->WriteHTML($html);


	$mpdf->Output('qt-auction-'.$_GET['qt'],'I');
?>
