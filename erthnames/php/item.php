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

    
  
 <a href="item.php">Items</a>


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
   

<div class="card3">
<h2>Add Item:</h2>
<form action="additem.php" method="POST">
<label>Brand: </label><input type="text" name="brand" required/><br><br>
<label>Description: </label><input type="text" name="description" required/><br><br>
<label>Price: </label><input type="text" name="price" required/><br><br>
<input type="submit" name="btnadd" value="Add"/>&nbsp <input type="reset" name="btnclear" value="Clear"/>
</form>
</div>


<div class="list">
<h2>List of Items</h2>
<form  action="item.php" method="POST">
<input type="text" name="search"/> <input type="submit" name="search" value="Search"/>
</form>
<table border= "1" >
	<tr>
			<th>Item ID</th>
			<th>Product Brand</th>
			<th>Product Description</th>
			<th>Price</th>
			<th>Actions</th>
	</tr></div>
<?php
	include("connection.php");
		
		
		// view the data on the table
		if($_SERVER["REQUEST_METHOD"] <> "POST") {
		$sql = "SELECT * FROM items";
			$result = mysqli_query($conn, $sql);
			 if (mysqli_num_rows($result) > 0) {
			 	while($row=mysqli_fetch_array($result)){
				$row['id'];
				$row['brand'];
				$row['description'];
				$row['price'];
			 	echo "<tr>";
				echo"<td>" .$row['id']. "</td>";
				echo"<td>" .$row['brand']. "</td>";
				echo"<td>" .$row['description']. "</td>";
				echo"<td>₱" .$row['price']. "</td>";
				echo"<td><a href='edititem.php?id=".$row['id']."'><input type=button value=Update></a> &nbsp;
				<a href='removeitem.php?id=".$row['id']."'><input type=button value=Remove></a></td>";
				
				echo "</tr>";	
			 	}
			 }
		}else if($_SERVER["REQUEST_METHOD"] == "POST") {

			
			
			$search= $_POST['search']; 
		  		
			$sql = "SELECT * FROM items WHERE CONCAT(`id`, `brand`, `description`,`price`)  like '%$search%'";
			$result = mysqli_query($conn, $sql);

			 // display the data 
			 if (mysqli_num_rows($result) > 0) {
			 	while($row=mysqli_fetch_array($result)){
			 	echo "<tr>";
				echo"<td>" .$row['id']. "</td>";
				echo"<td>" .$row['brand']. "</td>";
				echo"<td>" .$row['description']. "</td>";
				echo"<td>" .$row['price']. "</td>";
				echo"<td><a href='edititem.php?id=".$row['id']."'><input type=button value=Update></a> &nbsp;
				<a href='removeitem.php?id=".$row['id']."'><input type=button value=Remove></a></td>";
				
				echo "</tr>";	
			 	}
			} else {
				echo "<tr>";
				echo"<td colspan='5' style='text-align: center;'> No Item Found</td>";
				echo "</tr>";
			}
	   }
?>
<div class="rms233">
<h4 id="" >© All Rights Reserved 2018</h4>

</div>
</body>
</html>
