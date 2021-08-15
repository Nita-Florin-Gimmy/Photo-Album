<?php
  require '../../php/login.php';
  session_start();

    $username = $_POST['username'];

    $sql = "SELECT * FROM users WHERE Username='$username'";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);

    if($rows > 0){
        echo 'That Username already exists!';
    }

?>