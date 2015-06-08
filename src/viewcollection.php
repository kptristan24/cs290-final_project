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
					echo '<li><a href="#">'. $_SESSION['username'] .'</a></li>';
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
            <h1 class="cover-heading">Your collection</h1>
            <p class="lead">This is a list of the cards you've added. Neato! Click on the image name to see it.</p>
		  
		    <div class="mastfoot">
            <div class="inner">
              <p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
			  
            </div>
			
			
          </div>
	  
        </div>

      </div>
<?php
		
		$sql = "SELECT * FROM user WHERE username='". $_SESSION['username'] ."';";
		$result = $conn->query($sql);
		while($row = mysqli_fetch_array($result)) {
			$uid = $row['id'];	
		}
		
		$sql = "SELECT * FROM Cards where uid='". $uid ."';";
		
		$result = $conn->query($sql);

echo "<div class='container-fluid'>
			<table class='table table-striped'>
				<thead>
					<tr>
						<th>Card Name</th>
						<th>Class</th>
						<th>Image</th>
					</tr>
				</thead>";
$count = 0;
while($row = mysqli_fetch_array($result)) {
	$count++;
	echo "<tr>";
	if(!($count % 2 == 0)){
			echo "<td><font color='black'>" . $row['name'] . "</td>";
			echo "<td><font color='black'>" . $row['class'] . "</td>";
			echo "<td><font color='black'><a href='showimg.php?file=". $row['card_image'] ."'>" . $row['card_image'] . "</td>";
			echo "</tr>";
	}
	else{
		$url = "uploading/". $row['card_image'];
		echo "<td><font color='white'>" . $row['name'] . "</td>";
		echo "<td><font color='white'>" . $row['class'] . "</td>";
		echo "<td><font color='white'><a href='". $url ."'>" . $row['card_image'] . "</a></td>";
		echo "</tr>";
	}
}
echo "</tbody></table></div>";
	  ?>
	  
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
