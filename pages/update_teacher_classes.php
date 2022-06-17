
<!DOCTYPE html>
<html lang="en">

<?php include("head.php");?>

<?php 
include("db.php"); 
$obj->is_logged_in();
?>

<?php
$teacher = $obj->fetch_teachers();
$subject = $obj->subject();
$class   = $obj->fetch_class();
$enter_time    = $obj->enter_time();
$end_time    = $obj->end_time();
if(isset($_GET['id'])){
	$id = $_GET['id'];
    $tchr_class = $obj->view_teacher_classes($id);
    if (!$tchr_class) {
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
  header("location:teacher_classes.php?error=0");
}


?>


<style>
.header {
    margin-top: 25px;
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
          <h6 class="font-weight-bolder text-white mb-0">Teacher attendence</h6>
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
            <a style="float:right;padding: 9px 16px 9px 16px;" href="teacher_classes.php" class="btn btn-primary btn-sm btn-round ml-auto float-right"><i class="fa fa-chevron-left"></i></a>
              <h6>Update teacher attendence</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div  class="card-body">
              <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                        <label for="teacher_id">Teachers <span style="color:red">*</span></label>
                            <select class="form-control" name="teacher_id" id="teacher_id" aria-label=".form-select-lg example">
                            <option selected disabled value="">Please Select</option>
                            <?php foreach ($teacher as $key => $value) { ?>  
                            <?php if ($value['id'] == $tchr_class['teacher_id']){?>
                            <option selected value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?></option>
                            <?php }else{ ?> <option value="<?php echo $value['id']?>">
                            <?php echo ucwords($value['name'])?> </option> <?php }?>
                            <?php }?>
                            </select>
                      </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                        <label for="subject_id">Subjects <span style="color:red">*</span></label>
                            <select class="form-control" name="subject_id" id="subject_id" aria-label=".form-select-lg example">
                            <option selected disabled value="">Please Select</option>
                            <?php foreach ($subject as $key => $value) { ?>  
                            <?php if ($value['id'] == $tchr_class['subject_id']){?>
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
                        <label for="time_slot_id">Enter time <span style="color:red">*</span></label>
                            <select class="form-control" name="time_slot_id" id="time_slot_id" aria-label=".form-select-lg example">
                            <option selected disabled value="">Please Select</option>
                            <?php foreach ($enter_time as $key => $value) { ?>  
                            <?php if ($value['id'] == $tchr_class['time_slot_id']){?>
                            <option selected value="<?php echo $value['id']?>"><?php echo ucwords($value['start_time'])?></option>
                            <?php }else{ ?> <option value="<?php echo $value['id']?>">
                            <?php echo ucwords($value['start_time'])?> </option> <?php }?>
                            <?php }?>
                            </select>
                      </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                        <label for="time_slot_id">Exit time <span style="color:red">*</span></label>
                            <select class="form-control" name="time_slot_id" id="time_slot_id" aria-label=".form-select-lg example">
                            <option selected disabled value="">Please Select</option>
                            <?php foreach ($end_time as $key => $value) { ?>  
                            <?php if ($value['id'] == $tchr_class['time_slot_id']){?>
                            <option selected value="<?php echo $value['id']?>"><?php echo ucwords($value['end_time'])?></option>
                            <?php }else{ ?> <option value="<?php echo $value['id']?>">
                            <?php echo ucwords($value['end_time'])?> </option> <?php }?>
                            <?php }?>
                            </select>
                      </div>
                  </div>
                  <div class="form-group">
                        <label for="class_id">Classes <span style="color:red">*</span></label>
                            <select class="form-control" name="class_id" id="class_id" aria-label=".form-select-lg example">
                            <option selected disabled value="">Please Select</option>
                            <?php foreach ($class as $key => $value) { ?>  
                            <?php if ($value['id'] == $tchr_class['class_id']){?>
                            <option selected value="<?php echo $value['id']?>"><?php echo ucwords($value['name'])?></option>
                            <?php }else{ ?> <option value="<?php echo $value['id']?>">
                            <?php echo ucwords($value['name'])?> </option> <?php }?>
                            <?php }?>
                            </select>
                      </div>
                          <div class="form-group">
                    <label for="active">Status <span style="color:red">*</span></label>
                    <select class="form-control" name="active" id="active" aria-label=".form-select-lg example">
                    <option selected disabled value="">Please Select</option>
                        <?php if($tchr_class['active'] == 1){?>
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                        <?php }?>
                        <?php if($tchr_class['active'] == 0){?>
                        <option value="1">Active</option>
                        <option value="0" selected>Inactive</option>
                        <?php }?>
                        </select>												
                    </div>
               </div>
              </div>
              <div style="margin-top: -30px;" class="card-footer">
              <button type="submit" name="submit_btn" value="update_teacher_classes" class="btn btn-success">Submit</button>
                <a href="teacher_classes.php"type="submit" class="btn btn-danger">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <?php include("navbar_scroller.php") ?>
  <?php include ("footer.php") ?>

  <script>
        function add_row(){
        $('#qual_table tr:last').after('<tr>' +
                                        '<td style="padding:0px; width:25%;">' +
                                          '<select class="form-control" name="teacher_id[]" required>'+
                                            '<option value="" selected disabled>Please select</option>' +  
                                              <?php foreach ($teacher as $key => $value) {?> 
                                              '<option value=<?php echo $value["id"] ?>>  <?php echo $value["name"] ?> ' +
                                              '</option>'+ <?php } ?> 
                                          '</select>' +
                                        '</td>' +
                                        '<td style="padding-top:0px; width:25%;">' +
                                          '<select class="form-control" name="subject_id[]" required>'+
                                            '<option value="" selected disabled>Please select</option>' +  
                                              <?php foreach ($subject as $key => $value) {?> 
                                              '<option value=<?php echo $value["id"] ?>>  <?php echo $value["name"] ?> ' +
                                              '</option>'+ <?php } ?> 
                                          '</select>' +
                                        '</td>' +
                                        '<td style="padding-top:0px; width:25%;">' +
                                          '<select class="form-control" name="class_id[]" required>'+
                                            '<option value="" selected disabled>Please select</option>' +  
                                              <?php foreach ($class as $key => $value) {?> 
                                              '<option value=<?php echo $value["id"] ?>>  <?php echo $value["name"] ?> ' +
                                              '</option>'+ <?php } ?> 
                                          '</select>' +
                                        '</td>' +
                                        '<td style="padding-top:0px; width:25%;">' +
                                          '<select class="form-control" name="time_slot_id[]" required>'+
                                            '<option value="" selected disabled>Please select</option>' +  
                                              <?php foreach ($timeslot as $key => $value) {?> 
                                              '<option value=<?php echo $value["id"] ?>>  <?php echo $value["start_time"] . " - " . $value['end_time'] ?> ' +
                                              '</option>'+ <?php } ?> 
                                          '</select>' +
                                        '</td>' +
                                        '<td style="padding-top:0px;"><a style="padding: 7px 17px 7px 17px;" href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="delete_row(this)"> - </a></td>' +
                                      '</tr>');
        }
        function delete_row(btn){
          $(btn).closest("tr").remove();
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