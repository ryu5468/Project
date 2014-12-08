<?php
  session_start();

    // Verify user logged in
	if ($_SESSION['name'] != null) 
	  {
		$myUser = $_SESSION['name'];
	  }
	else
		$myUser = " ";
		
		// Removes user session on logout
		if(isset($_POST['logout'])) 
		  {
			session_unset($myUser);
			header('Location:index.html');
		  }		
  
  ?>