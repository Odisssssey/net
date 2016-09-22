<?php 
require_once("../model/model.php");
?>
<?php 

if (isset($_POST['del'])){
$del = delete($_POST['category']);
}


header('Location: ../adminka.php');