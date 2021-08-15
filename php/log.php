<?php

$con_log = mysqli_connect('localhost', 'root', '', 'users');

if (!$con_log) 
{
	die(mysqli_connect_error());
}