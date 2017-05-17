<?php
  require_once("mpdf/mpdf.php");
  require 'condatabase/conDB.php';
  ob_start();
?>
<style>
div.edge_list{
  padding-left: 20px;
  padding-right: 20px;
}
table, th, td{
    border: 1px solid black;
    border-collapse: collapse;
}
table{
   width: 900px;
   padding-left: 20px;
   padding-right: 20px;
}
th {
      font-weight: normal;
      padding: 20px 30px;
      text-align: center;
      font-size: 20pt;
      font-weight: bold;
    }
td {
   font-size: 16pt;
   padding: 20px 30px;
  }

td.sum{
  font-weight: bold;
  }
div.edge{
  width: 400px;
  padding-left: 20px;
}
div.test{
  font-size: 16pt;
  padding-left: 20px;
  padding-right: 20px;
  border-style: solid;
  border-width: 1px;

}
div.silp{
  padding-top: 30px;
  padding-left: 20px;
  padding-right: 20px;
  font-size: 30pt;
  font-weight: bold;
  text-align:right;
}
</style>
<body>
  <div class="col-md-offset-2 col-md-8">
    <?php $sql = "SELECT * FROM `person_worker` WHERE id = '{$_GET['id']}'";
      $result=getpdo($con,$sql,1);
      $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
      foreach ($result as $row) {
        $naw_date  =  substr($row['date'],8,2)." ";
        $naw_date .=  $thaimonth[(substr($row['date'],5,2)-1)]." ";
        $naw_date .=  substr($row['date'],0,4)+543;

      }
      $sql_person = "SELECT * FROM `person` WHERE id = '{$row['person_id']}'";
      $person =getpdo($con,$sql_person,1);
      foreach ($person as $rows) {
      ?>
      <?php
      }
      ?>
  </div>
  <?php
  $sql_worker = "SELECT * FROM `worker` WHERE id = '{$row['id_worker']}'";
  $worker = getpdo($con,$sql_worker,1);
  foreach ($worker as $data) {
  }
  ?>
    <div class="silp">
      <label>ใบจ่ายเงินรายวัน / PLAY SLIP</label>
    </div>
    <div class="edge">
      <div class="test">
        <label>ชื่อ-นามสกุล : <?= $rows['full_name'] ?></label><br/>
        <label>ที่อยู่ : <?= $rows['address'] ?></label><br/>
        <label>เบอร์โทรศัพท์ : <?= $rows['phone'] ?></label><br/>
        <label>ประจำวันที่ : <?= $naw_date ?></label><br/>
        <label>เก็บผลผลิต : <?= $data['product'] ?></label><br/>
      </div>
    </div><br>



  <div class="edge_list">
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
  </div>


<?php
  $html = ob_get_contents();
  ob_end_clean();

	//new mPDF($mode, $format, $font_size, $font, $margin_left, $margin_right, $margin_top, $margin_bottom, $margin_header, $margin_footer, $orientation);
	$mpdf=new mPdf('th', 'A5-L', '0', 'th_sarabunnew', 0, 0,0, 0);
	// $mpdf->SetAutoFont();
	$mpdf->SetDisplayMode('fullpage');
	// $mpdf->SetHTMLHeader('<div style="text-align: right; font-weight: bold;">{PAGENO}/{nbpg}<div style="text-align: right; font-weight: bold;">', 'O',true);
	// $mpdf->setHTMLFooter('<hr style="margin-bottom: -3;" /><table style="width:100%;"><tr><td valign="top" align="left"><div>'.$organization_name.'</div><div>'.$university_name.'</div></td><td valign="top" align="right">GENERATED: '.date("d/m/Y H:i:s").'</td></tr></table>','0',true);

	$mpdf->WriteHTML($html);


	$mpdf->Output('SLIP-'.$_GET['id'],'I');
?>
