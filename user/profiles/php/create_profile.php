<?php

 require '../../../php/login.php';

 session_start();
 
 	$sql = "SELECT * FROM users";
    $result = mysqli_query($con, $sql);
	
	    while ($row = mysqli_fetch_array($result)) 
		{
			$logo = $row['Logo'];
			$id = $row['Id'];
            $username = $row['Username'];
            $role = $row['Roles'];
            $pick_color = "";

                if ($role == "administrator")
                {
                    $pick_color = "red";
                }else
                {
                    if ($role == "moderator")
                    {
                        $pick_color = "green";
                    }
                }
            $color = 'style="color: '.$pick_color.'"';

$myFile = "../".$username.".php";
$fh = fopen($myFile, 'w'); 

include '../index.php';

$stringData = "$head";
$stringData .= "$header";
$stringData .= "$wrapper";


fwrite($fh, $stringData);
fclose($fh);

header ("Location: ../../../");
        }
?>