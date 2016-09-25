<?php 
require_once("../app/letter.class.php");
//require_once("../model/model.php");
?>
<?php 

if (isset($_POST['del'])){
//$del = delete($_POST['category']);
$del = new Letter();
$del->delTema($_POST['category']);

///для записи///
$use = "удалил категорию ".$_POST['category'];
}
///запись///
$d = getdate();

$file = fopen('../User_can.txt', 'a+');

$text = "[ $d[mday]-$d[mon]-$d[year] $d[hours]:$d[minutes]:$d[seconds] ] ".$_SESSION['login']." ".$use."\n";
fwrite($file, $text);

header('Location: ../adminka.php');