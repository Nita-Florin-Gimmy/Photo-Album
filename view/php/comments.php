<?php
  require '../../php/photos.php';
  session_start();

    $text = $_POST['text'];
    $photo = $_POST['id'];
    $user = $_SESSION['Id'];
    $role = $_SESSION['Roles'];
    $username = $_SESSION['Username'];

    $sql = "INSERT INTO comments (Txt, User, Photo, User_role, Username) VALUES ('$text', '$user', '$photo', '$role', '$username')";
    $result = mysqli_query($con, $sql);
?>