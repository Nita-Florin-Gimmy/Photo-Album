<?php
  require '../../php/login.php';
  require_once 'PHPMailer.php';
  require_once 'SMTP.php';
  require_once 'Exception.php';
  session_start();

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

    $seed_number = str_split('0123456789');
    $seed_lowercase = str_split('abcdefghijklmnopqrstuvwxyz');
    $seed_uppercase = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');

    shuffle($seed_number);
    shuffle($seed_lowercase);
    shuffle($seed_uppercase);
    
    foreach (array_rand($seed_number, 2) as $k)  $number .= $seed_number[$k];
    foreach (array_rand($seed_lowercase, 5) as $k)  $lowercase .= $seed_lowercase[$k];
    foreach (array_rand($seed_uppercase, 2) as $k)  $uppercase .= $seed_uppercase[$k];

    $password = $uppercase.$lowercase.$number;
    $encrypted_password = md5($password);
    $hidden = strlen($password);

    $email = $_POST['email'];

    $sql_check = "SELECT * FROM users WHERE Email='$email'";
    $result_check = mysqli_query($con, $sql_check);
    $rows = mysqli_num_rows($result_check);
	
    if($rows > 0){
  
      $sql = "UPDATE users SET Pass='$encrypted_password', Hidden_password='$hidden' WHERE Email='$email'";
      $result = mysqli_query($con, $sql);

      $body = 'Your new Password is: '.$password.'';
      
      
      $mail = new PHPMailer();
      
      $mail->isSMTP();
      
      $mail->Host = "smtp.gmail.com";
      
      $mail->SMTPDebug = 0;
      
      $mail->SMTPAuth = true;
      
      $mail->SMTPSecure = 'ssl';
      
      $mail->Port = 465;
      
      $mail->Username = 'testtesttest296296@gmail.com';
      
      $mail->Password = 'Nuconteazaparola1';
      
      $mail->Subject = 'New Password';
      
      $mail->SetFrom('testtesttest296296@gmail.com');
      
      $mail->Body = $body;
      
      $mail->AddAddress($email);
      
      if ( $mail->send() )
      {
        header ("Location: ../reset_successfully.php");
      }else
      {
          echo 'Error';
      }
      
      $mail->smtpClose();

    }else
    {
      echo 'Error';
    }
?>