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
  <a href="user.php">Home</a>
  <a href="about.php"  >About</a>
    <div class="dropdown">
    <button class="dropbtn">Profile 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="updateuserprofile.php">Edit Profile</a>
      <a href="profile.php">View Profile</a>
     
    </div>
  </div> 

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

  <a onclick="logout()">Log Out</a>
</div>

<div class="footer">
  <p>Erthanmes 2Wheels Motorcycle Parts</p>
  <p>A E-commerce of motorcycle business</p>
  <p>Create a faster and easier transaction of purchasing motrcycles</p>
  <p>We have 3 years warranty starting in the day of receiving the product</p>
  <p>The delivery will vary in the productions of the manufactory</p>
  <p>Feel free to contact the management for inquiries and purchasing</p>
  <p>Management: Quirante Rico James , Nathaniel Sabas & Erwin Flores</p>
</div>
</body>
</html>
