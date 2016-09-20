<?php 
require_once("user.class.php");
?>

<?php
if(!empty($_POST['id']) && (!empty($_POST['description']))){
//$adminSetPassword = sqlReSetPassword($_POST['id'], $_POST['description']);
$user = new User();
$user->reSetPassword($_POST['id'], $_POST['description']);
}

if(!empty($_GET['id']) && ($_GET['admin'] == 1)){
//$adminSet = sqlSetAdmin($_GET['id']);
$user = new User();
$user->setAdmin($_GET['id']);
}

if(!empty($_GET['id']) && ($_GET['admin'] == 0)){
//$adminDel = sqlDelAdmin($_GET['id']);
$user = new User();
$user->delAdmin($_GET['id']);
}

header('Location: ../adminka.php');
