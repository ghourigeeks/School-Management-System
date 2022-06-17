
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
    $user    = $obj->view_user($id);
if (!$user) {
    header ("location:404.php");
  }
}else{
  header ("location:404.php");
}

$role = $obj->fetch_role(); 

?>

<?php

if (($_SESSION['users']['role_id'] == 1) OR ($_SESSION['users']['role_id'] == 2)) {
  // Keep
}else{
  header("location:user.php?error=0");
}


?>


<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>

<?php include ("sidebar.php") ?>

  <main class="main-content position-relative border-radius-lg ">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder text-white mb-0">User</h6>
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
    <form role="form" id="form" action="process.php" method="POST">
                <div class="row">
                    <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                        <a style="float:right;padding: 9px 16px 9px 16px;" href="user.php" class="btn btn-primary btn-sm btn-round ml-auto float-right"><i class="fa fa-chevron-left"></i></a>
                        <h6>View user</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                        <div style="margin-top:-20px;" class="card-body">
                        <div class="table-responsive">
                              <table class="table dt-responsive">
                                  <tbody>
                                  <tr>
                                      <td width="80%">User id</td>
                                      <td><label style="font-size:13px; margin-left:20px;"><?php echo $user['id'] ?></label></td>
                                  </tr>
                                  <tr>
                                      <td>First name</td>
                                        <td>
                                        <label style="font-size:13px; margin-left:20px;"><?php echo $user['fname'] ?></label>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Last name</td>
                                        <td>
                                        <label style="font-size:13px; margin-left:20px;"><?php echo $user['lname'] ?></label>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>username</td>
                                        <td>
                                        <label style="font-size:13px; margin-left:20px;"><?php echo $user['username'] ?></label>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Role</td>
                                        <td>
                                        <label style="font-size:13px; margin-left:20px;"><?php foreach ($role as $key => $value) { ?>
                                          <?php if($value['id'] == ucfirst($user['role_id'])){?>
                                          <?php echo ucfirst($value['name'])?>
                                          <?php }else{ ?>
                                          <?php }?>
                                          <?php }?></label>
                                      </td>
                                    </tr>
                                     <tr>
                                     <td>User status</td>
                                        <td>
                                          <?php if ($user['active'] == 1) { ?>
                                            <label style="padding: 10px 20px 10px 20px; margin-left:20px;" class="btn-success badge badge-success">ACTIVE </label>
                                        <?php 
                                        }else{?>
                                        <label style="padding: 10px 20px 10px 20px; margin-left:20px;" class="btn-danger badge badge-success">INACTIVE </label>
                                        <?php
                                        }
                                        ?>
                                      </td>  
                                    </tr>
                        </tbody></table><br><br>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <?php include ("footer.php") ?>





</body>

</html>