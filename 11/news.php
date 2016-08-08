<?php

error_reporting(E_ALL);

if (isset($_GET['id'])) $id = (int) $_GET['id'];

if (isset($_GET['action'])) $action = $_GET['action'];


$news_core = new News_Core();
if (!empty($id))
{
	$news_core->$action($id);
}else{
	$news_core->$action();
	
}




