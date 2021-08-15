<?php
require '../../../php/login.php';
session_start();

    if(strlen($_POST['new_email'])>4) $username = $_POST['new_email'];
        else echo 'Please complete the E-Mail!';
    if(strlen($_POST['password'])>7) $password = $_POST['password'];
        else echo 'Please complete the Password!';

        if (isset($_POST['new_email'])){

          $new_email = $_POST['new_email'];
          $email = $_SESSION['Email'];
          $password = $_POST['password'];
          $id = $_SESSION['Id'];
      
          $sql_check = "SELECT * FROM users WHERE Email='$email' AND Pass= '".md5($password)."'";
          $result_check = mysqli_query($con, $sql_check);
          $rows = mysqli_num_rows($result_check);
    
      if($rows != 0){

        $sql = "UPDATE users SET Email='$new_email' WHERE Id='$id'";
        $result = mysqli_query($con, $sql);

        $_SESSION['Email'] = $new_email;

        header ("Location: ../email_changed_successfully.php/");
      }else
      {
        echo 'The Password is wrong.';
      }
    }