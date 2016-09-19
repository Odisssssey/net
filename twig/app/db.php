<?php
function database($host, $name, $pass)
{
	$pdo = new PDO($host, $name, $pass);
	$pdo->exec("set names 'utf8'");
	return $pdo;
}