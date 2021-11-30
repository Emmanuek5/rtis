<?php  
session_start();
include 'config.php';

if (isset($_POST['session'])) {
	
  $name = $_POST['name'];
  $password = $_POST['password'];
  $filename = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  $file_new_name = time().date('dmy').$_FILES['file']['name'];
  $location = './uploads/'.$file_new_name;

  $quer = "SELECT `name` FROM `users` WHERE `name` = '$name'";
  $result = mysqli_query($con,$quer);



if (mysqli_num_rows($result) > 0) {
	echo('User Already Exists');
}else{
 $user_id = rand();

 $sql = "INSERT INTO `users`( `user_id`, `name`,`password`,`image`) VALUES ('$user_id','$name','$password','$file_new_name')";
 move_uploaded_file($file_tmp,$location);

 mysqli_query($con,$sql);

 header('location: login.php');

}

 



 

 
}








?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="POST" enctype="multipart/form-data">
		<input type="text" name="name">
		<input type="password" name="password">
		<input type="file" name="file">
		<input type="submit" name="session">

	</form>
<a href="./login.php">Login</a>
</body>
</html>