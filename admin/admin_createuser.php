<?php
    // ini_set('display_errors',1);
    // error_reporting(E_ALL);

    require_once('phpscripts/config.php');
    //   confirm_logged_in();
    if(isset($_POST['submit'])){
        $fname = trim($_POST['fname']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);
        $userlvl = $_POST['userlvl'];

        if(empty($userlvl)){
            $message = "Please select a user level";
        }else{
            $result = createUser($fname, $username, $password, $email, $userlvl);
            $message = $result;

            $email_message = "Your login info is: Username: '.$username' Password: '.$password' Be sure to change your password once you login."; // email message with username and password info

            mail($email, 'Zombocom Login Info', $email_message); // mail function with target, subject, and message

        }
    }

    function randomPassword() {

    // determine possible symbols to be generated
    $upper_case = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lower_case = 'abcdefghijklmnopqrstuvwxyz';
    $numbers = '1234567890';
    $special = '!?~@#-_+<>[]{}';

    // take 3 random choices from each symbol string
    $uppermix = substr(str_shuffle($upper_case),0,3);
    $lowermix = substr(str_shuffle($lower_case),0,3);
    $numbersmix = substr(str_shuffle($numbers),0,3);
    $specialmix = substr(str_shuffle($special),0,3);

    // create a string of those random choices
    $premix = "$uppermix$lowermix$numbersmix$specialmix";

    $newpassword = substr(str_shuffle($premix),0,10); //only returns 10 of the characters, so there is no certainty in how many of a symbol type will appear.

    return $newpassword;
    }

    $newpassword = randomPassword();

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
    <?php  if (!empty($message)){ echo $message;} ?>
    <form action="admin_createuser.php" method="post">
        <label>First Name:</label>
        <input type="text" name="fname" value="<?php  if (!empty($fname)){ echo $fname;} ?>">

        <br><br>

        <label>Username:</label>
        <input type="text" name="username" value=" <?php  if (!empty($username)){ echo $username;} ?>">

        <br><br>

        <label>Password:</label>
        <input type="password" name="password" value="<?php  if (!empty($newpassword)){ echo $newpassword;} ?>">

        <br><br>

        <label>Email:</label>
        <input type="text" name="email" value="<?php  if (!empty($email)){ echo $email;} ?>">

        <br><br>

        <label>User Level:</label>
        <select name="userlvl">
            <option value="">Please select a user level</option>
            <option value="2">Web Admin</option>
            <option value="1">Web User</option>
        </select><br><br>
        <input type="submit" name="submit" value="Create User">
    </form>

</body>
</html>
