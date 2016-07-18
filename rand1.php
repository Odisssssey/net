<html>
  <head>
      <meta charset="utf-8">
  </head>
  <body>
  


    <p>
     <form action="" method="post">
 <input type="textbox" requied name="min" placeholder="минимальное загаданное">
 <input type="textbox" requied name="max" placeholder="максимальное загаданное">
 <input type="submit" name="submit" placeholder="сменить число">  
 </form>
      <?php
        if ($_POST['submit'])
        {
         $min=$_POST['min'];
         $max=$_POST['max'];
         $n = rand($min, $max);
         echo $n;
         
         
        }
		
		    ?>
 
 
      
    </p>
	<p>
	  <form action="" method="post">
 <input type="textbox" requied name="rit" placeholder="ваше предположение">
 <input type="submit" name="submit1" placeholder="сменить предположение"> 
 </form>
	<?php
		if ($_POST['submit1'])
        {
		$rit=$_POST['rit'];
		if ($rit != $n)
            {
             
             echo "Пробуй еще раз...";   
                
            }
         if ($rit == $n)
            {
             
             echo "Угадал!";   
                
            }
		
		
		}
		
        
      ?>
 
 
      
    </p>
  </body>
</html>