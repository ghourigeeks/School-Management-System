<?php 


include('db.php');
$obj->is_logged_in();


?>


<!DOCTYPE html>
<html lang="en">

<?php include("head.php");?>


<?php 
$student = $obj->fetch_students();
if(isset($_GET['id'])){
	$id = $_GET['id'];
    $std_fees    = $obj->view_student_fees($id);
if (!$std_fees) {
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
  header("location:student_fees.php?error=0");
}


?>


<style>
    @page{
            width:3508px;
            height: 2480px;
    }
    @media print
    {    
        .no-print, .no-print *
        {
            display: none !important;
        }
       
       
        th{
            font-size: 20px;
        }
    }
table.border.inner_table {
    width: 100%;
}    
    
.bank_content h4 {
    font-size: 10px;
    text-transform: uppercase;
    font-weight: 900;
    margin: 8px 0 0 10px;
}
.bank_content {
    width: 100%;
    display: flex;
    align-items: center;
    padding: 10px;
}    
.bank_content img{
    width: 100px;
}   

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}    
</style>
<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>

<?php include ("sidebar.php") ?>

  <main class="main-content position-relative border-radius-lg ">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder text-white mb-0">Student challan</h6>
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
                        <a style="float:right;padding: 9px 16px 9px 16px;" href="student_fees.php" class="btn btn-primary btn-sm btn-round ml-auto float-right" ><i class="fa fa-chevron-left"></i></a>
                        <button style="padding: 9px 14px 9px 14px;" class="btn btn-success btn-sm btn-round ml-auto "  onclick="printDiv('main')";><i class="fa fa-print"></i></button>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                        <div style="margin-top:-20px;" class="card-body" id="main">
                        <!-- <table class="border inner_table" > -->
                        <div class="table-responsive">
				                            <tbody>
				                              	<tr>
                                          <td  style="width: 25%;">
                                                  <table class="table table-border">
                                                      <tr>
                                                          <td colspan="2">
                                                              <div class="d-flex align-items-center">
                                                                  <div class="bank_content">
                                                                      <img src="../assets/img/beaconhouse-school.png" width="50px">
                                                                      <h4>beaconhouse school system</h4>
                                                                  </div>
                                                              </div>
                                                          </td>
                                                      </tr>
                                                                <tr>
                                                                    <th>Challan No.</th>
                                                                    <td  style="border:solid 1px;width:50%;">
                                                                    <?php echo $std_fees['id']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Student name</th>
                                                                    <td  style="border:solid 1px">
                                                                    <?php foreach ($student as $key => $value) { ?>
                                                                    <?php if($value['id'] == $std_fees['std_id']){?>
                                                                    <?php echo ucwords($value['student_name'])?> 
                                                                    <?php }else{ ?>
                                                                    <?php }?>
                                                                    <?php }?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Month of</th>
                                                                    <td  style="border:solid 1px">
                                                                    <?php echo date("M"); ?></td>
                                                                </tr>
                                                                <tr>
                                                                <th>Perpose of deposit</th>
                                                                    <td  style="border:solid 1px">
                                                                    Amount</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Month fees</th>
                                                                    <td  style="border:solid 1px">
                                                                    <?php echo $std_fees['fees']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Total fees</th>
                                                                    <td  style="border:solid 1px">
                                                                    <?php echo $std_fees['fees']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Due date.</th>
                                                                    <td  style="border:solid 1px">
                                                                    <?php echo date('10 / M / Y'); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Notice</th>
                                                                    <td style="border:solid 1px">
                                                                    A. Until 10th after due date will be charges Rs.200/-</td>
                                                                </tr>
                                                            </table>
					                              	    </td>
				                              	    </tr>
				                          	</tbody>	
                                        <!-- </table>							 -->
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


<script>
		function printDiv(divName){
            // var div = document.getElementById('btns');
            //     div.remove();
            // $(".btns").remove();
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
          
            // console.log( printContents.children(".btns")) ;
            // console.log(printContents)
			document.body.innerHTML = printContents;
            
			window.print();
            // $(".btns").append();
			document.body.innerHTML = originalContents;

		}
    </script>



</body>

</html>