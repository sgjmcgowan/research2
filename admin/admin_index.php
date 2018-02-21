<?php
  // ini_set('display_errors',1);
  // error_reporting(E_ALL);
  require_once('phpscripts/config.php');
  confirm_logged_in();

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
  <?php echo "<h2>Hi {$_SESSION['user_name']}</h2>"; ?>
  <a href="admin_createuser.php">Create User</a>
  <a href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
</body>
</html>
