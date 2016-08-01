<?php
 session_start();
?>

<html>
  <head>
      <meta charset="utf-8">
  </head>
  <body>
  
    <p>
<?php require "isGuest.php" ?>
<?php
$dir    = __DIR__."/files/";
$files = scandir($dir);

echo "<table>";
foreach($files as $k => $v)
	{ 
	
		if(preg_match('/\.(?:json)$/', $v))
			{  ?> 
			
			<tr><td><a href='test.php?tet=<?= "{$v}" ?>'><?= "{$v}" ?></a></td>
			<?php if (isset($_SESSION['isPassword']) || isset($_SESSION['islogin'])): ?>
			<td><a href='delete.php?tet=<?= "{$v}" ?>'> удалить</a></td></tr>
			<br/>
			<?php endif; ?>
			<?php }
		
	
	}

echo "</table>";	

?> 
	<?php if (isset($_SESSION['isPassword']) || isset($_SESSION['islogin'])): ?>
<a href='admin.php'>Добавить тест</a>
	<?php endif; ?>
    </p>
   </body>
</html>
