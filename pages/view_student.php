<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>

<?php 
include("db.php"); 
$obj->is_logged_in();
?>

<?php 


if(isset($_GET['id'])){
	$id = $_GET['id'];
    $getDataById    = $obj->view_student($id);
if (!$getDataById) {
    header ("location:404.php");
  }
}else{
  header ("location:404.php");
}

$class          = $obj->fetch_class();
$religion       = $obj->fetch_religion(); 
$nationality    = $obj->fetch_nationality();
$gender         = $obj->fetch_gender();
$marital_status = $obj->fetch_marital_status(); 

?>



<?php

if (($_SESSION['users']['role_id'] == 1) OR ($_SESSION['users']['role_id'] == 2)) {
  // Keep
}else{
  header("location:student.php?error=0");
}


?>

<style>
.head {
    background: #5e72e4;
    height: 40px;
    margin-top: 0px;
    border-radius: 0px;
    width: 100%;
    margin-left: 0px;
}
.head_heading {
    font-size: 14px;
    color: #fff;
    margin-left: 20px;
    margin-top: 11px;
    padding: 0px;
}
.card.mb-4 {
    border-radius: 0px;
}
.top-head {
    background: #5e72e4;
    height: 40px;
    margin-top: 0px;
    border-radius: 0px;
    width: 100%;
    margin-left: 0px;
}
</style>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
   <?php include("sidebar.php") ?>
  <main class="main-content position-relative border-radius-lg ">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder text-white mb-0">Student</h6>
        </nav>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="logout.php" class="nav-link text-white font-weight-bold px-0">
              <i class="fa fa-power-off" aria-hidden="true"></i>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid py-4">
      <div class="row">
      <div class="col-md-5 mt-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">Student</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                <a style="float:right;padding: 9px 14px 9px 14px;" href="student.php" class="btn btn-primary btn-sm btn-round ml-auto float-right"><i class="fa fa-chevron-left"></i></a>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Student id </h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-dark  text-gradient text-sm font-weight-bold">
                  <?php echo $getDataById['id']?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Caste</h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-dark text-gradient text-sm font-weight-bold">
                  <?php echo ucfirst($getDataById['caste'])?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Phone number</h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-dark text-gradient text-sm font-weight-bold">
                  <?php echo $getDataById['tel_no']?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Guardian name</h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-dark text-gradient text-sm font-weight-bold">
                  <?php echo ucfirst($getDataById['guardian_name'])?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Guardian occupation</h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-dark text-gradient text-sm font-weight-bold">
                  <?php echo $getDataById['guardian_occupation']?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Marital status</h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-dark text-gradient text-sm font-weight-bold">
                  <?php foreach ($marital_status as $key => $value) { ?>
										<?php if($value['id'] == ucfirst($getDataById['marital_status_id'])){?>
										<?php echo ucfirst($value['name'])?>
										<?php }else{ ?>
										<?php }?>
										<?php }?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Gender</h6>
                    </div>
                  </div>  
                  <div class="d-flex align-items-center text-dark text-gradient text-sm font-weight-bold">
                  <?php foreach ($gender as $key => $value) { ?>
										<?php if($value['id'] == ucfirst($getDataById['gender_id'])){?>
										<?php echo ucfirst($value['name'])?>
										<?php }else{ ?>
										<?php }?>
										<?php }?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Fees</h6>
                    </div>
                  </div>  
                  <div class="d-flex align-items-center text-dark text-gradient text-sm font-weight-bold">
                    <?php echo $getDataById['fees'] ?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Student status </h6>
                    </div>
                  </div>

                  <?php if ($getDataById['active'] == 1) { ?>
                  <span style="margin:0px;padding: 9px 18px 9px 18px" class="btn btn-success badge badge-secondary">Active</span>
                  <?php 
                  }else{?>
                  <span style="margin:0px;padding: 9px 18px 9px 18px" class="btn btn-danger badge badge-secondary">Inctive</span>
                  <?php
                  }
                  ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-7 mt-4">
        <div class="card card-profile">
            <img src="../assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-4 col-lg-4 order-lg-2">
                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                  <a href="javascript:;">
                    <img src="uploads/<?php echo $getDataById['std_pic'] ?>" class="rounded-circle img-fluid border border-2 border-white">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="d-flex justify-content-center">
                    <?php echo ucfirst($getDataById['student_name']) ?>
                  </div>
                </div>
              </div>
              <div class="text-center mt-4">
              <div class="d-grid text-center">
                    <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">View profile</a>
              </div>
            <div style="margin-top:20px;" class="card-body p-3 pb-0">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark font-weight-bold text-sm">Phone number</h6>
                  </div>
                  <div class="d-flex align-items-center text-sm">
                  <?php echo $getDataById['tel_no'] ?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark font-weight-bold text-sm">Student Email</h6>
                  </div>
                  <div class="d-flex align-items-center text-sm">
                  <?php echo $getDataById['email'] ?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="text-dark mb-1 font-weight-bold text-sm">Class</h6>
                  </div>
                  <div class="d-flex align-items-center text-sm">
                  <?php foreach ($class as $key => $value) { ?>
										<?php if($value['id'] == ucfirst($getDataById['class_id'])){?>
										<?php echo ucfirst($value['name'])?>
										<?php }else{ ?>
										<?php }?>
										<?php }?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="text-dark mb-1 font-weight-bold text-sm">Date of birth</h6>
                  </div>
                  <div class="d-flex align-items-center text-sm">
                  <?php echo $getDataById['date_of_birth'] ?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="text-dark mb-1 font-weight-bold text-sm">Religion</h6>
                  </div>
                  <div class="d-flex align-items-center text-sm">
                  <?php foreach ($religion as $key => $value) { ?>
										<?php if($value['id'] == ucfirst($getDataById['religion_id'])){?>
										<?php echo ucfirst($value['name'])?>
										<?php }else{ ?>
										<?php }?>
										<?php }?>
                  </div>
                </li>
              </ul>
            </div>
              </div>
            </div>
          </div>
          </div>
          </div>
        </div>
      </div>
    </div>
    </main>

<?php include("footer.php") ?>
</body>

</html>