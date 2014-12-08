
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
    <link href="blog.css" rel="stylesheet">

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
  
  p{
	font-size: 115%;
  }
  h1, h2, h3, li, p{
  color:white;
  }
  textarea {
  resize:none;
  }
  
  </style>
  </head>

  <body>
  

    <div class="blog-masthead">
      <div class="container">
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
			<a class="navbar-brand" href="index.html" color="blue">Home</a>
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
      </div>
    </div>

    <div class="container">
		

      <div class="blog-header">
	  <br></br>
        <h1 class="blog-title">VERSA Blogging</h1>
		
        <p class="lead blog-description">Welcome To The VERSA Blog Page.  If you'd<br>
		like to make a post, please register or login.</p>
		
												
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <?php $servername = "ps11.pstcc.edu";
			

			$username = "c2230a18";
			$password = "c2230a18";
			$dbname = "c2230a18proj";
  
			// Set default timezone
			date_default_timezone_set('US/Eastern');
  	
		// Set date format
		$date = date("m-d-Y h:i A");

		// Connect to database
		$conn = mysql_connect($servername, $username, $password) or die(mysql_error());
		mysql_select_db($dbname, $conn) or die(mysql_error());
	
		// Creates blog table if it's not already created
		$sql = "CREATE TABLE IF NOT EXISTS blogs (title VARCHAR(9999), date VARCHAR (20), blogUser VARCHAR (20), posts VARCHAR (9999))";
		mysql_query($sql, $conn) or die(mysql_error());
				
		// Retrieve all data from blogs table		
		$sqlall = "SELECT * FROM blogs";
		
		// Displays blog posts for non registered users
		$myData = mysql_query($sqlall, $conn);
		while ($record = mysql_fetch_array($myData)) {
		echo "<form action=pblogs.php method=post>";
		echo "<h2 class='blog-post-title'>" . $record['title'] . "</h2>";
		echo "<p>" . $record['date'] . " " . $record['blogUser'] . "</p>";
		echo "<p>" . $record['posts'] . "</p>";
		echo "<hr>";
		echo "</form>";
		}
					
	  
		?>
            
          </div><!-- /.blog-post -->

          

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">

      </div><!-- /.row -->

    </div><!-- /.container -->

    <div class="blog-footer">
      <p><a href="mailto:cmposton1@pstcc.edu">Chris Poston</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
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
