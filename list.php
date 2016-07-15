<html>
  <head>
      <meta charset="utf-8">
  </head>
  <body>
  
    <p>
<?php
$dir    = __DIR__."/files/";
$files = scandir($dir);
//print_r($files);

foreach($files as $k => $v)
	{ 
	
		if(preg_match('/\.(?:json)$/', $v))
			{ ?> 
			<br/>
			<a href='http://university.netology.ru/u/tarutin/test.php?tet=<?= "{$v}" ?>'><?= "{$v}" ?></a>
			<?php }
		
	
	}

?> 

    </p>
   </body>
</html>
