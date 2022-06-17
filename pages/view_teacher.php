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
    $getDataById    = $obj->view_teacher($id);
if (!$getDataById) {
    header ("location:404.php");
  }
}else{
  header ("location:404.php");
}

    $education      = $obj->view_education($id);
    $experience     = $obj->view_experience($id);
?>


<?php

if (($_SESSION['users']['role_id'] == 1) OR ($_SESSION['users']['role_id'] == 2)) {
  // Keep
}else{
  header("location:teacher.php?error=0");
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
.card.mb-4 {
    border-radius: 0px;
}
.head_heading {
    font-size: 14px;
    color: #fff;
    margin-left: 20px;
    margin-top: 11px;
    padding: 0px;
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
          <h6 class="font-weight-bolder text-white mb-0">Teacher</h6>
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
                  <h6 class="mb-0">Teacher</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                <a style="float:right;padding: 9px 14px 9px 14px;" href="teacher.php" class="btn btn-primary btn-sm btn-round ml-auto float-right"><i class="fa fa-chevron-left"></i></a>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Teacher id </h6>
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
                      <h6 class="mb-1 text-dark text-sm">Nationaility</h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-dark text-gradient text-sm font-weight-bold">
                  <?php echo ucwords($getDataById['nationaility_id'])?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Cnic number</h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-dark text-gradient text-sm font-weight-bold">
                  <?php echo $getDataById['cnic']?>
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
                  <?php echo ucwords($getDataById['guardian_name'])?>
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
                  <?php echo ucwords($getDataById['guardian_occupation'])?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Children</h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-dark text-gradient text-sm font-weight-bold">
                  <?php echo $getDataById['no_of_children']?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Lanuage</h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-dark text-gradient text-sm font-weight-bold">
                  <?php echo ucwords($getDataById['lanuages_id'])?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Class</h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-dark text-gradient text-sm font-weight-bold">
                  <?php echo ucwords($getDataById['class_id'])?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Designation</h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-dark text-gradient text-sm font-weight-bold">
                  <?php echo ucwords($getDataById['designation_id'])?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Teacher status </h6>
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
                    <img src="uploads/<?php echo $getDataById['tchr_pic'] ?>" class="rounded-circle img-fluid border border-2 border-white">
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
                    <?php echo ucwords($getDataById['name'])?>
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
                    <h6 class="mb-1 text-dark font-weight-bold text-sm">Address</h6>
                  </div>
                  <div class="d-flex align-items-center text-sm">
                  <?php echo ucwords($getDataById['address']) ?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="text-dark mb-1 font-weight-bold text-sm">Teacher email</h6>
                  </div>
                  <div class="d-flex align-items-center text-sm">
                  <?php echo ucfirst($getDataById['email']) ?>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="text-dark mb-1 font-weight-bold text-sm">Marital status</h6>
                  </div>
                  <div class="d-flex align-items-center text-sm">
                    <?php echo ucfirst ($getDataById['marital_status_id']) ?>
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
                    <h6 class="text-dark mb-1 font-weight-bold text-sm">Gender</h6>
                  </div>
                  <div class="d-flex align-items-center text-sm">
                  <?php echo ucfirst($getDataById['gender_id']) ?>
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
    <div class="container-fluid py-4">
      <div class="row">
      <div class="col-md-12 mt-4">
      <div style="margin-top-15px;" class="card">
  <div class="head">
  <h4 class="head_heading">Teacher Account detail</h4>
  </div>
  <div class="col-md-12 mt-4">
  <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bank name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Branch code</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Salary</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Account title</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                          <span style="margin-left:10px;" class="text-secondary text-xs font-weight-bold"><?php echo ucfirst($getDataById['bank_name']) ?></span>
                          </div>
                        </div>
                      </td>
                      <td>
                      <span style="margin-left:10px;" class="text-secondary text-xs font-weight-bold"><?php echo ucfirst($getDataById['branch_code']) ?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <span style="margin-left:-10px;" class="text-secondary text-xs font-weight-bold"><?php echo ucfirst($getDataById['salary']) ?></span>
                      </td>
                      <td class="align-middle text-center">
                      <span style="margin-left:-35px;" class="text-secondary text-xs font-weight-bold"><?php echo ucfirst($getDataById['account_title']) ?></span>
                      </td>
                      <td class="align-middle text-center">
                      <span style="margin-left:-15px;" class="text-secondary text-xs font-weight-bold"><?php echo ucfirst($getDataById['account_title']) ?></span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
  </div>
       <div class="row">
      <div class="col-md-12 mt-4">
      <div style="margin-top-15px;" class="card">
  <div class="head">
  <h4 class="head_heading">Teacher education detail</h4>
  </div>
  <div class="col-md-12 mt-4">
  <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qualification</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Institution</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subject</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grade </th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($education as $key => $value) {?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                          <span style="margin-left:10px;" class="text-secondary text-xs font-weight-bold"><?php echo $value['qualification_id'] ?></span>
                          </div>
                        </div>
                      </td>
                      <td>
                      <span class="text-secondary text-xs font-weight-bold"><?php echo ucfirst($value['institution']) ?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <span  class="text-secondary text-xs font-weight-bold"><?php echo ucfirst($value['subject_id']) ?></span>
                      </td>
                      <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?php echo ucfirst($value['grade_div']) ?></span>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="row">
      <div class="col-md-12 mt-4">
      <div style="margin-top-15px;" class="card">
  <div class="head">
  <h4 class="head_heading">Teacher experience detail</h4>
  </div>
  <div class="col-md-12 mt-4">
  <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Experience  title</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Experience year</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subject</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grade </th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($experience as $key => $value) {?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                          <span style="margin-left:10px;" class="text-secondary text-xs font-weight-bold"><?php echo ucfirst($value['experience_title'])?></span>
                          </div>
                        </div>
                      </td>
                      <td>
                      <span class="text-secondary text-xs font-weight-bold"><?php echo ucfirst($value['year'])?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <span  class="text-secondary text-xs font-weight-bold"><?php echo ucfirst($value['salary_drawn']) ?></span>
                      </td>
                      <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?php echo ucfirst($value['prev_job']) ?></span>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
       </div>
    </main>

<?php include("footer.php") ?>
</body>

</html>