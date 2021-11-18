<!DOCTYPE html>
<html>
<head>
<title>Erthanmes 2Wheels Motorcycle Shop</title>
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
	 					
			 	}
			 }
			 

?>
   <div class="dropdown2">
   <div class="hide">
<i class="fa fa-bars" aria-hidden="true"></i>Menu



</div>
   
    <div class="dropdown2-content">
      <a href="user.php">Home</a>
  <a href="#about"  >About</a>
 

 
     
    </div>
  </div>
  <a href="user.php">Home</a>
  <a href="#about"  >About</a>
   



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


<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<script type="text/javascript">
$('.hide').on("click",function(){
	$('.navbar ').toggleClass('show');
});
</script>

<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>


<a href="user.php"> TEMPLATE </a>


<!-- END GRID -->
</div>


<!-- END MAIN -->

<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<div class="rms2">
<h2 id="about" >About</h2>
<center><p> Emertech Project: <p>Created by <p>Rico James Quirante <p>Nathaniel sabas
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
