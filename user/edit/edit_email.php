<!DOCTYPE html>
<html lang="en">
<head>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="stylesheet" href="style/edit_email.css">
  <script defer src="javascript/validation_email.js"></script>
</head>
</head>
<body>
<div id="wrapper">
<form action="php/edit_email.php" method="POST">
    <p id="error"></p>
    <input type="text" id="new_email" name="new_email" placeholder="New E-Mail">
    <input type="password" id="password" name="password" placeholder="Password">
    <a href="../../login/forgot_password.php" class="forgot">Forgot password?</a>
    <button type="submit" id="submit">Save</button>
    <div id="cancel" onclick="location.href='../';">Cancel</div>
  </form>
</div>
</body>
</html>