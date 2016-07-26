<?php
 session_start();
?>

<html>
  <head>
      <meta charset="utf-8">
  </head>
  <body>
    <?php require "isAdmin.php" ?>

		<form enctype="multipart/form-data" action="actions.php" method="post">
		<input type="file" name="fi" />
		<input type="submit" name="send" value="Загрузить" />
		</form>
 
 </body>
 </html>
 
 
 
 