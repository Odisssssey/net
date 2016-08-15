<?php
$pdo = new PDO("mysql:host=localhost;dbname=tarutin", "tarutin", "neto0402");
$pdo->exec("set names 'utf8'");
if (isset($_POST['save'])){

	if (!empty($_POST['description'])){ 

		$post = "'".$_POST['description']."'"; 
		if(!empty($_POST['id'])){
			$id = $_POST['id'];
			$sql = 'UPDATE tasks SET description = '.$post.' WHERE id = '.$id;
		}else{
			$sql = 'INSERT INTO tasks (description, date_added) VALUES('.$post.', CURRENT_TIMESTAMP)';
			//echo $sql;
		}
		$pdo->query($sql);
	}
}
if (!empty($_GET['delete'])){
	$GET = $_GET['id'];	
	$sql = 'DELETE FROM tasks WHERE id = '.$GET;
	$pdo->query($sql);
}

if (!empty($_GET['perform'])){
	$GET = $_GET['id'];
	$sql = 'UPDATE tasks SET is_done = 1 WHERE id = '.$GET;
	$pdo->query($sql);
}

header('Location: index.php'); 