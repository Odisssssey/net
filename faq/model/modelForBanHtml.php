<?php 
require_once("./app/config.php");
?>

<?php 
function sqlList() 
{
	$pdo = connect();
	$sql=$pdo->prepare('SELECT * FROM stopList');
	$sql->execute();
	return $sql;
}
function delBanWord($id){
	$pdo = connect();
	$sth=$pdo->prepare("DELETE FROM stopList WHERE id=:id"); 
	$sth->bindParam(":id",$id);
	$sth->execute();
	return $sth;
}




