<?php
session_start();
require '../php/login.php';

if(isset($_SESSION['Username'])) 
{
    $user = $_SESSION['Id'];
    $sql = "SELECT * FROM users WHERE Id=$user";
    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_array($result)) 
    {
        $verification = $row['Verification'];
    }
    if ($verification == "0")
    {
        header ("Location: ../");
    }
}else
{
    header ("Location: ../");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style/email_verification.css" type="text/css">
</head>
<body>
    <h1>Verify your account</h1>
    <?php
    session_start();
      $username = $_SESSION['Username'];

      echo' <h3>We have sent a verification code to <span>'.$username.'</span></h3>';
    ?>
    <h4>Verification code:</h4>
    <form action="php/email_verification.php" method="POST">
        <input type="text" id="code" name="code" placeholder="000000">
        
        <?php
		    if(isset($_GET['error'])) 
        {
          echo' <h5>Invalid code! Try again.</h5>';
        }else
        {
          if(isset($_GET['resend'])) 
          {
            echo' <h6>Success! Please check your inbox.</h6>';
          }
        }
      ?>

        <button type="submit" id="submit" name="submit">Confirm</button>
    </form>
        <p>Or</p>
        <button id="resend" onclick="location.href='php/resend_verification.php';">Resend verification code</button>
        <button id="logout" onclick="location.href='php/logout.php';">Log-Out</button>
</body>
</html>