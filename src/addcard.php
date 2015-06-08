<?php include 'dbconn.php'; ?>
<?php if(!isset($_SESSION['username'])){
		echo '<script> window.location="createprofile.php"; </script>'; 
	
}
?>
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

    <title>View Collection!</title>

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
                    <li><a href="addcard.php">Add</a></li>
                    <li><a href="viewcollection.php">View</a></li>
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
				<li><a href="logout.php">Logout</a></li>
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
            <h1 class="cover-heading">Add a new card!</h1>
            <p class="lead">Fill out the form below to add a new card to YOUR collection</p>
			<p class="lead">Note! This will only add the card to your collection, it will not be available to others</p>
            <p class="lead">
			<script type="text/javascript" src="../../../libraries/jquery-2.1.4.min.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
              <form method="POST" action="addcard.php" enctype="multipart/form-data">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Card Name</span>
					<input type="text" name="card_name" class="form-control" placeholder="Fireball, Armorsmith...." aria-describedby="basic-addon1"><br>
				</div>
				<br><br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Class</span>
					<input type="text" name="class" class="form-control" placeholder="Mage, Warrior, Hunter..." aria-describedby="basic-addon1"><br>
				</div>
				<br><br>
				<span class="btn btn-default btn-file">
					Upload Card Image<input type="file" name="filename">
				</span>
				<br><br>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
			</p>
          </div>
		  
		    <div class="mastfoot">
            <div class="inner">
              <p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
			  
            </div>
          </div>
        </div>
		<?php
			if(isset($_POST['card_name'])){
				$name = $_POST['card_name'];
				$class = $_POST['class'];
				$image = $HTTP_POST_FILES['filename']['name'];
				
				$sql = "SELECT * FROM user WHERE username='". $_SESSION['username'] ."';";
				$result = $conn->query($sql);
				while($row = mysqli_fetch_array($result)) {
					$uid = $row['id'];	
				}
				
				$sql = "INSERT INTO Cards (uid, name, class, card_image) VALUES ('". $uid ."', '". $name ."', '". $class ."', '". $image ."')";
				$conn->query($sql);
				$folder = "uploading/";
				move_uploaded_file($HTTP_POST_FILES['filename']['tmp_name'], $folder.$HTTP_POST_FILES['filename']['name']);
				
				echo 'Successfully Added teh card!';
			}
		?>
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
