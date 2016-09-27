<?php

include '../app/letter.class.php';
 
$letter = new Letter($_POST['text']);
 
 
header('Location: ../view/index.php'); 

