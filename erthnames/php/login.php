<!DOCTYPE html>
<?
session_start();
$_SESSION['attempts'];
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/login.css">
<title>Login Form</title>
</head>
<body>
<form class="login" action="verify.php" method="post">
<h1>LOG IN FIRST TO ACCESS THE SITE! THANKYOU</h1>


<input class="txtb" type="text" placeholder="Username" name="username" ><br>

<input class="txtb" type="password" placeholder="Password" name="password" ><br>

<input class="btn" type="submit" name="login" value="Login"><br><br>
<p>Don't have account?<a href="registration.php" class="sup">Signup here!</a></p><br><br>

</form>
<div class="shadow"></div>
</body>
</html>