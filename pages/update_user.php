
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

$role = $obj->fetch_role()

?>


<?php

if (($_SESSION['users']['role_id'] == 1) OR ($_SESSION['users']['role_id'] == 2)) {
  // Keep
}else{
  header("location:user.php?error=0");
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
    <form role="form" id="form" action="process.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
            <a style="float:right;padding: 9px 16px 9px 16px;" href="user.php" class="btn btn-primary btn-sm btn-round ml-auto float-right"><i class="fa fa-chevron-left"></i></a>
              <h6>Update user</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div style="margin-top:-20px;" class="card-body">
              <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                           <label for="name">First name <span style="color:red">*</span></label>
                           <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $user['fname'] ?>" placeholder="First name" required>
                         </div>
                      </div>
                      <div class="col-md-6">
                         <div class="form-group">
                           <label for="lname">Last name <span style="color:red">*</span></label>
                           <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $user['lname'] ?>" placeholder="Last name" required>
                         </div>
                      </div>
               </div>
               <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                           <label for="username">Username <span style="color:red">*</span></label>
                           <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username'] ?>" placeholder="Username" required>
                         </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                <label for="gender_id">Status <span style="color:red">*</span></label>
                <select class="form-control" name="active" id="active" aria-label=".form-select-lg example">
                <option selected disabled value="">Please Select</option>
                    <?php if($user['active'] == 1){?>
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                    <?php }?>
                    <?php if($user['active'] == 0){?>
                    <option value="1">Active</option>
                    <option value="0" selected>Inactive</option>
                    <?php }?>
                    </select>												
                </div>
                      </div>
               </div>
               <div class="row">
                 <div class="col-md-12">
                 <div class="form-group">
                           <label for="role_id">Role <span style="color:red">*</span></label>
                           <select class="form-control" name="role_id" id="role_id" aria-label=".form-select-lg example">
                              <option selected disabled value="">Please Select</option> <?php foreach ($role as $key => $value) { ?>
                                <?php if ($value['id'] == $user['role_id']){?> <option selected value="
                                <?php echo $value['id']?>"> 
                                  <?php echo ucwords($value['name'])?> 
                              </option> 
                              <?php
                              }
                                elseif($user['role_id'] != 1){ 
                                  ?> <option value="<?php echo $value['id']?>"> <?php echo ucwords($value['name'])?>
                                     </option> 
                                  <?php 
                                  }
                                 }
                                 ?>
                            </select>
                         </div>
                 </div>
               </div>
              </div>
              <div style="margin-top:-20px;" class="card-footer">
              <button type="submit" name="submit_btn" value="update_user" class="btn btn-success">Submit</button>
                <a href="user.php"type="submit" class="btn btn-danger">Cancel</a>
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
      fname: {
        required: true,
        digits: false,
        minlength: 3
      },
      lname: {
        required: true,
        digits: false,
        minlength: 3
      },
      username: {
        required: true,
        digits: false,
        minlength: 5
      },
      password: {
        required: true,
        digits: false,
        minlength: 8
      },
      role_id: {
        required: true,
      },
    },
    messages: {
      fname: {
        required: "This field is required.",
        minlength: "Your first name must be at least 3 characters long",
        number:    "Invalid format"
      },
      lname: {
        required: "This field is required.",
        minlength: "Your last name must be at least 3 characters long",
        number:    "Invalid format"
      },
      username: {
        required: "This field is required.",
        minlength: "Your username must be at least 5 characters long",
        number:    "Invalid format"
      },
      password: {
        required: "This field is required.",
        minlength: "Your password must be at least 8 characters long",
        number:    "Invalid format"
      },
      role_id: {
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