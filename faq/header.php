<?php
require_once("./app/admission.php"); 
require_once("./vendor/autoload.php");
?>
<?php 
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$islogin = Admission::islogin();

if (!$islogin == true){

	$template = $twig->loadTemplate('vhod.html');
	
	require_once("./app/vhod.class.php"); 
	$error = Vhod::errors();
	
	echo $template->render(array(
	'error' => $error,
	));

}else{

	$template = $twig->loadTemplate('header.html');

	$name = $_SESSION['login'];

	$isAdmin = Admission::isAdmin();
	
	echo $template->render(array(
	'name' => $name, 'isAdmin' => $isAdmin,
	));
	
}


?>
