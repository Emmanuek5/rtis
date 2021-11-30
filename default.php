<?php  
session_start();
include('config.php');
include 'function.php';



if (isset($_SESSION['success'])) {
	$a['login'] = 'home';
}else{
	$a['login'] = 'login';
}







?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Security</title>
</head>
<body>

	<h1>Welcome , </h1><?php 
	if (isset($_SESSION['success'])) {
		// code...
	

	 ?><p><?php echo($_SESSION['success']['name']) ?></p><?php } ?>

	 <?php 
	if (isset($a['login'])) {
		// code...
	

	 ?><a href="./<?php echo($a['login']) ?>.php"><?php echo($a['login']) ?></a><?php } ?>
	 


</body>
</html>