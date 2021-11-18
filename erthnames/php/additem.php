<?php
include("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	// get form value
	$brand = $_POST['brand'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	
	// query
	$sql = "INSERT INTO items (brand, description, price) values ('$brand','$description','$price');";
	
	// execute query
	if($conn->query($sql) === TRUE)
	{
		echo"<script>alert('Item Added!'); window.location='item.php';</script>";
	}else{
		echo"Error: " . $sql . "<br>" . $conn->error;
	}
}
?>