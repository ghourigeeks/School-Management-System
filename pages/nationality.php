
<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>

<?php 
include("db.php"); 
$obj->is_logged_in();
if (isset($_GET['error']) && is_numeric($_GET['error']) && $_GET['error'] == 0) {
  echo "<script>alert('You are not allowed for these')</script>";
}
?>

<?php $nationality = $obj->fetch_nationality() ?>
<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>

<?php include ("sidebar.php") ?>

  <main class="main-content position-relative border-radius-lg ">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder text-white mb-0">Nationalities</h6>
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
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
            <a style="float:right;" href="add_nationality.php" class="btn btn-primary btn-sm btn-round ml-auto float-right"><i class="fa fa-plus"></i> Add new nationality </a>
              <h6>Nationalities table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th style="width:25%;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th style="width: 25%;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th style="width: 25%;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                      <th style="width: 15%;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($nationality as $key => $value) {
                  ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                          <div class="my-auto">
                          <span style="margin-left:7px;"  class="text-xs font-weight-bold"><?php echo ucfirst ($value['id'])?></span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold"><?php echo ucfirst ($value['name'])?></span>
                      </td>
                      <td>
                      <?php if ($value['active'] == 1) { ?>
                             <span style="margin:0px;padding: 8px 16px 8px 16px;" class="btn btn-success badge badge-secondary">Active</span>
                            <?php 
                             }else{?>
                               <span style="margin:0px;padding: 8px 14px 8px 14px;" class="btn btn-danger badge badge-secondary">Inctive</span>
                            <?php
                             }
                             ?>
                      </td>
                      <td>
                        <div class="form-button-action">
                            <a style="margin-bottom:0px;padding: 7px 9px 7px 9px;" href="view_nationality.php?id=<?php echo $value['id']?>" class="btn btn-primary btn-sm" value="view_user" data-original-title="view">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a style="margin-bottom:0px;padding: 7px 9px 7px 9px;" href="update_nationality.php?id=<?php echo $value['id']?>" class="btn btn-primary btn-sm" data-original-title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <input type="hidden" class="delete_id_btn" value="<?php echo $value['id']?>">
                            <?php if ($_SESSION['users']['role_id'] == 1 OR ($_SESSION['users']['role_id'] == 2)){?>
                            <a href="javascript:void(0)" style="margin-bottom:0px;padding: 7px 9px 7px 9px;"type="button" class="submit_btn btn btn-danger btn-sm">
							          <i class="fas fa-trash-alt"  aria-hidden="true"></i>
                            </a>
                            <?php
                            }
                          ?>
                        </div>
                    </td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <?php include ("footer.php") ?>



  <script>

$('.submit_btn').click(function(){

var deleteId = $(this).closest('tr').find('.delete_id_btn').val();
swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this data!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then((willDelete) => {
  if (willDelete) {
    $.ajax({
      type: "POST",
      url: "request.php",
      data: {
        fn                : "delete_nationality",
        "delete_nat_set"  : 1,
        "delete_id"       : deleteId,
      },
      success: function (response){
          var res = $.parseJSON(response);
        if(res.status == "error"){
            swal(res.msg , {
              icon:"error",
            })
        }else{
          swal(res.msg, {
            icon:"success",
          }).then((result)=>{
            location.reload();
          });

        }

       
      }
  });
}
});
});


</script>

</body>

</html>