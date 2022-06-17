
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

$education        = $obj->view_education($id);
$experience       = $obj->view_experience($id);
$designation      = $obj->fetch_designation();
$gender           = $obj->fetch_gender();
$lanuages         = $obj->fetch_lanuages();
$marital_status   = $obj->fetch_marital_status();
$nationality      = $obj->fetch_nationality();
$qualification    = $obj->qualification();
$subject          = $obj->subject();
$class            = $obj->fetch_class();
$fetch_qual_rows  = $obj->fetch_qual_rows($id);
$fetch_exp_rows   = $obj->fetch_exp_rows($id);
// $obj->debug($getDataById);
?>


<?php

if (($_SESSION['users']['role_id'] == 1) OR ($_SESSION['users']['role_id'] == 2)) {
  // Keep
}else{
  header("location:teacher.php?error=0");
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
    <form role="form" id="form" action="process.php?id=<?php echo $id ?>" method="POST">
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
            <a style="float:right;padding: 9px 16px 9px 16px;" href="teacher.php" class="btn btn-primary btn-sm btn-round ml-auto float-right"><i class="fa fa-chevron-left"></i></a>
              <h6>Gernal Foam</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div style="margin-top:-20px;" class="card-body">
              <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="fname">Teacher name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="First name" value="<?php echo $getDataById['name'] ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender_id">Gender <span style="color:red">*</span></label>
                            <select name="gender_id" id="gender_id" class="form-control" required>
                            <option value="" selected disabled>Please select</option> 
                            <?php foreach ($gender as $key => $value) { ?>
                            <?php if($value['name'] == $getDataById['gender_id']){?>
                            <option selected value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?> </option>
                            <?php }else{ ?>
                            <option value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?> </option>
                            <?php }?>
                            <?php }?>
                            </select>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="nationaility_id">Nationaility <span style="color:red">*</span></label>
                            <select name="nationaility_id" id="nationaility_id" class="form-control" required>
                            <option value="" selected disabled>Please select</option> 
                            <?php foreach ($nationality as $key => $value) { ?>
                            <?php if($value['name'] == $getDataById['nationaility_id']){?>
                            <option selected value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?> </option>
                            <?php }else{ ?>
                            <option value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?> </option>
                            <?php }?>
                            <?php }?>
                            </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="cnic">Cnic number <span style="color:red">*</span></label>
                        <input type="tel" class="form-control" id="cnic" name="cnic" placeholder="##############" value="<?php echo $getDataById['cnic'] ?>" required>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_of_birth">Date of birth <span style="color:red">*</span></label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $getDataById['date_of_birth'] ?>" placeholder="Date of birth" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="tel_no">Phone number <span style="color:red">*</span></label>
                        <input type="tel" class="form-control" id="tel_no" name="tel_no" placeholder="+92" value="<?php echo $getDataById['tel_no']?>" required>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                          <label for="marital_status_id">Marital status <span style="color:red">*</span></label>
                            <select  name="marital_status_id" id="marital_status_id" class="form-control" required>
                            <option value="" selected disabled>Please select</option> 
                            <?php foreach ($marital_status as $key => $value) { ?>
                            <?php if($value['name'] == $getDataById['marital_status_id']){?>
                            <option selected value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?> </option>
                            <?php }else{ ?>
                            <option value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?> </option>
                            <?php }?>
                            <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                       <label for="guardian_name">Guardian name <span style="color:red">*</span></label>
                       <input type="text" name="guardian_name" id="guardian_name" value="<?php echo $getDataById['guardian_name'] ?>" placeholder="Guardian name" class="form-control" required>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                          <label for="guardian_occupation">Guardian occupation <span style="color:red">*</span></label>
                          <input type="text" name="guardian_occupation" placeholder="Guardian occupation" id="guardian_occupation" value="<?php echo $getDataById['guardian_occupation'] ?>" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_of_children">Children <span style="color:red">*</span></label>
                        <input type="number" name="no_of_children" id="no_of_children" placeholder="Children" value="<?php echo $getDataById['no_of_children'] ?>" class="form-control" required>
                        <!-- <label for="department">Department <span style="color:red">*</span></label>
                        <input type="tel" class="form-control" id="department" name="department" placeholder="Department" >
                       --></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="lanuages_id">Lanuages <span style="color:red">*</span></label>
                          <select name="lanuages_id" id="lanuages_id" class="form-control" required>
                          <option value="" selected disabled>Please select</option> 
                          <?php foreach ($lanuages as $key => $value) { ?>
                          <?php if($value['name'] == $getDataById['lanuages_id']){?>
                          <option selected value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?> </option>
                          <?php }else{ ?>
                          <option value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?> </option>
                          <?php }?>
                          <?php }?>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_of_children">Designation <span style="color:red">*</span></label>
                        <select  name="designation_id" id="designation_id" class="form-control" required>
                        <option value="" selected disabled>Please select</option> 
                          <?php foreach ($designation as $key => $value) { ?>
                          <?php if($value['name'] == $getDataById['designation_id']){?>
                          <option selected value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?> </option>
                          <?php }else{ ?>
                          <option value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?> </option>
                          <?php }?>
                          <?php }?>
                          </select>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="marital_status_id">Class <span style="color:red">*</span></label>
                        <select  name="class_id" id="class_id" class="form-control" required>
                        <option value="" selected disabled>Please select</option> 
                        <?php foreach ($class as $key => $value) { ?>
                        <?php if($value['name'] == $getDataById['class_id']){?>
                        <option selected value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?> </option>
                        <?php }else{ ?>
                        <option value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?> </option>
                        <?php }?>
                        <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                          <label for="salary">Salary <span style="color:red">*</span></label>
                          <input type="number" name="salary" placeholder="salary" id="salary" value="<?php echo $getDataById['salary'] ?>" class="form-control" required>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                <label for="gender_id">Status <span style="color:red">*</span></label>
                <select class="form-control" name="active" id="active" aria-label=".form-select-lg example">
                <option selected disabled value="">Please Select</option>
                    <?php if($getDataById['active'] == 1){?>
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                    <?php }?>
                    <?php if($getDataById['active'] == 0){?>
                    <option value="1">Active</option>
                    <option value="0" selected>Inactive</option>
                    <?php }?>
                    </select>												
                    </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                        <label for="email">Email <span style="color:red">*</span></label>
                        <input type="email" name="email" placeholder="Teacher email" id="email" value="<?php echo $getDataById['email'] ?>" class="form-control" required>
                      </div>
                  </div>
                  <!-- <div class="form-group">
                           <label for="tchr_pic">Teacher picture <span style="color:red">*</span></label>
                           <input type="file" name="tchr_pic" placeholder="Teacher picture" id="tchr_pic" value="<?php echo $getDataById['tchr_pic'] ?>" class="form-control">
                  </div> -->
                  <div class="form-group">
                        <label for="address">Address <span style="color:red">*</span></label>
                        <textarea type="text" class="form-control" id="address" name="address"  placeholder="Address"><?php echo $getDataById['address']?></textarea>
                  </div>

                </div>
                 <div class="head">
                  <h4 class="head_heading">Teacher education</h4>
                </div>
                <table style="margin-top:20px;" id ="qual_table" class="table remove_table">
                    <tbody>
                    <?php for ($i=0; $i <  $fetch_qual_rows; $i++) { ?>
                      <tr>
                        <td style="padding:0px; width:25%;">
                        <label for="qualification_id">Qualification <span style="color:red">*</span></label>
                        <select class="form-control" id="qualification_id" name="qualification_id[]" >
                          <option value="" selected disabled>Please select</option> 
                          <!-- <option value="" selected disabled>Please select</option> -->
                          <?php foreach ($qualification as $key => $value) {
                            if ($education[$i]['qualification_id'] == $value['name']) {?>?>
                              <option selected value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                          <?php
                            }else{?>
                               <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                            <?php
                            }
                          }
                        ?>
                          </select>
                        </td>
                            <td style="padding-top:0px; width:25%;">
                            <?php if (isset($education[$i]['institution'])) {?>
                          <label for="institution">Institution <span style="color:red">*</span></label>
                          <input type="text" class="form-control" id="institution" name="institution[]" value="<?php echo $education[$i]['institution'] ?>" placeholder="Institution" >
                          <?php 
                          }else{?>
                            <input type="text" class="form-control" id="marital_id" id="institution" name="institution[]" placeholder="Institution" >
                          <?php
                          }
                        ?>
                        </td>
                        <td style="padding-top:0px; width:25%;">
                        <label for="subject_id">Subject <span style="color:red">*</span></label>
                          <select class="form-control" id="subject_id" name="subject_id[]" >
                          <option value="" selected disabled>Please select</option> 
                          <!-- <option value="" selected disabled>Please select</option> -->
                          <?php foreach ($subject as $key => $value) {
                            if ($education[$i]['subject_id'] == $value['name']) {?>?>
                              <option selected value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                          <?php
                            }else{?>
                               <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                            <?php
                            }
                          }
                        ?>
                        </td>
                        <td style="padding-top:0px; width:25%;">
                        <label for="grade_div">Grade <span style="color:red">*</span></label>  
                        <input type="text" class="form-control" id="grade_div" name="grade_div[]" value="<?php echo $education[$i]['grade_div'] ?>" placeholder="Grade" required>
                        <td><a style="margin-top:27px;padding: 7px 15px 7px 15px;" href="javascript:void(0)" class="btn btn-primary" onclick="add_row()"> + </a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <div class="head">
                  <h4 class="head_heading">Teacher experience</h4>
                </div>
                  <table style="margin-top:20px;" id ="exp_table" class="table remove_table">
                    <tbody>
                    <?php for ($i=0; $i <  $fetch_exp_rows; $i++) { ?>
                      <tr>
                        <td style="padding:0px;">
                        <label for="experience_title">Experience title <span style="color:red">*</span></label> 
                        <input type="text" class="form-control" id="experience_title" name="experience_title[]" value="<?php echo $experience[$i]['experience_title'] ?>" placeholder="Experience title"  required>
                        </td>
                        <td style="padding-top:0px;">
                        <label for="year">Experience year <span style="color:red">*</span></label> 
                        <input type="number" class="form-control" id="year" name="year[]" value="<?php echo $experience[$i]['year'] ?>"  placeholder="Experience year"  required>
                        </td>
                        <td style="padding-top:0px;">
                        <label for="salary_drawn">Salary drawn <span style="color:red">*</span></label> 
                        <input type="number" class="form-control" id="salary_drawn" name="salary_drawn[]" placeholder="Salary drawn" value="<?php echo $experience[$i]['salary_drawn'] ?>" required>
                        </td style="padding-top:0px;">
                        <td style="padding-top:0px;">
                        <label for="salary_drawn">Previous job <span style="color:red">*</span></label> 
                        <input type="text" class="form-control aligment" id="prev_job" name="prev_job[]" placeholder="Previous job" value="<?php echo $experience[$i]['prev_job']?>" required>
                        </td style="padding-top:0px;">
                        <td><a style="margin-top:27px; padding: 7px 15px 7px 15px; float:right;" href="javascript:void(0)" class="btn btn-primary" onclick="add_exp_row()"> + </a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <div class="head">
                  <h4 class="head_heading">Teacher account</h4>
                </div>
                  <div style="margin-top:20px;" class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="bank_name">Bank name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="bank_name" name="bank_name" value="<?php echo $getDataById['bank_name'] ?>" placeholder="Bank name" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="branch_code">Branch code <span style="color:red">*</span></label>
                        <input type="number" class="form-control" id="branch_code" name="branch_code" value="<?php echo $getDataById['branch_code'] ?>" placeholder="Branch code"  required>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="account_title">Account title <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="account_title" name="account_title" value="<?php echo $getDataById['account_title'] ?>" placeholder="Account title" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="account_no">Account number <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="account_no" name="account_no" value="<?php echo $getDataById['account_no'] ?>" placeholder="Account number"  required>
                      </div>
                    </div>
                </div>
              </div>
              <div class="card-footer">
              <button  type="submit" name="submit_btn" value="update_teacher" class="btn btn-success">Submit</button>
                <a href="teacher.php"type="submit" class="btn btn-danger">Cancel</a>
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
        function add_row(){
        $('#qual_table tr:last').after('<tr>' +
                                        '<td style="padding:0px">' +
                                          '<select class="form-control" name="qualification_id[]" required>'+
                                            '<option value="" selected disabled>--- Please select ---</option>' +  
                                              <?php foreach ($qualification as $key => $value) {?> 
                                              '<option value=<?php echo $value["id"] ?>>  <?php echo $value["name"] ?> ' +
                                              '</option>'+ <?php } ?> 
                                          '</select>' +
                                        '</td>' +
                                        '<td style="padding-top:0px"><input type="text" class="form-control" id="institution[]" name="institution[]" placeholder="Institution" required></td>' +
                                        '<td style="padding-top:0px">' +
                                          '<select class="form-control" id="subject_id[]" name="subject_id[]" required>'+
                                            '<option value="" selected disabled>--- Please select ---</option>' +  
                                              <?php foreach ($subject as $key => $value) {?> 
                                              '<option value=<?php echo $value["id"] ?>>  <?php echo $value["name"] ?> ' +
                                              '</option>'+ <?php } ?> 
                                          '</select>' +
                                        '</td>' +
                                        '<td style="padding-top:0px"><input type="text" class="form-control" id="grade_div[]" name="grade_div[]" placeholder="Grade" required></td>' +
                                        '<td style="padding-top:0px;"><a style="padding: 7px 17px 7px 17px;" href="javascript:void(0)" class="btn btn-danger" onclick="delete_row(this)"> - </a></td>' +
                                      '</tr>');
        }
        function delete_row(btn){
          $(btn).closest("tr").remove();
        } 
        function add_exp_row(){
          $('#exp_table tr:last').after('<tr>' +
                                        '<td style="padding:0px;"> <input type="text" class="form-control" id="experience_title[]" name="experience_title[]" placeholder="Experience title" required>'+
                                        '</td>'+
                                        '<td style="padding-top:0px;"> <input type="number" class="form-control" id="year[]" name="year[]" placeholder="Experience year" required>'+
                                        '</td>'+
                                        '<td style="padding-top:0px;"> <input type="number" class="form-control" id="salary_drawn[]" name="salary_drawn[]" placeholder="Salary drawn" required>'+
                                        '</td>'+
                                        '<td style="padding-top:0px;"> <input type="text" class="form-control" id="prev_job[]" name="prev_job[]" placeholder="Previous job" required>'+
                                        '</td>'+
                                        '<td><a style="padding: 7px 17px 7px 17px;" href="javascript:void(0)" class="btn btn-danger" onclick="delete_exp_row(this)"> - </a></td>' +
                                      '</tr>');
        }

        function delete_exp_row(btn){
          $(btn).closest("tr").remove();
        } 
</script>

<script>
$(function () {
  $.validator.setDefaults({
  });
  $('#form').validate({
    rules: {
      name: {
        required: true,
        digits: false,
        minlength: 3,
        normalizer: function( value ) {
        return $.trim( value );
      }
      },
      gender_id: {
        required: true,
        minlength: 1
      },
      nationality_id: {
        required: true,
        minlength: 1
      },
      cnic: {
        required: true,
        digits: true,
        minlength: 13,
        maxlength: 13,
        normalizer: function( value ) {
        return $.trim( value );
      }
      },
      date_of_birth: {
        required: true,
      },
      tel_no: {
        required: true,
        digits: true,
        minlength: 11,
        maxlength: 11,
        normalizer: function( value ) {
        return $.trim( value );
      }
      },
      address: {
        required: true,
        minlength: 5,
        normalizer: function( value ) {
        return $.trim( value );
      }
      },
      marital_status_id: {
        required: true,
        minlength: 1
      },
      guardian_name: {
        required: true,
        minlength: 3,
        normalizer: function( value ) {
        return $.trim( value );
      }
      },
      guardian_occupation: {
        required: true,
        minlength: 3,
        normalizer: function( value ) {
        return $.trim( value );
      }
      },
      no_of_children: {
        required: true,
        range : [0,10]
      },
      lanuages_id: {
        required: true,
        minlength: 1
      },
      designation_id: {
        required: true,
        minlength: 1
      },
      class_id: {
        required: true,
        minlength: 1
      },
      bank_name: {
        required: true,
        minlength: 3,
        normalizer: function( value ) {
        return $.trim( value );
      }
      },
      branch_code: {
        required: true,
        minlength: 4,
        maxlength:4,
        normalizer: function( value ) {
        return $.trim( value );
      }
      },
      account_title: {
        required: true,
        minlength: 3,
        normalizer: function( value ) {
        return $.trim( value );
      }
      },
      account_no: {
        required: true,
        minlength: 16,
        maxlength:16,
        normalizer: function( value ) {
        return $.trim( value );
      }
      },
      salary: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "This field is required.",
        minlength: "Your name must be at least 3 characters long",
        number: "Invalid format"
      },
      gender_id: {
        required: "This field is required.",
      },
      nationality_id: {
        required: "This field is required.",
      },
      cnic: {
        required: "This field is required.",
        digits   : "Invalid format",
        minlength: "Your phone number should be must 13 characters",
        maxlength: "Your phone number should be must 13 characters"
      },
      date_of_birth: {
        required: "This field is required.",
      },
      tel_no: {
        required: "This field is required.",
        digits   : "Invalid format",
        minlength: "Your phone number should be must 11 characters",
        maxlength: "Your phone number should be must 11 characters"
      },
      address: {
        required: "This field is required.",
        minlength: "Your name must be at least 5 characters long",
      },
      marital_status_id: {
        required: "This field is required.",
      },
      guardian_name: {
        required: "This field is required.",
        minlength: "Your guardian name should be 4 characters long"
      },
      guardian_occupation: {
        required: "This field is required.",
        minlength: "Your name must be at least 5 characters long",
      },
      no_of_children: {
        required: "This field is required.",
        range: "your childrens not allowed after 10 admission",
      },
      lanuages_id: {
        required: "This field is required.",
      },
      designation_id: {
        required: "This field is required.",
      },
      class_id: {
        required: "This field is required.",
      },
      bank_name: {
        required: "This field is required.",
        minlength: "Your bank_name at least 3 characters long"
      },
      branch_code: {
        required: "This field is required.",
        minlength: "Your branch_code should be must 4 characters",
        maxlength: "Your branch_code should be must 4 characters"
      },
      account_title: {
        required: "This field is required.",
        minlength: "Your account title should be 4 characters long"
      },
      account_no: {
        required: "This field is required.",
        minlength: "Your account number should be must 16 characters",
        maxlength: "Your account number should be must 16 characters"
      },
      salary: {
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