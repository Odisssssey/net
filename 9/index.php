<?php 
session_start();
?>
<html>
  <head>
      <meta charset="utf-8">
  </head>
  <body>
  
    <p>
<?php 
require "regist.php";

$dir = __DIR__."/profile/"."{$_SESSION['idVk']}".".json";

mb_internal_encoding("utf-8");
$f = file_get_contents("{$dir}");
$file = mb_convert_encoding ($f ,"UTF-8" , "Windows-1251" );

$arr = json_decode($file, true);
//var_dump($arr);

echo 'Ваш профиль.<br/>';
echo "Имя: ".$arr["name"].'<br/>';
echo "Фамилия: ".$arr["surname"].'<br/>';
echo "Город: ".$arr["city"].'<br/>';
$photo = "photo/"."{$_SESSION['idVk']}".".jpg";
echo "Фото прифиля: ";
echo "<img src={$photo}>"; ?>

 <form action="redaktirovanie.php" method="post">
<input type="submit" name="redakt" value="Редактировать" />
</form>

</body>
</html>







