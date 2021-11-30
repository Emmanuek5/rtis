<?php
session_start();
include'config.php';

$sql = "SELECT * FROM `users`";
$result = mysqli_query($con,$sql);

$row = mysqli_fetch_assoc($result);

echo($row);