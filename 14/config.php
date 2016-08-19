
<?php

$pdo = new PDO("mysql:host=localhost;dbname=tarutin", "tarutin", "neto0402");
$pdo->exec("set names 'utf8'");
$task = 'task';
if (!empty($_POST['sort_by'])){
	$sql = 'SELECT * FROM '.$task.' WHERE user_id = '.$_SESSION['id'].' ORDER BY '.$_POST['sort_by'].' ASC';
	$sql_treb = 'SELECT * FROM '.$task.' WHERE assigned_user_id = '.$_SESSION['id'].' ORDER BY '.$_POST['sort_by'].' ASC';
	
}else{
	
	$sql = 'SELECT * FROM '.$task.' WHERE user_id = '.$_SESSION['id'];
	$sql_treb = 'SELECT * FROM '.$task.' WHERE assigned_user_id = '.$_SESSION['id'];
}
//echo $sql;
