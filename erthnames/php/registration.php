<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration Form</title>
<meta name="viewport" content="width=device-width , initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/regis.css">
</head>
<body>
<form class="login" action="register.php" method="post">
<h1>2wheels registration form</h1>





<input  type="text" placeholder="Username" name="username" required/>

<input  type="password" placeholder="Password" name="password" required/>
<input  type="text" placeholder="Fullname" name="fullname" required/>
<input  type="text" placeholder="Address" name="address" required/>
<input class="txtb" placeholder="Contact No." type="text" name="contact" required/><br><br>
<label class="stat">Gender: </label><input type="radio"  name="gender" value="Male" required/> Male <input type="radio" name="gender" value="Female" required/> Female <br><br>
<label class="stat">Civil Status: </label> <select  name="civilstatus" class="slct" required/>
<option></option>
<option>Single</option>
<option>Married</option>
<option>Widowed</option>
<option>Kabet</option>
</select><br><br>
<label class="stat">Birthdate: </label><input name="birthdate" class="bd" type="date" required/>
<input class="btn" type="submit" name="" value="Register">

<p>Already have an account?<a href="login.php" class="sup">Log in</a>
</form>

</div>

</body>
</html>