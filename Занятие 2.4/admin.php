<?php
 session_start();
?>

<html>
  <head>
      <meta charset="utf-8">
  </head>
  <body>
    <?php if (isset($_SESSION['isPassword']) || isset($_SESSION['islogin'])): ?>

		<form enctype="multipart/form-data" action="actions.php" method="post">
		<input type="file" name="fi" />
		<input type="submit" name="send" value="Загрузить" />
		</form>
	<?php else: ?>
	
	<?php header('MyHeader: error403', true, 403); ?>
	
	<?php endif; ?>
	
 
 </body>
 </html>
 
 
 
 