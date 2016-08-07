<?php
 session_start();
 require_once("fanctions.php"); 
?>

<html>
  <head>
      <meta charset="utf-8">
  </head>
  <body>
    <?php 
	if (isAdmin() == true){
		require "header.php";
		}else{
		header('Location: 403.php', true); 
	}
	?>

		<form enctype="multipart/form-data" action="actions.php" method="post">
		<input type="file" name="fi" />
		<input type="submit" name="send" value="Загрузить" />
		</form>
 
 </body>
 </html>
 
 
 
 