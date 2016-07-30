<?php 

session_start();

require_once "city.class.php";
require_once "profile.class.php";



if (!empty($_POST["idVk"]))
	{
	$idVk = "{$_POST['idVk']}";

	}else{
	echo "Ошибка доступа";
	}

$me = new Profile("{$idVk}");

if (!empty($me->name))
	{
	$_SESSION['idVk'] = $idVk;
	$_SESSION['me'] = $me;
	$_SESSION['login'] = $me->name; 
	
	}else{
	echo "Ошибка доступа";
	}


header('Location: VkVhod.php');


?>