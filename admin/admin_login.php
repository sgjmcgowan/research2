<?php
  // ini_set('display_errors',1);
  // error_reporting(E_ALL);

  require_once('phpscripts/config.php');

  //track ip adress - can lock to certain ips, also just good to track
  $ip = $_SERVER['REMOTE_ADDR'];
  // echo $ip;
  if(isset($_POST['submit'])){
    $username = trim($_POST['username']); //trim removes whitespace before and after the string
    $password = trim($_POST['password']);
    if($username !== "" && $password !== ""){
      $result = logIn($username, $password, $ip);
      $message = $result;
    }else{
      $message = "Please put the things in the boxes";
      //echo $message;
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>OMS Portal Login</title>
</head>
<body>
  <h1>Welcome to Zombocom</h1>
  <?php if(!empty($message)){
    echo $message;
  } ?>
  <form action="admin_login.php" method="post">
    <label for="">Username:</label>
    <input type="text" name="username" value="">
    <br>
    <label for="">Password:</label>
    <input type="text" name="password" value="">
    <br>
    <input type="submit" name="submit" value="Make me a bicycle, clown">
  </form>
</body>
</html>
