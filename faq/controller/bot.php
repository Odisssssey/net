<?php
include '../app/letter.class.php';
 ?>


<?php

if(isset($_POST['save'])){
	$text = $_POST['text'];
	$letter = new Letter($text);
	$website = $_POST['website'];
	file_get_contents($website."/sendmessage?chat_id=".$text['mail']."&text=Ваш вопрос принят.");
}


header('Location: ../adminka.php'); 


