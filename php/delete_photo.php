<?php
  require 'photos.php';
  session_start();

    $id = $_POST['id'];

    $sql = "DELETE FROM photos WHERE Id='$id'";
    $result = mysqli_query($con, $sql);
?>