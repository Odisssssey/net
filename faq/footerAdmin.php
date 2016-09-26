<?php 
require_once("./app/footerAdminki.class.php" );
require __DIR__.'/vendor/autoload.php';
?>
<?php 
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$templatef = $twig->loadTemplate('footerAdmin.html');


$var = 0;

echo $templatef->render(array(
	'var' => $var,
));

$footerAdmin = new FooterAdminki();
?>
