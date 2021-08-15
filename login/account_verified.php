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
    
    if ($verification != "0")
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
  <link rel="stylesheet" href="style/account_verified.css" type="text/css">
</head>
<body>
    <img src="../img/email_verified.png">
    <h1>Your E-Mail has been verified.</h1>
    <a href="../index.php">Home</a>
</body>
</html>