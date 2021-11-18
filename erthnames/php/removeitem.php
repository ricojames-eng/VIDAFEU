<?php
include("connection.php");
$id=$_GET['id'];
$sql = "DELETE FROM items WHERE id='$id'"; 
$result = mysqli_query($conn, $sql);
			 if ($conn->query($sql) === TRUE) {
				 	echo "<script>alert('Deleting!'); window.location = 'item.php';</script>";
			 }else{
				 echo "<script>alert('Error!'); window.location = 'item.php';</script>";
			 }
?>