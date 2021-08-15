<?php
require '../../../php/login.php';
session_start();

    if(strlen($_POST['new_password'])>4) $username = $_POST['new_password'];
        else echo 'Please complete the New Password!';
    if(strlen($_POST['password'])>7) $password = $_POST['password'];
        else echo 'Please complete the Password!';

        if (isset($_POST['new_password'])){

          $new_password = $_POST['new_password'];
          $password = $_POST['password'];
          $encrypted_password = md5($new_password);
          $hidden = strlen($new_password);
          $id = $_SESSION['Id'];
      
          $sql_check = "SELECT * FROM users WHERE Id='$id' AND Pass= '".md5($password)."'";
          $result_check = mysqli_query($con, $sql_check);
          $rows = mysqli_num_rows($result_check);
    
      if($rows != 0){

        $sql = "UPDATE users SET Pass='$encrypted_password' WHERE Id='$id'";
        $result = mysqli_query($con, $sql);

        $_SESSION['Hidden'] = $hidden;

        header ("Location: ../password_changed_successfully.php/");
      }else
      {
        echo 'The Password is wrong.';
      }
    }