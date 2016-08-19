<?php 
session_start();


$userData = $_POST['User'];
var_dump($userData);

if(!empty($userData['password']) && !empty($userData['login']))
	{
	$pdo = new PDO("mysql:host=localhost;dbname=tarutin", "tarutin", "neto0402");
	$pdo->exec("set names 'utf8'");
	
	$sql = 'SELECT * FROM logs';
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_NUM)) 
		{
			if ($userData['login'] == $row[1] && $userData['password'] == $row[2])
			{
			 $_SESSION['islogin'] = True;
			 $_SESSION['login'] = $userData['login'];
			 $_SESSION['id'] = $row[0];
			 
			}
			if ($userData['login'] == $row[1] && $userData['password'] != $row[2])
			{
				$_SESSION['error'] = 'Неверный пароль';
				$parol = 1;
			}
		}
	
			if (empty($parol) && empty($_SESSION['islogin']))
			{
				$login = $userData['login'];
				$password = $userData['password'];
				header("Location: reg.php?login={$login}&password={$password}");
				$_SESSION['dostop'] = 7;
			}
			
			/**if(isset($_SESSION['dost']))
			{
				
				header("Location: setdatab.php");
			}*/
	}
	
	
if(empty($userData['password']) || empty($userData['login']))
{
	$_SESSION['error'] = 'Введите корректный логин и пароль';
}
	
if(empty($_SESSION['dostop'])){
header('Location: index.php');
}