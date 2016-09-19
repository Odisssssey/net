<?php 
session_start();
require_once("./app/admini.class.php" );
require __DIR__.'/vendor/autoload.php';
?>
<?php 
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$template = $twig->loadTemplate('adminka.html');
//$var = Guestbook::last();

$title = 0;
$admini = new Admini;

echo $template->render(array(
	'title' => $title,
));
?>