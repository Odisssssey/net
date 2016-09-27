<?php 
require_once("../app/letter.class.php");

?>
<?php 

if (isset($_POST['del'])){

$del = new Letter();
$del->delTema($_POST['category']);


$use = "удалил категорию ".$_POST['category'];
}
$d = getdate();

$file = fopen('../User_can.txt', 'a+');

$text = "[ $d[mday]-$d[mon]-$d[year] $d[hours]:$d[minutes]:$d[seconds] ] ".$_SESSION['login']." ".$use."\n";
fwrite($file, $text);

header('Location: ../view/adminka.php');