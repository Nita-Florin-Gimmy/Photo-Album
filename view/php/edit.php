<?php
  require '../../php/photos.php';
  session_start();

    $id = $_POST['id'];
    $text = $_POST['text'];

    $sql = "UPDATE comments SET Txt='$text' WHERE Id='$id'";
    $result = mysqli_query($con, $sql);
?>