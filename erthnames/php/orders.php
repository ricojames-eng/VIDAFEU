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
</div>
<h1>List of Orders/Order Details</h1>
<table width="100%" border= "1">
	<tr>
			<th>Order ID</th>
			<th>Item ID</th>
			<th>Product Brand</th>
			<th>Product Description</th>
			<th>Price</th>
			<th>Customer's Name</th>
			<th>Contact No.</th>
			<th>Address</th>
			<th>Action</th>
			
	</tr>
	<br>

<?php
	include("connection.php");
		
		// view the data on the table
		if($_SERVER["REQUEST_METHOD"] <> "POST") {
		$sql = "SELECT tbl_order.id as 'orderid' , tbl_cart.itemid as 'productid', tbl_cart.description as 'productdes', tbl_cart.brand as 'productbrand', tbl_cart.price as 'productprice' , user.fullname as 'customername' , user.contact as 'contactno', user.address as 'customeraddress' FROM (tbl_order inner join tbl_cart on tbl_order.cartid=tbl_cart.id)inner join user on tbl_cart.customerid=user.id";
			$result = mysqli_query($conn, $sql);
			 if (mysqli_num_rows($result) > 0) {
			 	while($row=mysqli_fetch_array($result)){				
			 	echo "<tr>";
				echo"<td class=td>" .$row['orderid']. "</td>";
				echo"<td class=td>" .$row['productid']. "</td>";
				echo"<td>" .$row['productbrand']. "</td>";
				echo"<td>" .$row['productdes']. "</td>";
				echo"<td>₱" .$row['productprice']. "</td>";
				echo"<td>" .$row['customername']. "</td>";
				echo"<td>" .$row['contactno']. "</td>";
				echo"<td>" .$row['customeraddress']. "</td>";
				echo"<td><a href='removeorder.php?id=".$row['orderid']."'><input class=remove onclick=return remove() type=button value=Remove Item></a></td>";
				echo "</tr>";	
			 	}
			 }
		}
?>
</table>
<div class="rms233">
<h4 id="" >© All Rights Reserved 2018</h4>

</div>
</body>
</html>
