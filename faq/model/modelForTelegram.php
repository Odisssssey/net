<?php 
require_once("../app/config.php");
?>

<?php 
function sqlQuestion() 
{
	$pdo = connect();
	$sql=$pdo->prepare('SELECT * FROM qustion');
	$sql->execute();
	return $sql;
}
