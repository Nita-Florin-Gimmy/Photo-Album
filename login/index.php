<?php
	session_start();
	require '../php/login.php';

  if(isset($_SESSION['Username'])) 
  {
    header ("Location: ../");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script defer src="javascript/validation_login.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style/login.css">
</head>
<body>
    <header>
        <h1>WELCOME TO MY PHOTO ALBUM</H1>
        <div class="links">
            <a href="../" class="home">Home<i class="fa fa-share"></i></a>
        </div>
    </header>
    <div id="wrapper">
    <div id="crate">
      <form id="form" action="php/signin.php" method="POST">
        <p id="error"></p>
        <input type="text" id="username" name="username" placeholder="Username">
        <input type="password" id="password" name="password" placeholder="Password">
        <a href="forgot_password.php" class="forgot">Forgot password?</a>
        <p id="or">or</p>
        <a href="signup.php" id="signup">Sign Up</a>
        <button type="submit" id="submit" name="submit">Login</button>
      <form>
    </div>
  </div>
</body>
</html>
