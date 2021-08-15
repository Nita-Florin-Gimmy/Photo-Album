<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style/forgot_password.css" type="text/css">
</head>
<body>
    <img src="../img/forgot_password.png">
    <h1>Forgot Password?</h1>
    <form action="php/forgot_password.php" method="POST">
        <input type="text" id="email" name="email" placeholder="Enter your E-Mail Address">
        <button type="submit" id="submit" name="submit">Confirm</button>
    </form>
        <button id="cancel" onclick="location.href='#';">Cancel</button>
</body>
</html>