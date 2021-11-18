<html>
<head>
<title>Update</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
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
  <a href="admin.php">Home</a>

    
   <a href="customer.php">Customer's Profile</a>
 <a href="item.php">Items</a>
  <a href="orders.php" >View Orders</a>

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
      <a href="admineditprofile.php">Edit Profile</a>
      <a href="adminprofile.php">View Profile</a>
	  <a onclick="logout()">Log Out</a>
     
    </div>
  </div> 
  
 
</div>
<br>
<br>
<div class="editbox">

<div class="box">
<!-- edit user -->
<?php
include("connection.php");

$userid=$_SESSION['activeuser'];

		$sql = "SELECT * FROM user where id='$userid'";
			$result = mysqli_query($conn, $sql);
			 if (mysqli_num_rows($result) > 0) {
			 	while($row=mysqli_fetch_array($result)){
				$id=$row['id'];
				$username=$row['username'];
				$password=$row['password'];
				$fullname=$row['fullname'];
				$address=$row['address'];
				$contact=$row['contact'];
				$gender=$row['gender'];
				$civilstatus=$row['civilstatus'];
				$birthdate=$row['birthdate'];
				
				}
			 }else{
				 echo "<script>alert('No Connection!'); window.location = 'admin.php';</script>";
			 }
			 
			 
			 
?>
<form action="adminprofileupdate.php" method="POST">
<div class="card22">
	
<h1>Update Profile</h1>

	<br>
		<?php echo "<input class='tbox' type='hidden' name='id' value='$id' />"?>
		<label>Username: </label><?php  echo "<input class='tbox' type='text' name='username' value='$username' />"?><br><br>
		<label>Password: </label>&nbsp<?php echo "<input class='tbox' type='text' name='password' value='$password' />"?><br><br>
		<label>Fullname: </label>&nbsp <?php echo "<input class='tbox' type='text' name='fullname' value='$fullname' />"?><br><br> 
		<label>Address: </label>&nbsp&nbsp&nbsp<?php echo "<input class='tbox' type='text' name='address' value='$address' />"?><br><br>
		<label>Contact No.: </label><?php echo "<input class='tbox' type='text' name='contact' value='$contact' />"?><br><br>
		<label>Gender:</label> <?php if($gender == 'Male'){ ?> Male<input type="radio" name="gender" value="Male" checked>Female <input type="radio" name="gender" value="Female"><?php }else{ ?> Male<input type="radio" name="gender" value="Male" checked> Female <input type="radio" name="gender" value="Female" checked> <?php } ?><br><br>
		<label>Civil Status:<select name="civilstatus">
			<option><?php echo"".$civilstatus ?></option>
			<option>Single</option>
			<option>Married</option>
			<option>Widowed</option>
			</select></label><br><br>
		<label>Birthdate: </label><?php echo "<input class='tbox' type='date' name='birthdate' value='$birthdate' />"?><br><br>
		<input class="btn" type="submit" value="Update">&nbsp <a href="adminprofile.php"> <input class='btn' type="button" value = "Cancel"></a>
</div>
		</form>
</div>
</div>
</body>
</html>