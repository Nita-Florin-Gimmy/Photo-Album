<?php
$head = '<?php
@ob_start();
session_start();
require ("../../php/log.php");

if(isset($_SESSION["Id"])) 
{
    $user_id = $_SESSION["Id"];
          
    $sql_users = "SELECT * FROM users WHERE Id=';
    $head .= "'";
    $head .= '$user_id';
    $head .= "'";
    $head .= '";
    ';
    $head .= '$result_users = mysqli_query($con_log, $sql_users);
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
';

$picture = '<?php

session_start();
require ("../../php/photos.php");

$user = $_SESSION["Id"];

if(isset($_SESSION["Username"])) 
{
';

$picture .= '$sql_likes = "SELECT * FROM likes WHERE Photo='.$id.'';
$picture .= " A";
$picture .= "ND";
$picture .= " User=";
$picture .= "'";
$picture .= '$user';
$picture .= "'";
$picture .= '";
';


$picture .= '$result_likes = mysqli_query($con, $sql_likes);
$count_match = mysqli_num_rows($result_likes);

if(!$count_match > 0){

  $default_icon_display = ';
  $picture .= "'style=";
  $picture .= '"display: flex"';
  $picture .= "';
  ";
  $picture .= '$clicked_icon_display = ';
  $picture .= "'style=";
  $picture .= '"display: none"';
  $picture .= "';
  ";
  $picture .= '$default_display = ';
  $picture .= "'style=";
  $picture .= '"display: flex"';
  $picture .= "';
  ";
  $picture .= '$clicked_display = ';
  $picture .= "'style=";
  $picture .= '"display: none"';
  $picture .= "';
}
";
  
$picture .= 'while ($row_likes = mysqli_fetch_array($result_likes)) 
      {
    $like_val = $row_likes[';
    $picture .= "'Like_val'];
    ";

    
    $picture .= 'if ($like_val == "no")
    {
    ';

    $picture .= '$default_icon_display = ';
    $picture .= "'style=";
    $picture .= '"display: flex"';
    $picture .= "';
    ";
    $picture .= '$clicked_icon_display = ';
    $picture .= "'style=";
    $picture .= '"display: none"';
    $picture .= "';
    ";
    $picture .= '$default_display = ';
    $picture .= "'style=";
    $picture .= '"display: flex"';
    $picture .= "';
    ";
    $picture .= '$clicked_display = ';
    $picture .= "'style=";
    $picture .= '"display: none"';
    $picture .= "';
    }else
    {
    ";

    $picture .= 'if ($like_val == "yes")
    {
    ';
    $picture .= '$default_icon_display = ';
    $picture .= "'style=";
    $picture .= '"display: none"';
    $picture .= "';
    ";
    $picture .= '$clicked_icon_display = ';
    $picture .= "'style=";
    $picture .= '"display: flex"';
    $picture .= "';
    ";
    $picture .= '$default_display = ';
    $picture .= "'style=";
    $picture .= '"display: none"';
    $picture .= "';
    ";
    $picture .= '$clicked_display = ';
    $picture .= "'style=";
    $picture .= '"display: flex"';
    $picture .= "';
      }
    }
  }
}";

$picture .= '$sql_count = "SELECT * FROM likes WHERE Like_val=';
$picture .= "'yes'";
$picture .= ' A';
$picture .= 'ND Photo='.$id.'';
$picture .= '";
';

$picture .= '$result_count = mysqli_query($con, $sql_count);
$count_likes = mysqli_num_rows($result_count);
';

$picture .= "echo'
";
$picture .= '<div id="crate">
        <div class="'.$frame.'" id=frame>
            <div class="picture">
                <img src="../../upload/photos/'.$img.'">
            </div>
            <div id="details">
                <div class="reactions">
                ';
                $picture .= "';
                ";

                $picture .= 'if(isset($_SESSION["Username"])) 
                {
                  if ($verification != "0")
                  {
                ';
                $picture .= "echo '";
                $picture .= '<i id="'.$default_icon.'" class="far fa-heart"';
                $picture .= " '";
                $picture .= '.$default_icon_display.';
                $picture .= "'";
                $picture .= '></i><button onclick="verify()" id="default" class="'.$default.'" ';
                $picture .= "'";
                $picture .= '.$default_display.';
                $picture .= "'></button>';
                  }else
                  {
                ";
                $picture .= "echo '";
                $picture .= '<i id="'.$default_icon.'" class="far fa-heart"';
                $picture .= " '";
                $picture .= '.$default_icon_display.';
                $picture .= "'";
                $picture .= '></i><button onclick="like()" id="default" class="'.$default.'" ';
                $picture .= "'";
                $picture .= '.$default_display.';
                $picture .= "'></button>';
                  }
                }else
                {
                ";
                $picture .= "echo '";
                $picture .= '<i id="'.$default_icon.'" class="far fa-heart"';
                $picture .= " '";
                $picture .= '.$default_icon_display.';
                $picture .= "'";
                $picture .= '></i><button onclick="user_blank()" id="default" class="'.$default.'" ';
                $picture .= "'";
                $picture .= '.$default_display.';
                $picture .= "'></button>';
                }
                ";

                    $picture .= "echo'
                    ";
                    $picture .= '<i id='.$clicked_icon.' class="fas fa-heart" ';
                    $picture .= "'";
                    $picture .= '.$clicked_icon_display.';
                    $picture .= "'";
                    $picture .= '></i><button onclick="dislike()" id="clicked" class="'.$clicked.'" ';
                    $picture .= "'";
                    $picture .= '.$clicked_display.';
                    $picture .= "'></button>
                    ";
                    $picture .= '<p class="'.$likes.'">';
                    $picture .= "'";
                    $picture .= '.$count_likes.';
                    $picture .= "'";
                    $picture .= '<p>
                    ';
                    $picture .= '</div>
                <div class="date">
                    <p>'.$date.'</p>
                </div>
            </div>';
            $picture .= "';
            ";
            $picture .= '?>
            ';

    $picture .= '</div>
        <a href="../../" class="home"><i class="material-icons">cancel</i></a>
    </div>
    ';
    $comments = '<div id="comment_section">
                <div id="comment_list">
    ';
    $comments .= '<?php

    require ("../../php/photos.php");
    ';

    $comments .= '$sql_comments = "SELECT * FROM comments WHERE Photo='.$id.'";
    $result_comments = mysqli_query($con, $sql_comments);
    ';

    $comments .= 'while ($row = mysqli_fetch_array($result_comments)) 
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
            ';
            
            $comments .= '$pick_color = "";

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
                ';

            $comments .= "echo' 
            ";
            $comments .= '<div id="sent" class="';
                $comments .= "'";
                $comments .= '.$sent.';
                $comments .= "'";
                $comments .= '">
                ';
                $comments .= "';
                ";
                $comments .= 'if ($row["User"] == $_SESSION["Id"])
                {
                ';
                $comments .= "echo '
                ";
                $comments .= '<i id="';
                $comments .= "'";
                $comments .= '.$options_close_i.';
                $comments .= "'";
                $comments .= '" class="fa fa-close"></i><button class="';
                $comments .= "'";
                $comments .= '.$options_close.';
                $comments .= "'";
                $comments .= '" id="options_close"></button>
                ';
                $comments .= '<i id="';
                $comments .= "'";
                $comments .= '.$dots_i.';
                $comments .= "'";
                $comments .= '" class="material-icons">more_horiz</i><button class="';
                $comments .= "'";
                $comments .= '.$dots.';
                $comments .= "'";
                $comments .= '" onclick="options();" id="dots"></button>
                ';
                $comments .= '<div class="';
                $comments .= "'";
                $comments .= '.$options.';
                $comments .= "'";
                $comments .= '" id="options" class="options">    
                    <button onclick="del()" class="';
                    $comments .= "'";
                    $comments .= '.$delete.';
                    $comments .= "'";
                    $comments .= '"';
                    $comments .= ' id="delete">Delete</button>
                    <button onclick="edit()" class="';
                    $comments .= "'";
                    $comments .= '.$edit.';
                    $comments .= "'";
                    $comments .= '" id="edit" >Edit</button>
                </div>';
                $comments .= "';
                ";
                $comments .= '}else
                {
                ';
                $comments .= 'if ($_SESSION["Roles"] == "administrator" || $_SESSION["Roles"] == "moderator")
                {
                ';
                $comments .= "echo '
                ";
                $comments .= '<i id="';
                $comments .= "'";
                $comments .= '.$options_close_i.';
                $comments .= "'";
                $comments .= '" class="fa fa-close"></i><button class="';
                $comments .= "'";
                $comments .= '.$options_close.';
                $comments .= "'";
                $comments .= '" id="options_close"></button>
                ';
                $comments .= '<i id="';
                $comments .= "'";
                $comments .= '.$dots_i.';
                $comments .= "'";
                $comments .= '" class="material-icons">more_horiz</i><button class="';
                $comments .= "'";
                $comments .= '.$dots.';
                $comments .= "'";
                $comments .= '" onclick="options();" id="dots"></button>
                ';
                $comments .= '<div class="';
                $comments .= "'";
                $comments .= '.$options.';
                $comments .= "'";
                $comments .= '" id="options" class="options">    
                    <button onclick="del()" class="';
                    $comments .= "'";
                    $comments .= '.$delete.';
                    $comments .= "'";
                    $comments .= '"';
                    $comments .= ' id="delete">Delete</button>
                    <button onclick="edit()" class="';
                    $comments .= "'";
                    $comments .= '.$edit.';
                    $comments .= "'";
                    $comments .= '" id="edit" >Edit</button>
                </div>';
                $comments .= "';
                }
            }
                ";

                $comments .= '$color = ';
                $comments .= "'style=";
                $comments .= '"color: ';
                $comments .= "'";
                $comments .= '.$pick_color.';
                $comments .= "'";
                $comments .= '"';
                $comments .= "';
                ";
                $comments .= "echo '
                ";
                $comments .=    '<a href="../../user/profiles/';
                $comments .=    "'";
                $comments .=    '.$username.';
                $comments .=    "'.php";
                $comments .=    '"';
                $comments .=    " '";
                $comments .=    '.$color.';
                $comments .=    "'";
                $comments .=    ">'";
                $comments .=    '.$username.';
                $comments .=    "'</a>
                ";
                    $comments .= '<p ';
                    $comments .= 'class="';
                    $comments .= "'";
                    $comments .= '.$p.';
                    $comments .= "'";
                    $comments .= '">';
                    $comments .= "'";
                    $comments .= '.$text.';
                    $comments .= "'</p>
                </div>
                ";
                $comments .= "';
            }
                ";
            $comments .= "echo'
            </div>
            ";
            $comments .= '<div id="comment_there">
            </div>
    
            <div class="space">
            </div>
            ';

    $write = '<div id="write_section">
            <p contenteditable="true" value="" class="comment"></p>
            <p contenteditable="true" value="" class="comment_edit"></p>
            <h4>Editing message</h4>
            <button id="cancel"><i class="material-icons">cancel</i></button>
            ';
    $write .= "';
            ";

    $write .= 'if(isset($_SESSION["Username"])) 
            {   
              if ($verification != "0")
                {
            ';
    $write .= "echo'";
    $write .= ' <button onclick="verify();" id="enter_disabled"><i class="fa fa-paper-plane-o"></i></button>';
    $write .= "';
                }else
                {
            ";
    $write .= "echo'";
    $write .= ' <button id="enter"><i class="fa fa-paper-plane-o"></i></button>';
    $write .= "';
                }
            }else
            {
            ";
    $write .= "echo'";
    $write .= ' <button onclick="user_blank();" id="enter_disabled"><i class="fa fa-paper-plane-o"></i></button>';
    $write .= "';
            }
            ";

    $write .= "echo'
    </div>
    ";
    $write .= "';
    ";
    $write .= '?>
    </div> 
</body>
</html>
';
?>