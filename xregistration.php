
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>VERSA Free Company Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/bootstrap.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
  body {
  background: url('ffxiv_09072014_192235.png') no-repeat center center fixed;  
  background-color:black;
  }
  h2{
  color:Blue;
  }
  p {
		color: red;
	}
	#this {
	background-color:black;
	color:blue;
	}
  </style>
  </head>

  <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
       <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
			<a class="navbar-brand" href="#">VERSA Blog</a>
			<a class="navbar-brand" href="index.html">Home</a>
			<a class="navbar-brand" href="blogs.php">Blogs</a>
			<a class="navbar-brand" href="registration.php">Register</a>
			<a class="navbar-brand" href="support.html">Support</a>
        </div>
		<div id="navbar" class="navbar-collapse collapse">
		
          <form action="ajaxLogin.php" method="get" class="navbar-form navbar-right" role="form" >		            			
              <input type="userName" name="loginName" placeholder="Username" class="form-control">
                       
              <input type="password" name="password" placeholder="Password" class="form-control">
			  
            
            <input type="submit" class="btn btn-success" value="Sign in">
			<a href="registration.php"> <input class="btn btn-success" type="button" value="Register New User"/></a>
        
		  </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
	<div class="jumbotron" id="this">
	<h2 class="form-signin-heading" align="center">Please register. Password must be between 8 and 12 characters in length.</h2>
		</div>
        <div class="form" id="shape1">
    <div class="container">
<form action="registration.php" method="post">
      <form class="form-signin" role="form">

		<p>Passwords don't match. Please Try again</p>
		<input type="username" class="form-control" style="width:255px" placeholder="Username" name="userName" required autofocus>
        <input type="password" class="form-control" maxlength="12" style="width:255px" placeholder="Password" name="password" required>
        <input type="password" class="form-control" maxlength="12" style="width:255px" placeholder="Repeat password" name="verPass" required>
		<input type="email" class="form-control" maxlength="20" style="width:255px" placeholder="Enter email address" name="email" required>		
        <button class="btn btn-lg btn-primary" type="submit" name="register">Register</button>
		<a href="index.html"> <input type="button" class="btn btn-lg" value="Return to login"></a>
      </form>
<?php
$servername = "ps11.pstcc.edu";
$username = "c2230a18";
$password = "c2230a18";
$dbname = "c2230a18proj";

if (isset($_POST['register']))
  {
	$newUserName = $_POST["userName"];
	$newPassword = $_POST["password"];
	$verPassword = $_POST["verPass"];

	// Connect to databse
	$conn = mysql_connect($servername, $username, $password) or die(mysql_error());
	mysql_select_db($dbname, $conn) or die(mysql_error());
	
	// Create table users if not already existing
	$sql = "CREATE TABLE IF NOT EXISTS users (userName VARCHAR(30), password VARCHAR(15), email VARCHAR(20))";
	mysql_query($sql, $conn);
	
	// Check desired username for one that already exists
	$check = mysql_query("SELECT userName FROM users WHERE userName = '$newUserName'");
	$numRows = mysql_num_rows($check);
	$row = mysql_fetch_row($check);
	$data = $row[0];
	
    // Notify username taken and password too short
	if (($numRows > 0) && (strlen($newPassword) < 8)) 
	  {
	    header('Location:siregistration.php');
	  }
	  
	 // Notify password too short
	 else if (strlen($newPassword) < 8) 
	  {
		header('Location:sregistration.php');
	  }
	  
	// Notify username exists and passwords don't match
    else if (($numRows > 0) && ($newPassword != $verPassword))
	  {
	  	header('Location:iregistration.php');
	  }
	  
	// Notify username exists
	else if($numRows > 0) 
	  {
		header('Location:pregistration.php');
	  }
	  
	// Notify passwords don't match
	else if ($newPassword != $verPassword)
	  {
		header('Location:xregistration.php');
      }	
	  
	else
	  {
	    // Insert user info in users table
	    $nextsql = "INSERT INTO users (userName, password, email) VALUES ('$newUserName','$newPassword', '$email')";
	    mysql_query($nextsql, $conn);
	    header('Location:index.html');
	  }
  }
  
?>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	
  </body>
    <footer>
	<a href="mailto:cmposton1@pstcc.edu">Chris Poston</a>.
	</footer>
</html>
