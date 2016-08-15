<?php

$pdo = new PDO("mysql:host=localhost;dbname=tarutin", "tarutin", "neto0402");
$pdo->exec("set names 'utf8'");
if (!empty($_POST['sort_by'])){
	$sql = 'SELECT * FROM tasks ORDER BY '.$_POST['sort_by'].' ASC';
	//echo $sql;
}else{
	$sql = 'SELECT * FROM tasks';
}