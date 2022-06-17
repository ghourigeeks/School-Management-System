
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
    $time_Slot    = $obj->view_time_slot($id);
if (!$time_Slot) {
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


<style>
.header {
    margin-top: 20px;
}
.head{
  background: #5e72e4;
    height: 41px;
    margin-top: 10px;
    width: 105.5%;
    margin-left: -23px;
}
.head_heading{
  font-size: 15px;
    color: #fff;
    margin-left: 15px;
    margin-top: 13px;
    padding: 10px;
}
.form-control.is-invalid, .was-validated .form-control:invalid {
    background-image:none;
    padding-right:5px;
    border-color: #fda8a8;
}
.form-control.is-invalid:focus{
  box-shadow: none;
}
.was-validated :invalid~.invalid-feedback, .was-validated :invalid~.invalid-tooltip, .is-invalid~.invalid-feedback, .is-invalid~.invalid-tooltip {
    display: block;
    color: red;
    font-weight: 500;
}
</style>
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
    <form role="form" id="form" action="process.php?id=<?php echo $id ?>" method="POST">
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
            <a style="float:right;padding: 9px 16px 9px 16px;" href="time_Slot.php" class="btn btn-primary btn-sm btn-round ml-auto float-right"><i class="fa fa-chevron-left"></i></a>
              <h6>Update time slot</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div style="margin-top:-20px;" class="card-body">
              <div class="row">
                    <div class="col-md-12">
                         <div class="form-group">
                           <label for="start_time">Start time <span style="color:red">*</span></label>
                           <input type="time" class="form-control" id="start_time" name="start_time" value="<?php echo $time_Slot['start_time'] ?>" placeholder="Start time" required>
                         </div>
                      </div>
               </div>
                <div class="form-group">
                    <label for="end_time">End time <span style="color:red">*</span></label>
                    <input type="time" class="form-control" id="end_time" name="end_time" value="<?php echo $time_Slot['end_time'] ?>" placeholder="End time" required>
                </div>
                <div class="form-group">
                          <label for="active">Status <span style="color:red">*</span></label>
                          <select class="form-control" name="active" id="active" aria-label=".form-select-lg example">
                          <option selected disabled value="">Please Select</option>
                          <?php if($time_Slot['active'] == 1){?>
                          <option value="1" selected>Active</option>
                          <option value="0">Inactive</option>
                          <?php }?>
                          <?php if($time_Slot['active'] == 0){?>
                          <option value="1">Active</option>
                          <option value="0" selected>Inactive</option>
                          <?php }?>
                          </select>												
                     </div>
              </div>
              <div style="margin-top:-20px;" class="card-footer">
              <button type="submit" name="submit_btn" value="update_time_slot" class="btn btn-success">Submit</button>
                <a href="time_Slot.php"type="submit" class="btn btn-danger">Cancel</a>
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
        start_time: {
        required: true,
      },
      end_time: {
        required: true,
      },
    },
    messages: {
      start_time: {
        required: "This field is required.",
      },
      end_time: {
        required: "This field is required.",
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