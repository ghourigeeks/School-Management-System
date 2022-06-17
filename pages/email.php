<html>
    <?php 
    require "db.php";
    $obj->is_logged_in();
    ?>
    <script src="swal_script.php"></script>
   <body>
      
      <?php
         ini_set("SMTP", "smtp.gmail.com");
         ini_set("sendmail_from", "aquib@geeksroot.com");
         ini_set("smtp_port", "587");
         ini_set("auth_username", "aquib@geeksroot.com");
         ini_set("auth_password", "************");


         $to = "bilalabro135@outlook.com";
         $subject = "This is subject";
         
         $message = "<b>This is HTML message.</b>";
         $message .= "<h1>This is headline.</h1>";
         
         $header = "from:aquib@geeksroot.com \r\n";
         
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail($to,$subject,$message,$header);
         
         if( $retval == true ) {?>
            <script>
                swal("Message sent successfully..!", {
                    icon:"success",
                  });
            </script>
         <?php
             
         }else {?>
            <script>
                swal("Message could not be sent..!", {
                    icon:"error",
                  });
            </script>
        <?php
         }
      ?>
      
        <a href="teacher.php" class="btn btn-primary" style="margin: 40px;">
            <i class="fa fa-angle-left" aria-hidden="true"></i>&nbsp;Go back
        </a>
      
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   </body>
</html>