<?php 
session_start();

$pdo = new PDO("mysql:host=localhost;dbname=tarutin", "tarutin", "neto0402");
$pdo->exec("set names 'utf8'");


$sql = 'INSERT INTO user (login, password) VALUES('."'".$_GET['login']."'".', '."'".$_GET['password']."'".')';
$pdo->query($sql);
echo $sql;
unset($_SESSION['dostop']);
$_SESSION['error'] = "Вы зарегистрированы";
header('Location: index.php');