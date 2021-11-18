<?php
include("connection.php");
session_start();
$userid=$_SESSION['activeuser'];
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	// get form value
	$id = $_POST['id'];
	
	//	select item
	$sql = "SELECT * FROM items where id='$id'";
	$result = mysqli_query($conn, $sql);
	
	//if item found
	if (mysqli_num_rows($result) > 0) {
			 	while($row=mysqli_fetch_array($result)){
				$itemid=$row['id'];
				$brand=$row['brand'];
				$description=$row['description'];
				$price=$row['price'];
				$picture=$row['picture'];
				}
			 }else{
				 echo "<script>alert('No Item Found!'); window.location = 'user.php';</script>";
			 }
	
	// insert to cart
	
	$sql = "INSERT INTO tbl_cart (itemid,brand,description,price,picture,customerid) values ('$itemid','$brand','$description','$price','$picture','$userid');";
	
	// execute query
	if($conn->query($sql) === TRUE)
	{
		echo"<script>alert('Added to Cart'); window.location='user.php';</script>";
	}else{
		echo"Error: " . $sql . "<br>" . $conn->error;
	}
}
?>