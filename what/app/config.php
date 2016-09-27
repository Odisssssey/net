<?php 
require_once("db.php");
?>
<?php
function connect()
{
	$host = "mysql:host=localhost;dbname=tarutin";
	$name = "tarutin";
	$pass = "neto0402";

	$pdo = database($host, $name, $pass);
	return $pdo;
}

