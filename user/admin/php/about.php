<?php
  require '../../../php/login.php';
  session_start();

    $text = $_POST['text'];
    $user = $_SESSION['Id'];

        $sql = "SELECT * FROM about WHERE User='$user'";
        $result = mysqli_query($con, $sql);
        $rows = mysqli_num_rows($result);
    
    if($rows > 0){
    
        $sql = "UPDATE about SET Txt='$text' WHERE User='$user'";
        $result = mysqli_query($con, $sql);
    }else{
    
            $sql = "INSERT INTO about (User, Txt) VALUES ('$user', '$text')";
            $result = mysqli_query($con, $sql);

        }
        
    ?>
?>