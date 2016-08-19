
<?php

$pdo = new PDO("mysql:host=localhost;dbname=tarutin", "tarutin", "neto0402");
$pdo->exec("set names 'utf8'");
$task = 'task';
if (!empty($_POST['table'])){

	$sql = 'SHOW COLUMNS FROM '.$_POST['table'];
}else{
	$sql = 'SHOW COLUMNS FROM books';
}
