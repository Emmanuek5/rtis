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








<form method="POST" enctype="multipart/form-data" autocomplete="off">
    <label>App Name</label><br>
   <br><input type="text" name="appname"><br>
   <br><label>App Description</label><br>
    <br><textarea  name="appdes" rows="10"></textarea>
    <br><input type="file" name="file"><br>
    <br><input type="submit" name="app" value="Create App">


    
</form>





</body>
</html>