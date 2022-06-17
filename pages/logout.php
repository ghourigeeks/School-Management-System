<?php

	require ("db.php");


	// // Create a session variable called something like this after you start the session:
	// $_SESSION['users'] = time();

	// // Then when they get to submitting the payment, just check whether they're within the 5 minute window
	// if (time() - $_SESSION['users'] < 300) { // 300 seconds = 5 minutes
	// // they're within the 5 minutes so save the details to the database
	// } else {
	// // sorry, you're out of time
	// $obj->logout() 
	// }
 
	$_SESSION = array();
	if (ini_get("session.use_cookies")) {
	  $params = session_get_cookie_params();
	  setcookie(session_name(), '', time() - 42000,
	  $params["path"], $params["domain"],
	  $params["secure"], $params["httponly"]
	);
   }
  // Finally, destroy the session.
  $obj->logout();

 ?>
