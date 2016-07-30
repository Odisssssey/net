<?php if (!empty($_SESSION['login'])): ?> 

<?php echo "Ваше имя: "."{$_SESSION['login']}"." | "."<a href='exit.php'>Выйти</a>"; ?>
<?php echo "<hr/><br/>"; ?>

<?php else: ?>
	<?php header('Location: VkVhod.php'); ?>
	
<?php endif; ?>