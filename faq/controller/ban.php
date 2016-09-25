<?php 
session_start();
require_once("../model/modelForBan.php");


if (!empty($_POST['delBanWord'])){
	$ban = delBanWord($_POST['id']);
	$use = " удалил исключение (".$_POST['id'].")";
}

if (!empty($_POST['save'])){
	$ban = sqlSaveBanWord($_POST['description']);
	$use = " добавил исключение ".$_POST['description'];
}

///запись///
$d = getdate();

$file = fopen('../User_can.txt', 'a+');

$text = "[ $d[mday]-$d[mon]-$d[year] $d[hours]:$d[minutes]:$d[seconds] ] ".$_SESSION['login']." ".$use."\n";
fwrite($file, $text);

header('Location: ../adminka.php');
