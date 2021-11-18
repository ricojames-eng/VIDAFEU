<?php
	// server configuration
	
	$dbservername="localhost";
	$dbusername="root";
	$dbpassword= "";
	$dbname="team_erthanmes";
	
	// creater connection
	$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
	
	// check connection
	if($conn->connect_error)
	{
		die("Connect Failed: " . $conn->connect_error);
	}
?>