<?php
 session_start();
?>
<?php 
require_once("model.php");
?>
<?php
if (isset($_POST['save'])){

	if (!empty($_POST['description'])){
		$description = htmlspecialchars($_POST['description']);
		if(!empty($_POST['id'])){
			$sqlSet = sqlReSet($description, $_POST['id']);
		}else{
			$sqlSet = sqlSet($description);
		}
		$sqlSet->execute();
	}
}
if (!empty($_GET['delete'])){
	$sqlDel = delete($_GET['id']);
	$sqlDel->execute();
}

if (!empty($_GET['perform'])){
	$sqlPer = perform($_GET['id']);
	$sqlPer->execute();
}
if (isset($_POST['assign'])){
	$sqlFor = makeFor($_POST['makeFor'], $_POST['id']);
	$sqlFor->execute();
}

header('Location: index.php'); 


