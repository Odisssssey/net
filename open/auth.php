<?php 
session_start();


$userData = $_POST['User'];
var_dump($userData);
require_once("model.php");

if(!empty($userData['password']) && !empty($userData['login']))
{
	
	if (!empty($_POST['login'])){
	$sql = sqlLogs();
	while ($row = $sql->fetch(PDO::FETCH_NUM)) 
		{
			if ($userData['login'] == $row[1] && $userData['password'] == $row[2])
			{
			 $_SESSION['islogin'] = True;
			 $_SESSION['login'] = $userData['login'];
			 $_SESSION['id'] = $row[0];
			 if (!empty($row[3])){
				$_SESSION['isAdmin'] = True;
			 }
			}
			if ($userData['login'] == $row[1] && $userData['password'] != $row[2])
			{
				$_SESSION['error'] = 'Неверный пароль';
			}
		}
	}
	if (!empty($_POST['reg'])){
	
		$sql = sqlLogs();
		while ($row = $sql->fetch(PDO::FETCH_NUM)) 
		{
			if ($userData['login'] == $row[1] && $userData['password'] == $row[2])
			{
				$_SESSION['error'] = 'Вы уже зарегистрированы';
			}
		}
	
		if ((empty($_SESSION['islogin'])) && (empty($_SESSION['error']))) 
		{
			$login = htmlspecialchars($userData['login']);
			$password = htmlspecialchars($userData['password']);
			header("Location: reg.php?login={$login}&password={$password}");
			$_SESSION['dostop'] = 7;
		}
		
	}
}
	
	
if(empty($userData['password']) || empty($userData['login']))
{
	$_SESSION['error'] = 'Введите корректный логин и пароль';
}
	
if(empty($_SESSION['dostop'])){
header('Location: index.php');
}