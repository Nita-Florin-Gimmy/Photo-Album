<?php
	session_start();
	require '../../php/log.php';
  require '../../php/login.php';
  require '../../php/photos.php';

    $sql_count_likes = "SELECT * FROM likes WHERE Like_val='yes'";
    $result_count_likes = mysqli_query($con, $sql_count_likes);
    $count_likes_likes = mysqli_num_rows($result_count_likes);

    $sql_count_comments = "SELECT * FROM comments";
    $result_count_comments = mysqli_query($con, $sql_count_comments);
    $count_comments = mysqli_num_rows($result_count_comments);

    $time = time();
    
    $sql_count_online_users = "SELECT * FROM users WHERE Last_login > '$time' AND Roles = 'user'";
    $result_count_online_users = mysqli_query($con_log, $sql_count_online_users);
    $count_online_users = mysqli_num_rows($result_count_online_users);

    $sql_count_online_admins = "SELECT * FROM users WHERE Last_login > '$time' AND Roles != 'user'";
    $result_count_online_admins = mysqli_query($con_log, $sql_count_online_admins);
    $count_online_admins = mysqli_num_rows($result_count_online_admins);

  if($_SESSION['Roles'] !== "administrator") 
  {
    header ("Location: ../");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script defer src='javascript/about.js'></script>
  <script defer src='javascript/preview.js'></script>
  <script defer src="../status/javascript/update_status.js"></script>
  <script defer src="../status/javascript/get_status.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
session_start();
require ('../../php/login.php');

$user_id = $_SESSION['Id'];
$email = $_SESSION['Email'];
$username = $_SESSION['Username'];
$default_password = $_SESSION['Hidden'];
$password = str_repeat("*", $default_password);

$sql_count_users = "SELECT * FROM users";
$result_count_users = mysqli_query($con, $sql_count_users);
$count_users = mysqli_num_rows($result_count_users);

$sql_logo = "SELECT * FROM users WHERE Id='$user_id'";
$result_logo = mysqli_query($con, $sql_logo);
while ($row_logo = mysqli_fetch_array($result_logo)) 
{
  $logo = $row_logo['Logo'];
}

$sql_about = "SELECT * FROM about WHERE User='$user_id'";
$result_about = mysqli_query($con, $sql_about);
while ($row_about = mysqli_fetch_array($result_about)) 
{
  $text = $row_about['Txt'];
}

echo'
    <div id="left">
    <div id="crate">
        <div id="logo">
          <div id="picture">  
          <img id="logo_img" src="../logo/'.$logo.'">
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
          <a href="edit/edit_email.php">Change E-Mail</a>
        </div>
        <div id="password">
          <h4>Password:</h4>
          <p>'.$password.'</p>
          <a href="edit/edit_password.php">Change password</a>
        </div>
    </div>
    </div>  
    <div id="right">
        <div id="likes">
            <i class="fas fa-heart"></i>
            <h1>Likes</h1>
            <p>'.$count_likes_likes.'</p>
        </div>
        <div id="comments">
            <i class="far fa-comment-dots"></i>
            <h1>Comments</h1>
            <p>'.$count_comments.'</p>
        </div>
        <div id="users">
            <i class="fas fa-user-friends"></i>
            <h1>Users</h1>
            <p>'.$count_users.'</p>
        </div>
        <div id="online_users">
            <div id="guest">
                <h1>Online users</h1>
                <p>'.$count_online_users.'</p>
            </div>
            <div id="admin">
                <h1>Online admins</h1>
                <p>'.$count_online_admins.'</p>
            </div>
        </div>
        <div id="upload">
          <a href="../../upload">Upload a photo</a>
        </div>
        <div id="edit_account">
          <a href="edit_account">Edit Account</a>
        </div>
        <div id="search">
          <form id="search_form" action="search/index.php">
            <input name="search_user_input" id="search_input" autocomplete="off" type="text" placeholder="Search an user...">
            <button name="search_user_button" id="search_submit" type="submit"><i class="fa fa-search"></i></button>
            <span id="search_change"><i id="search_left_arrow" class="material-icons">keyboard_arrow_left</i><i id="search_right_arrow" class="material-icons">keyboard_arrow_right</i></span>
          </form>
        </div>
    </div>
    <script src="search/javascript/search_change.js"></script>';
?>
</body>
</html>