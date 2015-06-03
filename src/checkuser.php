<?php

echo 'shitfuck';
echo ''. $_POST["username"]. '';
	
	$conn = new mysqli("oniddb.cws.oregonstate.edu", "harit-db", "Z40YK7UbNXNGDFMx", "harit-db");
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}



if(isset($_POST['username'])){
	$username = $_POST['username'];
	echo '<br>|<br>';
	echo $username;
	echo '<br>|<br>';
	if($username != ''){
		$result = $conn->query("SELECT * FROM user WHERE username='". $username ."';");
		$count = 0;
		foreach($result as $rows){
			$count++;
		}
		echo $count;
		if($count == 0){
			echo "Username Availble";
		}
		else{
			echo "Sorry, Name is taken.";
		}
	}
}

?>


