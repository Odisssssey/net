<?php
session_start();
include 'letter.class.php';
 
$letter = new Letter($_POST['text']);
 
 
header('Location: index.php'); 

