<?php

$con = mysqli_connect('localhost', 'root', '', 'likes');

if (!$con) 
{
	die(mysqli_connect_error());
}