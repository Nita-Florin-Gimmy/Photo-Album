<?php
  require '../../php/photos.php';
  session_start();

    $like = $_POST['like_val'];
    $photo = $_POST['id'];
    $user = $_SESSION['Id'];

    $sql = "SELECT * FROM likes WHERE Photo='$photo' AND User='$user'";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);

if($rows > 0){

    $sql = "UPDATE likes SET Like_val='$like' WHERE Photo='$photo' AND User='$user'";
    $result = mysqli_query($con, $sql);
}else{

        $sql = "INSERT INTO likes (Like_val, User, Photo) VALUES ('$like', '$user', '$photo')";
        $result = mysqli_query($con, $sql);
    }
    
?>