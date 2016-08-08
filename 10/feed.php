<?php

require_once "feedable.interface.php";
require_once "imageJpeg.class.php";
require_once "note.class.php";
require_once "news.class.php";


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
//var_dump($data);


foreach($data as $row)
{
    $class_name = $row[0];

    $feed_object = new $class_name($row[1]);

    /* @var $feed_object feedable */

    echo $feed_object->feed_item();
}
?>