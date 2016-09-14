<?php 
require_once("model.php");
?>

<?php
if(!empty($_POST['id']) && (!empty($_POST['description']))){
$adminSetPassword = sqlReSetPassword($_POST['id'], $_POST['description']);
}

if(!empty($_GET['id']) && ($_GET['admin'] == 1)){
$adminSet = sqlSetAdmin($_GET['id']);
}

if(!empty($_GET['id']) && ($_GET['admin'] == 0)){
$adminDel = sqlDelAdmin($_GET['id']);
}

header('Location: adminka.php');
