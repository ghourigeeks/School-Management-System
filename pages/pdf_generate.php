<?php
require 'dompdf/autoload.inc.php';
ob_start();
use Dompdf\Dompdf;

$dompdf = new Dompdf();

require('head.php');
require('db.php');
$obj->is_logged_in();

if(isset($_GET['id'])){
	$id = $_GET['id'];
    $tchr_class = $obj->view_teacher_classes($id);
    if (!$tchr_class) {
      header ("location:404.php");
    }
  }else{
    header ("location:404.php");
  }

  $teacher = $obj->fetch_teachers();
  $subject = $obj->subject();
  $class   = $obj->fetch_class();
  $enter_time    = $obj->enter_time();
  $end_time    = $obj->end_time();

  

if (($_SESSION['users']['role_id'] == 1) OR ($_SESSION['users']['role_id'] == 2)) {
  // Keep
}else{
  header("location:teacher_classes.php?error=0");
}


require('pdf_detail.php');
$html = ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4','portrait');
$dompdf->render();

$dompdf->stream("playerofcode",array("Attachment"=>0));


?>