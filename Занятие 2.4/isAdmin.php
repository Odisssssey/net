<?php if (isset($_SESSION['isPassword']) || isset($_SESSION['islogin'])): ?>
<?php else: ?>
	<?php header('Location: 403.php', true); ?>
	
<?php endif; ?>