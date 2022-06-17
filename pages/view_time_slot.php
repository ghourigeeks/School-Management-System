
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
    $time_slot    = $obj->view_time_slot($id);
if (!$time_slot) {
    header ("location:404.php");
  }
}else{
  header ("location:404.php");
}

?>

<?php

if (($_SESSION['users']['role_id'] == 1) OR ($_SESSION['users']['role_id'] == 2)) {
  // Keep
}else{
  header("location:time_slot.php?error=0");
}


?>


<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>

<?php include ("sidebar.php") ?>

  <main class="main-content position-relative border-radius-lg ">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder text-white mb-0">Time slot</h6>
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
                        <a style="float:right;padding: 9px 16px 9px 16px;" href="time_slot.php" class="btn btn-primary btn-sm btn-round ml-auto float-right"><i class="fa fa-chevron-left"></i></a>
                        <h6>View time slot</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                        <div style="margin-top:-20px;" class="card-body">
                        <div class="table-responsive">
                              <table class="table dt-responsive">
                                  <tbody><tr>
                                      <td width="80%">id</td>
                                      <td><label style="font-size:13px; margin-left:20px;"><?php echo $time_slot['id'] ?></label></td>
                                  </tr>
                                  <tr>
                                      <td>Start time</td>
                                        <td>
                                        <label style="font-size:13px; margin-left:20px;"><?php echo $time_slot['start_time'] ?></label>
                                      </td>
                                    </tr>
                                     <tr>
                                      <td>End time</td>
                                      <td>
                                        <label style="font-size:13px; margin-left:20px;"><?php echo $time_slot['end_time'] ?></label>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Time slot status</td>
                                        <td>
                                          <?php if ($time_slot['active'] == 1) { ?>
                                            <label style="padding: 10px 20px 10px 20px; margin-left:20px;" class="btn-success badge badge-success">Active </label>
                                          <?php 
                                          }else{?>
                                              <label style="padding: 10px 20px 10px 20px; margin-left:20px;" class="btn-danger badge badge-danger">Inactive </label>
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


  <script>
$(function () {
  $.validator.setDefaults({
  });
  $('#form').validate({
    rules: {
      name: {
        required: true,
        digits: false,
        minlength: 3
      },
    },
    messages: {
      name: {
        required: "This field is required.",
        minlength: "Your name must be at least 3 characters long",
        number:    "Invalid format"
      },
    },
    // errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>




</body>

</html>