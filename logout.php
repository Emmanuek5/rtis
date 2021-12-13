<?php  
session_start();

session_destroy();

header('location: /rtis/login.php');



?>