<?php
	function DateThai($strDate){
	  $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	  $naw_date  =  substr($strDate,8,2)." ";
	  $naw_date .=  $thaimonth[(substr($strDate,5,2)-1)]." ";
	  $naw_date .=  (substr($strDate,0,4)+543)." ";
	  $naw_date .=  "เวลา ".substr($strDate,-8);
	  return "$naw_date";
	}
?>