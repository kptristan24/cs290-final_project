<?php

//echo ''. $_POST["username"]. '';
	
	$conn = new mysqli("oniddb.cws.oregonstate.edu", "harit-db", "Z40YK7UbNXNGDFMx", "harit-db");
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}



if(isset($_POST['username'])){
	$username = $_POST['username'];

	echo $username;
	
	$sql = "SELECT * FROM user WHERE username='". $username ."';";

	if($username != ''){
		$result = $conn->query($sql);
		//echo '<br>'. $sql;
		$count = 0;
		$count = $result->num_rows;
		//echo $count;
		if($count == 0){
			echo "<br>Username Availble";
		}
		else{
			echo "<br>Sorry, Name is taken.";
		}
	}
}

?>


