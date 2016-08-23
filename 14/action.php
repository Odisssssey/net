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
			//$sth=$pdo->prepare("UPDATE task SET description =:description WHERE id =:id");
			//$sth->bindParam(":description",$description);
			//$sth->bindParam(":id",$_POST['id']);
		}else{
			$sqlSet = sqlSet($description);
			//$sth=$pdo->prepare("INSERT INTO task (user_id, description, date_added) VALUES(:user_id, :description, CURRENT_TIMESTAMP)");
			//$sth->bindParam(":description",$description);
			//$sth->bindParam(":user_id",$_SESSION['id']);
		}
		$sqlSet->execute();
	}
}
if (!empty($_GET['delete'])){
	$sqlDel = delete($_GET['id']);
	//$sth=$pdo->prepare("DELETE FROM task WHERE id =:id"); 
	//$sth->bindParam(":id",$_GET['id']);
	$sqlDel->execute();
}

if (!empty($_GET['perform'])){
	$sqlPer = perform($_GET['id']);
	//$sth=$pdo->prepare("UPDATE task SET is_done=1 WHERE id =:id"); 
	//$sth->bindParam(":id",$_GET['id']);
	$sqlPer->execute();
}

header('Location: index.php'); 


