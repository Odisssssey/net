<?php 
require_once("config.php");
?>
<?php 
//session_start();
?>

<?php 
function sqlLogs() 
{
	$pdo = connect();
	$sql=$pdo->prepare('SELECT * FROM logs');
	$sql->execute();
	return $sql;
}
function sqlSort($sort_by)
{
	$pdo = connect();
	$sql=$pdo->prepare('SELECT * FROM task WHERE user_id=:id ORDER BY '.$sort_by);
	$sql->bindParam(":id",$_SESSION['id']);
	$sql->execute();
	return $sql;
}
function sqlBase()
{
	$pdo = connect();
	$sqlBas=$pdo->prepare('SELECT * FROM task WHERE user_id= :id');
	$sqlBas->bindParam(":id",$_SESSION['id']);
	$sqlBas->execute();
	return $sqlBas;
}
function sqlTrebSort($sort_by)
{
	$pdo = connect();
	$sqlTreb=$pdo->prepare('SELECT * FROM task WHERE assigned_user_id=:id ORDER BY :sort_by ASC');
	$sqlTreb->bindParam(":id",$_SESSION['id']);
	$sqlTreb->bindParam(":sort_by",$sort_by);
	$sqlTreb->execute();
	return $sqlTreb;
}
function sqlTrebBase()
{	
	$pdo = connect();
	$sqlTreb=$pdo->prepare('SELECT * FROM task WHERE assigned_user_id=:id');
	$sqlTreb->bindParam(":id",$_SESSION['id']);
	$sqlTreb->execute();
	return $sqlTreb;
}
function sqlReSet($description, $id){
	$pdo = connect();
	$sth=$pdo->prepare("UPDATE task SET description =:description WHERE id =:id");
	$sth->bindParam(":description",$description);
	$sth->bindParam(":id",$id);
	return $sth;
}
function sqlSet($description){
	$pdo = connect();
	$sth=$pdo->prepare("INSERT INTO task (user_id, description, date_added) VALUES(:user_id, :description, CURRENT_TIMESTAMP)");
	$sth->bindParam(":description",$description);
	$sth->bindParam(":user_id",$_SESSION['id']);
	return $sth;
}
function delete($id){
	$pdo = connect();
	$sth=$pdo->prepare("DELETE FROM task WHERE id =:id"); 
	$sth->bindParam(":id",$id);
	return $sth;
}
function perform($id){
	$pdo = connect();
	$sth=$pdo->prepare("UPDATE task SET is_done=1 WHERE id =:id"); 
	$sth->bindParam(":id",$id);
	return $sth;
}



/**if (!empty($_SESSION['id'])){
	if (!empty($_POST['sort_by'])){
//		$sql=$pdo->prepare('SELECT * FROM task WHERE user_id=:id ORDER BY :sort_by ASC');
//		$sql->bindParam(":id",$_SESSION['id']);
//		$sql->bindParam(":sort_by",$_POST['sort_by']);
//		$sql_treb=$pdo->prepare('SELECT * FROM task WHERE assigned_user_id=:id ORDER BY :sort_by ASC');
//		$sql_treb->bindParam(":id",$_SESSION['id']);
//		$sql_treb->bindParam(":sort_by",$_POST['sort_by']);
		echo "1";
	}else{
		
//		$sql=$pdo->prepare('SELECT * FROM task WHERE user_id= :id');
//		$sql->bindParam(":id",$_SESSION['id']);
//		$sql_treb=$pdo->prepare('SELECT * FROM task WHERE assigned_user_id=:id');
//		$sql_treb->bindParam(":id",$_SESSION['id']);
//		$sql_polz=$pdo->prepare('SELECT * FROM logs');
//		$sql_polz->execute();
		echo "2";
	}
	$sql_treb->execute();
}
if (!empty($_POST['User'])){
	$sql=$pdo->prepare('SELECT * FROM logs');
}

$sql->execute();*/
