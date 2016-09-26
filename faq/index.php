<?php
 session_start();
 require __DIR__.'/vendor/autoload.php';
?>
<?php 
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$templates = $twig->loadTemplate('index.html');

$vibor = 0;

require_once("header.php");

echo $templates->render(array(
	'vibor' => $vibor,
));

require_once("./app/voprosnik.class.php"); 


$viborKategorii = Voprosnik::activ();


require_once("footer.php"); 

?>

