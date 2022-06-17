<?php 


require ('db.php');

if (isset($_POST['submit_btn'])) {
switch ($_POST['submit_btn']) {
case 'add_teacher':
    $res = $obj->add_teacher($_POST);
    if ($res == 1)  {
        header("location:teacher.php");
    }else{
        header("location:add_teacher.php?msg=true");
    }
    break;

    case 'add_teacher_classes':
        $res = $obj->add_teacher_classes($_POST);
        if ($res == 1)  {
            header("location:teacher_classes.php");
        }else{
            header("location:add_teacher_classes.php");
        }
        break;

case 'update_teacher':
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $res = $obj->update_teacher($id, $_POST);

    if ($res == 1)  {
        header("location:teacher.php");
    }else{
        header("location:update_teacher.php");
    }
}
    break;


    case 'update_teacher_classes':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $res = $obj->update_teacher_classes($id, $_POST);
        if ($res)  {
            header("location:teacher_classes.php");
        }else{
            header("location:update_teacher_classes.php");
        }
    }
        break;

    case 'add_tchr_salary':
        $res = $obj->add_tchr_salary($_POST);
        if ($res == 1) {
            header("location:teacher_salary.php");
        }else{
            header("location:add_teacher_salary.php");
        }
break;



case 'update_tchr_salary':
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $res = $obj->update_teacher_salary($id, $_POST);
     
    if ($res == 1)  {
        header("location:teacher_salary.php");
    }else{
        header("location:update_teacher_salary.php");
    }
}
break;

    case 'add_student':
        $res = $obj->add_student($_POST);
        if ($res == 1)  {
            header("location:student.php");
        }else{
            header("location:add_student.php?msg=true");
        }
        break;

    case 'update_student':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $res = $obj->update_student($id, $_POST);
            // $obj->debug($_POST);
         
        if ($res == 1)  {
            header("location:student.php");
        }else{
            header("location:update_student.php");
        }
    }
    break;

        case 'add_std_fees':
            $res = $obj->add_std_fees($_POST);
            if ($res == 1) {
                header("location:student_fees.php");
            }else{
                header("location:add_student_fees.php");
            }
    break;

    case 'update_std_fees':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $res = $obj->update_student_fees($id, $_POST);
         
        if ($res == 1)  {
            header("location:student_fees.php");
        }else{
            header("location:update_student_fees.php");
        }
    }
    break;

    case 'add_class':
        $res = $obj->add_class($_POST);
        if ($res == 1)  {
            header("location:class.php");
        }else{
            header("location:add_class.php?msg=true");
        }
        break;

        case 'update_class':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $res = $obj->update_class($id, $_POST);

            if ($res == 1)  {
                header("location:class.php");
            }else{
                header("location:update_class.php?msg=true");
            }
        }
            break;
    case 'add_qualification':
        $res = $obj->add_qualification($_POST);
        if ($res == 1)  {
            header("location:qualification.php");
        }else{
            header("location:add_qualification.php?msg=true");
        }
        break;

        case 'update_qualification':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $res = $obj->update_qualification($id, $_POST);

            if ($res == 1)  {
                header("location:qualification.php");
            }else{
                header("location:update_qualification.php");
            }
        }
            break;


        case 'add_gender':
            $res = $obj->add_gender($_POST);
            if ($res == 1)  {
                header("location:gender.php");
            }else{
                header("location:add_gender.php?msg=true");
            }
            break;

            case 'update_gender':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $res = $obj->update_gender($id, $_POST);
    
                if ($res == 1)  {
                    header("location:gender.php");
                }else{
                    header("location:update_gender.php");
                }
            }
                break;


        case 'add_nationality':
            $res = $obj->add_nationality($_POST);
            if ($res == 1)  {
                header("location:nationality.php");
            }else{
                header("location:add_nationality.php?msg=true");
            }
            break;

            case 'update_nationality':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $res = $obj->update_nationality($id, $_POST);
    
                if ($res == 1)  {
                    header("location:nationality.php");
                }else{
                    header("location:update_nationality.php");
                }
            }
                break;


        case 'add_lanuages':
            $res = $obj->add_lanuages($_POST);
            if ($res == 1)  {
                header("location:lanuages.php");
            }else{
                header("location:add_lanuages.php?msg=true");
            }
            break;

            case 'update_lanuages':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $res = $obj->update_lanuages($id, $_POST);
    
                if ($res == 1)  {
                    header("location:lanuages.php");
                }else{
                    header("location:update_lanuages.php");
                }
            }
                break;


        case 'add_religion':
            $res = $obj->add_religion($_POST);
            if ($res == 1)  {
                header("location:religion.php");
            }else{
                header("location:add_religion.php?msg=true");
            }
            break;

            case 'update_religion':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $res = $obj->update_religion($id, $_POST);
    
                if ($res == 1)  {
                    header("location:religion.php");
                }else{
                    header("location:update_religion.php");
                }
            }
                break;


        case 'add_subject':
            $res = $obj->add_subject($_POST);
            if ($res == 1)  {
                header("location:subject.php");
            }else{
                header("location:add_subject.php?msg=true");
            }
            break;

    case 'update_subject':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $res = $obj->update_subject($id, $_POST);

        if ($res == 1)  {
            header("location:subject.php");
        }else{
            header("location:update_subject.php");
        }
    }
        break;


    case 'add_designation':
        $res = $obj->add_designation($_POST);
        if ($res == 1)  {
            header("location:designation.php");
        }else{
            header("location:add_designation.php?msg=true");
        }
        break;

        case 'update_designation':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $res = $obj->update_designation($id, $_POST);

            if ($res == 1)  {
                header("location:designation.php");
            }else{
                header("location:update_designation.php");
            }
        }
            break;


    case 'add_marital_status':
        $res = $obj->add_marital_status($_POST);
        if ($res == 1)  {
            header("location:marital_status.php");
        }else{
            header("location:add_marital_status.php?msg=true");
        }
        break;

        case 'update_marital_status':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $res = $obj->update_marital_status($id, $_POST);

            if ($res == 1)  {
                header("location:marital_status.php");
            }else{
                header("location:update_marital_status.php");
            }
        }
            break;


case 'add_role':
    $res = $obj->add_role($_POST);
    if ($res == 1)  {
        header("location:roles.php");
    }else{
        header("location:add_role.php?msg=true");
    }
    break;

    case 'update_role':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $res = $obj->update_role($id, $_POST);

        if ($res == 1)  {
            header("location:roles.php");
        }else{
            header("location:update_role.php");
        }
    }
        break;

        case 'add_user':
              
            $res = $obj->add_user($_POST);
            
            if ($res)  {
                header("location:user.php");
            }else{
                header("location:add_user.php?msg=true");
            }
            break;

    case 'update_user':
      
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $res = $obj->update_user($id, $_POST);

        if ($res == 1)  {

            header("location:user.php");
        }else{
            header("location:user.php");
        }
    }
        break;

        // case 'update_user_img':
        //     $res = $obj->update_img($_POST);
        //     if ($res == 1)  {
        //         header("location:profile.php?msg=1");
        //     }else{
        //         header("location:profile.php?msg=0");
        //     }
        //     break;



        case 'add_time_slot':
            $res = $obj->add_time_slot($_POST);
            if ($res == 1)  {
                header("location:time_slot.php");
            }else{
                header("location:add_time_slot.php");
            }
            break;

            case 'update_time_slot':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $res = $obj->update_time_Slot($id, $_POST);
        
                if ($res == 1)  {
                    header("location:time_slot.php");
                }else{
                    header("location:update_time_slot.php");
                }
            }
                break;

default:
    echo "Something went wrong";
    break;
} 
}



?>