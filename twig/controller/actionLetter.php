<?php
session_start();
include '../app/letter.class.php';
 
$letter = new Letter($_POST['text']);
 
 
header('Location: ../index.php'); 

