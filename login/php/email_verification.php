<?php
require '../../php/login.php';
session_start();

if (isset($_POST['submit'])){
  $code = $_POST['code'];
  $user_id = $_SESSION['Id'];
  $verified = 0;

  $sql = "SELECT * FROM users WHERE Id='$user_id'";
  $result = mysqli_query($con, $sql);
  
    while ($row = mysqli_fetch_array($result)) 
    {
      $get_code = $row['Verification'];
    }
    if ($get_code == $code)
    {
      $sql_verified = "UPDATE users SET Verification='$verified' WHERE Id='$user_id'";
      $result_verified = mysqli_query($con, $sql_verified);

      header ("Location: ../account_verified.php");
    }else
    {
      header ("Location: ../email_verification.php?error=wrong");
    }
}
?>