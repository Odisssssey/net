<?php 
require_once("config.php");
?>
<?php 
session_start();
?>
<?php
$pdo = connect();
if ((!empty($_POST['table'])) || (!empty($_SESSION['table']))){
	if (!empty($_POST['table'])){
		$_SESSION['table'] = $_POST['table'];
	}
	$sql = 'SHOW COLUMNS FROM '.$_SESSION['table'];
}else{
	$sql = 'SHOW COLUMNS FROM books';
}

