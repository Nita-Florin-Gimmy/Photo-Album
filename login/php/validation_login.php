<?php
require '../../php/login.php';
session_start();

    if(strlen($_POST['username'])) $email = $_POST['email'];
        else $error[] = 'Please complete the Username!';
    if(strlen($_POST['password'])>7) $password = $_POST['password'];
        else $error[] = 'Please complete the Password!';
		
    if (isset($_POST['submit'])){
        $username = $_POST['username'];
	    $password = $_POST['password'];
		

        $sql = "SELECT * FROM users WHERE Username='$username' AND Pass= '".md5($password)."'";
        $result = mysqli_query($con, $sql);
	    $rows = mysqli_num_rows($result);
	
        if($rows > 0)
        {
            $error[] = 'success';
        }
        else
        {
            $error[] = 'Incorrect Password or Username!';
        }
    }else
    {
        $error[] = 'There was an error!';
    }

$show_error =  implode($error);

    echo $show_error;

?>
