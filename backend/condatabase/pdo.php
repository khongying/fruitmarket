<?php
/*
Code by Pro45s.com
ผู้พัฒนาโค้ด เจตน์สฤษฎิ์  พนิตอนงกริต
เมื่อ 2 กรกฏาคม 58

โค้ดใช้งาน การเชื่อมต่อฐานข้อมูลด้วย PDO Class (PHP Data Objects V2.0)
พร้อมชุดฟังชั่นสำหรับการรันคำสั่ง sql เพื่อเป็นการย่อคำสั่งให้สั้นลงไม่ยุ่งยากกับการใช้งาน
เราสามารถเรียกผ่าน getpdo($conn,"script sql"); ได้ทันที่

ตัวอย่างฐานข้อมูล

  require_once 'pdo.php';
  $conn=conpdo(_host,_db,_user,_pass,'utf8',3306);

*/

function getorder($s){/*order by field [asc desc] */if(strstr(strtoupper($s),'DESC'))return 'DESC';else return 'ASC';}
function conpdo($h=NULL,$d=NULL,$u=NULL,$p=NULL,$c="utf8",$t=3306){ /*เชื่อมต่อฐานข้อมูล*/
    if(!$h){$h="localhost";$d="db_test";$u="test";$p="test"; /* <- กำหนดค่าเชื่อมต่อฐานข้อมูลตรงนี้
     * $h คือ host เช่น localhost 127.0.0.1 etc.
     * $d คือ database name
     * $u คือ username
     * $p คือ password
     * */}
try {
    $m = new PDO("mysql:host=$h;port=$t;dbname=$d", $u, $p);
    $m->exec("set names $c");
    $m->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {echo 'ERROR: ' . $e->getMessage();}return $m;
}/* end function conpdo connect */

function getpdo($c,$s,$o=NULL,$b=NULL,$d=NULL){ /*รับคำสั่งประมวลผลสคริป sql พร้อมส่งค่ากลับ*/
    $p=array();$k='';$v='';
    if(trim($s)=='')return '';if($o==NULL)$o=3;
     //$s=str_replace(array("']", "]"), "", $s);
     $s=str_replace('$_GET[', ":get_", $s);$s=str_replace('$_POST[', ":post_", $s);
     $s=str_replace('$_COOKIE[', ":cook_", $s);$s=str_replace('$_SESSION[', ":sess_", $s);
     if(isset($_GET))foreach($_GET as $k => $v) if(strstr($s,':get_'.$k))$p[':get_'.$k]=$v;
     if(isset($_POST))foreach($_POST as $k => $v) if(strstr($s,':post_'.$k))$p[':post_'.$k]=$v;
     if(isset($_COOKIE))foreach($_COOKIE as $k => $v) if(strstr($s,':cook_'.$k))$p[':cook_'.$k]=$v;
     if(isset($_SESSION))foreach($_SESSION as $k => $v) if(strstr($s,':sess_'.$k))$p[':sess_'.$k]=$v;
     $c = $c->prepare($s, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
     foreach($p as $k => $v){if(trim($v)==NULL){ echo  ' Error: '.$k; return; }if(is_numeric($v))$c->bindValue($k, (int)$v, PDO::PARAM_INT);else $c->bindValue($k, $v, PDO::PARAM_STR);}$rs=$c->execute();
    if(/*return field*/strlen($o)>1){$s=$c->fetchAll();foreach($s as $w)if(isset($w))$r=$w;if(!isset ($r))return ':(';$s=$r[$o]; if($b)$s.=' '.$r[$b];if($d)$s.=' '.$r[$d];return $s; }
    if(/*return array*/$o==1){return $a=$c->fetchAll();foreach($a as $w)if(!isset ($w))return array();$r=$w;return $r;}
    if(/*count row*/$o==2){return $c->rowCount();}
    if(/*check select*/strstr(strtolower(substr($s,0,6)),'select'))$o=4;
    if(/*exec script*/$o==3)return $rs;
    if(/*return fetch all*/$o==4)return $c->fetchAll();
}/* end function getpdo sql */

?>