<?php

$con = mysqli_connect('localhost', 'root', '', 'users');

if (!$con) 
{
	die(mysqli_connect_error());
}