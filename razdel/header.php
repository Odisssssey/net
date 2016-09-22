<html>
  <head>
      <meta charset="utf-8">
  </head>
  <body>
<?php
require_once("./app/fanctions.php"); 
?>
<?php
if (!islogin() == true){
?>

	<?php if (!empty($_SESSION['error'])): ?>
	   <?= $_SESSION['error'] ?>
	   <?php unset($_SESSION['error']); ?>
	  
	<?php endif; ?>
		
	<?php if (!empty($_SESSION['islogin'])): ?>
		<?php header('Location: index.php'); ?>
		<?php else: ?>
			<form action="./controller/auth.php" method="POST">
			 <label for="login" >Логин</label>
			 <input id="login" name="login" />
			 <label for="password" >Пароль</label>
			 <input type="password" id="password" name="password" />
			 <input type="submit" name="log" value="Войти">
			<input type="submit" name="log" value="Зарегистрироваться">
			</form>
			<hr/><br/>
    <?php endif; ?>
<?php }else{ ?>	

<?php echo "Ваше имя: "."{$_SESSION['login']}"." | "."<a href='exit.php'>Выйти</a>";
		if(!empty($_SESSION['isAdmin'])){ echo " | "."<a href='adminka.php'>Войти в админку</a>"; } ?>
<?php echo "<hr/><br/>"; 
}?>
 </body>
</html>