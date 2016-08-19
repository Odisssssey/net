<?php 
session_start();
unset($_SESSION['dost']);
unset($_SESSION['dostop']);
echo "hi";
$pdo = new PDO("mysql:host=localhost;dbname=tarutin", "tarutin", "neto0402");
$pdo->exec("set names 'utf8'");

$sql = <<<EOT
SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT, //id задания
  `user_id` int(11) NOT NULL,        //id пользователя создателя
  `assigned_user_id` int(11) DEFAULT NULL,  //id исполнителя
  `description` text NOT NULL,       
  `is_done` tinyint(4) NOT NULL DEFAULT '0', 
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
EOT;

$pdo->query($sql);
echo $_GET['id'];
header('Location: auth.php');

$tasks = 'tasks'."{$_SESSION['id']}";