<html>
  <head>
  </head>
  <body>
  <h1>Выбери диапазон.</h1>
    <p>
      <?php
		function random($min, $max)
        {
            $n = rand($min, $max);
			setcookie('n', $n, time() + 35);
            return $n;
			
        
    
        }
		function sravnenie($n, $rit)
		{
		  if ($n < $rit){
		  $pos = "много";
		  }
		  if ($n > $rit){
		  $pos = "мало";
		  }
		  if ($n == $rit){
		  $pos = "Угадал!";
		  }
		  return $pos;
		}
		
        ?>

     <form action="" method="post">
 <input type="textbox" requied name="min" placeholder="минимальное загаданное">
 <input type="textbox" requied name="max" placeholder="максимальное загаданное">
 <input type="submit" name="submit" placeholder="сменить число">  
 </form>

	<?php
	$n = $_COOKIE['n'];
	if ($n == True){
	echo $n;
	}
	else{
	if ($_POST['submit'])
        {
         $min=$_POST['min'];
         $max=$_POST['max'];
		 $n = random($min, $max);
         
         echo $n;
         
         
        }
	}
		
		?>
	</p>
<h1>Угадай задуманное число за 30 секунд!</h1>
	<p>
	 <form action="" method="post">
 <input type="textbox" requied name="rit" placeholder="ваше предположение">
 <input type="submit" name="submit1" placeholder="сменить предположение"> 
 </form>
	
	<?php
	
		if ($_POST['submit1'])
		{
		 $rit=$_POST['rit'];
		}
		
		if ($n == True){
			$pos = sravnenie($n, $rit);
			 echo $pos;
	    }
	
		

      ?>
    </p>
  </body>
</html>








