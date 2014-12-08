
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
  #this {
	background-color:black;
	color:blue;
	}
  </style>
  </head>

  <body>
  <?php
	session_start();
	// Set Username to display
	$myUser = $_SESSION['name'];
	$ADMIN = "MISUKE_ADMIN";
	// Checks for user logged in
	if($myUser == null )
	  {
		header('Location:index.html');
	  }
	// Verifies user is admin
	else if ($myUser != $ADMIN)
	  {
		header('Location:index.html');
	  }	 	 
	?>
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
			  
            
            <input type="submit" name="logout" class="btn btn-success" value="Logout <?php echo $myUser; ?>">
        
		  </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
	<div class="jumbotron" id="this">
	<h2 class="form-signin-heading" align="center">Please logout to register new user.</h2>
		</div>
        <div class="form" id="shape1">
    <div class="container">

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	
  </body>
    <footer>
	<a href="mailto:cmposton1@pstcc.edu">Chris Poston</a>
	</footer>
</html>
