<?php
session_start();
      if ($_SESSION['login'] != "user"){  //check session
          Header("Location: formlogin.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login
          }else{?>
<?php
  require_once("mpdf/mpdf.php");
  ob_start();
?>
<style>
body  {
    background-image: url("ticket/tkV9-1.png");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    width: 100%;
    height: 100%;
  }
table.table{
    padding-left:50px;
    padding-top:65px;
  }
p.name_t{
    font-size: 22pt;
    font-weight: bold;
    color:#855450;
}
p.p_name{
    font-size: 20pt;
    font-weight: bold;
    color:#855450;

}
</style>
<body>
  <table class="table">
    <tr>
      <td width="420"><p class="name_t"><?=$_POST['name']?></p></td>
      <td><p class="name_t"><?=$_POST['name']?></p></td>
    </tr>
    <tr>
      <td><p class="p_name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$_SESSION['name']?></p></td>
      <td><p class="p_name"><?=$_SESSION['name']?></p></td>
    </tr>
  </table>
</body>

<?php
  $html = ob_get_contents();
  ob_end_clean();

	//new mPDF($mode, $format, $font_size, $font, $margin_left, $margin_right, $margin_top, $margin_bottom, $margin_header, $margin_footer, $orientation);
	$mpdf=new mPdf('th', array( 180,60 ), '0', 'th_sarabunnew', 0, 0,0, 0);
	// $mpdf->SetAutoFont();
	$mpdf->SetDisplayMode('fullpage');
	// $mpdf->SetHTMLHeader('<div style="text-align: right; font-weight: bold;">{PAGENO}/{nbpg}<div style="text-align: right; font-weight: bold;">', 'O',true);
	// $mpdf->setHTMLFooter('<hr style="margin-bottom: -3;" /><table style="width:100%;"><tr><td valign="top" align="left"><div>'.$organization_name.'</div><div>'.$university_name.'</div></td><td valign="top" align="right">GENERATED: '.date("d/m/Y H:i:s").'</td></tr></table>','0',true);

	$mpdf->WriteHTML($html);


	$mpdf->Output();
?>
<?php } ?>
