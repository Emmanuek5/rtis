<?php
session_start();
include 'config.php';
include 'function.php';


    $user_data = check_login($con);

    $and = array('Name' =>$user_data['name'] ,
                'Password' => $user_data['password'],
                'email' => $user_data['email'],
                'image' => $user_data['image'],








            );
   print_r($and);




?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Realchat Test</title>
</head>
<body>
    <img src="./uploads/<?php echo($user_data['image']) ?>">
<h1>Welcome ,<?php echo($user_data['name'])  ?></h1>
<p>Welcome ,<?php echo($user_data['email'])  ?></p>
<a href="./logout.php">Logout</a>

</body>
</html>