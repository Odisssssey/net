<?php
 session_start();
?>
<?php 
require_once("model.php");
?>
<?php 
$text = $_POST['text'];
var_dump($text);
$_SESSION['text'] = $_POST['text'];
if (empty($text['mesage']))
{
	$_SESSION['errorVopros'] = 'Введите текст сообщения';
}

if (empty($text['theme']))
{
	$_SESSION['errorVopros'] = 'Выберите тему';
}

if (empty($text['mail']))
{
	$_SESSION['errorVopros'] = 'Введите вашу почту';
}

if (empty($text['name']))
{
	$_SESSION['errorVopros'] = 'Введите ваше имя';
}

if (empty($_SESSION['errorVopros']))
{
	$saveQuestion = sqlSaveQuestion($text);
	unset($_SESSION['text']);
	
	header('Location: index.php'); 
}else{

	header('Location: index.php'); 

}