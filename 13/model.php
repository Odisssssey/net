<?php 
require_once("config.php");
?>

<?php 

if (!empty($_POST['sort_by'])){
	$sql = 'SELECT * FROM tasks ORDER BY '.$_POST['sort_by'].' ASC';
	//echo $sql;
}else{
	$sql = 'SELECT * FROM tasks';
}

