<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/d1341f9b7a.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="utf-8">
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
<br><br>

<form action="adminregistration.php" method="POST">
<div class="card3">
<h2>Add User</h2>
<input  type="text" placeholder="Username" name="username" required/><br><br>
<input  type="password" placeholder="Password" name="password" required/><br><br>
<input  type="text" placeholder="Fullname" name="fullname" required/><br><br>
<input  type="text" placeholder="Address" name="address" required/><br><br>
<input  placeholder="Contact No." type="text" name="contact" required/><br><br>
<label class="stat">Gender: </label><input type="radio"  name="gender" value="Male" required/> Male <input type="radio" name="gender" value="Female" required/> Female <br><br>
<label class="stat">Civil Status: </label> <select  name="civilstatus" class="slct" required/>
<option></option>
<option>Single</option>
<option>Married</option>
<option>Widowed</option>
</select><br><br>
<label>User Level: </label> <select  name="userlevel"  required/>
<option></option>
<option>Administrator</option>
<option>User</option>
</select><br><br>
<label class="stat">Birthdate: </label><input name="birthdate" class="bd" type="date" required/><br><br>
<input class="btn2" type="submit" name="" value="Register">
</div>
</form>
<div class="list">
<h2>List of Users</h2>
<form action="customer.php" method="POST">
<input type="text" name="search" placeholder="Search Customer"/> &nbsp <input type="submit" value="Search"/>
</form><br><br>
<table width="100%" border= "1" >
	<tr>
			<th>Fullname</th>
			<th>Address</th>
			<th>Contact No.</th>
			<th>Gender</th>
			<th>Civil Status</th>
			<th>Birthdate</th>
			<th>Userlevel</th>
	</tr>
	</div>
<?php
	include("connection.php");
		
		
		// view the data on the table
		if($_SERVER["REQUEST_METHOD"] <> "POST") {
		$sql = "SELECT * FROM user";
			$result = mysqli_query($conn, $sql);
			 if (mysqli_num_rows($result) > 0) {
			 	while($row=mysqli_fetch_array($result)){
				$row['fullname'];
				$row['address'];
				$row['contact'];
				$row['gender'];
				$row['civilstatus'];
				$row['birthdate'];
				$row['userlevel'];
			 	echo "<tr>";
				echo"<td>" .$row['fullname']. "</td>";
				echo"<td>" .$row['address']. "</td>";
				echo"<td>" .$row['contact']. "</td>";
				echo"<td>" .$row['gender']. "</td>";
				echo"<td>" .$row['civilstatus']. "</td>";
				echo"<td>" .$row['birthdate']. "</td>";
				echo"<td>" .$row['userlevel']. "</td>";
				
				echo "</tr>";	
			 	}
			 }
		}else if($_SERVER["REQUEST_METHOD"] == "POST") {

			
			
			$search= $_POST['search']; 
		  		
			$sql = "SELECT * FROM user WHERE CONCAT(`fullname`, `address`, `contact`,`civilstatus`,`gender`, `birthdate`, `civilstatus`)  like '%$search%'";
			$result = mysqli_query($conn, $sql);

			 // display the data 
			 if (mysqli_num_rows($result) > 0) {
			 	while($row=mysqli_fetch_array($result)){
			 	echo "<tr>";
				echo"<td>" .$row['fullname']. "</td>";
				echo"<td>" .$row['address']. "</td>";
				echo"<td>" .$row['contact']. "</td>";
				echo"<td>" .$row['gender']. "</td>";
				echo"<td>" .$row['civilstatus']. "</td>";
				echo"<td>" .$row['birthdate']. "</td>";
				echo"<td>" .$row['userlevel']. "</td>";
				
				echo "</tr>";	
			 	}
			} else {
				echo "<tr>";
				echo"<td colspan='7' style='text-align: center;'> No Customer Found</td>";
				echo "</tr>";
			}
	   }
?>
</table>
<div class="rms233">
<h4 id="" >© All Rights Reserved 2018</h4>

</div>
</body>
</html>
