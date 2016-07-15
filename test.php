<html>
  <head>
      <meta charset="utf-8">
  </head>
  <body>
  
    <p>
<?php
if (isset($_GET['tet']))
	{
	$dir    = __DIR__."/files/"."{$_GET['tet']}";
	echo $dir;
	}


mb_internal_encoding("utf-8");
$f = file_get_contents("{$dir}");
$file = mb_convert_encoding ($f ,"UTF-8" , "Windows-1251" );

$arr = json_decode($file, true);
var_dump($arr);
$i = 0;
echo "<hr/><br/>";
foreach($arr as $k => $v)
	{ 
	
	echo $v["question"]."<br/>";  ?>

 <form action="action.php" method="post">
 <input type="textbox" requied name="rit<?= $i ?>" placeholder="ваше предположение">
 <input type=hidden name="tet" value="<?= $dir ?>">
  
<?php $i +=1;

echo "<br/><br/>";	} ?>
	
 <input type="submit" name="submit"> 
 </form>

  </body>
</html>