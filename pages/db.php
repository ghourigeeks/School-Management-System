<?php
session_start();
// Class for database works
class Database
{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "school_managment_system";

    public $conn = "";
    public $mysqli = "";

    function __construct()
    {
        $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name) or die("Connection failed");
    }
		
        		// CREATING SESSION
		public function set_session($data){
			$_SESSION['users'] = $data;
		}

		// session is user login
		public function is_logged_in(){
			if((!isset($_SESSION['users']))){
				header("location:login.php");
			}
		}

		// session for logout
		public function logout(){
			session_unset();
			session_destroy();

			header("location:login.php");
		}

		public function unserializeForm($str) {
			$returndata 	= array();
			$strArray 		= explode("&", $str);
			$i 				= 0;
	
			foreach ($strArray as $item) {
				$array 		= explode("=", $item);
				$returndata[$array[0]] = $array[1];
			}
			return $returndata;
		}
	
	
		function is_exist($table, $col, $data){
			$query     = "SELECT * FROM `$table` where `$col` = '$data' ";
		  
			$res    = $this->conn->query($query);
			// $this->debug($res->num_rows);
	  
			if (($res->num_rows) >0) {
			  return true; // data exist kart ha
			}else{
			  return false; // data exist kart ha
			}
		  }

		// session for login 
		public function login($data){	

			
			extract($data);
			$password = md5($password);
			// $password  = md5($password);
		$query = "SELECT * FROM `users` WHERE `username`= '$username' and `password` = '$password' and `active` = 1 ";
		$res   = $this->conn->query($query);
		
		if ($res->num_rows>0) {	

			$record = $res->fetch_assoc();
			// $this->debug($record['id']);
			if (isset($record['username'])) {	
				$this->set_session($record);
				echo json_encode(array("status"=>"success",'msg'=>"Login successfully"));
				return true;
			}
			 
		}else{
			echo json_encode(array("status"=>"failed",'msg'=>"Invalid credentials"));
			return false;
		}			
	}


    public function recover_pass($data){
        extract($data);
        $query = "SELECT * FROM `users` WHERE `email` = '$email'";
        $res = $this->conn->query($query);
        if ($res->num_rows>0) {
            $temp_pass = rand(123450,678901);
            $query = "UPDATE `users` SET `temp_code` = '$temp_pass' WHERE `email` = '$email'";
            $res = $this->conn->query($query);
            if ($res) {
                $query  = "SELECT `temp_code` FROM `users` WHERE `email` = '$email'";
                $res    = $this->conn->query($query);
                if ($res->num_rows>0) {
                    $record = $res->fetch_assoc();
                    $final_code = $record['temp_code'];

                  ini_set("SMTP", "smtp.gmail.com");
                  ini_set("sendmail_from", "pms@outlook.com");
                  ini_set("smtp_port", "587");
                  ini_set("auth_username", "pms@outlook.com");
                  ini_set("auth_password", "************");


                  $to      = "$email";
                  $subject = "Account recovery";
                 
                  $message  = "<b>Project management system</b>";
                  $message .= "<h3>"."Enter this recovery code to recover your account " . "<b>". $final_code ."</b>" ." </h3>";
                 
                  $header = "from:pms@outlook.com \r\n";
                 
                  $header .= "MIME-Version: 1.0\r\n";
                  $header .= "Content-type: text/html\r\n";
                 
                  $retval = mail($to,$subject,$message,$header);
				  echo json_encode(array("status"=>"success",'msg'=>""));
                return $res;
            }else{
				echo json_encode(array("status"=>"failed",'msg'=>"Invalid email"));
                return false;
            }
        }
    }else{
		echo json_encode(array("status"=>"failed",'msg'=>"Invalid email"));
        return false;
    }
}

       public function recover_code($data){
           extract($data);
		   $query = "SELECT * FROM `users` WHERE `temp_code` = '$temp_code'";
		   $res   = $this->conn->query($query);
		   
		   $password = md5($password);
		   if ($res->num_rows>0) {	
			$query = "UPDATE `users` SET `password` = '$password' WHERE `temp_code` = '$temp_code'";
			$res   = $this->conn->query($query);
			if ($res) {	
				$query = "UPDATE `users` SET `temp_code` = NULL WHERE `temp_code` = '$temp_code'";
				$res   = $this->conn->query($query);
				echo json_encode(array("status"=>"success",'msg'=>""));
				return true;
			}	
		}else{
			echo json_encode(array("status"=>"failed",'msg'=>"Invalid otp"));
		}
	}	
 
		

		// count total teacher
		public function count_users(){
			$query  = "SELECT count(*) as `total` FROM `users` ";
			$res 	= $this->conn->query($query);
			return ($res->fetch_assoc());
	   }

	   	// fetch teacher into table
		public function fetch_teachers(){
			$query = "SELECT 	`teachers`.`id`,
								`teachers`.`active`,
								`teachers`.`tel_no`,
								`teachers`.`gender_id`,
								`genders`.`name` 	AS `genders`,
								CASE
								WHEN `teachers`.`gender_id` = 1 THEN CONCAT('Mr.',' ',`teachers`.`name`)
								WHEN `teachers`.`gender_id` = 2 THEN CONCAT('Mrs.',' ',`teachers`.`name`)
								ELSE 'Other'
								END AS `name`
								FROM `teachers`
								LEFT JOIN `genders` 	ON `genders`.`id` = `teachers`.`gender_id`";
			$res   = $this->conn->query($query);
			$i = 0;
			$data = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$data[$i][$key] = $value;
				}
			$i++;
			}
		return $data;
	}


	public function fetch_qual_rows($id){
    	$query = "SELECT * FROM `teacher_education` WHERE `teacher_id` = $id";
    	$res = $this->conn->query($query);
    	return $res->num_rows;
    }


	public function fetch_tchr_class_rows($id){
    	$query = "SELECT * FROM `teacher_classes` WHERE `teacher_id` = $id";
    	$res = $this->conn->query($query);
		if ($res->num_rows>0) {
			return $res->num_rows;
		}
    }


	public function fetch_exp_rows($id){
    	$query = "SELECT * FROM `teacher_experience` WHERE `teacher_id` = $id";
    	$res = $this->conn->query($query);
    	return $res->num_rows;
    }






	public function add_teacher($data){
		extract($data);

		$tchr_pic = null;
        
        $target_dir2 = "uploads/";
        $target_file2 = $target_dir2 . basename($_FILES["tchr_pic"]["name"]);
        $uploadOk2 = 1;
        $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        // if(isset($_POST["submit"])) {
          $check2 = getimagesize($_FILES["tchr_pic"]["tmp_name"]);
          if($check2 !== false) {
            echo "File is an image - " . $check2["mime"] . ".";
            $uploadOk2 = 1;
          } else {
            echo "File is not an image.";
            $uploadOk2 = 0;
          }
        // }

        // Check if file already exists
        // if (file_exists($target_file)) {
        //   echo "Sorry, file already exists.";
        //   $uploadOk = 0;
        // }

        // Check file size
        if ($_FILES["tchr_pic"]["size"] > 200000) {
          echo "Sorry, your file is too large.";
          $uploadOk2 = 0;
        }

        // Allow certain file formats
        if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
        && $imageFileType2 != "gif" ) {
          echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
          $uploadOk2 = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk2 == 0) {

          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["tchr_pic"]["tmp_name"], $target_file2)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["tchr_pic"]["name"])). " has been uploaded.";
            $tchr_pic = $_FILES["tchr_pic"]["name"];
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }

		
		
			$query     = "SELECT * FROM `teachers` where `tel_no` = '$tel_no' and `email` = '$email'";
			$res    = $this->conn->query($query);
			if (($res->num_rows) >0) {
				return false;
		}else{
			$query = "INSERT INTO `teachers`(
				`name`, 
				`gender_id`, 
				`nationaility_id`, 
				`cnic`, 
				`date_of_birth`, 
				`tel_no`,
				`address`, 
				`marital_status_id`, 
				`guardian_name`,
				`guardian_occupation`, 
				`no_of_children`,
				`lanuages_id`,
				`designation_id`,
				`class_id`,
				`tchr_pic`,
				`email`,
				`salary`)
	VALUES (
				trim('$name'),
				'$gender_id',
				'$nationality_id',
				trim('$cnic'),
				'$date_of_birth',
				trim('$tel_no'),
				trim('$address'),
				'$marital_status_id',
				trim('$guardian_name'),
				trim('$guardian_occupation'),
				'$no_of_children',
				'$lanuages_id',
				'$designation_id',
				'$class_id',
				'$tchr_pic',
				'$email',
				trim('$salary')
			)";

			// $this->debug($query);

		$res   = $this->conn->query($query);
		$query = "SELECT * FROM `teachers` where `name` = '$name' ";
		$query = "SELECT MAX(id) as `id`  from `teachers`" ;
		$res   = $this->conn->query($query);

		if ($res->num_rows>0) {
			$record = $res->fetch_assoc();
			if(isset( $record['id'] )){
				$teacher_id = $record['id'];
				$this->add_education($teacher_id,$data);
				$this->add_experience($teacher_id,$data);
				$this->add_account_detail($teacher_id,$data);
			}		
		}
		}
		return $res;
	}


	public function view_student_fees($id){
		$query = "SELECT * FROM `std_fees` WHERE `id` = '$id'";
		$res = $this->conn->query($query);
		if ($res->num_rows>0) {
			$record = $res->fetch_assoc();
			return $record;
		}
	}


	public function view_teacher_salary($id){
		$query = "SELECT * FROM `tchr_salary` WHERE `id` = '$id'";
		$res = $this->conn->query($query);
		if ($res->num_rows>0) {
			$record = $res->fetch_assoc();
			return $record;
		}
	}

	public function add_teacher_classes($data){
		extract($data);
			$query = "INSERT INTO `teacher_classes`(`teacher_id`,`subject_id`,`class_id`,`time_slot_id`) 
			VALUES ('$teacher_id','$subject_id','$class_id','$time_slot_id')";
			$res   = $this->conn->query($query);
	       return $res;
}

		   
	public function add_education($teacher_id,$data){
			extract($data);
			foreach ($qualification_id as $key => $value) {
				$query = "INSERT INTO `teacher_education`(`teacher_id`,`qualification_id`, `institution`, `subject_id`, `grade_div`) 
				VALUES ('$teacher_id','$value',trim('$institution[$key]'),'$subject_id[$key]',trim('$grade_div[$key]'))";
				$res   = $this->conn->query($query);
		}
		return $res;
	}

	public function add_experience($teacher_id,$data){
			extract($data);
			foreach ($experience_title as $key => $value) {
				$query = "INSERT INTO `teacher_experience`(`teacher_id`,`experience_title`, `year`, `salary_drawn`,`prev_job`)
				VALUES ('$teacher_id',trim('$value'),'$year[$key]','$salary_drawn[$key]',trim('$prev_job[$key]'))";
			     $res   = $this->conn->query($query);
			}
			return $res;
		}

		public function add_account_detail($teacher_id,$data){
			extract($data);
			
				$query     = "SELECT * FROM `classes` where `account_no` = '$account_no' ";
				$res    = $this->conn->query($query);
				if (($res->num_rows) >0) {
					return false;
			}else{
				$query = "INSERT INTO `teacher_account`(`teacher_id`,`bank_name`, `branch_code`, `account_title`,`account_no`) 
				VALUES ('$teacher_id',trim('$bank_name'),'$branch_code',trim('$account_title'),'$account_no')";
				$res   = $this->conn->query($query);
			}
			return $res;
		}



				// add class into table

		// view student into table
		public function view_teacher($id){
			$query = "SELECT `teachers`.`id`,
			`teachers`.`name` AS `name`,
			`genders`.`name`  AS `gender_id`, 
			`nationalities`.`name` AS `nationaility_id`,
			`teachers`.`cnic`,
			`teachers`.`date_of_birth`,
			`teachers`.`tel_no`,
			`teachers`.`address`,
			`teachers`.`salary`,
			`marital_statuses`.`name` AS `marital_status_id`,
			`teachers`.`guardian_name`,
			`teachers`.`guardian_occupation`,
			`teachers`.`no_of_children`,
			`lanuages`.`name` AS `lanuages_id`,
			`designations`.`name` AS `designation_id`,
			`classes`.`name` AS `class_id`,
			`teachers`.`tchr_pic`,
			`teachers`.`email`,
			`teachers`.`active`,
			`teacher_account`.`bank_name`,
			`teacher_account`.`branch_code`,
			`teacher_account`.`account_title`,
			`teacher_account`.`account_no`
			FROM `teachers`
			LEFT JOIN `teacher_account`          ON `teacher_account` .`teacher_id`         = `teachers`.`id`
			LEFT JOIN `genders`                  ON `genders`.`id`                          = `teachers`.`gender_id`
			LEFT JOIN `nationalities`            ON `nationalities`.`id`                    = `teachers`.`nationaility_id`
			LEFT JOIN `marital_statuses`         ON `marital_statuses`.`id`                 = `teachers`.`marital_status_id`
			LEFT JOIN `lanuages`                 ON `lanuages`.`id`                         = `teachers`.`lanuages_id`
			LEFT JOIN `designations`             ON `designations`.`id`                     = `teachers`.`designation_id`
			LEFT JOIN `classes`                  ON `classes`.`id`                          = `teachers`.`class_id`
			WHERE `teachers`.`id` = $id";
			$res = $this->conn->query($query);
			if ($res->num_rows>0) {
				$record = $res->fetch_assoc();
				return $record;
			}
		}

		public function view_teacher_classes($id){
			$query = "SELECT * FROM `teacher_classes` WHERE `id` = '$id'";
			$res = $this->conn->query($query);
			if ($res->num_rows>0) {
				$record = $res->fetch_assoc();
				return $record;
			}
		}

		public function update_view_teacher_classes($id){
			$query = "SELECT `teacher_classes`.`id`,
			`teachers`.  `name` AS `teacher_id`,
			`subjects`.  `name` AS `subject_id`,
			`classes`.   `name` AS `class_id`,
			`time_slot`. `start_time` AS `time_slot_id`,
			`time_slot`. `end_time` AS `time_slot_id`
			FROM `teacher_classes`
			LEFT JOIN `teachers`       ON `teachers`.`id`       = `teacher_classes`.`teacher_id`
			LEFT JOIN `subjects`       ON `subjects`.`id`       = `teacher_classes`.`subject_id`
			LEFT JOIN `classes`        ON `classes`.`id`        = `teacher_classes`.`class_id`
			LEFT JOIN `time_slot`      ON `time_slot`.`id`      = `teacher_classes`.`time_slot_id`
			WHERE `teacher_classes`.`teacher_id` = $id";
			$res = $this->conn->query($query);
			$i = 0;
			$data = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$data[$i][$key] = $value;
				}
			$i++;
			}
		return $data;
		}

		public function view_education($id){
			$query = "SELECT `teacher_education`.`id`,
			`qualifications`.`name` AS `qualification_id`,
			`teacher_education`.`institution`,
			`subjects`.`name` AS `subject_id`,
			`teacher_education`.`grade_div`
			FROM `teacher_education`
			LEFT JOIN `qualifications`       ON `qualifications`.`id`             = `teacher_education`.`qualification_id`
			LEFT JOIN `subjects`              ON `subjects`.`id`                  = `teacher_education`.`subject_id`
			WHERE `teacher_id` = $id";
	  	$res = $this->conn->query($query);
	  	$i = 0;
      	$data = array();

    while ($rows = $res->fetch_assoc()) {
        foreach ($rows as $key => $value) {
          $data[$i][$key] = $value;
        }
        $i++;
      }
      	return $data;
	}

	public function view_experience($id){
		$query = "SELECT * FROM `teacher_experience` WHERE `teacher_id` = $id";
		$res = $this->conn->query($query);
		$i = 0;
		$data = array();

  while ($rows = $res->fetch_assoc()) {
	  foreach ($rows as $key => $value) {
		$data[$i][$key] = $value;
	  }
	  $i++;
	}
		return $data;
  }



	public function update_teacher($teacher_id,$data){
	extract($data);

	$sql = "SELECT * FROM `teachers` WHERE `id` = $teacher_id";
	$res = $this->conn->query($sql);
	if ($res->num_rows>0) {
					$query = "UPDATE
				`teachers` SET
				`name` = trim('$name'),
				`gender_id` = '$gender_id',
				`nationaility_id` = '$nationaility_id',
				`cnic` = trim('$cnic'),
				`date_of_birth` = '$date_of_birth',
				`tel_no` = trim('$tel_no'),
				`address` = trim('$address'),
				`salary` = '$salary',
				`marital_status_id` = '$marital_status_id',
				`guardian_name` = trim('$guardian_name'),
				`guardian_occupation` = trim('$guardian_occupation'),
				`no_of_children` = '$no_of_children',
				`lanuages_id` = '$lanuages_id',
				`designation_id` = '$designation_id',
				`class_id` = '$class_id',
				`tchr_pic` = '$tchr_pic',
				`email`= '$email',
				`active` = '$active'
				WHERE `id` = $teacher_id";
				$res = $this->conn->query($query);
				$this->update_education($teacher_id,$data);
				$this->update_experience($teacher_id,$data);
				$this->update_account_detail($teacher_id,$data);
				return $res;
	}else{
		
	}

	$query = "UPDATE
	`teachers` SET
	`name` = trim('$name'),
				`gender_id` = '$gender_id',
				`nationaility_id` = '$nationaility_id',
				`cnic` = trim('$cnic'),
				`date_of_birth` = '$date_of_birth',
				`tel_no` = trim('$tel_no'),
				`address` = trim('$address'),
				`salary` = '$salary',
				`marital_status_id` = '$marital_status_id',
				`guardian_name` = trim('$guardian_name'),
				`guardian_occupation` = trim('$guardian_occupation'),
				`no_of_children` = '$no_of_children',
				`lanuages_id` = '$lanuages_id',
				`designation_id` = '$designation_id',
				`class_id` = '$class_id',
				`active` = '$active'
	WHERE `id` = $teacher_id";
	$res = $this->conn->query($query);
	$this->update_education($teacher_id,$data);
	$this->update_experience($teacher_id,$data);
	$this->update_account_detail($teacher_id,$data);
	return $res;
	}
  
    public function update_education($teacher_id,$data){
    	$delete_qualification = $this->delete_teacher_education($teacher_id);
    	// $this->debug($delete_qualification);
    	if (isset($delete_qualification)) {
    		$add_education = $this->add_education($teacher_id,$data);
    		return $add_qualification;
    	}
    }


	public function update_teacher_classes($id,$data){
		extract($data);		
		$query = "UPDATE `teacher_classes` SET `teacher_id`='$teacher_id',`subject_id`='$subject_id',`time_slot_id`='$time_slot_id',`class_id`='$class_id',`active`='$active' WHERE `id` = '$id'";
		$res   = $this->conn->query($query);
		return $res;
    }

	public function update_experience($teacher_id,$data){
    	$delete_experience = $this->delete_teacher_experience($teacher_id);
    	// $this->debug($delete_qualification);
    	if (isset($delete_experience)) {
    		$add_experience = $this->add_experience($teacher_id,$data);
    		return $add_experience;
    	}
    }

	public function update_account_detail($teacher_id,$data){
		extract($data);
	
		$query = "UPDATE
		`teacher_account`SET
		`teacher_id` = '$teacher_id',
		`bank_name` = trim('$bank_name'),
		`branch_code` = '$branch_code',
		`account_title` = trim('$account_title'),
		`account_no` = '$account_no'
		WHERE`teacher_id` = '$teacher_id'";
		$res = $this->conn->query($query);
		return $res;
		}
  

		// delete student into teacher


		public function delete_teacher($id){
			$query = "DELETE FROM `teachers` WHERE `id` = '$id'";
			$res   = $this->conn->query($query);
			$this->delete_teacher_education($id);
			$this->delete_teacher_experience($id);
			$this->delete_teacher_account_detail($id);
			if($res){
				echo json_encode(array(
							"status" => "success",
							'msg' => "deleted successfully"
						));
			
			}else{
				  echo json_encode(array(
							"status" => "error",
							'msg' => "this teacher cannot be deleted use in somewhere"
						));
				
			}
	
		}

		// delete student into teacher
		public function delete_teacher_education($id){
			$query = "DELETE FROM `teacher_education` WHERE `teacher_id` = '$id'";
			$res   = $this->conn->query($query);
			return $res;
		}

		// delete student into teacher
		public function delete_teacher_experience($id){
			$query = "DELETE FROM `teacher_experience` WHERE `teacher_id` = '$id'";
			$res   = $this->conn->query($query);
			return $res;
		}

		public function delete_teacher_classes($id){
			$query = "DELETE FROM `teacher_classes` WHERE `id` = '$id'";
			$res   = $this->conn->query($query);
			return $res;
		}

		// delete student into teacher
		public function delete_teacher_account_detail($id){
			$query = "DELETE FROM `teacher_account` WHERE `teacher_id` = '$id'";
			$res   = $this->conn->query($query);
			return $res;
		}



		// add class into table
		public function add_student($data){
			extract($data);

			$std_pic = null;
        
			$target_dir3 = "uploads/";
			$target_file3 = $target_dir3 . basename($_FILES["std_pic"]["name"]);
			$uploadOk3 = 1;
			$imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
		
			// Check if image file is a actual image or fake image
			// if(isset($_POST["submit"])) {
			  $check3 = getimagesize($_FILES["std_pic"]["tmp_name"]);
			  if($check3 !== false) {
				echo "File is an image - " . $check3["mime"] . ".";
				$uploadOk3 = 1;
			  } else {
				echo "File is not an image.";
				$uploadOk3 = 0;
			  }
			// }
		
			// Check if file already exists
			// if (file_exists($target_file)) {
			//   echo "Sorry, file already exists.";
			//   $uploadOk = 0;
			// }
		
			// Check file size
			if ($_FILES["std_pic"]["size"] > 200000) {
			  echo "Sorry, your file is too large.";
			  $uploadOk3 = 0;
			}
		
			// Allow certain file formats
			if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg"
			&& $imageFileType3 != "gif" ) {
			  echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
			  $uploadOk3 = 0;
			}
		
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk3 == 0) {
		
			  echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			  if (move_uploaded_file($_FILES["std_pic"]["tmp_name"], $target_file3)) {
				echo "The file ". htmlspecialchars( basename( $_FILES["std_pic"]["name"])). " has been uploaded.";
				$std_pic = $_FILES["std_pic"]["name"];
			  } else {
				echo "Sorry, there was an error uploading your file.";
			  }
			}
			
				$query     = "SELECT * FROM `students` where `tel_no` = '$tel_no', `email` = '$email' ";
				$res    = $this->conn->query($query);
				if (($res->num_rows) >0) {
					return false;
			}else{
				$query = "INSERT INTO `students`(`student_name`,`caste`,`guardian_occupation`,`nationality_id`,`date_of_birth`, `religion_id`, `class_id`,`guardian_name`,`tel_no`,`marital_status_id`,`gender_id`,`fees`,`std_pic`,`email`) 
				VALUES (trim('$student_name'),trim('$caste'),trim('$guardian_occupation'),'$nationality_id','$date_of_birth','$religion_id', '$class_id', trim('$guardian_name'),trim('$tel_no'),'$marital_status_id','$gender_id',trim('$fees'),'$std_pic','$email')";
				$res   = $this->conn->query($query);
				return $res;
			}
		}



		public function view_student($id){
			$query = "SELECT * FROM `students` WHERE `id` = '$id'";
			$res = $this->conn->query($query);
			if ($res->num_rows>0) {
			    $record = $res->fetch_assoc();
				return $record;
			}
		}

		public function update_student($id,$data){
			extract($data);
			$query = "UPDATE `students` SET `student_name`=trim('$student_name'),`caste`=trim('$caste'),`guardian_occupation`=trim('$guardian_occupation'),`nationality_id`='$nationality_id',`date_of_birth`='$date_of_birth',`religion_id`='$religion_id',`class_id`='$class_id',`guardian_name`=trim('$guardian_name'),`tel_no`=trim('$tel_no'),`marital_status_id`='$marital_status_id',`gender_id`='$gender_id', `active`='$active',`fees`='$fees',`email`='$email' WHERE `id` = $id" ;
			$res   = $this->conn->query($query);
			return $res;
		}

		public function delete_student($id){
			$query = "DELETE FROM `students` WHERE `id` = '$id'";
			$res   = $this->conn->query($query);
			return $res;
		}

		// delete class into table
		public function delete_user($id)
    {
        $select = "SELECT `role_id` FROM `users` WHERE `id` = $id";
        $res    = $this->conn->query($select);
        if ($res->num_rows>0) {
            $record = $res->fetch_assoc();
            $role_id     = $record['role_id'];
            if ($role_id == 1) {
                 echo json_encode(array(
                        "status" => "error",
                        'msg' => "Super admin can't be deleted"
                    ));
            return false;
            }else{
                $query = "DELETE FROM `users` WHERE `id` = $id";
                $res = $this->conn->query($query);
                echo json_encode(array(
                            "status" => "success",
                        'msg' => "deleted successfully"
                    ));
                return $res;
            }
        }
    }


		
		public function delete_fees($id){
			$query = "DELETE FROM `std_fees` WHERE `id` = '$id'";
			$res   = $this->conn->query($query);
			return $res;
		}


		public function delete_salary($id){
			$query = "DELETE FROM `tchr_salary` WHERE `id` = '$id'";
			$res   = $this->conn->query($query);
			return $res;
		}


		public function fetch_std_fees_by_id($data){
			extract($data);
			$query = "SELECT fees FROM `students` WHERE `id` = '$id' ";
			$res   = $this->conn->query($query);

			if ($res->num_rows>0){
				$record = $res->fetch_assoc();

				echo json_encode(array("fees"=>$record['fees']));
				return true;
			}
		}


		public function fetch_tchr_salary_by_id($data){
			extract($data);
			$query = "SELECT salary FROM `teachers` WHERE `id` = '$id' ";
			$res   = $this->conn->query($query);

			if ($res->num_rows>0){
				$record = $res->fetch_assoc();

				echo json_encode(array("salary"=>$record['salary']));
				return true;
			}
		}



        // fetch student
		public function fetch_students(){
			$query = "SELECT 	`students`.`id`,
								`students`.`active`,
								`students`.`gender_id`,
								`genders`.`name` 	AS `genders`,
								CASE
								WHEN `students`.`gender_id` = 1 THEN CONCAT('Mr.',' ',`students`.`student_name`)
								WHEN `students`.`gender_id` = 2 THEN CONCAT('Mrs.',' ',`students`.`student_name`)
								ELSE 'Other'
								END AS `student_name`
								FROM `students`
								LEFT JOIN `genders` 	ON `genders`.`id` = `students`.`gender_id`";
			$res   = $this->conn->query($query);
			$i = 0;
			$data = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$data[$i][$key] = $value;
				}
			$i++;
			}
		return $data;
	}



		// add class into table
		public function add_class($data){
			extract($data);
			
				$query     = "SELECT * FROM `classes` where `name` = '$name' ";
				$res    = $this->conn->query($query);
				if (($res->num_rows) >0) {
					return false;
			}else{
				$query = "INSERT INTO `classes`(`name`) VALUES (trim('$name'))";
				$res   = $this->conn->query($query);
			}
			return $res;
		}


		public function add_std_fees($data){
			extract($data);
			$query = "INSERT INTO `std_fees`(`std_id`,`fees`) VALUES ('$std_id','$fees')";
			$res   = $this->conn->query($query);
			return $res;
		}


		public function add_tchr_salary($data){
			extract($data);
			$query = "INSERT INTO `tchr_salary`(`tchr_id`,`salary`) VALUES ('$tchr_id','$salary')";
			$res   = $this->conn->query($query);
			return $res;
		}


		public function update_class($id,$data){
			extract($data);
				
			$query = "UPDATE `classes` SET `name`='$name',`active`='$active' WHERE `id` = $id" ;
			$res   = $this->conn->query($query);
			return $res;
		}

		public function view_class($id){
			$query = "SELECT * FROM `classes` WHERE `id` = '$id'";
			$res = $this->conn->query($query);
			if ($res->num_rows>0) {
			    $record = $res->fetch_assoc();
				return $record;
			}
		}

		// delete class into table
		public function delete_class($id){
			$query = "DELETE FROM `classes` WHERE `id` = '$id'";
			$res   = $this->conn->query($query);
			if($res){
				echo json_encode(array(
							"status" => "success",
							'msg' => "deleted successfully"
						));
			
			}else{
				  echo json_encode(array(
							"status" => "error",
							'msg' => "this class cannot be deleted use in somewhere"
						));
				
			}
	
		}

		// fetch  Gender into table
		public function fetch_class(){
			$query = "SELECT * FROM `classes` ORDER BY `name` ";
			$res   = $this->conn->query($query);
			$i = 0;
			$data = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$data[$i][$key] = $value;
				}
			$i++;
			}
		return $data;
	}


		public function enter_time(){
			$query = "SELECT * FROM `time_slot`";
			$res   = $this->conn->query($query);
			$i = 0;
			$data = array();

			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$data[$i][$key] = $value;
				}
			$i++;
			}
		return $data;
	}

	public function end_time(){
		$query = "SELECT * FROM `time_slot`";
		$res   = $this->conn->query($query);
		$i = 0;
		$data = array();

		while ($rows = $res->fetch_assoc()) {
			foreach ($rows as $key => $value) {
				$data[$i][$key] = $value;
			}
		$i++;
		}
	return $data;
	}

			public function fetch_user(){
				$query = "SELECT * FROM `users` ORDER BY `fname` ";
				$res   = $this->conn->query($query);
				$i = 0;
				$data = array();
				while ($rows = $res->fetch_assoc()) {
					foreach ($rows as $key => $value) {
						$data[$i][$key] = $value;
					}
				$i++;
				}
			return $data;
		}


	   	// fetch teacher into table
		   public function fetch_student_fees(){
			$query = "SELECT
			`std_fees`.`id`,
			`std_fees`.`fees`,
			`std_fees`.`active`,
			`students`.`student_name`

			FROM `std_fees`
			INNER JOIN 	`students`
			ON `students`.`id` = `std_fees`.`std_id` ";
			$res   = $this->conn->query($query);
			$i = 0;
			$data = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$data[$i][$key] = $value;
				}
			$i++;
			}
		return $data;
	}



	
	   	// fetch teacher into table
		   public function fetch_teacher_salary(){
			$query = "SELECT
			`tchr_salary`.`id`,
			`tchr_salary`.`salary`,
			`tchr_salary`.`active`,
			`teachers`.`name`

			FROM `tchr_salary`
			INNER JOIN 	`teachers`
			ON `teachers`.`id` = `tchr_salary`.`tchr_id` ";
			$res   = $this->conn->query($query);
			$i = 0;
			$data = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$data[$i][$key] = $value;
				}
			$i++;
			}
		return $data;
	}
	

	public function add_designation($data){
		extract($data);
		
			$query  = "SELECT * FROM `designations` where `name` = '$name' ";
			$res    = $this->conn->query($query);
			if (($res->num_rows) >0) {
				return false;
		}else{
			$query = "INSERT INTO `designations`(`name`) VALUES (trim('$name'))";
			$res   = $this->conn->query($query);
		}
		return $res;
	}

		public function update_designation($id,$data){
			extract($data);
				
			$query = "UPDATE `designations` SET `name`='$name',`active`='$active' WHERE `id` = $id" ;
			$res   = $this->conn->query($query);
			return $res;
		}


		public function view_designation($id){
			$query = "SELECT * FROM `designations` WHERE `id` = '$id'";
			$res = $this->conn->query($query);
			if ($res->num_rows>0) {
			    $record = $res->fetch_assoc();
				return $record;
			}
		}


		public function add_marital_status($data){
			extract($data);
			
				$query  = "SELECT * FROM `marital_statuses` where `name` = '$name' ";
				$res    = $this->conn->query($query);
				if (($res->num_rows) >0) {
					return false;
			}else{
				$query = "INSERT INTO `marital_statuses`(`name`) VALUES (trim('$name'))";
				$res   = $this->conn->query($query);
			}
			return $res;
		}



		public function view_marital_status($id){
			$query = "SELECT * FROM `marital_statuses` WHERE `id` = '$id'";
			$res = $this->conn->query($query);
			if ($res->num_rows>0) {
			    $record = $res->fetch_assoc();
				return $record;
			}
		}


		public function update_marital_status($id,$data){
			extract($data);
				
			$query = "UPDATE `marital_statuses` SET `name`='$name',`active`='$active' WHERE `id` = $id" ;
			$res   = $this->conn->query($query);
			return $res;
		}

		
		public function add_religion($data){
			extract($data);
			
				$query  = "SELECT * FROM `religions` where `name` = '$name' ";
				$res    = $this->conn->query($query);
				if (($res->num_rows) >0) {
					return false;
			}else{
				$query = "INSERT INTO `religions`(`name`) VALUES (trim('$name'))";
				$res   = $this->conn->query($query);
			}
			return $res;
		}

		
		public function update_religion($id,$data){
			extract($data);
				
			$query = "UPDATE `religions` SET `name`='$name',`active`='$active' WHERE `id` = $id" ;
			$res   = $this->conn->query($query);
			return $res;
		}

		public function add_subject($data){
			extract($data);
			
				$query  = "SELECT * FROM `subjects` where `name` = '$name' ";
				$res    = $this->conn->query($query);
				if (($res->num_rows) >0) {
					return false;
			}else{
				$query = "INSERT INTO `subjects`(`name`) VALUES (trim('$name'))";
				$res   = $this->conn->query($query);
			}
			return $res;
		}


		public function update_subject($id,$data){
			extract($data);
				
			$query = "UPDATE `subjects` SET `name`='$name',`active`='$active' WHERE `id` = $id" ;
			$res   = $this->conn->query($query);
			return $res;
		}


	// view qualification
	public function view_subject($id){
		$query = "SELECT * FROM `subjects` WHERE `id` = '$id'";
		$res = $this->conn->query($query);
		if ($res->num_rows>0) {
			$record = $res->fetch_assoc();
			return $record;
		}
	}

		// add qualificationinto table
		public function add_qualification($data){
			extract($data);
			
				$query  = "SELECT * FROM `qualifications` where `name` = '$name' ";
				$res    = $this->conn->query($query);
				if (($res->num_rows) >0) {
					return false;
			}else{
				$query = "INSERT INTO `qualifications`(`name`) VALUES (trim('$name'))";
				$res   = $this->conn->query($query);
			}
			return $res;
		}


		public function add_gender($data){
			extract($data);
			
				$query  = "SELECT * FROM `genders` where `name` = '$name' ";
				$res    = $this->conn->query($query);
				if (($res->num_rows) >0) {
					return false;
			}else{
				$query = "INSERT INTO `genders`(`name`) VALUES (trim('$name'))";
				$res   = $this->conn->query($query);
			}
			return $res;
		}

		// add qualificationinto table
		public function add_role($data){
			extract($data);
			
				$query  = "SELECT * FROM `roles` where `name` = '$name' ";
				$res    = $this->conn->query($query);
				if (($res->num_rows) >0) {
					return false;
			}else{
				$query = "INSERT INTO `roles`(`name`) VALUES (trim('$name'))";
				$res   = $this->conn->query($query);
			}
			return $res;
		}

			public function update_student_fees($id,$data){
				extract($data);
					
				$query = "UPDATE `std_fees` SET `std_id`='$std_id',`fees`='$fees',`active`='$active',`paid`='$paid' WHERE `id` = '$id'";
				$res   = $this->conn->query($query);
				return $res;
			}

			public function update_teacher_salary($id,$data){
				extract($data);
					
				$query = "UPDATE `tchr_salary` SET `tchr_id`='$tchr_id',`salary`='$salary',`active`='$active',`paid`='$paid' WHERE `id` = '$id'";
				$res   = $this->conn->query($query);
				return $res;
			}
			
			public function update_gender($id,$data){
				extract($data);
					
				$query = "UPDATE `genders` SET `name`='$name',`active`='$active' WHERE `id` = $id" ;
				$res   = $this->conn->query($query);
				return $res;
			}
    
       // update qualification tbale
		public function update_qualification($id,$data){
			extract($data);
				
			$query = "UPDATE `qualifications` SET `name`='$name',`active`='$active' WHERE `id` = $id" ;
			$res   = $this->conn->query($query);
			return $res;
		}
        
		// view qualification
		public function view_qualification($id){
			$query = "SELECT * FROM `qualifications` WHERE `id` = '$id'";
			$res = $this->conn->query($query);
			if ($res->num_rows>0) {
			    $record = $res->fetch_assoc();
				return $record;
			}
		}


	// view qualification
	public function view_gender($id){
		$query = "SELECT * FROM `genders` WHERE `id` = '$id'";
		$res = $this->conn->query($query);
		if ($res->num_rows>0) {
			$record = $res->fetch_assoc();
			return $record;
		}
	}

		// delete qualification
		public function delete_qualification($id){
			$query = "DELETE FROM `qualifications` WHERE `id` = '$id'";
			$res   = $this->conn->query($query);
			if($res){
				echo json_encode(array(
							"status" => "success",
							'msg' => "deleted successfully"
						));
			
			}else{
				  echo json_encode(array(
							"status" => "error",
							'msg' => "this qualification cannot be deleted use in somewhere"
						));
				
			}
	
		}



		public function delete_gender($id){
			$query = "DELETE FROM `genders` WHERE `id` = '$id'";
			$res   = $this->conn->query($query);
			if($res){
				echo json_encode(array(
							"status" => "success",
							'msg' => "deleted successfully"
						));
			
			}else{
				  echo json_encode(array(
							"status" => "error",
							'msg' => "this gender cannot be deleted use in somewhere"
						));
				
			}
	
		}


		public function delete_time_slot($id){
			$query = "DELETE FROM `time_slot` WHERE `id` = '$id'";
			$res   = $this->conn->query($query);
			if($res){
				echo json_encode(array(
							"status" => "success",
							'msg' => "deleted successfully"
						));
			
			}else{
				  echo json_encode(array(
							"status" => "error",
							'msg' => "this time slot cannot be deleted use in somewhere"
						));
				
			}
	
		}




		public function delete_lanuages($id){
			$query = "DELETE FROM `lanuages` WHERE `id` = '$id'";
			$res   = $this->conn->query($query);
			if($res){
				echo json_encode(array(
							"status" => "success",
							'msg' => "deleted successfully"
						));
			
			}else{
				  echo json_encode(array(
							"status" => "error",
							'msg' => "this lanuage cannot be deleted use in somewhere"
						));
				
			}
	
		}


		public function delete_nationality($id){
			$query = "DELETE FROM `nationalities` WHERE `id` = '$id'";
			$res   = $this->conn->query($query);
			if($res){
				echo json_encode(array(
							"status" => "success",
							'msg' => "deleted successfully"
						));
			
			}else{
				  echo json_encode(array(
							"status" => "error",
							'msg' => "this nationality cannot be deleted use in somewhere"
						));
				
			}
	
		}


		public function delete_religion($id){
			$query = "DELETE FROM `religions` WHERE `id` = '$id'";
			$res   = $this->conn->query($query);
			if($res){
				echo json_encode(array(
							"status" => "success",
							'msg' => "deleted successfully"
						));
			
			}else{
				  echo json_encode(array(
							"status" => "error",
							'msg' => "this religion cannot be deleted use in somewhere"
						));
				
			}
	
		}
	


		public function delete_subject($id){
			$query = "DELETE FROM `subjects` WHERE `id` = '$id'";
			$res   = $this->conn->query($query);
			if($res){
				echo json_encode(array(
							"status" => "success",
							'msg' => "deleted successfully"
						));
			
			}else{
				  echo json_encode(array(
							"status" => "error",
							'msg' => "this subject cannot be deleted use in somewhere"
						));
				
			}
	
		}


		public function delete_designation($id){
			$query = "DELETE FROM `designations` WHERE `id` = '$id'";
			$res   = $this->conn->query($query);
			if($res){
				echo json_encode(array(
							"status" => "success",
							'msg' => "deleted successfully"
						));
			
			}else{
				  echo json_encode(array(
							"status" => "error",
							'msg' => "this designation cannot be deleted use in somewhere"
						));
				
			}
	
		}



		public function delete_marital($id){
			$query = "DELETE FROM `marital_statuses` WHERE `id` = '$id'";
			$res   = $this->conn->query($query);
			if($res){
				echo json_encode(array(
							"status" => "success",
							'msg' => "deleted successfully"
						));
			
			}else{
				  echo json_encode(array(
							"status" => "error",
							'msg' => "this marital cannot be deleted use in somewhere"
						));
				
			}
	
		}


		public function delete_role($id)
		{
	
			$select = "SELECT `id` FROM `roles` WHERE `id` = $id";
			$res    = $this->conn->query($select);
			if ($res->num_rows>0) {
				$record = $res->fetch_assoc();
				$role_id     = $record['id'];
				if ($role_id == 1) {
					 echo json_encode(array(
							"status" => "error",
							'msg' => "Super admin role can't be deleted"
						));
				return false;
				}else{
					$query  = "DELETE FROM `roles` WHERE `id` = $id";
					$res    = $this->conn->query($query);
					echo json_encode(array(
							"status" => "success",
							'msg' => "deleted successfully"
						));
					return $res;
				}
			}
	
		}


		// fetch  Gender into table
		public function fetch_gender(){
			$query = "SELECT * FROM `genders` ORDER BY `name`";
			$res   = $this->conn->query($query);
			$i = 0;
			$data = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$data[$i][$key] = $value;
				}
			$i++;
			}
		return $data;
	}


			// view student into table
			public function fetch_teacher_classes(){
				$query = "SELECT 	`teacher_classes`.`id`,
									`teachers`.`name` 	AS `teachers`,
									`subjects`.`name` 	AS `subjects`,
									`classes`.`name` 	AS `classes`,
									`time_slot`.`id` 	AS `time_slot`,
									`teacher_classes`.`active`,
									`teacher_classes`.`teacher_id`
									FROM `teacher_classes`
									LEFT JOIN `teachers`  ON `teachers`.`id`  = `teacher_classes`.`teacher_id`
									LEFT JOIN `subjects`  ON `subjects`.`id`  = `teacher_classes`.`subject_id`
									LEFT JOIN `classes`   ON `classes`.`id`   = `teacher_classes`.`class_id`
									LEFT JOIN `time_slot` ON `time_slot`.`id` = `teacher_classes`.`time_slot_id`";
				$res   = $this->conn->query($query);
				$i = 0;
				$data = array();
				while ($rows = $res->fetch_assoc()) {
					foreach ($rows as $key => $value) {
						$data[$i][$key] = $value;
					}
				$i++;
				}
			return $data;
		}

		// add class into table
		public function add_time_slot($data){
			extract($data);
			$password  = md5($password);
			$query = "INSERT INTO `time_slot`(`start_time`, `end_time`) VALUES ('$start_time','$end_time')";
			$res   = $this->conn->query($query);
			return $res;
		}

		public function view_time_slot($id){
			$query = "SELECT * FROM `time_slot` WHERE `id` = '$id'";
			$res = $this->conn->query($query);
			if ($res->num_rows>0) {
				$record = $res->fetch_assoc();
				return $record;
			}
		}
			

		public function update_time_slot($id,$data){
			extract($data);
				
			$query = "UPDATE `time_slot` SET `start_time`='$start_time',`end_time`='$end_time',`active`='$active' WHERE `id` = '$id'" ;
			$res   = $this->conn->query($query);
			return $res;
		}
	
		// fetch  Gender into table
			public function fetch_time_slot(){
				$query = "SELECT * FROM `time_slot`";
				$res   = $this->conn->query($query);
				$i = 0;
				$data = array();
				while ($rows = $res->fetch_assoc()) {
					foreach ($rows as $key => $value) {
						$data[$i][$key] = $value;
					}
				$i++;
				}
			return $data;
		}

	

		public function add_user($data){
			extract($data);

			$user_pic = null;
        
        extract($data);
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["user_pic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        // if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["user_pic"]["tmp_name"]);
          if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            echo "File is not an image.";
            $uploadOk = 0;
          }
        // }

        // Check if file already exists
        // if (file_exists($target_file)) {
        //   echo "Sorry, file already exists.";
        //   $uploadOk = 0;
        // }

        // Check file size
        if ($_FILES["user_pic"]["size"] > 200000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {

          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["user_pic"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["user_pic"]["name"])). " has been uploaded.";
            $user_pic = $_FILES["user_pic"]["name"];
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }

		$password = md5($password);
			$query  = "SELECT * FROM `users` where `username` = '$username' and `email` = '$email' ";
			$res    = $this->conn->query($query);
			if (($res->num_rows) >0) {
				return false;
			}else{
			
				$query1 = "INSERT INTO `users`(`fname`,`lname`,`username`,`email`,`password`,`role_id`,`user_pic`) 
							VALUES (
									'$fname',
									'$lname',
									'$username',
									'$email',
									'$password',
									'$role_id',
									'$user_pic'

								)";
				$res1   = $this->conn->query($query1);

				

				
				return $res1;
			}
			
		}

		public function view_user($id){
			$query = "SELECT * FROM `users` WHERE `id` = '$id'";
			$res = $this->conn->query($query);
			if ($res->num_rows>0) {
			    $record = $res->fetch_assoc();
				return $record;
			}
		}

		// public function update_user($id,$data){
		// 	extract($data);
		// 	$password  = md5($password);
		// 	$query = "UPDATE `users` SET `fname`=trim('$fname'),`lname`=trim('$lname'),`username`=trim('$username'),`password`=trim('$password'),`role_id`='$role_id',`active`='$active',`user_pic`='$user_pic' WHERE `id` = $id" ;
		// 	$res   = $this->conn->query($query);
		// 	return $res;
		// }

		public function update_user($id,$data){
			extract($data);
				
			$query = "UPDATE `users` SET `fname`='$fname',`lname`='$lname',`username`='$username',`active`='$active',`role_id`='$role_id' WHERE `id` = $id" ;
			$res   = $this->conn->query($query);
			return $res;
		}


		public function fetch_role(){
			$query = "SELECT * FROM `roles` ORDER BY `name`";
			$res   = $this->conn->query($query);
			$i = 0;
			$data = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$data[$i][$key] = $value;
				}
			$i++;
			}
		return $data;
		}

		public function update_role($id,$data){
			extract($data);
				
			$query = "UPDATE `roles` SET `name`='$name',`active`='$active' WHERE `id` = $id" ;
			$res   = $this->conn->query($query);
			return $res;
		}


		public function view_role($id){
			$query = "SELECT * FROM `roles` WHERE `id` = '$id'";
			$res = $this->conn->query($query);
			if ($res->num_rows>0) {
			    $record = $res->fetch_assoc();
				return $record;
			}
		}

		// count total teacher
		public function count_teachers(){
			$query  = "SELECT count(*) as `total` FROM `teachers` ";
			$res 	= $this->conn->query($query);
			return ($res->fetch_assoc());
		}

		// count total teacher
		public function count_class(){
			$query  = "SELECT count(*) as `total` FROM `classes` ";
			$res 	= $this->conn->query($query);
			return ($res->fetch_assoc());
		}

		public function count_students(){
			$query  = "SELECT count(*) as `total` FROM `students` ";
			$res 	= $this->conn->query($query);
			return ($res->fetch_assoc());
		}

		// fetch  Gender into table
		public function fetch_designation(){
			$query = "SELECT * FROM `designations` ORDER BY `name`";
			$res   = $this->conn->query($query);
			$i = 0;
			$data = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$data[$i][$key] = $value;
				}
			$i++;
			}
		return $data;
	}


		// fetch  Gender into table
		public function fetch_lanuages(){
			$query = "SELECT * FROM `lanuages` ORDER BY `name` ";
			$res   = $this->conn->query($query);
			$i = 0;
			$data = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$data[$i][$key] = $value;
				}
			$i++;
			}
		return $data;
	}

		// fetch  Gender into table
		public function fetch_marital_status(){
			$query = "SELECT * FROM `marital_statuses` ORDER BY `name`";
			$res   = $this->conn->query($query);
			$i = 0;
			$data = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$data[$i][$key] = $value;
				}
			$i++;
			}
		return $data;
	}


		// add class into table
		public function add_nationality($data){
			extract($data);
			
				$query  = "SELECT * FROM `nationalities` where `name` = '$name' ";
				$res    = $this->conn->query($query);
				if (($res->num_rows) >0) {
					return false;
			}else{
				$query = "INSERT INTO `nationalities`(`name`) VALUES (trim('$name'))";
				$res   = $this->conn->query($query);
			}
			return $res;
		}



		public function update_nationality($id,$data){
			extract($data);
				
			$query = "UPDATE `nationalities` SET `name`='$name',`active`='$active' WHERE `id` = $id" ;
			$res   = $this->conn->query($query);
			return $res;
		}


		public function view_nationality($id){
			$query = "SELECT * FROM `nationalities` WHERE `id` = '$id'";
			$res = $this->conn->query($query);
			if ($res->num_rows>0) {
			    $record = $res->fetch_assoc();
				return $record;
			}
		}



		public function add_lanuages($data){
			extract($data);
			
				$query  = "SELECT * FROM `lanuages` where `name` = '$name' ";
				$res    = $this->conn->query($query);
				if (($res->num_rows) >0) {
					return false;
			}else{
				$query = "INSERT INTO `lanuages`(`name`) VALUES (trim('$name'))";
				$res   = $this->conn->query($query);
			}
			return $res;
		}

		public function view_lanuages($id){
			$query = "SELECT * FROM `lanuages` WHERE `id` = '$id'";
			$res = $this->conn->query($query);
			if ($res->num_rows>0) {
			    $record = $res->fetch_assoc();
				return $record;
			}
		}

		public function view_religion($id){
			$query = "SELECT * FROM `religions` WHERE `id` = '$id'";
			$res = $this->conn->query($query);
			if ($res->num_rows>0) {
			    $record = $res->fetch_assoc();
				return $record;
			}
		}


		
		public function update_lanuages($id,$data){
			extract($data);
				
			$query = "UPDATE `lanuages` SET `name`='$name',`active`='$active' WHERE `id` = $id" ;
			$res   = $this->conn->query($query);
			return $res;
		}

		// fetch  Gender into table
		public function fetch_nationality(){
			$query = "SELECT * FROM `nationalities` ORDER BY `name`";
			$res   = $this->conn->query($query);
			$i = 0;
			$data = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$data[$i][$key] = $value;
				}
			$i++;
			}
		return $data;
	}

		// fetch  Gender into table
		public function qualification(){
			$query = "SELECT * FROM `qualifications` ORDER BY `name`";
			$res   = $this->conn->query($query);
			$i = 0;
			$data = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$data[$i][$key] = $value;
				}
			$i++;
			}
		return $data;
	}

		// fetch  Gender into table
		public function subject(){
			$query = "SELECT * FROM `subjects` ORDER BY `name`";
			$res   = $this->conn->query($query);
			$i = 0;
			$data = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$data[$i][$key] = $value;
				}
			$i++;
			}
		return $data;
	}
		// fetch  Gender into table
		public function fetch_religion(){
			$query = "SELECT * FROM `religions` ORDER BY `name`";
			$res   = $this->conn->query($query);
			$i = 0;
			$data = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$data[$i][$key] = $value;
				}
			$i++;
			}
		return $data;
	}

	    // debug function for check 
		final function debug($data){
			echo "<pre>";
			print_r($data);
			echo "</pre>";
			exit();
		}
	}

	function __destruct() {
		$this->conn;
	  }

	$obj = new Database();


	?>