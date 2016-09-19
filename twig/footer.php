<?php
require_once("./app/footer.class.php"); 
require __DIR__.'/vendor/autoload.php';
?>
<?php

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$templates = $twig->loadTemplate('footer.html');

$vibor = 0;

echo $templates->render(array(
	'vibor' => $vibor,
));

$footer = new Footer;

?>
