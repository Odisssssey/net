<?php
/**
 * Created by PhpStorm.
 * User: Dusty
 * Date: 29.07.2016
 * Time: 19:40
 */
error_reporting(E_ALL);
function data_class_autoload($class_name)
{
	$file_name = mb_strtolower($class_name, 'utf-8').".class.php";
	if(file_exists($file_name))
	{
		require_once $file_name;
	}
}

spl_autoload_register('data_class_autoload');
$image = new Image();

$image->img = "https://pp.vk.me/c636428/v636428497/197a0/INEIMYJFUBc.jpg";
$image->content = "Сенсационно прошло занятие по ООП в Нетологии!";
$image->save();
?>