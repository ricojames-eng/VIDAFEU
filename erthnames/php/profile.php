<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/d1341f9b7a.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="utf-8">
</head>
<body>
<header>
</header>

<div class="navbar">
	       
<?php
session_start();
include("connection.php");
$userid=$_SESSION['activeuser'];

// get the details
$sql="SELECT * FROM user where id='$userid'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
			 	while($row=mysqli_fetch_array($result)){
					$id=$row['id'];
					$info1=$row['username'];
			 		$info2=$row['password'];
			 		$info3=$row['fullname'];
			 		$info4=$row['address'];
					$info5=$row['gender'];
			 		$info6=$row['civilstatus'];
			 		$info7=$row['birthdate'];
					$info8=$row['contact'];		

// get path picture
$sqll="SELECT * FROM tbl_picture where userid='$id'";
$resultt = mysqli_query($conn, $sqll);
if (mysqli_num_rows($resultt) > 0) {
			 	while($row1=mysqli_fetch_array($resultt)){
					$info11=$row1['id'];
			 		$info22=$row1['userid'];
			 		
			 	}
			 }			 					
			 	}
			 }
			 

?>

   <div class="dropdown2">
   <div class="hide">
<i class="fa fa-bars" aria-hidden="true"></i>Menu



</div>
   
    <div class="dropdown2-content">
      <a href="user.php">Home</a>
  <a href="about.php"  >About</a>
  <a href="cart.php" >Manage Cart</a>

 
     
    </div>
  </div>
  <a href="user.php">Home</a>
  <a href="about.php"  >About</a>
   

  <a href="cart.php" >Manage Cart</a>

  <script type="text/javascript">
function logout(){
if(confirm("Are you sure you want to logout?")==true)
{
window.location.assign("login.php")
}else if (confirm == false){
	window.location.assign("user.php");
}
}
</script>

  
  
<img id="icon" src="../images/prof.png">
   <div class="dropdown">
    <button class="dropbtn">Hi, <?php echo"".$info3?> 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="updateuserprofile.php">Edit Profile</a>
      <a href="profile.php">View Profile</a>
	  <a onclick="logout()">Log Out</a>
     
    </div>
  </div> 

</div>
<?php

include("connection.php");
$userid=$_SESSION['activeuser'];

// get the details
$sql="SELECT * FROM user where id='$userid'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
			 	while($row=mysqli_fetch_array($result)){
					$id=$row['id'];
					$info1=$row['username'];
			 		$info2=$row['password'];
			 		$info3=$row['fullname'];
			 		$info4=$row['address'];
					$info5=$row['gender'];
			 		$info6=$row['civilstatus'];
			 		$info7=$row['birthdate'];
					$info8=$row['contact'];		

// get path picture
$sqll="SELECT * FROM tbl_picture where userid='$id'";
$resultt = mysqli_query($conn, $sqll);
if (mysqli_num_rows($resultt) > 0) {
			 	while($row1=mysqli_fetch_array($resultt)){
					$info11=$row1['id'];
			 		$info22=$row1['userid'];
			 	
			 	}
			 }			 					
			 	}
			 }
			 

?>
<br>
<br>
  <div class="card">
	<div class="imag3">
	<img src="../images/user.png" alt="" >
	</div>
	<br>
<label class="lbl">Fullname:</label>&nbsp <?php echo"".$info3 ?><br><br>
<label class="lbl">Address:</label>&nbsp <?php echo"".$info4 ?><br><br>
<label class="lbl">Contact No.:</label>&nbsp <?php echo"".$info8 ?><br><br>
<label class="lbl">Gender:</label>&nbsp <?php echo"".$info5 ?><br><br>
<label class="lbl">Civil Status:</label>&nbsp <?php echo"".$info6 ?><br><br>
<label class="lbl">Birthdate:</label>&nbsp <?php echo"".$info7 ?>
</div>


</body>
</html>
