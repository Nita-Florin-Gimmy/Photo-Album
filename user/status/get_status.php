<?php
session_start();
require ('../../php/login.php');

$time = time();
    
$sql_count_online_users = "SELECT * FROM users WHERE Last_login > '$time' AND Roles = 'user'";
$result_count_online_users = mysqli_query($con, $sql_count_online_users);
$count_online_users = mysqli_num_rows($result_count_online_users);

$sql_count_online_admins = "SELECT * FROM users WHERE Last_login > '$time' AND Roles != 'user'";
$result_count_online_admins = mysqli_query($con, $sql_count_online_admins);
$count_online_admins = mysqli_num_rows($result_count_online_admins);

	$html.='
                <div id="guest">
                    <h1>Online users</h1>
                    <p>'.$count_online_users.'</p>
                </div>
                <div id="admin">
                    <h1>Online admins</h1>
                    <p>'.$count_online_admins.'</p>
                </div>
            ';
echo $html;
?>