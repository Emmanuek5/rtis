<?php
session_start();
include('config.php');




$user_id = $_GET['user_id'];
if (isset( $_GET['code'])) {

    $sql = "SELECT * FROM `users` WHERE `user_id` = '$user_id' ";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);

 

$my = array('Username' => $row['name'],
             'email' => $row['email'],
             'image' => $row['image'],                      );


$_SESSION['api']  = $my;

print_r($my);
}else{
    echo('Wrong code');

}