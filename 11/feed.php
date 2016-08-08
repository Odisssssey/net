<?php
function data_class_autoload($class_name)
{
	$file_name = mb_strtolower($class_name, 'utf-8').".class.php";
	if(file_exists($file_name))
	{
		require_once $file_name;
	}
}

spl_autoload_register('data_class_autoload');

require_once "feedable.interface.php";



mb_internal_encoding("utf-8");

$f = fopen("feed.csv", "r");
$data = [];
$j=0;
while($str = fgetcsv($f))
{	
	
	foreach($str as $v)
	{
		$vak = ";";
		$pat = explode($vak, $v);
		for($i=0; $i<count($pat); $i++)
		{
			$data[$j][$i] = $pat[$i];
		}
		
		
	}
	$j++;
}
var_dump($data);


foreach($data as $row)
{
    $class_name = $row[0];

    $feed_object = new $class_name($row[1]);

    /* @var $feed_object feedable */

    echo $feed_object->feed_item();
}
?>