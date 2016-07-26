<?php if (isset($_SESSION['isPassword']) || isset($_SESSION['islogin']) || isset($_SESSION['isGurst'])): ?>

<?php echo "Ваше имя: "."{$_SESSION['login']}"." | "."<a href='exit.php'>Выйти</a>"; ?>
<?php echo "<hr/><br/>"; ?>
<?php else: ?>
	<?php header('Location: index.php'); ?>
<?php endif; ?>