<?php
 session_start();
?>
<?php 
require_once("guestbook.php");
?>
<?php 
$text = $_POST['text'];
var_dump($text);
$_SESSION['text'] = $_POST['text'];
if (empty($text['mesage']))
{
	$_SESSION['error'] = 'Введите текст сообщения';
}

if (empty($text['name']))
{
	$_SESSION['error'] = 'Введите ваше имя';
}

if (empty($_SESSION['error']))
{
	$guestbook = new Guestbook();
	$guestbook->create($text);
	$_SESSION['sql'] = $guestbook->last();
	unset($_SESSION['text']);
	
	header('Location: index.php'); 
}else{

	header('Location: create.php'); 

}