<?php
mb_internal_encoding("utf-8");

if (isset($_POST['fio']))
	{
	
	$fio = $_POST['fio'];
	$i = $_POST['i'];
	$test = $_POST['test'];

	}

	
if($_POST['fio'] == "")
	{
	header('Location: http://university.netology.ru/u/tarutin/404.php', true); 
	}
if($_POST['i'] == 0)
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
		imagettftext($canvas, 20, 0, 320, 373, $textColor, $frontFile, $text);
		imagepng($canvas);
		imagedestroy($canvas);
		
	}
	
header('Content-Type: image/png');


$text = 'Успешно прошел тест ' . "{$test}";

create_img($fio, $text);
	
	