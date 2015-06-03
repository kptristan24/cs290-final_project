<?php
	if(!isset($_SESSION)){
		session_start();
	}
	
	$conn = new mysqli("oniddb.cws.oregonstate.edu", "harit-db", "Z40YK7UbNXNGDFMx", "harit-db");
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>