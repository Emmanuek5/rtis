<?php
session_start();
include 'config.php';

if (isset($_POST['session'])) {

	$name = $_POST['name'];
	$password1 = $_POST['password'];
	$password = password_hash($password1, PASSWORD_DEFAULT);
	$email = $_POST['email'];
	$filename = $_FILES['file']['name'];
	$file_tmp = $_FILES['file']['tmp_name'];
	$file_new_name = time() . date('dmy') . $_FILES['file']['name'];
	$location = './uploads/' . $file_new_name;

	$quer = "SELECT `name` FROM `users` WHERE `name` = '$name'";
	$result = mysqli_query($con, $quer);



	if (mysqli_num_rows($result) > 0) {
		echo ('User Already Exists');
	} else {
		$user_id = rand();

		$sql = "INSERT INTO `users`( `user_id`, `name`,`password`,`email`,`image`) VALUES ('$user_id','$name','$password','$email','$file_new_name')";
		move_uploaded_file($file_tmp, $location);

		mysqli_query($con, $sql);

		header('location: login.php');
	}
}








?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/register.css">

	<title></title>
</head>

<body>
	<form method="POST" enctype="multipart/form-data">
		<label>Name</label>
		<br><input type="text" name="name">
		<br><label > Password</label>
		<br><input type="password" name="password">
		<br><label> Email</label>
		<br><input type="email" name="email"><br>
		<input type="file" name="file" accept=".jpg,.png,.jpeg,.gif"><br>
		<input type="submit" name="session"><br>
		<a href="./login.php">Login</a>
	</form>

</body>

</html>