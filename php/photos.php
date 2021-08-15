<?php

$con = mysqli_connect('localhost', 'root', '', 'photos');

if (!$con) 
{
	die(mysqli_connect_error());
}