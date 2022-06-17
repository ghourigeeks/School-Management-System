

CREATE TABLE `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;


INSERT INTO classes VALUES
("19","2nd","1","2022-02-23"),
("23","6th","1","2022-02-24"),
("25","8th","1","2022-02-24"),
("32","1st","1","2022-02-25"),
("33","3rd","1","2022-02-25"),
("34","4th","1","2022-02-25"),
("35","5th","1","2022-02-25"),
("36","7th","1","2022-02-25"),
("38","10th","1","2022-02-25");




CREATE TABLE `designations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;


INSERT INTO designations VALUES
("1","Teachers","1","2022-02-20"),
("2","Peon","1","2022-02-20"),
("3","Lab boy","1","2022-02-20"),
("4","Student","1","2022-02-20"),
("5","Head principle","1","2022-02-20"),
("9","Vice principle","1","2022-02-25"),
("10","asdas","1","2022-02-28");




CREATE TABLE `genders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;


INSERT INTO genders VALUES
("1","Male","1","2022-02-20"),
("2","Female","1","2022-02-20"),
("9","","0","2022-02-25");




CREATE TABLE `lanuages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;


INSERT INTO lanuages VALUES
("1","Urdu","1","2022-02-20"),
("2","Sindhi","1","2022-02-20"),
("3","English","1","2022-02-20"),
("4","Pashto","1","2022-02-20"),
("5","Punjabi","1","2022-02-20");




CREATE TABLE `marital_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;


INSERT INTO marital_statuses VALUES
("6","Single","1","2022-02-25"),
("8","Widow","1","2022-02-25"),
("9","Seprated","1","2022-02-25"),
("11","Married","1","2022-02-25");




CREATE TABLE `nationalities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;


INSERT INTO nationalities VALUES
("12","Pakistan","1","2022-02-25"),
("14","USA","1","2022-02-25"),
("16","Malasyia","1","2022-02-25"),
("17","Canada","1","2022-02-25");




CREATE TABLE `qualifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;


INSERT INTO qualifications VALUES
("4","Bsc","1","2022-02-20"),
("6","Inter","1","2022-02-20"),
("7","Matric","1","2022-02-20"),
("13","Bcom","1","2022-02-25"),
("14","Mbbs","1","2022-02-25");




CREATE TABLE `religions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;


INSERT INTO religions VALUES
("1","Muslim","1","2022-02-20"),
("2","Hindu","1","2022-02-20"),
("6","Christian","1","2022-02-25");




CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;


INSERT INTO roles VALUES
("2","Super admin","1","2022-02-24"),
("4","Admin","1","2022-02-25");




CREATE TABLE `std_fees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `std_id` int(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `active` int(11) NOT NULL DEFAULT 1,
  `paid` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;


INSERT INTO std_fees VALUES
("1","19","3000","2022-02-09","1","1"),
("2","20","8000","2022-02-10","1","0"),
("3","19","3000","2022-02-25","1","1"),
("5","10","2044","2022-02-25","1","0"),
("7","22","9000","2022-02-25","1","1"),
("8","19","3000","2022-02-25","1","1"),
("9","21","1000","2022-02-28","1","1"),
("10","21","1000","2022-02-28","1","1");




CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(255) DEFAULT NULL,
  `caste` varchar(255) DEFAULT NULL,
  `guardian_occupation` varchar(255) DEFAULT NULL,
  `fees` int(11) NOT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `date_of_birth` date NOT NULL DEFAULT current_timestamp(),
  `religion_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `guardian_name` varchar(255) NOT NULL,
  `tel_no` varchar(11) NOT NULL,
  `marital_status_id` int(11) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `religion_id` (`religion_id`),
  KEY `marital_status_id` (`marital_status_id`),
  KEY `gender_id` (`gender_id`),
  KEY `nationality_id` (`nationality_id`),
  KEY `class_id` (`class_id`),
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`religion_id`) REFERENCES `religions` (`id`),
  CONSTRAINT `students_ibfk_2` FOREIGN KEY (`marital_status_id`) REFERENCES `marital_statuses` (`id`),
  CONSTRAINT `students_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  CONSTRAINT `students_ibfk_4` FOREIGN KEY (`nationality_id`) REFERENCES `nationalities` (`id`),
  CONSTRAINT `students_ibfk_5` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;


INSERT INTO students VALUES
("10","Aasim Ghouri","asdasd","hello","2044","17","2022-02-23","2","36","naveed","03341878315","9","2","1","2022-02-22"),
("19","Sharjeel Ghouri","asdasd","hello","3000","16","2022-02-05","1","19","naveed","03341287831","9","9","1","2022-02-25"),
("21","Bilal Abro","asdasd","hello","1000","16","2022-02-15","6","34","naveed","12312333333","9","2","1","2022-02-25"),
("22","babar khan","asdasd","hello","9000","17","2022-02-25","1","38","dasdasdasd","03341878315","6","1","1","2022-02-25");




CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;


INSERT INTO subjects VALUES
("1","English","1","2022-02-20"),
("2","Urdu","1","2022-02-20"),
("3","Math","1","2022-02-20"),
("4","Science","1","2022-02-20"),
("5","History","1","2022-02-20"),
("7","Islamiyat","1","2022-02-20"),
("8","Physics","1","2022-02-20"),
("10","Social studies","1","2022-02-20"),
("12","Biology","1","2022-02-20"),
("15","Chemistry","1","2022-02-25");




CREATE TABLE `tchr_salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tchr_id` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `active` int(11) NOT NULL DEFAULT 1,
  `paid` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;


INSERT INTO tchr_salary VALUES
("5","13","40000","2022-02-25","1","1"),
("7","9","1000","2022-02-25","1","1"),
("8","9","1000","2022-02-25","1","1"),
("9","13","40000","2022-02-27","1","0"),
("10","17","90000","2022-02-27","1","1");




CREATE TABLE `teacher_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `branch_code` int(11) NOT NULL,
  `account_title` varchar(255) DEFAULT NULL,
  `account_no` varchar(17) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;


INSERT INTO teacher_account VALUES
("6","9","habib","3223","212312312","1131232122222222","1","2022-02-23"),
("8","13","asdasd","1232","222","2222222222222222","1","2022-02-24"),
("9","14","asdasd","2132","112312","2344444444444444","1","2022-02-24"),
("10","15","weqweqwe","1232","dsfsdfsd","3333333333333333","1","2022-02-25");




CREATE TABLE `teacher_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `time_slot_id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `time_slot_id` (`time_slot_id`),
  KEY `subject_id` (`subject_id`),
  KEY `class_id` (`class_id`),
  KEY `teacher_id` (`teacher_id`),
  CONSTRAINT `teacher_classes_ibfk_1` FOREIGN KEY (`time_slot_id`) REFERENCES `time_slot` (`id`),
  CONSTRAINT `teacher_classes_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  CONSTRAINT `teacher_classes_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  CONSTRAINT `teacher_classes_ibfk_4` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4;


INSERT INTO teacher_classes VALUES
("77","9","1","34","8","1","2022-03-01"),
("79","9","15","19","7","1","2022-03-01"),
("90","9","5","19","6","1","2022-03-01"),
("92","13","1","33","5","1","2022-03-01"),
("93","13","7","19","7","1","2022-03-01"),
("94","16","1","33","7","1","2022-03-01");




CREATE TABLE `teacher_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `qualification_id` int(11) NOT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `grade_div` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `qualification_id` (`qualification_id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `teacher_education_ibfk_1` FOREIGN KEY (`qualification_id`) REFERENCES `qualifications` (`id`),
  CONSTRAINT `teacher_education_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8mb4;


INSERT INTO teacher_education VALUES
("159","9","4","geeksroot1","10","A+1","1","2022-02-27"),
("160","9","4","geeksroot1","8","A+1","1","2022-02-27"),
("161","9","6","geeksroot1","15","A+1","1","2022-02-27"),
("162","9","6","geeksroot1","8","A+1","1","2022-02-27"),
("163","13","6","geeksroot1","15","A+1","1","2022-02-27"),
("164","13","4","geeksroot1","12","A+1","1","2022-02-27"),
("170","15","4","geeksroot1","10","A+1","1","2022-02-28"),
("171","15","4","geeksroot1","15","A+1","1","2022-02-28");




CREATE TABLE `teacher_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `experience_title` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `salary_drawn` int(11) NOT NULL,
  `prev_job` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4;


INSERT INTO teacher_experience VALUES
("105","9","12312","234234","22","122312","1","2022-02-27"),
("106","13","2323","2312","21312","12321","1","2022-02-27"),
("114","14","asdas","232","1232","Dasdasd","1","2022-02-28"),
("115","15","12312","231","22","asdasd","1","2022-02-28");




CREATE TABLE `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `nationaility_id` int(11) DEFAULT NULL,
  `cnic` varchar(13) DEFAULT NULL,
  `date_of_birth` date NOT NULL DEFAULT current_timestamp(),
  `tel_no` varchar(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `marital_status_id` int(11) DEFAULT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_occupation` varchar(255) DEFAULT NULL,
  `no_of_children` int(10) DEFAULT NULL,
  `lanuages_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`),
  KEY `gender_id` (`gender_id`),
  KEY `lanuages_id` (`lanuages_id`),
  KEY `nationaility_id` (`nationaility_id`),
  KEY `designation_id` (`designation_id`),
  KEY `marital_status_id` (`marital_status_id`),
  CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  CONSTRAINT `teachers_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  CONSTRAINT `teachers_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  CONSTRAINT `teachers_ibfk_4` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  CONSTRAINT `teachers_ibfk_5` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  CONSTRAINT `teachers_ibfk_6` FOREIGN KEY (`lanuages_id`) REFERENCES `lanuages` (`id`),
  CONSTRAINT `teachers_ibfk_7` FOREIGN KEY (`nationaility_id`) REFERENCES `nationalities` (`id`),
  CONSTRAINT `teachers_ibfk_8` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`),
  CONSTRAINT `teachers_ibfk_9` FOREIGN KEY (`marital_status_id`) REFERENCES `marital_statuses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;


INSERT INTO teachers VALUES
("9","Basim ghouri","1","12","1234567890123","2022-02-17","03341870315","karachi","6","naveed","hello","1","2","2","19","1000","1","2022-02-23"),
("13","Sharjeel Ghouri","1","14","1234567890123","2022-02-08","13341878316","dasdasdsa","8","naveed","hello","1","3","5","23","40000","1","2022-02-24"),
("14","Umaiz ","2","17","1234567890123","2022-02-09","03341878315","asdasd","9","dasdasdasd","asdasda","2","3","5","25","60000","1","2022-02-24"),
("15","Bilal abro","2","17","1234567890123","2022-02-17","03341878315","sdfsdf","9","naveed","asdasd","2","5","3","36","30000","1","2022-02-25"),
("16","Muhammad aqib","1","12","1234567890123","2020-10-25","03341878315","fsdfsfsdfsdfdsfsdf","6","naveed","hello","3","1","3","38","6000","1","2022-02-25");




CREATE TABLE `time_slot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;


INSERT INTO time_slot VALUES
("5","10:00","11:00","1","2022-02-28"),
("6","11:00","00:00","1","2022-02-28"),
("7","00:00","01:00","1","2022-02-28"),
("8","09:00","10:00","1","2022-02-28");




CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;


INSERT INTO users VALUES
("9","Muhammad","lala","admin","root","0","1","2022-02-28"),
("10","Basim","Ghouri","admin","47b7bfb65fa83ac9a71dcb0f6296bb6e","4","1","2022-02-28");


