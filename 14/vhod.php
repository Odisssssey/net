<?php
 session_start();
?>

<html>
  <head>
      <meta charset="utf-8">
  </head>
  <body>
  
    <p>
	<?php if (!empty($_SESSION['error'])): ?>
	   <?= $_SESSION['error'] ?>
	   <?php unset($_SESSION['error']); ?>
	  
	<?php endif; ?>
		
	<?php if (!empty($_SESSION['islogin'])): ?>
		<?php header('Location: index.php'); ?>
		<?php else: ?>
			<form action="auth.php" method="POST">
			 <label for="login" >Логин</label>
			 <input id="login" name="User[login]" />
			 <label for="password" >Пароль</label>
			 <input type="password" id="password" name="User[password]" />
			 <input type="submit" name="login" value="Войти">
			<input type="submit" name="reg" value="Зарегистрироваться">
			</form>
    <?php endif; ?>
	
	</p>
  </body>
</html>
	
	
	
	
	
	
	
	
	
	