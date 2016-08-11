<?php 
session_start();


$userData = $_POST['User'];
var_dump($userData);

if(isset($userData['password']))
	{
	$dir = __DIR__."/login.json";
	mb_internal_encoding("utf-8");
	
	$f = file_get_contents("{$dir}");
	$file = mb_convert_encoding ($f ,"UTF-8" , "Windows-1251" );

	$arr = json_decode($file, true);
	var_dump($arr);
	
	for ($i=0; isset($arr["{$i}"]["LOGIN"]); $i++)
		{
			if ($userData['login'] == $arr["{$i}"]["LOGIN"] && $userData['password'] == $arr["{$i}"]["PASS"])
			{
			 $_SESSION['isPassword'] = True;
			 $_SESSION['login'] = $userData['login'];
			}
			if (!empty($arr["{$i}"]["IS_ADMIN"])){
				$_SESSION['islogin'] = True;
			}
		}
	
	/**for ($i=0; isset($arr["{$i}"]["IS_ADMIN"]); $i++)
		{
		if ($userData['login'] == $arr["{$i}"]["IS_ADMIN"] && $userData['password'] == $arr["{$i}"]["ADMIN_PASS"])
			{
			$_SESSION['islogin'] = True;
			$_SESSION['login'] = $userData['login'];
			echo 'DO';
			}
		}
		
	for ( ; isset($arr["{$i}"]["LOGIN"]); $i++)
		{
		if ($userData['login'] == $arr["{$i}"]["LOGIN"] && $userData['password'] == $arr["{$i}"]["PASS"])
			{
			 $_SESSION['isPassword'] = True;
	         $_SESSION['login'] = $userData['login']; 
			}
			
		}*/
	
	
	
	}



if (!empty($userData['login']))
	{
	
	$_SESSION['isGurst'] = True;
	$_SESSION['login'] = $userData['login']; 
	} else {
	 echo 'on';
	$_SESSION['error'] = 'Доступ запрещен';
	header('Location: index.php');
	}
	
var_dump($_SESSION);	
header('Location: index.php');
	
	
	
	
	
	
	
	
	
	
	
