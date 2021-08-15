<?php
	session_start();
	require '../../../php/login.php';

  if($_SESSION['Roles'] !== "administrator") 
  {
    header ("Location: ../../../");
  }
?>
<!DOCTYPE html
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script defer src="javascript/like.js"></script>
  <script defer src="javascript/dislike.js"></script>
  <script defer src="javascript/delete_photo.js"></script>
  <script defer src="javascript/ban.js"></script>
  <script defer src="javascript/unban.js"></script>
  <script defer src="javascript/modify_role.js"></script>
  <script defer src="javascript/admin.js"></script>
  <script defer src="javascript/mod.js"></script>
  <script defer src="javascript/user.js"></script>
</head>
<body>
    <div id="wrapper"> 
<?php

require ('../../../php/login.php');
error_reporting(E_ALL ^ E_NOTICE);

if(isset($_GET['search_user_button'])) 
{	
$search_user_input = $_GET['search_user_input'];  
 


  $sql = "SELECT * FROM users WHERE Id LIKE '%$search_user_input%' OR Username LIKE '%$search_user_input%'";
	$result = mysqli_query($con, $sql);
	$rows = mysqli_num_rows($result);
	
    if($rows >= 1)
    {	

      while ($row = mysqli_fetch_array($result)) 
      {
        $id = $row['Id'];
        $banned = $row['Ban'];
        $role = $row['Roles'];
        $ban = $id;
        $user = $ban + "0.2";
        $modify_role = $id + "0.02";
        $pick_role = $id + "0.002";
        $role_admin = $id + "0.0002";
        $role_mod = $id + "0.00002";
        $role_user = $id + "0.000002";
        $pick_admin = $id + "0.0000002";
        $pick_mod = $id + "0.00000002";
        $pick_user = $id + "0.000000002";
        $sql_role = $id + "0.0000000002";
        $role_banned = $id + "0.00000000002";
        $unban = $id + "0.000000000002";
        $username = $row['Username'];


        $sql_logo = "SELECT * FROM users WHERE Id='$id'";
        $result_logo = mysqli_query($con, $sql_logo);
          while ($row_logo = mysqli_fetch_array($result_logo)) 
          {
            $logo = $row_logo['Logo'];
          }

        echo'
            <div class="'.$user.'" id="user">
              <div id="profile">
                <a href="../../profiles/'.$username.'.php"><img src="../../../user/logo/'.$logo.'"></a>
              </div>
              <div id="profile_link">
                <a href="../../profiles/'.$username.'.php">'.$username.'</a>
              </div>'; 

              if ($role == "administrator")
              {
                echo'<p class="'.$sql_role.'" id="sql_role_admin">Administrator</p>';
              }else
              {
                if ($role == "moderator")
                { 
                  echo'<p class="'.$sql_role.'" id="sql_role_mod">Moderator</p>';
                }else
                {
                  if ($banned != "")
                  { 
                    echo'<p class="'.$sql_role.'" id="sql_role_banned">Banned</p>';
                  }else
                  {
                    echo'<p class="'.$sql_role.'" id="sql_role_user">User</p>';
                  }
                }
              }
        echo'
                <p class="'.$role_admin.'" id="role_admin">Administrator</p>
                <p class="'.$role_mod.'" id="role_mod">Moderator</p>
                <p class="'.$role_user.'" id="role_user">User</p>
                <p class="'.$role_banned.'" id="banned">Banned</p>';
          if ($id > 1)
            { 
              if ($banned != "")
              {
                echo'<button onclick="unban();" class="'.$unban.'" id="unban">Unban</button>';
              }else
              {
                echo'<button onclick="ban();" class="'.$ban.'" id="ban">Ban</button>
                    <button onclick="modify_role();" class="'.$modify_role.'" id="modify_role">Modify role</button>
                    <div class="'.$pick_role.'" id="pick_role">
                      <p onclick="admin();" class="'.$pick_admin.'" id="pick_admin">Administrator</p>
                      <p onclick="mod();" class="'.$pick_mod.'" id="pick_mod">Moderator</p>
                      <p onclick="user();" class="'.$pick_user.'" id="pick_user">User</p>
                    </div>';
              }
            }
                echo'<button onclick="ban();" class="'.$ban.'" id="hidden_ban">Ban</button>
                <button onclick="unban();" class="'.$unban.'" id="hidden_unban">Unban</button>
                <button onclick="modify_role();" class="'.$modify_role.'" id="hidden_modify_role">Modify role</button>
                <div class="'.$pick_role.'" id="pick_role">
                  <p onclick="admin();" class="'.$pick_admin.'" id="pick_admin">Administrator</p>
                  <p onclick="mod();" class="'.$pick_mod.'" id="pick_mod">Moderator</p>
                  <p onclick="user();" class="'.$pick_user.'" id="pick_user">User</p>
                </div>
            </div>';
      }
    }
}
?>
<?php

require ('../../../php/photos.php');
error_reporting(E_ALL ^ E_NOTICE);

if(isset($_GET['search_photo_button'])) 
{	
$search_photo_input = $_GET['search_photo_input'];  
 


  $sql = "SELECT * FROM photos WHERE Id LIKE '%$search_photo_input%' OR Clock LIKE '%$search_photo_input%' ORDER BY Id DESC";
	$result = mysqli_query($con, $sql);
	$rows = mysqli_num_rows($result);
	
    if($rows >= 1)
    {	

      while ($row = mysqli_fetch_array($result)) 
      {
  
    $user = $_SESSION['Id'];
    $img = $row['Img'];
    $id = $row['Id'];
    $default = $id;
    $clicked = $default + "0.1";
    $likes = $default + "0.01";
    $default_icon = $default  + "0.001";
    $clicked_icon = $default + "0.0001";
    $del = $default + "0.00001";
    $frame = $default + "0.000001";
    $link = "onclick='location=";
    $link .= '"../../../view/files/'.$id.'.php"';
    $link .= "'";
    $date = $row['Clock'];
  
    if(isset($_SESSION['Username'])) 
    {
  
    $sql_likes = "SELECT * FROM likes WHERE Photo='$id' AND User='$user'";
    $result_likes = mysqli_query($con, $sql_likes);
    $count_match = mysqli_num_rows($result_likes);
    
    if(!$count_match > 0){
  
      $default_icon_display = 'style="display: flex"';
      $clicked_icon_display = 'style="display: none"';
      $default_display = 'style="display: flex"';
      $clicked_display = 'style="display: none"';
    }
    
      while ($row_likes = mysqli_fetch_array($result_likes)) 
      {
        $like_val = $row_likes['Like_val'];
  
        
        if ($like_val == "no")
        {
          $default_icon_display = 'style="display: flex"';
          $clicked_icon_display = 'style="display: none"';
          $default_display = 'style="display: flex"';
          $clicked_display = 'style="display: none"';
        }else
        {
          if ($like_val == "yes")
          {
            $default_icon_display = 'style="display: none"';
            $clicked_icon_display = 'style="display: flex"';
            $default_display = 'style="display: none"';
            $clicked_display = 'style="display: flex"';
          }
        }
      }
    }else
    {
      $user_blank = "true";
    }
  
    $sql_count = "SELECT * FROM likes WHERE Like_val='yes' AND Photo='$id'";
    $result_count = mysqli_query($con, $sql_count);
    $count_likes = mysqli_num_rows($result_count);
  
          echo' <div class="'.$frame.'" id=frame>
            <div class="picture" '.$link.'>
              <img src="../../../upload/photos/'.$img.'">
            </div>';
  
            if($_SESSION['Roles'] == "administrator") {
              echo' <p onclick="which_del()" class="'.$del.'" id="delete_photo">Delete</p>';
                  }
          echo'        
            <div id="details">
              <div class="reactions">';
  
              if(isset($_SESSION['Username'])) 
              {
                echo'<i id="'.$default_icon.'" class="far fa-heart" '.$default_icon_display.'></i><button onclick="like()" id="default" class="'.$default.'" '.$default_display.'></button>';
              }else
              {
                echo '<i id="'.$default_icon.'" class="far fa-heart" '.$default_icon_display.'></i><button onclick="user_blank()" id="default" class="'.$default.'" '.$default_display.'></button>';
              }
  
              echo'
                <i id='.$clicked_icon.' class="fas fa-heart" '.$clicked_icon_display.'></i><button onclick="dislike()" id="clicked" class="'.$clicked.'" '.$clicked_display.'></button>
                <p class="'.$likes.'">'.$count_likes.'<p>
              </div>
              <div class="date">
              <p>'.$date.'</p>
              </div>
            </div>
          </div>';   
      }   
    }
}   
?>


    </div>
</body>
</html>
