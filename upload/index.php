<?php
	session_start();
	require '../php/login.php';

  if($_SESSION['Roles'] !== "administrator") 
  {
    header ("Location: ../");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="wrapper">
        <form autocomplete="off" action="php/upload.php" method="post" enctype="multipart/form-data">
          <div id=frame>
            <input hidden id="file" type="file" accept=".png,.jpg,.jpeg" name="img">
            <label for="file">
			    <div class="picture">
                    <img src="../img/camera.png" id='preview'>
                    <script src="preview.js"></script>
                    <div id="cancel" onclick="location.href='../user/admin';">Cancel</div>
                    <button id="submit" name="submit" type="submit">Upload</button>
                </div>
            </label>
          </div>
        </form>
    </div>
</body>
</html>