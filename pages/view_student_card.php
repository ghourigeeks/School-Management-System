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
    $getDataById    = $obj->view_student($id);
if (!$getDataById) {
    header ("location:404.php");
  }
}else{
  header ("location:404.php");
}

$gender  = $obj->fetch_gender();

?>


<?php

if (($_SESSION['users']['role_id'] == 1) OR ($_SESSION['users']['role_id'] == 2)) {
  // Keep
}else{
  header("location:student.php?error=0");
}


?>

<style>
.head {
    background: #5e72e4;
    height: 40px;
    margin-top: 0px;
    border-radius: 0px;
    width: 100%;
    margin-left: 0px;
}
.head_heading {
    font-size: 14px;
    color: #fff;
    margin-left: 20px;
    margin-top: 11px;
    padding: 0px;
}
.top-head {
    background: #5e72e4;
    height: 40px;
    margin-top: 0px;
    border-radius: 0px;
    width: 100%;
    margin-left: 0px;
}
.id-card {
  flex-basis: 100%;
  border: 2px solid #0ae0df;
  max-width: 30em;
  margin: auto;
  color: #fff;
  padding: 1em;
  background-color: #0D2C36;
  box-shadow: 0px 0px 3px 1px #12a0a0, inset 0px 0px 3px 1px #12a0a0;
}
.desc p {
  font-size:15px;
}

.profile-row {
  display: flex;
}

.profile-row .dp {
  flex-basis: 33.3%;
  align-self: center;
  position: relative;
}

.profile-row .desc {
  flex-grow: 66.6%;
  padding: 1em;
  font-family: 'Orbitron', sans-serif;
  color: #a4f3f2;
  text-shadow: 0px 0px 4px #12a0a0;
  letter-spacing: 1px;
  margin-left:10px;
}

.profile-row .dp img {
  max-width: 100%;
  border-radius: 100%;
  display: block;
}


 
</style>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
   <?php include("sidebar.php") ?>
  <main class="main-content position-relative border-radius-lg ">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder text-white mb-0">Student card</h6>
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
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <form action="process.php" id="form" method="post">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                <div class="id-card-wrapper">
                    <div class="id-card">
                      <div class="profile-row">
                        <div class="dp">
                          <div class=dp-arc-outer></div>
                          <div class="dp-arc-inner"></div>
                          <img src="uploads/<?php echo $getDataById['std_pic'] ?>" alt="Image">
                        </div>
                        <div class="desc">
                          <p>Student id : <?php echo $getDataById['id']?></p>
                          <p>Student name : <?php echo ucfirst($getDataById['student_name'])?></p>
                          <p>Guardian name :  <?php echo ucfirst($getDataById['guardian_name'])?></p>
                          <p>Date of birth : <?php echo $getDataById['date_of_birth'] ?></p>
                          <p>Emerg number : <?php echo $getDataById['tel_no'] ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                <div style="margin-top:10px;" class="id-card-wrapper">
                    <div class="id-card">
                      <div class="profile-row">
                        <div class="desc">
                        <?php

include('phpqrcode/qrlib.php');

// how to save PNG codes to server

$tempDir = "qrcodes/";

$codeContents = ucfirst($getDataById['id']) . ucfirst($getDataById['student_name']) . ucfirst($getDataById['guardian_name']) . ucfirst($getDataById['date_of_birth']) .  ucfirst($getDataById['tel_no']) ;

// we need to generate filename somehow, 
// with md5 or with database ID used to obtains $codeContents...
$fileName = md5($codeContents);

$pngAbsoluteFilePath = $tempDir.$fileName;
$urlRelativeFilePath = $tempDir.$fileName;

// generating
if (!file_exists($pngAbsoluteFilePath)) {
    QRcode::png($codeContents, $pngAbsoluteFilePath);
}

// displaying
echo '<img style="width:50%; margin-left:22%; margin-bottom:20px;" src="'.$urlRelativeFilePath.'" />';

echo $pngAbsoluteFilePath;


?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                </div>
             </form>
            </div>
          </div>
        </section>                                 
     </div>
    </main>

<?php include("footer.php") ?>
</body>

</html>