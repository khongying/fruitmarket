<?php
  require_once("mpdf/mpdf.php");
  $host="localhost";
  $username="root";
  $password="";
  $DBname="fruitmarket";
  $con=mysqli_connect($host,$username,$password,$DBname);
  mysqli_set_charset($con,"utf8");
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
  /*padding-right: 20px;*/
  font-size: 20pt;
  font-weight: bold;

}
div.top_post{
  padding-left: 45px;
}
td.border{
  padding-top: 5px;
  border-style: solid;
  border-width: 1px;
}
</style>
<body>
    <div style="font-size: 30pt; font-weight: bold; padding-left: 20px; padding-top: 20px;">
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
          <td style="width:100px; "></td>
          <td class="border" style="width:300px; ">
              <div class="post">
                  <?php
                    $sql_post = "SELECT post_qt.address,post_qt.phone,users.fullname FROM post_qt LEFT JOIN users ON post_qt.user_id = users.id WHERE `qt_id` = '{$_GET['qt']}'";
                    $data_post = mysqli_query($con,$sql_post);
                    if (mysqli_num_rows($data_post) > 0) {
                        while($row = mysqli_fetch_assoc($data_post)) {
                          $name = $row['fullname'];
                          $address = $row['address'];
                          $phone = $row['phone'];
                        }
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
      






  <table class="table table-bordered">
    <thead>
      <tr>
        <th colspan="2"><h4>รายได้</h4></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>ค่าจ้าง</td>
        <td align="right"><?= number_format($row['labor_cost'],2) ?></td>
      </tr>
      <tr>
        <td align="right" class="sum" colspan="2">ยอดสุทธิ&nbsp;&nbsp;&nbsp;<?= number_format($row['labor_cost'],2) ?></td>
      </tr>
    </tbody>
  </table>
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


	$mpdf->Output();
?>
