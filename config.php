<?php  
$host = "localhost";
$user = "root";
$pass = "";
$db = "security";
$con = mysqli_connect($host,$user,$pass,$db);

if (!$con) {
	echo('<script>alert("Connection Failed")</script>');
}