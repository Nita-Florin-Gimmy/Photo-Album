<?php
require '../../../../php/login.php';
session_start();

    if(strlen($_POST['new_username'])>4) $username = $_POST['new_username'];
        else echo 'Please complete the Username!';
    if(strlen($_POST['password'])>7) $password = $_POST['password'];
        else echo 'Please complete the Password!';

        if (isset($_POST['new_username'])){

          $new_username = $_POST['new_username'];
          $username = $_SESSION['Username'];
          $password = $_POST['password'];
          $id = $_SESSION['Id'];
      
          $sql_check = "SELECT * FROM users WHERE Username='$username' AND Pass= '".md5($password)."'";
          $result_check = mysqli_query($con, $sql_check);
          $rows = mysqli_num_rows($result_check);
    
      if($rows != 0){

        $sql = "UPDATE users SET Username='$new_username' WHERE Id='$id'";
        $result = mysqli_query($con, $sql);

        $_SESSION['Username'] = $new_username;

        header ("Location: ../username_changed_successfully.php/");
      }else
      {
        echo 'The Password is wrong.';
      }
    }