<?php  
session_start();
include 'config.php';
include 'function.php';


if (isset($_POST['session'])) {
	
  $name = $_POST['name'];
  $password = trim($_POST['password']);


 

 $sql = "SELECT * FROM `users` WHERE `name` = '$name'";


$result =  mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$hashpassword = $row['password'];

if (mysqli_num_rows($result) < 1 ) {
	echo "User Not Found";
}else{
  
if (password_verify($password,$hashpassword)) {
	

    $_SESSION['success'] = $row;
	header('location: /rtis/');


}else{
	echo('Wrong Pass');
}


}
 

 
}









?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<body>
	<form method="POST">
		<label>Name</label>
		<br><input type="text" name="name"><br>
		<br><label>Password</label>
		<br><input type="password" name="password"><br>

		<br><input type="submit" class="btn" name="session" value="Login">
		<br><br>
		
<br><a  class="http-header" href="./register.php">Register</a>
	</form>

</body>
</html>