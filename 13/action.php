<?php
$pdo = new PDO("mysql:host=localhost;dbname=tarutin", "tarutin", "neto0402");
$pdo->exec("set names 'utf8'");
if (isset($_POST['save'])){

	if (!empty($_POST['description'])){
		$description = htmlspecialchars($_POST['description']);
		if(!empty($_POST['id'])){
			$sth=$pdo->prepare("UPDATE tasks SET description =:description WHERE id =:id");
			$sth->bindParam(":description",$description);
			$sth->bindParam(":id",$_POST['id']);
		}else{
			$sth=$pdo->prepare("INSERT INTO tasks (description, date_added) VALUES(:description, CURRENT_TIMESTAMP)");
			$sth->bindParam(":description",$description);
		}
		$sth->execute();
	}
	/**if (!empty($_POST['description'])){ 
		$description = htmlspecialchars($_POST['description']);
		$post = "'".$description."'"; 
		if(!empty($_POST['id'])){
			$id = $_POST['id'];
			$sql = 'UPDATE tasks SET description = '.$post.' WHERE id = '.$id;
		}else{
			$sql = 'INSERT INTO tasks (description, date_added) VALUES('.$post.', CURRENT_TIMESTAMP)';
			//echo $sql;
		}
		$pdo->query($sql);
	}*/
}
if (!empty($_GET['delete'])){
	$sth=$pdo->prepare("DELETE FROM tasks WHERE id =:id"); 
	$sth->bindParam(":id",$_GET['id']);
	$sth->execute();
}

if (!empty($_GET['perform'])){
	$sth=$pdo->prepare("UPDATE tasks SET is_done=1 WHERE id =:id"); 
	$sth->bindParam(":id",$_GET['id']);
	$sth->execute();
}

/**$sth=$pdo->prepare("UPDATE `users` SET user=:var"); 
$sth->bindParam(":var",$var); 
$sth->execute(); */

header('Location: index.php'); 