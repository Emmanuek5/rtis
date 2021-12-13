<?php

function check_login($con)
{
	if (isset($_SESSION['success'])) {
		$id = $_SESSION['success']['user_id'];
		$sql= "SELECT * FROM `users` WHERE `user_id` = '$id'";
		$result = mysqli_query($con,$sql);
		$user_data = mysqli_fetch_assoc($result);

		$logedin = 'True';

		return $user_data;
	}else{
		header('location: login.php');
	}
}  