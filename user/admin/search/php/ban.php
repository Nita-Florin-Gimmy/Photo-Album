<?php
  require '../../../../php/login.php';
  session_start();

  $date = date("d/m/Y");
  $id = $_POST['id'];
  $role = "";

  $sql = "UPDATE users SET Ban='$date', Roles='$role' WHERE id='$id'";
  $result = mysqli_query($con, $sql);	
?>