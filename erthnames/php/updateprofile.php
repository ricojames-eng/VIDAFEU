<?php
	include("connection.php");
	

		// get form value
	$id=$_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$fullname = $_POST['fullname'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$gender = $_POST['gender'];
	$civilstatus = $_POST['civilstatus'];
	$birthdate = $_POST['birthdate'];
		
		// query
		$sql = "UPDATE user SET username='$username' , password='$password' , fullname='$fullname',address='$address' ,
		contact='$contact' , gender='$gender' ,	civilstatus='$civilstatus' , birthdate='$birthdate'	WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
			 if ($conn->query($sql) === TRUE) {
				 	echo "<script>alert('Updating!'); window.location = 'profile.php';</script>";
			 }else{
				echo "Error: " . $sql . "<br>" . $conn->error;
			 }
?>