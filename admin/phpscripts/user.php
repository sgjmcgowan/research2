<?php
    function createUser($fname, $username, $password, $email, $userlvl){
        include('connect.php');

        $salt = md5($password); // create salt to further encrypt, aware that md5 is outdated, would change and refine in any live version
        $encryptPassword = crypt($password, $salt); // encrypt password

        $userString = "INSERT INTO tbl_user (user_fname, user_name, user_pass, user_email, user_level) VALUES ('{$fname}','{$username}','{$encryptPassword}','{$email}','{$userlvl}')";

        $userQuery = mysqli_query($link, $userString);
        if($userQuery) {
            redirect_to("admin_index.php");
        }else{
            $message = "There was a problem setting up this user.";
            return $message;
        }
        mysqli_close($link);
    }

?>
