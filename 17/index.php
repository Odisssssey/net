<?php 
//ini_set('display_errors','Off');
require_once("guestbook.php");
//require_once("create.php");
require __DIR__.'/vendor/autoload.php';
?>
<?php 
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$template = $twig->loadTemplate('index.html');
$name = "Гостевая книга";
$mesage1 = "Сообщение";
$mesage2 = "От кого";
$mesage3 = "Дата";
$var = Guestbook::last();

echo $template->render(array(
	'name' => $name, 'mesage1' => $mesage1,	'mesage2' => $mesage2,
	'mesage3' => $mesage3, 'var' => $var,
));
?>
