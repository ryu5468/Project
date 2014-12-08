
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
    <link href="cover.css" rel="stylesheet">

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
  h1, h2, h3, li, p{
  color:white;
  text-align:center;
  }
  </style>
  </head>

  <body>
  <?php
  session_start();
  $myUser = $_SESSION['name'];
  
    // Verify user is logged in
	if($myUser == null)
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
			<a class="navbar-brand" href="index.php">Home</a>
			<a class="navbar-brand" href="pblogs.php">Blogs</a>
			<a class="navbar-brand" href="cregistration.php">Register</a>
			<a class="navbar-brand" href="psupport.php">Support</a>
        </div>
		
        <div id="navbar" class="navbar-collapse collapse">
		
          <form action="logout.php" method="post" class="navbar-form navbar-right" role="form" >		            			
              <input type="userName" name="loginName" placeholder="Username" class="form-control" disabled>
                       
              <input type="password" name="password" placeholder="Password" class="form-control" disabled>
			  
            
            <input type="submit" class="btn btn-success" name="logout" value="Logout <?php echo $myUser; ?>">		
		  </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
		<form action="psupport.php" method="post"> <form class="form-signin" role="form">       

<a href="index.html"> <input type="submit" name="logout" class="btn btn-lg" value="Logout <?php echo $myUser; ?>"></a>
<?php
		// Remove session on user logout
		if(isset($_POST['logout'])) 
		  {
			session_unset($myUser);
			header('Location:registration.php');
		  }		
?>
    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="inner cover">
            <h1 class="cover-heading">Support</h1>
            <p class="lead">If you have any questions or concerns, you can mail me in game to my character,<br>
			Misuke Takamachi.  Or you can click below to send me an email outside of the game.</p>
            <p class="lead">
              <a href="mailto:cmposton1@pstcc.edu" class="btn btn-lg btn-default">Chris Poston</a></a>
            </p>
          </div>

          <div class="mastfoot">
            <a href="mailto:cmposton1@pstcc.edu">Chris Poston</a>.
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
