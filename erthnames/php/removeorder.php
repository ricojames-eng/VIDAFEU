<?php
include("connection.php");
$id=$_GET['id'];
$sql = "SELECT * FROM tbl_order where id='$id'";
			$result = mysqli_query($conn, $sql);
			 if (mysqli_num_rows($result) > 0) {
			 	while($row=mysqli_fetch_array($result)){
				$orderid=$row['id'];
				$cartid=$row['cartid'];
				
				$sqll = "DELETE FROM tbl_order WHERE id='$orderid'"; 
				$resultt = mysqli_query($conn, $sqll);
			 if ($conn->query($sqll) === TRUE) {
							$sqlll = "DELETE FROM tbl_cart WHERE id='$cartid'"; 
							$resulttt = mysqli_query($conn, $sqlll);
							if ($conn->query($sqlll) === TRUE) {
								echo "<script>alert('Deleting!'); window.location = 'orders.php';</script>";
									}else{
										echo "<script>alert('Error!'); window.location = 'orders.php';</script>";
										}
			 
			 }else{
				 echo "<script>alert('Error!'); window.location = 'orders.php';</script>";
			 }
			 
			 
			 
			 	}
			 }
?>