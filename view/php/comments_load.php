<?php
session_start();
require ("../../php/photos.php");

$photo_id = $_POST['id'];

$sql_comments = "SELECT * FROM comments WHERE Photo='$photo_id'";
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
    $pick_color = "";
    $username = $row['Username'];
    $roles = $row['User_role'];
    

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
    <div id="sent" class="'.$sent.'">';
    
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
?>