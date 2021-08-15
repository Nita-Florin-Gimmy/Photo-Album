<?php
  require '../../php/login.php';
  session_start();

    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm'])) 
    {

        $_POST = array_map("strip_tags", $_POST);
        $_POST = array_map("trim", $_POST);

        if(strlen($_POST['username'])) $username = $_POST['username'];
            else $error[] = 'Please complete the Username!';

        if(preg_match('/^([a-zA-Z0-9]+[a-zA-Z0-9._%-]*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4})$/', $_POST['email'])) $email = $_POST['email'];
            else $error[] = 'Invalid E-Mail address!';

        if(strlen($_POST['password'])>7) $password = $_POST['password'];
            else $error[] = 'Please complete the Password!';


            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $crypt =  md5($password);
            $confirm = $_POST['confirm'];
            $role = "user";
            $logo = "question_mark.png";
            $hidden = strlen($password);
            $last_login = time() + 10;

            $seed = str_split('0123456789');
            shuffle($seed);
            $code = '';
            foreach (array_rand($seed, 6) as $k) $code .= $seed[$k];
    
            $sql = "INSERT INTO users (Username, Email, Pass, Roles, Logo, Hidden_password, Last_login, Verification) VALUES ('$username', '$email', '$crypt', '$role', '$logo', '$hidden', '$last_login', '$code')";
            $result = mysqli_query($con, $sql);

                if ($con->sql = TRUE) 
                {	 
                    $show_error ='';
                    $sql2 = "SELECT * FROM users WHERE Username='$username' AND Pass= '".md5($password)."'";
                    $result = mysqli_query($con, $sql2);
                    $rows = mysqli_num_rows($result);;
                    $_SESSION['Username'] = $username;
                    $row = $result->fetch_assoc();
                    $_SESSION['Id'] = $row['Id'];
                    $_SESSION['Roles'] = $row['Roles'];
                    $_SESSION['Email'] = $email;
                    $_SESSION['Password'] = $crypt;
                    $_SESSION['Logo'] = $logo;
                    $_SESSION['Hidden'] = $hidden;
                    $_SESSION['Ban'] = $row['Ban'];

                        header ("Location: send_verification.php");
                }else

                    $error[] = 'There was an error!';

    }else
    {
        $error[] = 'Please fill in all the fields!';
    }
$show_error = '<i class="material-icons">error_outline</i><h4 style="text-align: left; color: #e60000;">'. implode('<br>', $error). '</h4>';
    echo $show_error;
?>