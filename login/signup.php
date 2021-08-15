<?php
	session_start();
	require '../php/login.php';

  if(isset($_SESSION['Username'])) 
  {
    header ("Location: ../");
  }
?>
<!DOCTYPE html
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script defer src="javascript/validation_signup.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style/signup.css">
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
      <form name="form" id="form" action="php/signup.php" method="POST">
        <p id="error"></p>
		    <input type="text" id="username" name="username" placeholder="Username">		
        <input type="text" id="email" name="email" placeholder="E-Mail">
        <input type="password" id="password" name="password" placeholder="Password">
	      <input type="password" id="confirm" name="confirm" placeholder="Confirm Password">
        <p id="or">or</p>
        <a href="index.php" id="login">Login</a>
        <input type="submit" id="submit" value="Sign Up">
      </form> 
    </div>
  </div>
</body>
</html>

