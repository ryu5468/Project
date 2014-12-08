
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
  <?php
	session_start();
	$myUser = $_SESSION['name'];
	$ADMIN = "MISUKE_ADMIN";
	
	// Verify user logged in
	if($myUser == null )
	  {
		header('Location:index.html');
	  }
	  
	// Verify user logged in is an admin
	else if ($myUser != $ADMIN)
	  {
	    header('Location:index.html');
	  }	 	 
	?>
	
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
			  
            
            <input type="submit" class="btn btn-success" name="logout" value="Logout <?php echo $myUser; ?>">		
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
		
        <p class="lead blog-description">Welcome <?php echo $myUser; ?>.</p>
		
		<form action="apblogs.php" method="post">
		<input class="titlebox" placeholder="Title" rows="1" cols="1" name="blogTitle"></input></br>
		<textarea class="blogbox" placeholder="Blog Post" rows="12" cols="50" name="blogText" ></textarea></br>
		<input type="submit" class="btn btn-lg" value="Submit Post" name="postBlog">
	    <br></br>
		<br></br>
				
				
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <?php 
  $servername = "ps11.pstcc.edu";
  $username = "c2230a18";
  $password = "c2230a18";
  $dbname = "c2230a18proj";
  
  // Set default timezone
  date_default_timezone_set('US/Eastern');
  
  // Connect to database
  $conn = mysql_connect($servername, $username, $password) or die(mysql_error());
		mysql_select_db($dbname, $conn) or die(mysql_error());
			
      // Submit title and post made by user			
	  if (isset($_POST['postBlog']))
	    {
		  $title = $_POST["blogTitle"];
		  $date = date("m-d-Y h:i A");
		  $blogUser = $myUser;
	      $post = $_POST["blogText"];
		
		  // If not title is entered display alert message notifying user
		  if ($title == null)
		    {
			  echo "<script type='text/javascript'>alert('Please enter a title');</script>";
			}
			
	      // If blog post is empty display alert message notifying user
		  else if ($post == null)
		    {
			  echo "<script type='text/javascript'>alert('Blog post cannot be empty');</script>";
			}
			
		  else
		    {
			  $conn = mysql_connect($servername, $username, $password) or die(mysql_error());
			  mysql_select_db($dbname, $conn) or die(mysql_error());
	
			  // Create blog table if it doesn't exist
			  $sql = "CREATE TABLE IF NOT EXISTS blogs (title VARCHAR(9999), date VARCHAR (20), blogUser VARCHAR (20), posts VARCHAR (9999))";
			  mysql_query($sql, $conn) or die(mysql_error());
			
			  // Store information entered by the user
			  $nextsql = "INSERT INTO blogs (title, date, blogUser, posts) VALUES ('$title', '$date', '$blogUser', '$post')";
			  mysql_query($nextsql, $conn) or die(mysql_error());	
			}
	    }	
		// Allows admin to delete any post 
		if (isset($_POST['deletePost'])) 
	      {
		    $AdminDeleteQuery = "DELETE FROM blogs WHERE posts='$_POST[hidden]' AND blogUser!='$myUser'";
		    mysql_query($AdminDeleteQuery, $conn);	
	      };	
		  
		// Allows posts to be deleted by user
		if (isset($_POST['delete'])) 
	      {
		    // Post matches hidden field and username to prevent deleting other blogs which are identical to the one being deleted
		    $DeleteQuery = "DELETE FROM blogs WHERE posts='$_POST[hidden]' AND blogUser='$myUser'";
		    mysql_query($DeleteQuery, $conn);	
	      };	

		// Allows posts to be updated by the user
		if (isset($_POST['update'])) 
		  {
		    // Post matches hidden field and username to prevent updating other blogs which are identical to the one being updated
		    $UpdateQuery = "UPDATE blogs SET title='$_POST[blogTi]', posts='$_POST[blogPost]' WHERE posts='$_POST[hidden]' AND blogUser='$myUser'";
		    mysql_query($UpdateQuery, $conn);
		  };
			  
    // Retrieve all information from blogs table			  
	$sqlall = "SELECT * FROM blogs";
		
	$myData = mysql_query($sqlall, $conn);
	
	// Display data stored in blogs
	while ($record = mysql_fetch_array($myData)) 
	  {
		
		// Displays posts made by user with a delete and update button
		if ($myUser == $record['blogUser'])
		  {
		  //echo "<table>";
		  echo "<form action=apblogs.php method=post>";
		  echo "<tr>";
		  echo "<td>" . "<textarea class=titleboxx name=blogTi id=blogTi>" . $record['title'] . "</textarea>" . " </td>";
		  echo "<p>" . $record['date'] . " " . $record['blogUser'] . "</p>" . "<td>" . "</td>";		
		  echo "<td>" . "<textarea class=blogboxx name=blogPost id=blogPost>" . $record['posts'] . "</textarea>" . " </td>";
		  echo "<td>" . "<textarea style=display:none name=hidden>" . $record['posts'] . "</textarea>" . " </td>";
		  echo "<br>";
		  echo "<input type='submit' class='btn btn-lg pull-right' value='Delete Post' name='delete' >" . "<input type='submit' class='btn btn-lg pull-right' value='Update Post' name='update' >";	
		  echo "<br>";
		  echo "</br>";
		  echo "<hr>";
		  echo "</tr>";
		  echo "</form>";
		  //echo "</table>";
		  }
		  
		// Display other user posts and delete button for the admin to delete any post
		else
		  {
		  echo "<form action=apblogs.php method=post>";
		  echo "<h2 class='blog-post-title' name='blogTitle'>" . $record['title'] . "</h2>";
		  echo "<p>" . $record['date'] . " " . $record['blogUser'] . "</p>";		
		  echo "<p>" . $record['posts'] . "</p>";
		  echo "<tr><td>" . "<textarea style=display:none name=hidden>" . $record['posts'] . "</textarea>" . " </td></tr>";	  		  
		  echo "<input type='submit' class='btn btn-lg pull-right' value='Delete Post' name='deletePost' >";
		  echo "<br>";
		  echo "<br>";
		  echo "<hr>";
		  echo "</form>";
		  }		
	  } 
		
		// Logout and remove session
		if(isset($_POST['logout'])) 
		  {
			session_unset($myUser);
			header('Location:index.html');
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
