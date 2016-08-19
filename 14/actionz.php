<?php

$pdo = new PDO("mysql:host=localhost;dbname=tarutin", "tarutin", "neto0402");
$pdo->exec("set names 'utf8'");

$sql = 'UPDATE task SET assigned_user_id = '.$_POST['make_for'].' WHERE id = '.$_POST['id'];
$pdo->query($sql);

header('Location: index.php'); 
