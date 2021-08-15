<?php
@ob_start();
session_start();
require ("../../php/log.php");

if(isset($_SESSION["Id"])) 
{
    $user_id = $_SESSION["Id"];
          
    $sql_users = "SELECT * FROM users WHERE Id='$user_id'";
    $result_users = mysqli_query($con_log, $sql_users);
    while ($row_users = mysqli_fetch_array($result_users)) 
        {
        $verification = $row_users["Verification"];
        $ban = $row_users["Ban"];
            if ($ban != "")
            {
                header ("Location: ../../user/banned.php");
            }
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../style.css">
  <script defer src="../javascript/options.js"></script>
  <script defer src="../javascript/delete.js"></script>
  <script defer src="../javascript/edit.js"></script>
  <script defer src="../javascript/like.js"></script>
  <script defer src="../javascript/dislike.js"></script>
  <script defer src="../javascript/comment.js"></script>
  <script defer src="../javascript/user_blank.js"></script>
  <script defer src="../../user/status/javascript/update_status.js"></script>
  <script defer src="../../user/status/javascript/get_status.js"></script>
</head>
<body>
<?php

session_start();
require ("../../php/photos.php");

$user = $_SESSION["Id"];

if(isset($_SESSION["Username"])) 
{
$sql_likes = "SELECT * FROM likes WHERE Photo=234 AND User='$user'";
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
}$sql_count = "SELECT * FROM likes WHERE Like_val='yes' AND Photo=234";
$result_count = mysqli_query($con, $sql_count);
$count_likes = mysqli_num_rows($result_count);
echo'
<div id="crate">
        <div class="234.000001" id=frame>
            <div class="picture">
                <img src="../../upload/photos/6116932a8369b0.97355134.png">
            </div>
            <div id="details">
                <div class="reactions">
                ';
                if(isset($_SESSION["Username"])) 
                {
                  if ($verification != "0")
                  {
                echo '<i id="234.001" class="far fa-heart" '.$default_icon_display.'></i><button onclick="verify()" id="default" class="234" '.$default_display.'></button>';
                  }else
                  {
                echo '<i id="234.001" class="far fa-heart" '.$default_icon_display.'></i><button onclick="like()" id="default" class="234" '.$default_display.'></button>';
                  }
                }else
                {
                echo '<i id="234.001" class="far fa-heart" '.$default_icon_display.'></i><button onclick="user_blank()" id="default" class="234" '.$default_display.'></button>';
                }
                echo'
                    <i id=234.0001 class="fas fa-heart" '.$clicked_icon_display.'></i><button onclick="dislike()" id="clicked" class="234.1" '.$clicked_display.'></button>
                    <p class="234.01">'.$count_likes.'<p>
                    </div>
                <div class="date">
                    <p>13/08/2021</p>
                </div>
            </div>';
            ?>
            </div>
        <a href="../../" class="home"><i class="material-icons">cancel</i></a>
    </div>
    <div id="comment_section">
                <div id="comment_list">
    <?php

    require ("../../php/photos.php");
    $sql_comments = "SELECT * FROM comments WHERE Photo=234";
    $result_comments = mysqli_query($con, $sql_comments);
    while ($row = mysqli_fetch_array($result_comments)) 
    {

            $id = $row["Id"];
            $text = $row["Txt"];
            $dots = $id;
            $dots_i = $dots + 0.2;
            $options_close_i = $dots + 0.02;
            $options = $dots + 0.002;
            $delete = $dots + 0.0002;
            $edit = $dots + 0.00002;
            $sent = $dots + 0.000002;
            $p = $dots + 0.0000002;
            $username = $row["Username"];
            $roles = $row["User_role"];
            $pick_color = "";

                if ($roles == "administrator")
                {
                    $pick_color = "red";
                }else
                {
                    if ($roles == "moderator")
                    {
                        $pick_color = "#33ffff";
                    }else
                    {
                        $pick_color = "white";
                    }
                }
                echo' 
            <div id="sent" class="'.$sent.'">
                ';
                if ($row["User"] == $_SESSION["Id"])
                {
                echo '
                <i id="'.$options_close_i.'" class="fa fa-close"></i><button class="'.$options_close.'" id="options_close"></button>
                <i id="'.$dots_i.'" class="material-icons">more_horiz</i><button class="'.$dots.'" onclick="options();" id="dots"></button>
                <div class="'.$options.'" id="options" class="options">    
                    <button onclick="del()" class="'.$delete.'" id="delete">Delete</button>
                    <button onclick="edit()" class="'.$edit.'" id="edit" >Edit</button>
                </div>';
                }else
                {
                if ($_SESSION["Roles"] == "administrator" || $_SESSION["Roles"] == "moderator")
                {
                echo '
                <i id="'.$options_close_i.'" class="fa fa-close"></i><button class="'.$options_close.'" id="options_close"></button>
                <i id="'.$dots_i.'" class="material-icons">more_horiz</i><button class="'.$dots.'" onclick="options();" id="dots"></button>
                <div class="'.$options.'" id="options" class="options">    
                    <button onclick="del()" class="'.$delete.'" id="delete">Delete</button>
                    <button onclick="edit()" class="'.$edit.'" id="edit" >Edit</button>
                </div>';
                }
            }
                $color = 'style="color: '.$pick_color.'"';
                echo '
                <a href="../../user/profiles/'.$username.'.php" '.$color.'>'.$username.'</a>
                <p class="'.$p.'">'.$text.'</p>
                </div>
                ';
            }
                echo'
            </div>
            <div id="comment_there">
            </div>
    
            <div class="space">
            </div>
            <div id="write_section">
            <p contenteditable="true" value="" class="comment"></p>
            <p contenteditable="true" value="" class="comment_edit"></p>
            <h4>Editing message</h4>
            <button id="cancel"><i class="material-icons">cancel</i></button>
            ';
            if(isset($_SESSION["Username"])) 
            {   
              if ($verification != "0")
                {
            echo' <button onclick="verify();" id="enter_disabled"><i class="fa fa-paper-plane-o"></i></button>';
                }else
                {
            echo' <button id="enter"><i class="fa fa-paper-plane-o"></i></button>';
                }
            }else
            {
            echo' <button onclick="user_blank();" id="enter_disabled"><i class="fa fa-paper-plane-o"></i></button>';
            }
            echo'
    </div>
    ';
    ?>
    </div> 
</body>
</html>
