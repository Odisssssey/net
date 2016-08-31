<?php 
session_start();
?>

<?php 
//ini_set('display_errors','Off');
require __DIR__.'/vendor/autoload.php';
?>
<?php 
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$templat = $twig->loadTemplate('create.html');
$error = "";
if (!empty($_SESSION['error']))
{
	$error = $_SESSION['error'];
	unset($_SESSION['error']);
}
$names = "";
$mesage = "";
if(!empty($_SESSION['text']['name'])){ $names = $_SESSION['text']['name'];}
if(!empty($_SESSION['text']['mesage'])){ $mesage = $_SESSION['text']['mesage'];}
echo $templat->render(array(
	'error' => $error, 'names' => $names, 'mesage' => $mesage,
	
));
?>