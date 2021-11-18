<html>
<head>
<title>Update</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="editbox">
<h1>Update Item</h1>
<div class="box">
<!-- edit user -->
<?php
include("connection.php");
	$id=$_GET['id'];
		$sql = "SELECT * FROM items where id='$id';";
			$result = mysqli_query($conn, $sql);
			 if (mysqli_num_rows($result) > 0) {
			 	while($row=mysqli_fetch_array($result)){
				$id=$row['id'];
				$brand=$row['brand'];
				$description=$row['description'];
				$price=$row['price'];
				}
			 }else{
				 echo "<script>alert('No Connection!'); window.location = 'index.php';</script>";
			 }
?>
<form action="updateitem.php" method="POST">
		<?php echo "<input class='tbox' type='hidden' name='id' value='$id' />"?>
		<label>Brand: </label><?php echo "<input class='tbox' type='text' name='brand' value='$brand' />"?><br><br>
		<label>Description: </label><?php echo "<input class='tbox' type='text' name='description' value='$description' />"?><br><br>
		<label>Price: </label><?php echo "<input class='tbox' type='text' name='price' value='$price' />"?><br><br> 
		<input class="btn" type="submit" value="Update">&nbsp <a href="item.php"> <input class='btn' type="button" value = "Cancel"></a>
</form>
</div>
</div>
</body>
</html>