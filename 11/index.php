
<?php
//index.php?category=news&action=one&id=2

function data_class_autoload($class_name)
{
	$file_name = mb_strtolower($class_name, 'utf-8').".class.php";
	if(file_exists($file_name))
	{
		require_once $file_name;
	}
}

spl_autoload_register('data_class_autoload');

function core_class_autoload($class_name)
{
	$class_name = str_replace('_', '.', $class_name);
	
	$file_name = "core/".mb_strtolower($class_name, 'utf-8').".php";
	if(file_exists($file_name))
	{
		require_once $file_name;
	}

}

spl_autoload_register('core_class_autoload');


if (isset($_GET['category'])){
	if ($_GET['category'] == "note")
	{
		require_once "article.php";
	}
	if ($_GET['category'] == "news")
	{
		require_once "news.php";
	}
} 

