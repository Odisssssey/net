<?php

if ($_POST["tet"])
	{
	$dir = "{$_POST['tet']}";
	echo $dir;
	}
	
mb_internal_encoding("utf-8");
$f = file_get_contents("{$dir}");
$file = mb_convert_encoding ($f ,"UTF-8" , "Windows-1251" );

$arr = json_decode($file, true);
var_dump($arr);
echo "<hr/><br/>";


$s = 0;

if ($_POST["submit"])
        {
		
		for ($i=0; isset($_POST["rit{$i}"]); $i++)
			{
			$rit{$i}=$_POST["rit{$i}"];
			//echo $rit{$i};
			//echo $arr["{$i}"]["answer"];
			
            if ($rit{$i} == $arr["{$i}"]["answer"])
            {
             
				$s += 1;   
			 
            }
			
			}
		}
		
		echo "Вы ответили на {$s} вопросов правильно из {$i}.";
	


	