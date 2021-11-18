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
  <div class="hide">
<i class="fa fa-bars" aria-hidden="true"></i>Menu
</div>
</div>

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



<br>
<table width="100%" border= "1">
	<tr>
			<th>Picture</th>
			<th>Item ID</th>
			<th>Product Brand</th>
			<th>Product Description</th>
			<th>Price</th>
			<th>Actions</th>
	</tr>
	<br>

<?php
	include("connection.php");
		
	$userid=$_SESSION['activeuser'];
		
		// view the data on the table
		if($_SERVER["REQUEST_METHOD"] <> "POST") {
		$sql = "SELECT * FROM tbl_cart where customerid='$userid'";
			$result = mysqli_query($conn, $sql);
			 if (mysqli_num_rows($result) > 0) {
			 	while($row=mysqli_fetch_array($result)){
				$row['itemid'];
				$row['brand'];
				$row['description'];
				$row['price'];	
				$row['picture'];				
			 	echo "<tr>";
				echo"<td class=td>"."<img class=itempic src= ".$row['picture'].">"."</td>";
				echo"<td class=td>" .$row['itemid']. "</td>";
				echo"<td>" .$row['brand']. "</td>";
				echo"<td>" .$row['description']. "</td>";
				echo"<td>₱" .$row['price']. "</td>";
				echo"<td><a href='remove.php?id=".$row['id']."'><input class=remove onclick=return remove() type=button value=Remove Item></a></td>";
				
				echo "</tr>";	
			 	}
			 }
			 //details
			 $sql = "SELECT count(itemid) as 'quantity', sum(price) as 'total' FROM tbl_cart where customerid='$userid'";
			$result = mysqli_query($conn, $sql);
			 if (mysqli_num_rows($result) > 0) {
			 	while($row=mysqli_fetch_array($result)){
			 	echo "<tr>";
				echo"<td colspan=2 class=td>No of Items: ".$row['quantity']."</td>";
				echo"<td colspan=3 class=td>Total Price: ₱".$row['total']."</td>";
				
				echo "</tr>";	
			 	}
			 }
		}
?>
</table>
<a href="sendorder.php"><input class="send" type="button" value="Send Order"></a>;
<div class="rms2">
<h2 id="about" >NOTE:</h2>
<p>The Product you ordered will be delivered as soon as possible and feel free to contact the management in any damages or factory defect of the motorcycle , warranty is 3years from the day the product delivered. Thankyou -admin Quirante </p>
<div class="rms22">
<h4>Connect with us</h4>
<a href="#"><img class="fb" src="../images/fb.png"></a>
<a href="#"><img class="tw" src="../images/tt.png"></a>
<a href="#"><img class="ws" src="../images/ws.png"></a>
</div>
</div>
<div class="rms23">
<h4 id="" >© All Rights Reserved 2018</h4>

</div>
</body>
</html>
