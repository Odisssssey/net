<?php 
//ini_set('display_errors','Off');
require_once("guestbook.php");
require __DIR__.'/vendor/autoload.php';
?>
<?php 
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$template = $twig->loadTemplate('index.html');
$var = Guestbook::last();

echo $template->render(array(
	'var' => $var,
));
?>
