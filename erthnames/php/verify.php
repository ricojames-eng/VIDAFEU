<?php
include("connection.php");
session_start();
$_SESSION['attempts'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	// username and password sent from form
	$myusername = $_POST['username'];
	$mypassword= $_POST['password'];
	
	$sql = "SELECT * FROM user where username='$myusername' and password='$mypassword'";
	$result = mysqli_query($conn, $sql);
	
	// if result matched $myusername and $mypassword
	if(mysqli_num_rows($result) >0)
	{
		 // If result matched $myusername and $mypassword
		$logged_in_user = mysqli_fetch_assoc($result);
		 if ($logged_in_user['userlevel'] == 'Administrator') {
			 $sqll = "SELECT * FROM user where username='$myusername' and password='$mypassword'";
			$resultt = mysqli_query($conn, $sqll);
			 if (mysqli_num_rows($resultt) > 0) {
			 	while($row=mysqli_fetch_array($resultt)){
					session_start();
					$_SESSION['activeuser']=$row['id'];
			 	}
			 }
			header("location: admin.php");
		} else if ($logged_in_user['userlevel'] == 'User') {
			
			
			$sqll = "SELECT * FROM user where username='$myusername' and password='$mypassword'";
			$resultt = mysqli_query($conn, $sqll);
			 if (mysqli_num_rows($resultt) > 0) {
			 	while($row=mysqli_fetch_array($resultt)){
					session_start();
					$_SESSION['activeuser']=$row['id'];
			 	}
			 }
			header("location: user.php");
		} 
		// If result didn't matched $myusername and $mypassword
	}else{
		
			if($_SESSION['attempts'] < 3){
				echo "<script>alert('Invalid Username and/or Password'); window.location = 'login.php';</script>";
				$_SESSION['attempts']+=1;
			}else{
				echo "<script>alert('redirecting to Registration'); window.location = 'registration.php';</script>";
				session_destroy();
			}
	}
	
}
?>