
<?php
 
 session_start();
  
 // To check if session is started.
 if(isset($_SESSION["users"])){
	header("location:index.php");
 }
 
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Argon Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.0" rel="stylesheet" />

  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
</head>

<style type="text/css">
	.cus_error{
		color:red;
		font-style: italic;
		font-size: 13px;"
	}
	label{
		font-size:13px;
	}
</style>

<body>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 style="text-align:center" class="font-weight-bolder">Recover code</h4>
                </div>
                <div class="card-body">
                  <form id="form" role="form">
                <div class="form-group">
                    <label for="code">Enter 6 digit code <span class="text-danger"> * </span></label>
                    <input type="code" name="temp_code" id="temp_code" class="form-control" placeholder="code">
                    <span id="code-error" class="cus_error"></span>
                </div>
                <div class="form-group">
                    <label for="password">Password<span class="text-danger"> * </span></label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <span id="password-error" class="cus_error"></span>
                </div>
                    <div class="text-center">
                      <a href="javascript:void(0)" name="submit_btn" id="submit_btn" type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Recover password</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://images.alphacoders.com/700/thumb-1920-700442.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
                <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include("footer.php") ?>


  <script type="text/javascript">
		$(document).ready(function (){
			function cus_message( title,mes, icon, typee){
				var content = {};
				content.message = mes;
				content.title = title;
				content.icon = icon

				$.notify(content,{
					type: typee,
					placement: {
						from: "top",
						align: "right"
					},

					time: 1000,
					delay: 1000,
				});
			}
			// validate the field in which you are typing using input ID
			function cus_validate(id){
				var len = ( ($.trim($('#'+id).val()).length));

				if( len <= 0){
					$('#'+id).css('border','1px solid red');
					$('#'+id).focus();
					$('#'+id+'-error').text("Please fill this field");
					return false;

				}else{
					$('#'+id).css('border','1px solid grey');
					$('#'+id+'-error').text("");
					return true;

				}
			}

			// getting Id of input field in which you are typing
			$("input").focusout(function(){
				 var id = $(this).attr('id');
				 return cus_validate(id);	
			});

			// validate all the fields in the forms
			function validate_all_fields(){

				if( (cus_validate("temp_code")) ){
					 	return true;
					}else{
						return false;
					}
				
			}


			$('#submit_btn').click(function (){
				// call validate_all_fields functions before submit.
				// console.log("click");
				

				var res =  validate_all_fields();
				if(res){
				
						// alert("Wow, You have entered all fields");

						$.ajax({
							type: "POST",
							url: "request.php",
							data:{
							  	// data: $('#form').serialize(),
                                  temp_code:$('#temp_code').val(),
                                  password:$('#password').val(),
								fn  :'recover_code'
							},
							success: function (result){

								var res = $.parseJSON(result);

								if(res.status == "success"){
									toastr.success(res.msg)
									window.location.href = "login.php";
								}else{
									toastr.error(res.msg)
									$('#temp_code').focus();
									$('#temp_code').css('border','0px solid red');
								
								}
							}
						});
					}
			  })
		})
	</script>






</body>

</html>