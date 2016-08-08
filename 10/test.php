<?php
/**
 * Created by PhpStorm.
 * User: Dusty
 * Date: 29.07.2016
 * Time: 19:40
 */
error_reporting(E_ALL);
require_once "imageJpeg.class.php";
require_once "note.class.php";
require_once "news.class.php";
$image = new Image();

$image->img = "https://pp.vk.me/c636428/v636428497/197a0/INEIMYJFUBc.jpg";
$image->content = "Сенсационно прошло занятие по ООП в Нетологии!";
$image->save();
?>