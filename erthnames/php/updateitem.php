<?php
	include("connection.php");
	

		// get form value
		$id = $_POST['id'];
		$brand = $_POST['brand'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		
		// query
		$sql = "UPDATE items SET brand='$brand' , description='$description' , price='$price' WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
			 if ($conn->query($sql) === TRUE) {
				 	echo "<script>alert('Updating!'); window.location = 'item.php';</script>";
			 }else{
				echo "Error: " . $sql . "<br>" . $conn->error;
			 }
?>