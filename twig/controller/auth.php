<?php 

include 'user.class.php';

$user = new User($_POST['log'], $_POST['password'], $_POST['login']);

header('Location: ../index.php');
