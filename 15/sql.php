<?php 

function sqlVibor()
{
	 
	require_once("config.php");
	
	//$pdo = new PDO("mysql:host=localhost;dbname=tarutin", "tarutin", "neto0402");
	//$pdo->exec("set names 'utf8'");
	//require_once("db.php");
	$pdo = connect();
	$sql_vibor = 'SHOW TABLES FROM tarutin';
	$smt = $pdo->prepare($sql_vibor);
	$smt->execute();
	return $smt;
}


