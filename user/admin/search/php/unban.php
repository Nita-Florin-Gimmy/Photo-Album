<?php
  require '../../../../php/login.php';
  session_start();

  $id = $_POST['id'];
  $role = "user";
  $unban = "";

  $sql = "UPDATE users SET Ban='$unban', Roles='$role' WHERE id='$id'";
  $result = mysqli_query($con, $sql);	
?>