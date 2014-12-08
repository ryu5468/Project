<?php
session_start();

$servername = "ps11.pstcc.edu";
$username = "c2230a18";
$password = "c2230a18";
$dbname = "c2230a18proj";

// Uppercases user login name for display on logged in pages
$userLogin = strtoupper($_GET["loginName"]);
$userPassword = $_GET["password"];

// Sets the admin user name
$ADMIN = "MISUKE_ADMIN";

// Sets session variable for username
$_SESSION['name'] = $userLogin;

$myPass = " ";
$error = "";

// Connect to database
$conn = mysql_connect($servername, $username, $password) or die(mysql_error());
mysql_select_db($dbname, $conn) or die(mysql_error());

// Get password from username
$result = mysql_query("SELECT password FROM users WHERE userName = '$userLogin'");
$numRows = mysql_num_rows($result);
$row=mysql_fetch_row($result);
$myPass = $row[0];
   
// If username doesn't exist notify user
  if ($numRows == 0) 
    {
	  header('Location:Iindex.html');
    } 
  else 
    {	
	// If login is valid and is admin redirects to admin pages
	  if (($userPassword == $myPass) && ($userLogin == $ADMIN))
	    {
		  header('Location:aindex.php');
		}
		
    // If non admin user redirect to logged in blog page
	  else if ($userPassword == $myPass) 
		{		 
		  header('Location:pblogs.php');
		}
		
	// If invalid login information notify user
	  else
	    {
		  header('Location:Iindex.html');
		} 
	}

?>