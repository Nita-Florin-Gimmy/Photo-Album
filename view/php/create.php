<?php

 require '../../php/photos.php';

 session_start();
 
 	$sql = "SELECT * FROM photos";
    $result = mysqli_query($con, $sql);
	
	    while ($row = mysqli_fetch_array($result)) 
		{
			$img = $row['Img'];
			$id = $row['Id'];
			$date = $row['Clock'];
			$default = $id;
			$clicked = $default + "0.1";
			$likes = $default + "0.01";
			$default_icon = $default  + "0.001";
			$clicked_icon = $default + "0.0001";
			$del = $default + "0.00001";
			$frame = $default + "0.000001";

$myFile = "../files/".$id.".php";
$fh = fopen($myFile, 'w'); 

include '../index.php';

$stringData = "$head";
$stringData .= "$picture";
$stringData .= "$comments";
$stringData .= "$write";


fwrite($fh, $stringData);
fclose($fh);

header ("Location: ../files/".$id.".php");
        }
?>