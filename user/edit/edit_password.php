<!DOCTYPE html>
<html lang="en">
<head>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="stylesheet" href="style/edit_password.css">
  <script defer src="javascript/validation_password.js"></script>
</head>
</head>
<body>
<div id="wrapper">
  <form action="php/edit_password.php" method="POST">
    <p id="error"></p>
    <input type="password" id="current_password" name="password" placeholder="Current password">
    <input type="password" id="new_password" name="new_password" placeholder="New password">
    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password">
    <a href="../../login/forgot_password.php" class="forgot">Forgot password?</a>
    <button type="submit" id="submit">Save</button>
    <div id="cancel" onclick="location.href='../';">Cancel</div>
  </form>
</div>
</body>
</html>