<?php
session_start();
require ('../../php/login.php');

$id = $_SESSION['Id'];
$time = time() + 10;

$sql = "UPDATE users SET Last_login='$time' WHERE Id='$id'";
$result = mysqli_query($con, $sql);
?>