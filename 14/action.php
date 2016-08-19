<?php
 session_start();
?>
<?php
$pdo = new PDO("mysql:host=localhost;dbname=tarutin", "tarutin", "neto0402");
$pdo->exec("set names 'utf8'");
$task = 'task';
if (isset($_POST['save'])){

	if (!empty($_POST['description'])){ 

		$post = "'".$_POST['description']."'"; 
		if(!empty($_POST['id'])){
			$id = $_POST['id'];
			$sql = 'UPDATE '.$task.' SET description = '.$post.' WHERE id = '.$id;
		}else{
			$sql = 'INSERT INTO '.$task.' (user_id, description, date_added) VALUES('.$_SESSION['id'].','.$post.', CURRENT_TIMESTAMP)';
			echo $sql;
		}
		$pdo->query($sql);
	}
}
if (!empty($_GET['delete'])){
	$GET = $_GET['id'];	
	$sql = 'DELETE FROM '.$task.' WHERE id = '.$GET;
	$pdo->query($sql);
}

if (!empty($_GET['perform'])){
	$GET = $_GET['id'];
	$sql = 'UPDATE '.$task.' SET is_done = 1 WHERE id = '.$GET;
	$pdo->query($sql);
}

header('Location: index.php'); 