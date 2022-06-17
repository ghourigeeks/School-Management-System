
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
    $student    = $obj->view_student($id);
if (!$student) {
    header ("location:404.php");
  }
}else{
    header ("location:404.php");
}

$designation      = $obj->fetch_designation();
$gender           = $obj->fetch_gender();
$lanuages         = $obj->fetch_lanuages();
$marital_status   = $obj->fetch_marital_status();
$nationality      = $obj->fetch_nationality();
$qualification    = $obj->qualification();
$subject          = $obj->subject();
$class            = $obj->fetch_class();
$religion         = $obj->fetch_religion();
// $obj->debug($getDataById);

?>

<?php

if (($_SESSION['users']['role_id'] == 1) OR ($_SESSION['users']['role_id'] == 2)) {
  // Keep
}else{
  header("location:student.php?error=0");
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
    <form role="form" id="form" action="process.php?id=<?php echo $id ?>" method="POST">
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
            <a style="float:right;padding: 9px 16px 9px 16px;" href="student.php" class="btn btn-primary btn-sm btn-round ml-auto float-right"><i class="fa fa-chevron-left"></i></a>
              <h6>Gernal Foam</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div style="margin-top:-20px;" class="card-body">
              <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                           <label for="student_name">Student name <span style="color:red">*</span></label>
                           <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo $student['student_name'] ?>" placeholder="Student name" required>
                         </div>
                      </div>
                      <div class="col-md-6">
                         <div class="form-group">
                           <label for="guardian_name">Guardian name <span style="color:red">*</span></label>
                           <input type="text" class="form-control" id="guardian_name" name="guardian_name" value="<?php echo $student['guardian_name'] ?>"  placeholder="Guardian name" required>
                         </div>
                      </div>
               </div>
               <div class="row">
                 <div class="col-md-6">
                         <div class="form-group">
                           <label for="caste">Caste <span style="color:red">*</span></label>
                           <input type="text" class="form-control" id="caste" value="<?php echo $student['caste'] ?>" name="caste" placeholder="Caste" required>
                         </div>
                      </div>  
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="guardian_occupation">Guardian occupation <span style="color:red">*</span></label>
                           <input type="text" class="form-control" id="guardian_occupation" name="guardian_occupation" value="<?php echo $student['guardian_occupation'] ?>" placeholder="Guardian occupation" required>
                         </div>
                    </div>    
               </div>
               <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                           <label for="nationality_id">Nationality <span style="color:red">*</span></label>
                                <select class="form-control" name="nationality_id" id="nationality_id" aria-label=".form-select-lg example" required>
                                <option selected disabled value="">Please Select</option>
                                <?php foreach ($nationality as $key => $value) { ?>  
                                <?php if ($value['id'] == $student['nationality_id']){?>
                                <option selected value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?></option>
                                <?php }else{ ?> <option value="<?php echo $value['id']?>">
                                <?php echo ucwords($value['name'])?> </option> <?php }?>
                                <?php }?>
                                </select>
                         </div>
                      </div>
                   
                    <div class="col-md-6">
                        <div class="form-group">
                           <label for="date_of_birth">Date of birth <span style="color:red">*</span></label>
                           <input type="date" class="form-control" id="date_of_birth"  name="date_of_birth" value="<?php echo $student['date_of_birth'] ?>"  placeholder="Date of birth" required>
                         </div>
                    </div>    
               </div>
               <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                           <label for="religion_id">Religion <span style="color:red">*</span></label>
                                <select class="form-control" name="religion_id" id="religion_id" aria-label=".form-select-lg example" required>
                                <option selected disabled value="">Please Select</option>
                                <?php foreach ($religion as $key => $value) { ?>  
                                <?php if ($value['id'] == $student['religion_id']){?>
                                <option selected value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?></option>
                                <?php }else{ ?> <option value="<?php echo $value['id']?>">
                                <?php echo ucwords($value['name'])?> </option> <?php }?>
                                <?php }?>
                                </select>
                         </div>
                      </div>
                   
                    <div class="col-md-6">
                        <div class="form-group">
                           <label for="class_id">Class <span style="color:red">*</span></label>
                            <select class="form-control" name="class_id" id="class_id" aria-label=".form-select-lg example" required>
                            <option selected disabled value="">Please Select</option>
                            <?php foreach ($class as $key => $value) { ?>  
                            <?php if ($value['id'] == $student['class_id']){?>
                            <option selected value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?></option>
                            <?php }else{ ?> <option value="<?php echo $value['id']?>">
                            <?php echo ucwords($value['name'])?> </option> <?php }?>
                            <?php }?>
                            </select>
                         </div>
                    </div>    
               </div>
               <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                           <label for="marital_status_id">Marital status <span style="color:red">*</span></label>
                                <select class="form-control" name="marital_status_id" id="marital_status_id" aria-label=".form-select-lg example" required>
                                <option selected disabled value="">Please Select</option>
                                <?php foreach ($marital_status as $key => $value) { ?>  
                                <?php if ($value['id'] == $student['marital_status_id']){?>
                                <option selected value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?></option>
                                <?php }else{ ?> <option value="<?php echo $value['id']?>">
                                <?php echo ucwords($value['name'])?> </option> <?php }?>
                                <?php }?>
                                </select>
                         </div>
                      </div>
                   
                    <div class="col-md-6">
                        <div class="form-group">
                           <label for="gender_id">Gender <span style="color:red">*</span></label>
                            <select class="form-control" name="gender_id" id="gender_id" aria-label=".form-select-lg example" required>
                            <option selected disabled value="">Please Select</option>
                            <?php foreach ($gender as $key => $value) { ?>  
                            <?php if ($value['id'] == $student['gender_id']){?>
                            <option selected value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?></option>
                            <?php }else{ ?> <option value="<?php echo $value['id']?>">
                            <?php echo ucwords($value['name'])?> </option> <?php }?>
                            <?php }?>
                            </select>
                         </div>
                    </div>    
               </div>
               <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                      <label for="tel_no">Emeregncy number <span style="color:red">*</span></label>
                      <input type="text" class="form-control" id="tel_no" value="<?php echo $student['tel_no'] ?>" name="tel_no" placeholder="Emergency number" required>
                    </div>
                 </div>
                 <div class="col-md-6">
                 <div class="form-group">
                      <label for="gender_id">Gender <span style="color:red">*</span></label>
                      <select class="form-control" name="active" id="active" aria-label=".form-select-lg example">
                      <option selected disabled value="">Please Select</option>
                      <?php if($student['active'] == 1){?>
                      <option value="1" selected>Active</option>
                      <option value="0">Inactive</option>
                      <?php }?>
                      <?php if($student['active'] == 0){?>
                      <option value="1">Active</option>
                      <option value="0" selected>Inactive</option>
                      <?php }?>
                      </select>												
                        </div>  
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="fees">Student fees<span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="fees" name="fees" value="<?php echo $student['fees'] ?>"  placeholder="Student fees" required>
                    </div>
                    <div class="form-group">
                      <label for="email">Student email <span style="color:red">*</span></label>
                      <input type="email" class="form-control" id="email" value="<?php echo $student['email'] ?>" name="email" placeholder="Student email" required>
                    </div>
                  </div>
              </div>
              <div class="card-footer">
              <button  type="submit" name="submit_btn" value="update_student" class="btn btn-success">Submit</button>
                <a href="student.php"type="submit" class="btn btn-danger">Cancel</a>
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
      student_name: {
        required: true,
        digits: false,
        minlength: 3,
        normalizer: function( value ) {
        return $.trim( value );
      }
      },
      father_name: {
        required: true,
        digits: false,
        minlength: 3,
        normalizer: function( value ) {
        return $.trim( value );
      }
      },
      caste: {
        required: true,
        digits: false,
        minlength: 3,
        normalizer: function( value ) {
        return $.trim( value );
      }
      },
      guardian_occupation: {
        required: true,
        digits: false,
        minlength: 3,
        normalizer: function( value ) {
        return $.trim( value );
      }
      },
      nationality_id: {
        required: true
      },
      date_of_birth: {
        required: true
      },
      religion_id: {
        required: true
      },
      class_id: {
        required: true
      },
      guardian_name: {
        required: true,
        digits: false,
        minlength: 3,
        normalizer: function( value ) {
        return $.trim( value );
      }
      },
      marital_status_id: {
        required: true,
      },
      gender_id: {
        required: true,
      },
      tel_no: {
        required: true,
        minlength: 11,
        maxlength: 11,
        normalizer: function( value ) {
        return $.trim( value );
      }
      },
      active: {
        required: true,
      },
      fees: {
        required: true,
        minlength: 4,
      },
    },
    messages: {
      student_name: {
        required: "This field is required.",
        minlength: "Your name must be at least 3 characters long",
        number:    "Invalid format"
      },
      father_name: {
        required: "This field is required.",
        minlength: "Your name must be at least 3 characters long",
        number:    "Invalid format"
      },
      caste: {
        required: "This field is required.",
        minlength: "Your name must be at least 3 characters long",
        number:    "Invalid format"
      },
      guardian_occupation: {
        required: "This field is required.",
        minlength: "Your name must be at least 3 characters long",
        number:    "Invalid format"
      },
      nationality_id: {
        required: "This field is required."
      },
      date_of_birth: {
        required: "This field is required."
      },
      religion_id: {
        required: "This field is required."
      },
      class_id: {
        required: "This field is required."
      },
      guardian_name: {
        required: "This field is required.",
        minlength: "Your name must be at least 3 characters long",
        number:    "Invalid format"
      },
      marital_status_id: {
        required: "This field is required.",
      },
      gender_id: {
        required: "This field is required.",
      },
      tel_no: {
        required: "This field is required.",
        minlength: "Your emergency number should be must 11 characters ",
        maxlength: "Your emergency number should be must 11 characters "
      },
      active: {
        required: "This field is required.",
      },
      fees: {
        required: "This field is required.",
        minlength: "Your fees must be at least 4 characters long",
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