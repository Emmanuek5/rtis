<?php
session_start();
include 'config.php';
include 'function.php';


    $user_data = check_login($con);

    $and = array('user_data' =>array(
      'Name' =>$user_data['name'] ,
           
                'email' => $user_data['email'],
                'image' => $user_data['image'],
             ),);

if (isset($_POST['app'])) {
   $name = $_POST['app'];
   $appdes = $_POST['appdes'];
   $file_new_name = date('dmy').time().$name;
   $file_tmp = $_FILES['file']['tmp_name'];
   $location = './uploads/appdata/'.$file_new_name;
   move_uploaded_file($file_tmp,$location);

}




?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Realchat Test</title>
    <link rel="stylesheet" type="text/css" href="./css/home.css">
</head>
<body>
    <img src="./uploads/<?php echo($user_data['image']) ?>">
<h1>Welcome ,<?php echo($user_data['name'])  ?></h1>





<a href="./logout.php">Logout</a>
<br>














</body>
</html>