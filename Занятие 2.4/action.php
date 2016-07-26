<?php
 session_start();
?>

<html>
  <head>
      <meta charset="utf-8">
  </head>
  <body>
  
    <p>
<?php require "regist.php" ?>
	
<?php

if (!empty($_POST["tet"]))
	{
	$dir = "{$_POST['tet']}";

	}else{
	header('Location: 404.php', True);
	}
	
mb_internal_encoding("utf-8");
$f = file_get_contents("{$dir}");
$file = mb_convert_encoding ($f ,"UTF-8" , "Windows-1251" );

$arr = json_decode($file, true);



$s = 0;
$z = 0;
$test = 0;

if ($_POST["submit"])
        {
		
		for ($i=0; isset($_POST["rit{$i}"]); $i++)
			{
			$rit{$i}=$_POST["rit{$i}"];
			
			
            if ($rit{$i} == $arr["{$i}"]["answer"])
            {
             
				$s += 1;   
				
			 
            }
			
			}
		}
		$pat = explode('/', $dir);
		for($z=0; $z<count($pat); $z++)
		   {
			$test = $pat[6];			
		   }
		$pat = explode('.', $test);
		for($z=0; $z<count($pat); $z++)
			{
			$test = $pat[0];			
			}
  
echo 'Тест ' . "{$test}" . '.' . "<br/>";
echo "Вы ответили на {$s} вопросов правильно из {$i}.";
?>
<?php if ($s != 0): ?>	
	

   <br/><br/>
   <form action="action2.php" method="post">

 <input type="submit" name="submit" value="Получить сертификат" > 
 <input type=hidden name="test" value="<?= $test ?>">
 <input type=hidden name="right" value="<?= $s ?>">
 </form>
 <?php endif; ?>

	</p>
	</body>
	</html>