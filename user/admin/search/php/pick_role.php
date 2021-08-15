<?php
  require '../../../../php/login.php';
  session_start();

    $role = $_POST['role'];
    $user = $_POST['id'];

    $sql = "UPDATE users SET Roles='$role' WHERE Id='$user'";
    $result = mysqli_query($con, $sql);
    
?>