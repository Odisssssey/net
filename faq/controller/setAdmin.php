<?php 
session_start();
require_once("../model/user.class.php");
?>

<?php
if(!empty($_POST['id']) && (!empty($_POST['description']))){
$user = new User();
$user->reSetPassword($_POST['id'], $_POST['description']);

$use = " изменил пароль пользователя (".$_POST['id'].") на ".$_POST['description'];

}

if(!empty($_GET['id']) && ($_GET['admin'] == 1)){
$user = new User();
$user->setAdmin($_GET['id']);

$use = " сделал пользователя (".$_GET['id'].") админом";

}

if(!empty($_GET['id']) && ($_GET['admin'] == 0)){
$user = new User();
$user->delAdmin($_GET['id']);

$use = " убрал пользователя (".$_GET['id'].") из админки";
}
$d = getdate();

$file = fopen('../User_can.txt', 'a+');

$text = "[ $d[mday]-$d[mon]-$d[year] $d[hours]:$d[minutes]:$d[seconds] ] ".$_SESSION['login']." ".$use."\n";

fwrite($file, $text);
header('Location: ../view/adminka.php');
