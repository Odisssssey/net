<?php 
session_start();
?>

<?php 
require "regist.php";

$dir = __DIR__."/profile/"."{$_SESSION['idVk']}".".json";

mb_internal_encoding("utf-8");
$f = file_get_contents("{$dir}");
$file = mb_convert_encoding ($f ,"UTF-8" , "Windows-1251" );

$arr = json_decode($file, true);


// Добавляем элемент
if (!empty($_POST["name"])){
$arr["name"] = $_POST["name"];
}
if (!empty($_POST["surname"])){
$arr["surname"] = $_POST["surname"];
}
if (!empty($_POST["city"])){
$arr["city"] = $_POST["city"];
}

if (!empty($_FILES["fi"])){
$photo = "photo/"."{$_SESSION['idVk']}".".jpg";
unlink("{$photo}");
move_uploaded_file($_FILES["fi"]["tmp_name"], $photo);
}


list($width, $height) = getimagesize($photo);
$pik = imagecreatetruecolor(200, 200);
$pic = imagecreatefromjpeg($photo);
imagecopyresampled($pik, $pic, 0, 0, 0, 0, 200, 200, $width, $height);
imagejpeg($pik, $photo, 100);




// Превращаем опять в JSON
$arr = json_encode($arr);
// Перезаписываем файл
file_put_contents("{$dir}", $arr);

header('Location: index.php'); ?>