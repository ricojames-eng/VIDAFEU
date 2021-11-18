<?php
include("connection.php");
session_start();
$user=$_SESSION['activeuser'];
				
				
if($_SERVER["REQUEST_METHOD"] <> "POST")
{
	
	//	select item
	$sql = "SELECT * FROM tbl_cart where customerid='$user'";
	$result = mysqli_query($conn, $sql);
	
	//if item found
	if (mysqli_num_rows($result) > 0) {
			 	while($row=mysqli_fetch_array($result)){
				$cartid=$row['id'];
				
				// send order
					$sql = "INSERT INTO tbl_order (cartid) values ('$cartid');";
	
				// execute query
					if($conn->query($sql) === TRUE)
						{
							echo"<script>alert('Order Sent!'); window.location='cart.php';</script>";
						}else{
							echo"Error: " . $sql . "<br>" . $conn->error;
						}
	
	
				}
			 }else{
				 echo "<script>alert('No Item Found!'); window.location = 'user.php';</script>";
			 }
	
	
}
?>