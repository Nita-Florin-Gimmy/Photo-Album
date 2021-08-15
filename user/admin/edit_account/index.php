<?php
	session_start();
	require '../../../php/login.php';

  if(!$_SESSION['Roles'] == "administrator") 
  {
    header ("Location: ../../");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script defer src='javascript/about.js'></script>
  <script defer src='javascript/preview.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
</head>
</head>
<body>
<?php
session_start();
require '../../../php/login.php';

$email = $_SESSION['Email'];
$username = $_SESSION['Username'];
$user_id = $_SESSION['Id'];
$default_password = $_SESSION['Hidden'];
$password = str_repeat("*", $default_password);

$sql_users = "SELECT * FROM users WHERE Id='$user_id'";
$result_users = mysqli_query($con, $sql_users);
while ($row_users = mysqli_fetch_array($result_users)) 
{
  $logo = $row_users['Logo'];
}

$sql_about = "SELECT * FROM about WHERE User='$user_id'";
$result_about = mysqli_query($con, $sql_about);
while ($row_about = mysqli_fetch_array($result_about)) 
{
  $text = $row_about['Txt'];
}

echo'
<div id="wrapper">
    <div id="crate">
        <div id="logo">
          <div id="picture">  
          <img id="logo_img" src="../../logo/'.$logo.'">
          </div>
          <form id="edit_logo_form" autocomplete="off" action="php/logo.php" method="post" enctype="multipart/form-data">
            <input hidden id="file" type="file" accept=".png,.jpg,.jpeg" name="img">
            <label id="edit" for="file">Edit</label>
          </form>
        </div>
        <div id="username">
          <h4>'.$username.'</h4>
          <a href="edit/edit_username.php">Change username</a>
        </div>
        <div id="about">
          <textarea spellcheck="false" id="about_write" placeholder="Write something about you...">'.$text.'</textarea>
          <button id="save">Saved</button>
          <script src="javascript/save_button.js"></script>
        </div>
        <div id="email">
          <h4>E-Mail:</h4>
          <p>'.$email.'</p>
          <a href="../edit/edit_email.php">Change E-Mail</a>
        </div>
        <div id="password">
          <h4>Password:</h4>
          <p>'.$password.'</p>
          <a href="../edit/edit_password.php">Change password</a>
        </div>
    </div>
  </div>';
?>
</body>
</html>