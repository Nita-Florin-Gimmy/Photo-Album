<?php
$head ='            <!DOCTYPE html>
            <html lang="en">
            <head>
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="style.css">
            </head>
            </head>
            <body>
            <?php
            session_start();
            require "../../php/login.php";
';

$head .=    '$sql_users = "SELECT * FROM users WHERE Id='.$id.'";
';

$head .=    '$result_users = mysqli_query($con, $sql_users);
            while ($row_users = mysqli_fetch_array($result_users)) 
            {
            $logo = $row_users["Logo"];
            }
';
$head .=    '$sql_about = "SELECT * FROM about WHERE User='.$id.'";
';
$head .=    '$result_about = mysqli_query($con, $sql_about);
            while ($row_about = mysqli_fetch_array($result_about)) 
            {
            $text = $row_about["Txt"];
            }
';
$header ="            echo'
";
$header .='             <header>
                <h1>WELCOME TO MY PHOTO ALBUM</H1>
                <div id="facebook">
                    <a href="https://www.facebook.com/danabeatrice.nicodim?__tn__=%2CdlC-R-R&eid=ARAbVGbHKfVdyyiYx1jcfsmj0wfttCZ-yo8XbQRfXPJX4rdZlfDRBRThzNxbeDaJtIpG2xvccjdQnCEr&hc_ref=ARS9wnlN3yTRnq9qjWsQjd4vhi_zvqiBkNS51k3SEGdygFzwAOAEUlUSvmZxVdYF358" class="fa fa-facebook"></a>
                </div>
                <div class="links">
                <a href="../../" class="home">Home<i class="fa fa-share"></i></a>
                </div>
            </header>
';
$wrapper ='            <div id="wrapper">
                <div id="crate">
                    <div id="logo">
                    <div id="picture">  
                    <img src="../logo/';
$wrapper .=         "'";
$wrapper .=         '.$logo.';
$wrapper .=         "'";
$wrapper .=         '">
                    </div>
                    </div>
                    <div id="username">
                    <h4>'.$username.'</h4>
                    </div>
';
$wrapper .=     "';
";
$wrapper .='        if ("'.$role.'" != "user")
{
';
$wrapper .='    $role_tag = "";
                if ("'.$role.'" == "administrator")
                {
                    $role_tag = "ADMINISTRATOR";
                }else
                {
                    if ("'.$role.'" == "moderator")
                    {
                        $role_tag = "MODERATOR";
                    }
                }
';
$wrapper .=     "echo '
";
$wrapper .='        <div id="role">
                        <p '.$color.'>';
$wrapper .=         "'";
$wrapper .=         '.$role_tag.';
$wrapper .=         "'</p>
                    </div>
                    ";

$wrapper .=     "';
}
";
$wrapper .=     "echo '
";
$wrapper .='                 <div id="about">
                        <p>';
$wrapper .=     "'";
$wrapper .=     '.$text.';
$wrapper .=     "'</p>
                    </div>
                </div>
            </div>
            ";
$wrapper .=" ';
";
$wrapper .='            ?>
            </body>
            </html>
            ';
?>