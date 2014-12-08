
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ADMIN</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>
 body {
  background: url('ffxiv_12012014_223441.png') no-repeat center center fixed;
  background-color:black;  
  }
  p{
  color:white;
  }
  
  input{
  color:black;
  }
  #this, h2, th {
	background-color:black;
	color:blue;
	}
  
  </style>

  <body>

    <<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
			<a class="navbar-brand" href="#">VERSA Blog</a>
			<a class="navbar-brand" href="aindex.php">Home</a>
			<a class="navbar-brand" href="apblogs.php">Blogs</a>
			<a class="navbar-brand" href="acregistration.php">Register</a>
			<a class="navbar-brand" href="apsupport.php">Support</a>
			<a class="navbar-brand" href="admin.php">ADMIN</a>

        </div>
		
        <div id="navbar" class="navbar-collapse collapse">
		
          <form action="logout.php" method="post" class="navbar-form navbar-right" role="form" >		            			
              <input type="userName" name="loginName" placeholder="Username" class="form-control" disabled>
                       
              <input type="password" name="password" placeholder="Password" class="form-control" disabled>
			  <?php
				session_start();
				$myUser = $_SESSION['name'];
				$ADMIN = "MISUKE_ADMIN";
				// Verifies user is logged in
				if($myUser == null )
				  {
					header('Location:index.html');
				  }
				// Verifies User logged in is Admin
				else if ($myUser != $ADMIN)
				  {
					header('Location:index.html');
				  }	 	 
				?>
            
            <input type="submit" class="btn btn-success" name="logout" value="Logout <?php echo $myUser; ?>">		
		  </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
<div  id="this">
<br>
        <h2 class="form-signin-heading" align="center">ADMIN Add/Edit Users</h2>
</br>
	</div>
    <div class="container">
     
	<form action="admin.php" method="post">
	<p>Username: <input type="text" name="userName"><br /></p>
	<p>Password: <input type="password" name="password"><br /></p>
	<p>Email: <input type="email" name="email"><br /></p>
	<input type="submit" name="submit">
	
</form>
<br />
<?php  
$servername = "ps11.pstcc.edu";
$username = "c2230a18";
$password = "c2230a18";
$dbname = "c2230a18proj";

// Connect to database
$conn = mysql_connect($servername, $username, $password) or die(mysql_error()); 
mysql_select_db($dbname, $conn) or die(mysql_error()); 
if (isset($_POST['update'])) {

// Allows admin to update registered users info
$UpdateQuery = "UPDATE users SET userName='$_POST[username]', password='$_POST[password]', email='$_POST[email]' WHERE userName='$_POST[hidden]'";
mysql_query($UpdateQuery, $conn);
};

// Allows admin to delete registered users from database
if (isset($_POST['delete'])) {

$DeleteQuery = "DELETE FROM users WHERE userName='$_POST[hidden]'";
mysql_query($DeleteQuery, $conn);
};

// Admin can create new users
if (isset($_POST['submit'])){
$nextsql = "INSERT INTO users (userName, password, email) VALUES ('$_POST[userName]','$_POST[password]','$_POST[email]')";
mysql_query($nextsql, $conn);
}
$sqlall = "SELECT * FROM users";

// Data to be added by admin to database
echo "<table border =1>
<tr>
<th>Username</th>
<th>Password</th>
<th>Email</th>
</tr>";




// Creates forms for each user info in database and displays it
$myData = mysql_query($sqlall, $conn);
while ($record = mysql_fetch_array($myData)) {
echo "<form action=admin.php method=post>";
echo "<tr>";
echo "<td>" . "<input type=text name=username value=" . $record['userName'] . " </td>";
echo "<td>" . "<input type=text name=password value=" . $record['password'] . " </td>";
echo "<td>" . "<input type=text name=email value=" . $record['email'] . " </td>";
echo "<td>" . "<input type=hidden name=hidden value=" . $record['userName'] . " </td>";
echo "<td>" . "<input type=submit name=update value=update" . " </td>";
echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
echo "</tr>";
echo "</form>";
}
echo "</table>";
// Close database connection
mysql_close($conn);

?>

    </div><!-- /.container -->

	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
