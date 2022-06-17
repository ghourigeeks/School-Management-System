
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="profile.php">
        <img style="border-radius:25px;" src="uploads/<?php echo $_SESSION['users']['user_pic'] ?>" alt="Admin" class="navbar-brand-img h-100">
        <span style="margin-left: 8px;" class=" font-weight-bold"><?php if ($_SESSION['users'] == true) {
          echo $_SESSION['users']['fname']. "  " . $_SESSION['users']['lname'];
        } ?></span>
      </a>
    </div>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="index.php"){
            echo "active";
          } ?>" href="index.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="nav-icon fas fa-tachometer-alt text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="teacher.php"){
            echo "active";
          } ?>" href="teacher.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="nav-icon fas fa-user-graduate text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Teachers</span>
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="teacher_classes.php"){
            echo "active";
          } ?>" href="teacher_classes.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="nav-icon fas fa-chalkboard-teacher text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Teachers attendence</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="teacher_salary.php"){
            echo "active";
          } ?>" href="teacher_salary.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="fa fa-money-bill text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Teacher salary</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="student.php"){
            echo "active";
          } ?>" href="student.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="nav-icon fas fa-book-reader text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Students</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="student_fees.php"){
            echo "active";
          } ?>" href="student_fees.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="fa fa-money-bill text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Student fees</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="user.php"){
            echo "active";
          } ?>" href="user.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="fas fa-user text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">users</span>
          </a>
        </li>
          <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="class.php"){
            echo "active";
          } ?>" href="class.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="nav-icon fas fa-chalkboard-teacher text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Classes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="qualification.php"){
            echo "active";
          } ?>" href="qualification.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="fa fa-graduation-cap text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Qualifications</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="gender.php"){
            echo "active";
          } ?>" href="gender.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="fa fa-venus-double text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Genders</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="nationality.php"){
            echo "active";
          } ?>" href="nationality.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="fas fa-flag text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Nationalities</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="lanuages.php"){
            echo "active";
          } ?>" href="lanuages.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="fas fa-language text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Lanuages</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="religion.php"){
            echo "active";
          } ?>" href="religion.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="fa fa-kaaba text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Religions</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="subject.php"){
            echo "active";
          } ?>" href="subject.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="fas fa-book text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Subjects</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="designation.php"){
            echo "active";
          } ?>" href="designation.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="fa fa-tasks text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Designations</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="marital_status.php"){
            echo "active";
          } ?>" href="marital_status.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="fa fa-ring text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Marital statuses</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="roles.php"){
            echo "active";
          } ?>" href="roles.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="fa fa-lock text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Roles</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="time_slot.php"){
            echo "active";
          } ?>" href="time_slot.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="fa fa-clock text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Time slot</span>
          </a>
          </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="import_database.php"){
            echo "active";
          } ?>" href="import_database.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="fa fa-upload text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Import database</span>
          </a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="export_database.php"){
            echo "active";
          } ?>" href="export_database.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size:17px;" class="fas fa-file-export text-dark" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Export database</span>
          </a>
        </li>
      </ul>
    

  </aside>