<?php

mb_internal_encoding("utf-8");


$Belgium = [
"Брюссельский столичный округ" => ["Брюссель"],
"Валлония" => ["Анден", "Боуссу", "Санкт-Гилене", "Санкт-Никола"],
"Фландрия" => ["Зедельгем", "Кнокке-Хейст", "Гент-Антверпен", "Остенде-Антверпен"]
];


var_dump($Belgium);

echo '<hr/><br/>';

$res1 = [];
$res2 = [];
foreach($Belgium as $k => $v)
{
   $Belgium = $k;
   foreach($v as $city)
	{
		$def = "-";
		$pos = strpos($city, $def); //проверил на вхождение
		if($pos == True)
		{
		   $pat = explode($def, $city); //разбил
		   for($i=0; $i<count($pat); $i++)
		   {
		     if($i%2 === 0)
			 {
				array_push($res1, $pat[0]); 
				
			 }else{
			 array_push($res2, $pat[1]);
			 }
		   }
		}
   }
   

}
var_dump($res1);
echo "<br/>";
var_dump($res2);
echo '<hr/><br/>';

shuffle($res1);
shuffle($res2);

var_dump($res1);
echo "<br/>";
var_dump($res2);
echo '<hr/><br/>';

for($i=0;$i<count($res2); $i++)
{
	echo "{$res1[$i]}-{$res2[$i]} <br/>";
}


?>





























