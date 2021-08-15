<?php
session_start();
require 'php/log.php';

  $user_id = $_SESSION['Id'];
          
  $sql_users = "SELECT * FROM users WHERE Id='$user_id'";
  $result_users = mysqli_query($con_log, $sql_users);
    while ($row_users = mysqli_fetch_array($result_users)) 
      {
        $logo = $row_users['Logo'];
        $verification = $row_users['Verification'];
        $ban = $row_users['Ban'];

        if ($ban != "")
        {
            header ("Location: user/banned.php");
        }
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
  <link rel="stylesheet" href="style.css">
  <script defer src="javascript/like.js"></script>
  <script defer src="javascript/dislike.js"></script>
  <script defer src="javascript/delete_photo.js"></script>
  <script defer src="javascript/user_blank.js"></script>
  <script defer src="/user/status/javascript/update_status.js"></script>
</head>
<body>
    <header>
        <h1>WELCOME TO MY PHOTO ALBUM</H1>
        <div class="links">
          <?php
		      session_start();
		      require 'php/login.php';
          require 'php/photos.php';
		
		          if(isset($_SESSION['Username'])) 
              {
                echo'
                  <a href="login/php/logout.php" class="log_out">Log-Out<i class="fa fa-share"></i></a>';
              }else
              {
                echo'
                  <a href="login/index.php" class="login">Login<i class="fa fa-share"></i></a>';
              }

		          if(isset($_SESSION['Username'])) 
              {
                echo'
                  <div id="profile">
                    <a href="user"><img src="user/logo/'.$logo.'"></a>
                  </div>';
              }
    echo' </div>
    </header>
    <div id="wrapper">';

  $user = $_SESSION['Id'];
  $sql = "SELECT * FROM photos ORDER BY Id DESC";
  $result = mysqli_query($con, $sql);

	  while ($row = mysqli_fetch_array($result)) 
		{

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
      $link .= '"view/files/'.$id.'.php"';
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
            <img src="upload/photos/'.$img.'">
          </div>';

          if($_SESSION['Roles'] == "administrator") {
            echo' <p onclick="which_del()" class="'.$del.'" id="delete_photo">Delete</p>';
                }
        echo'        
          <div id="details">
            <div class="reactions">';

            if(isset($_SESSION['Username'])) 
            {
              if ($verification != '0')
              {
                echo '<i id="'.$default_icon.'" class="far fa-heart" '.$default_icon_display.'></i><button onclick="verify()" id="default" class="'.$default.'" '.$default_display.'></button>';
              }else
              {
                echo '<i id="'.$default_icon.'" class="far fa-heart" '.$default_icon_display.'></i><button onclick="like()" id="default" class="'.$default.'" '.$default_display.'></button>';
              }
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
?>


    </div>
</body>
</html>
