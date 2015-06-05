<?php include 'dbconn.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Create Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="../../../libraries/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="../../../libraries/bootstrap-3.3.4-dist/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">HCC App</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My Collection <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Add</a></li>
                    <li><a href="viewcollection.php">View</a></li>
                    <li><a href="#">Something else here</a></li>
                  </ul>
                </li>
              </ul>
			  <ul class="nav navbar-nav navbar-right">
			<?php
				if(!isset($_SESSION['username'])){
					echo '<li><a href="createprofile.php">Create Profile</a></li>';
				}else{
					echo '<li><a href="reddit.com">'. $_SESSION['username'] .'</a></li>';
				}
				
			?>
				</ul>
            </div>
          </div>
        </nav>

      </div>
    </div>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="inner cover">
            <h1 class="cover-heading">Login to Hearthstone Collection App</h1>
            <p class="lead">Fill out the form below to login and access your collection!</p>
            <p class="lead">
			<script type="text/javascript" src="../../../libraries/jquery-2.1.4.min.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
              <form method="POST" action="login.php">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">User Name</span>
					<script type="text/javascript" src="../js/check_user.js"></script>
					<input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="basic-addon1"><br>
					<div id="status"></div>
				</div>
				<br><br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Password</span>
					<input type="password" name="password" class="form-control" placeholder="*******" aria-describedby="basic-addon1">
				</div>
				<br>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
			</p>
          </div>
		  
		  <?php
			if(isset($_POST['username'])){
				
				$username = $_POST['username'];
				$password = $_POST['password'];
				
				//Double check if names in DB
				$result = $conn->query("SELECT * FROM user WHERE username='". $username ."'; ");
				$count = 0;
				while($row = mysqli_fetch_array($result)) {
					if($row['username'] == $username && $row['password'] == $password){
						$_SESSION['username'] = $username;
						echo 'Successfully logged in!';	
						$count = 1;
					}
					else{
						echo 'We messed something up... Try again!';
					}
				}
				if($count == 0){
					echo 'User name or password not found! Try again.';
				}
			}
		  ?>
		  
		  

          <div class="mastfoot">
            <div class="inner">
              <p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../../libraries/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
</html>
