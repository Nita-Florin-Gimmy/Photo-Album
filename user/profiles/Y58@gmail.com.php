            <!DOCTYPE html>
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
$sql_users = "SELECT * FROM users WHERE Id=17";
$result_users = mysqli_query($con, $sql_users);
            while ($row_users = mysqli_fetch_array($result_users)) 
            {
            $logo = $row_users["Logo"];
            }
$sql_about = "SELECT * FROM about WHERE User=17";
$result_about = mysqli_query($con, $sql_about);
            while ($row_about = mysqli_fetch_array($result_about)) 
            {
            $text = $row_about["Txt"];
            }
            echo'
             <header>
                <h1>WELCOME TO MY PHOTO ALBUM</H1>
                <div id="facebook">
                    <a href="https://www.facebook.com/danabeatrice.nicodim?__tn__=%2CdlC-R-R&eid=ARAbVGbHKfVdyyiYx1jcfsmj0wfttCZ-yo8XbQRfXPJX4rdZlfDRBRThzNxbeDaJtIpG2xvccjdQnCEr&hc_ref=ARS9wnlN3yTRnq9qjWsQjd4vhi_zvqiBkNS51k3SEGdygFzwAOAEUlUSvmZxVdYF358" class="fa fa-facebook"></a>
                </div>
                <div class="links">
                <a href="../../" class="home">Home<i class="fa fa-share"></i></a>
                </div>
            </header>
            <div id="wrapper">
                <div id="crate">
                    <div id="logo">
                    <div id="picture">  
                    <img src="../logo/'.$logo.'">
                    </div>
                    </div>
                    <div id="username">
                    <h4>Y58@gmail.com</h4>
                    </div>
';
        if ("moderator" != "user")
{
    $role_tag = "";
                if ("moderator" == "administrator")
                {
                    $role_tag = "ADMINISTRATOR";
                }else
                {
                    if ("moderator" == "moderator")
                    {
                        $role_tag = "MODERATOR";
                    }
                }
echo '
        <div id="role">
                        <p style="color: green">'.$role_tag.'</p>
                    </div>
                    ';
}
echo '
                 <div id="about">
                        <p>'.$text.'</p>
                    </div>
                </div>
            </div>
             ';
            ?>
            </body>
            </html>
            