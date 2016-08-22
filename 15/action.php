<?php 
require_once("config.php");
?>
<?php 
session_start();
?>
<?php

$pdo = connect();

if ((!empty($_POST['tupe'])) && (!empty($_POST['pole']))) {
		
	$pole = htmlspecialchars($_POST['pole']);
	
	$sql = "ALTER TABLE ".$_SESSION['table']." ADD COLUMN ".$pole." ".$_POST['tupe'];
	$smt = $pdo->prepare($sql);
	$smt->execute();
}
if ((!empty($_POST['delete'])) && (!empty($_POST['id']))) {
	
	$sql = "ALTER TABLE ".$_SESSION['table']." DROP ".$_POST['id'];
	echo $sql;
	$smt = $pdo->prepare($sql);
	$smt->execute();
}


header('Location: index.php');