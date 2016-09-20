<?php 
require_once("../app/letter.class.php");
//require_once("../model/model.php");
?>
<?php 

if (isset($_POST['del'])){
//$del = delete($_POST['category']);
$del = new Letter();
$del->delTema($_POST['category']);
}


header('Location: ../adminka.php');