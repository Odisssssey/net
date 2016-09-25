<?php 
session_start();
require_once("user.class.php");
?>

<?php
if(!empty($_POST['id']) && (!empty($_POST['description']))){
//$adminSetPassword = sqlReSetPassword($_POST['id'], $_POST['description']);
$user = new User();
$user->reSetPassword($_POST['id'], $_POST['description']);

///для записи///
$use = " изменил пароль пользователя (".$_POST['id'].") на ".$_POST['description'];

}

if(!empty($_GET['id']) && ($_GET['admin'] == 1)){
//$adminSet = sqlSetAdmin($_GET['id']);
$user = new User();
$user->setAdmin($_GET['id']);

///для записи///
$use = " сделал пользователя (".$_GET['id'].") админом";

}

if(!empty($_GET['id']) && ($_GET['admin'] == 0)){
//$adminDel = sqlDelAdmin($_GET['id']);
$user = new User();
$user->delAdmin($_GET['id']);

///для записи///
$use = " убрал пользователя (".$_GET['id'].") из админки";
}

///запись///
$d = getdate();

$file = fopen('../User_can.txt', 'a+');

$text = "[ $d[mday]-$d[mon]-$d[year] $d[hours]:$d[minutes]:$d[seconds] ] ".$_SESSION['login']." ".$use."\n";

fwrite($file, $text);
header('Location: ../adminka.php');
