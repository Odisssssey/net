<?php
mb_internal_encoding("utf-8");
$f = fopen("srh.csv", "r");
//$dat = fgetcsv($f, ",");
while($str = fgetcsv($f))
{
	//var_dump($str);
	//echo "<br/>{$str[0]}<hr/>" ;
	$new = "new_{$str[0]}";
	echo "<a href='img/{$str[0]}'>{$str[0]}</a><br/><img src='{$new}'><br/>";
	
	
	

}

?>
