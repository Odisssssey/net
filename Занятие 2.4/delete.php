<?php
 session_start();
?>

<html>
  <head>
      <meta charset="utf-8">
  </head>
  <body>
  
    <p>
<?php if (isset($_SESSION['isPassword']) || isset($_SESSION['islogin'])): ?>	
	
<?php
	$dir    = __DIR__."/files/"."{$_GET['tet']}";

unlink("{$dir}");	
header('Location: http://university.netology.ru/u/tarutin/list.php');
?>

<?php else: ?>
	<?php header('Location: http://university.netology.ru/u/tarutin/list.php'); ?>
<?php endif; ?>
  </body>
</html>