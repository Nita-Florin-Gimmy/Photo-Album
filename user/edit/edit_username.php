<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="stylesheet" href="style/edit_username.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script defer src="javascript/validation_username.js"></script>
</head>
<body>
<div id="wrapper">
<form id="form" action="php/edit_username.php" method="POST">
  <p id="error"></p>
  <input type="text" id="new_username" name="new_username" placeholder="New Username">
  <input type="password" id="password" name="password" placeholder="Password">
  <a href="../../login/forgot_password.php" class="forgot">Forgot password?</a>
  <button type="submit" name="submit" id="submit">Save</button>
  <div id="cancel" onclick="location.href='../';">Cancel</div>
</form>
</div>
</body>
</html>