<?php
mb_internal_encoding("utf-8");
$f = fopen("srh.csv", 'w');
$mas = [];

for($i= 1, $stp = 2; $i<$stp; $i++)
{ 
$file1 = "img/{$i}.jpg";
	if(file_exists($file1))
	{
		echo $file1.'<br/>';
		$ltl = [];
		$fi = basename($file1);
		$ltl[] = "{$fi}";
		$stp += 1;
		$stat = stat($file1);
		$s = $stat['size'];
		list($width, $height) = getimagesize($file1);
		$pik = imagecreatetruecolor(200, 200);
		$pic = imagecreatefromjpeg($file1);
		imagecopyresampled($pik, $pic, 0, 0, 0, 0, 200, 200, $width, $height);
		imagejpeg($pik, "new_{$i}.jpg", 100);		
		
		echo 'Размер файла: ' . $s . ' байт.<br/>';
		$ltl[] = "{$s}"; 
		$d = date("d.m.Y. H:i", $stat['mtime']);
		$dt = $stat['mtime'];
		echo 'Время изменения: ' . $d . '.<br/>';
		$ltl[] = "{$dt}"; 

		$mas["{$fi}"] = $ltl;
		
	}

}

foreach ($mas as $pt)
{
	fputcsv($f, $pt);
} 

var_dump($mas);

fclose($f);
?>


















