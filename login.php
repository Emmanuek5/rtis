<?php  
session_start();
include 'config.php';
include 'function.php';

if (isset($_GET['code'])) {
	
$app_id = 'YOUR_APP_ID'; // your application app id
$app_secret = 'YOUR_APP_SECRET'; //your application app secret
$code = $_GET['code']; // the GET parameter you got in the callback: http://yourdomain/?code=XXX

$get = file_get_contents("https://realchatapp.xyz/authorize?app_id={$app_id}&app_secret={$app_secret}&code={$code}");

$json = json_decode($get, true);
if (!empty($json['access_token'])) {
    $access_token = $json['access_token']; // your access token
}

if (!empty($json['access_token'])) {
		$access_token = $json['access_token']; // your access token
		$type = "get_user_data"; // or posts_data
		$get1 = file_get_contents("https://realchatapp.xyz/app_api?access_token={$access_token}&type={$type}");
		$json1 = json_decode($get1, true);
		
}	









}else{

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