<?php
mb_internal_encoding("utf-8");
session_start();
$right = 0;
$fio = $_SESSION['login'];
$right = $_POST['right'];
$test = $_POST['test'];
	
	
if ($_POST['right'] == 0)
	{
	header('Location: http://university.netology.ru/u/tarutin/404.php', true); 
	}
		

function create_img($fio, $text)
	{
		$canvas = imagecreatetruecolor(1000, 714);
		$picture = imagecreatefrompng(__DIR__ . '/sertificat.png');
		$background_color = imagecolorallocate($canvas, 250, 200, 250);
		$textColor = imagecolorallocate($canvas, 255, 215, 11);
		$frontFile = realpath(__DIR__ . '/cyrd2.ttf');
		imagefill($canvas, 0, 0, $background_color);
		imagecopy($canvas, $picture, 0, 0, 0, 0, 1000, 714); 
		imagettftext($canvas, 20, 0, 320, 315, $textColor, $frontFile, $fio);
		imagettftext($canvas, 17, 0, 320, 373, $textColor, $frontFile, $text);
		imagepng($canvas);
		imagedestroy($canvas);
		
	}
	
header('Content-Type: image/png');


$text = 'Успешно прошел тест "'."{$test}".'"';

create_img($fio, $text);
	
	