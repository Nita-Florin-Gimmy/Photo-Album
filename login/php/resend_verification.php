<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	require_once '../../php/login.php';
	require_once 'PHPMailer.php';
	require_once 'SMTP.php';
	require_once 'Exception.php';
	session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$user_id = $_SESSION['Id'];

$sql = "SELECT * FROM users WHERE Id='$user_id'";
$result = mysqli_query($con, $sql);

	while ($row = mysqli_fetch_array($result)) 
	  {
		$code = $row['Verification'];
		$email = $row['Email'];
	  }


$body = 'Your confirmation code is: '.$code.'';


$mail = new PHPMailer();

$mail->isSMTP();

$mail->Host = "smtp.gmail.com";

$mail->SMTPDebug = 0;

$mail->SMTPAuth = true;

$mail->SMTPSecure = 'ssl';

$mail->Port = 465;

$mail->Username = 'testtesttest296296@gmail.com';

$mail->Password = 'Nuconteazaparola1';

$mail->Subject = 'Verify your account.';

$mail->SetFrom('testtesttest296296@gmail.com');

$mail->Body = $body;

$mail->AddAddress($email);

if ( $mail->send() )
{
	header ("Location: ../email_verification.php?resend=succes");
}else
{
    echo 'Error';
}

$mail->smtpClose();

?>