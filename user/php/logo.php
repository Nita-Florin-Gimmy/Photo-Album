<?php
  require('../../php/login.php');
  session_start();
	
	if(strlen($_FILES['img']['tmp_name']));
        else $eroare[] = 'Adaugati o fotografie.';	
		
if(!isset($eroare)) {
	
	$null = '';
	
	$fileName = $_FILES['img']['name'];
	
	$fileTmpName = $_FILES['img']['tmp_name'];
	
	$fileSize = $_FILES['img']['size'];
	
	$fileError = $_FILES['img']['error'];
	
	$fileType = $_FILES['img']['type'];
	
	$fileExt = explode('.', $fileName);
	
	$fileActualExt = strtolower(end($fileExt));
	
	$user = $_SESSION['Id'];
	
	$allowed = array('jpg', 'png', 'jpeg');
	
	if (in_array($fileActualExt, $allowed) OR !strlen($_FILES['img']['tmp_name'])) {
		if ($fileError === 0 OR !strlen($_FILES['img']['tmp_name'])){
				if (!strlen($_FILES['img']['tmp_name'])){
					$fileNameNew = $null;
				}else{
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				}
					
				
                    $sql = "UPDATE users SET Logo='$fileNameNew' WHERE Id='$user'";
                    $result = mysqli_query($con, $sql);
					
				$fileDestination = '../logo/' . $fileNameNew;
				
				move_uploaded_file($fileTmpName, $fileDestination);
				
				if ($con->$sql = TRUE) {
                    
					header ("Location: ../");

                }else $mesaj2 = '<h4 style="text-align: center; color: #e60000; font-size: 14px;">Datele nu au putut fi adaugate '. mysql_error(). '</h4>';
				 echo $mesaj2;
			
		}else{
		$eroare_poza[] = "Imaginea nu a putut fi descarcata. Va rugam alegeti o alta imagine sau incercati din nou.";
	      }
		
	} else{
		$eroare_poza[] = "Alege o imagine de tip png/jpg.";
		$mesaj_poza = '<h4 style="text-align: center; color: #e60000; font-size: 14px;">'. implode('<br>', $eroare_poza). '</h4>';
		echo $mesaj_poza;
	      }
   }else{
	   $mesaj = '<h4 style="text-align: center; color: #e60000; font-size: 14px;">'. implode('<br>', $eroare). '</h4>';
	   echo $mesaj;
   }
 