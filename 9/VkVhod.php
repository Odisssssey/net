<?php 
session_start();
?>

<html>
  <head>
      <meta charset="utf-8">
  </head>
  <body>
  
    <p>

	<?php if (!empty($_SESSION['login'])): ?>
		<?php header('Location: index.php'); ?>
		<?php else: ?>
 <form action="actioni.php" method="post">
<input type="textbox" requied name="idVk" placeholder="введите свой id">
<input type="submit" name="send" value="Загрузить" />
</form>
    <?php endif; ?>
</body>
</html>