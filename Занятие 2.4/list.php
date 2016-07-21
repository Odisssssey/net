<?php
 session_start();
?>

<html>
  <head>
      <meta charset="utf-8">
  </head>
  <body>
  
    <p>
<?php if (isset($_SESSION['isPassword']) || isset($_SESSION['islogin']) || isset($_SESSION['isGurst'])): ?>
<?php
$dir    = __DIR__."/files/";
$files = scandir($dir);

echo "<table>";
foreach($files as $k => $v)
	{ 
	
		if(preg_match('/\.(?:json)$/', $v))
			{  ?> 
			
			<tr><td><a href='http://university.netology.ru/u/tarutin/test.php?tet=<?= "{$v}" ?>'><?= "{$v}" ?></a></td>
			<?php if (isset($_SESSION['isPassword']) || isset($_SESSION['islogin'])): ?>
			<td><a href='http://university.netology.ru/u/tarutin/delete.php?tet=<?= "{$v}" ?>'> удалить</a></td></tr>
			<br/>
			<?php endif; ?>
			<?php }
		
	
	}

echo "</table>";	

?> 
	<?php if (isset($_SESSION['isPassword']) || isset($_SESSION['islogin'])): ?>
<a href='http://university.netology.ru/u/tarutin/admin.php'>Добавить тест</a>
	<?php endif; ?>
<?php else: ?>
	<?php header('Location: index.php'); ?>
<?php endif; ?>
    </p>
   </body>
</html>
