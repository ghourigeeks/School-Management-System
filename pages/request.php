<?php
require('db.php');

if (isset($_POST['fn'])) {
 switch ($_POST['fn']) {
                 
    // user ajax
    case 'login_user':
    $res = $obj->login($_POST);
    break;
    case 'recover_pass':
    $res = $obj->recover_pass($_POST);
    break;
    case 'recover_code':
      $res = $obj->recover_code($_POST);
    break;
    case 'delete_teacher':
      if ($_POST['delete_btn_set']) {
      $id = $_POST["delete_id"];
      $res = $obj->delete_teacher($id);
      }
      break;
    case 'delete_teacher_classes':
      if ($_POST['delete_tchrcls_set']) {
      $id = $_POST["delete_id"];
      $res = $obj->delete_teacher_classes($id);
      }
      break;
    case 'delete_salary':
      if ($_POST['delete_sal_set']) {
      $id = $_POST["delete_id"];
      $res = $obj->delete_salary($id);
      }
      break;
    case 'fetch_tchr_salary_by_id':
      $res = $obj->fetch_tchr_salary_by_id($_POST);
      break;
    case 'delete_student':
    if ($_POST['delete_std_set']) {
    $id = $_POST["delete_id"];
    $res = $obj->delete_student($id);
    }
    break;
    case 'delete_user':
      if ($_POST['delete_user_set']) {
      $id = $_POST["delete_id"];
      $res = $obj->delete_user($id);
      }
      break;
    case 'delete_fees':
      if ($_POST['delete_fees_set']) {
      $id = $_POST["delete_id"];
      $res = $obj->delete_fees($id);
      }
      break;
    case 'fetch_std_fees_by_id':
    $res = $obj->fetch_std_fees_by_id($_POST);
    break;
    case 'delete_class':
    if ($_POST['delete_cls_set']) {
    $id = $_POST["delete_id"];
    $res = $obj->delete_class($id);
    }
    break;
    case 'delete_lanuages':
    if ($_POST['delete_lan_set']) {
    $id = $_POST["delete_id"];
    $res = $obj->delete_lanuages($id);
    }
    break;
    case 'delete_qualification':
    if ($_POST['delete_qua_set']) {
    $id = $_POST["delete_id"];
    $res = $obj->delete_qualification($id);
    }
    break;
    case 'delete_nationality':
    if ($_POST['delete_nat_set']) {
    $id = $_POST["delete_id"];
    $res = $obj->delete_nationality($id);
    }
    break;
    case 'delete_religion':
    if ($_POST['delete_rel_set']) {
    $id = $_POST["delete_id"];
    $res = $obj->delete_religion($id);
}
    break;
    case 'delete_subject':
    if ($_POST['delete_sub_set']) {
    $id = $_POST["delete_id"];
    $res = $obj->delete_subject($id);
    }
    break;
    case 'delete_designation':
    if ($_POST['delete_des_set']) {
    $id = $_POST["delete_id"];
    $res = $obj->delete_designation($id);
    }
    break;
    case 'delete_marital':
    if ($_POST['delete_mar_set']) {
    $id = $_POST["delete_id"];
    $res = $obj->delete_marital($id);
    }
    break;
    case 'delete_role':
    if ($_POST['delete_role_set']) {
    $id = $_POST["delete_id"];
    $res = $obj->delete_role($id);
    }
    break;
    case 'delete_time_slot':
      if ($_POST['delete_slot_set']) {
      $id = $_POST["delete_id"];
      $res = $obj->delete_time_slot($id);
      }
      break;
    case 'delete_gender':
    if ($_POST['delete_gen_set']) {
    $id = $_POST["delete_id"];
    $res = $obj->delete_gender($id);
    }
    break;
  default;

    echo "Something Went Wrong";
        break;
  }
}else{
    if(!defined('MyConst')) {
		die('Direct access not permitted');
	 }
}






?>