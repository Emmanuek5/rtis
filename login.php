<?php  
session_start();
include 'config.php';

if (isset($_POST['session'])) {
	
  $name = $_POST['name'];
  $password = $_POST['password'];

 

 $sql = "SELECT * FROM `users` WHERE `name` = '$name'";


$result =  mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) < 1 ) {
	echo "User Not Found";
}else{

if ($password == $row['password']) {
	
	$_SESSION['success'] = $row;
	print_r($_SESSION);

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
</head>
<body>
	<form method="POST">
		<input type="text" name="name">
		<input type="password" name="password">
		<input type="submit" name="session">
	</form>
<a href="./logout.php">Logout</a>
<a href="./register.php">Register</a>
<a href="http://localhost/login/oauth.php?app_id=6795994276732903">Loginhhh</a>
</body>
</html>