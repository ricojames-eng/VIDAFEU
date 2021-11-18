<?php
include("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	// get form value
	$username = $_POST['username'];
	$password = $_POST['password'];
	$fullname = $_POST['fullname'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$gender = $_POST['gender'];
	$civilstatus = $_POST['civilstatus'];
	$birthdate = $_POST['birthdate'];
	$userlevel = 'User';
	
	// query
	$sql = "INSERT INTO user (username,password, fullname, address, contact, gender, civilstatus, birthdate, userlevel) values ('$username','$password','$fullname','$address','$contact','$gender','$civilstatus','$birthdate','$userlevel');";
	
	// execute query
	if($conn->query($sql) === TRUE)
	{
		echo"<script>alert('Registered!'); window.location='login.php';</script>";
	}else{
		echo"Error: " . $sql . "<br>" . $conn->error;
	}
}
?>