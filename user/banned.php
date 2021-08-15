<?php
session_start();
require '../php/log.php';

  $user_id = $_SESSION['Id'];
          
  $sql_users = "SELECT * FROM users WHERE Id='$user_id'";
  $result_users = mysqli_query($con_log, $sql_users);
    while ($row_users = mysqli_fetch_array($result_users)) 
      {
        $ban = $row_users['Ban'];

        if ($ban == "")
        {
            header ("Location: ../");
        }
      }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="banned.css" type="text/css">
</head>
<body>
    <img src="../img/banned.png">
    <h1>You are banned.</h1>
</body>
</html>