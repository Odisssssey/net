<?php 
session_start();
require_once("./app/admini.class.php" );
require_once("./app/temi.class.php" );
require_once("./app/voprosi.class.php" );
require __DIR__.'/vendor/autoload.php';
?>
<?php 
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$template = $twig->loadTemplate('adminka.html');
//$var = Guestbook::last();

if((empty($_GET['title'])) || ($_GET['title'] == "admini")){
$title = "Список админов";
}else{
	if($_GET['title'] == "temi"){
	$title = "Список тем";
	}
	if($_GET['title'] == "voprosi"){
	$title = "Вопросы в темах";
	}
}
echo $template->render(array(
	'title' => $title,
));

if((empty($_GET['title'])) || ($_GET['title'] == "admini")){
$admini = new Admini;
}else{
	if($_GET['title'] == "temi"){
	$temi = new Temi;
	}
	if($_GET['title'] == "voprosi"){
	$voprosi = new Voprosi;
	}
}

if(!empty($_POST['chengeFooter'])){
	$_SESSION['idForFooter'] = $_POST['idForFooter'];
	require_once("footerAdmin.php");
	}


?>