<?php
require '../../php/login.php';
session_start();

    if(strlen($_POST['username'])) $email = $_POST['email'];
        else $error[] = 'Please complete the Username!';
    if(strlen($_POST['password'])>7) $password = $_POST['password'];
        else $error[] = 'Please complete the Password!';
		
    if (isset($_POST['username'])){
        $username = $_POST['username'];
	    $password = $_POST['password'];
		

        $sql = "SELECT * FROM users WHERE Username='$username' AND Pass= '".md5($password)."'";
        $result = mysqli_query($con, $sql);
	    $rows = mysqli_num_rows($result);
		$row = $result->fetch_assoc();
	
        if($rows==1)
        {
            $_SESSION['Username'] = $row['Username'];
            $_SESSION['Id'] = $row['Id'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['Password'] = $row['Password'];
            $_SESSION['Roles'] = $row['Roles'];
            $_SESSION['Logo'] = $row['Logo'];
            $_SESSION['Hidden'] = $row['Hidden_password'];
            $_SESSION['Ban'] = $row['Ban'];

            $user_id = $_SESSION['Id'];
            $time = time() + 10;

            $sql_status = "UPDATE users SET Last_login='$time' WHERE Id='$user_id'";
            $result_status = mysqli_query($con, $sql_status);

            if ($row['Roles'] == "administrator")
            {
                $_SESSION['Tag_color'] = "red";
            }else
            {
                if ($row['Roles'] == "moderatoe")
                {
                    $_SESSION['Tag_color'] = "blue";
                }else
                {
                    $_SESSION['Tag_color'] = "white";
                }
            }

            header ("Location: ../../");
        }
        else
        {
            $error[] = 'Incorrect Password or Username!';
        }
    }else
    {
        $error[] = 'There was an error!';
    }
$show_error =  implode("<br>", $error);

    echo $show_error;

?>
