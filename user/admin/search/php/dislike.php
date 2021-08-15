<?php
  require '../../../php/photos.php';
  session_start();

    $like = $_POST['like_val'];
    $photo = $_POST['id'];
    $user = $_SESSION['Id'];
    $sql = "UPDATE likes SET Like_val='$like' WHERE Photo='$photo' AND User='$user'";
    $result = mysqli_query($con, $sql);
    
?>