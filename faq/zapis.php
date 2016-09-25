<?php


$d = getdate();

//if(//что сделал 

$use = 'создал тему "вопросы по php"';
$login = 'Я';

//echo "[ $d[mday]-$d[mon]-$d[year] $d[hours]:$d[minutes]:$d[seconds] ] ".$_SESSION['login']." ".$use." "
echo "[ $d[mday]-$d[mon]-$d[year] $d[hours]:$d[minutes]:$d[seconds] ] ".$login." ".$use;

$file = fopen('./User_can.txt', 'a+');

$text = "[ $d[mday]-$d[mon]-$d[year] $d[hours]:$d[minutes]:$d[seconds] ] ".$login." ".$use."\n";

fwrite($file, $text);