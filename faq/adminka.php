<?php 
session_start();
require_once("./app/admission.php"); 
require_once("./app/admini.class.php" );
require_once("./app/temi.class.php" );
require_once("./app/voprosi.class.php" );
require_once("./app/banList.class.php" );
require __DIR__.'/vendor/autoload.php';
require_once("header.php");
?>
<?php 

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$template = $twig->loadTemplate('adminka.html');
//$var = Guestbook::last();
$isAdmin = Admission::isAdmin();



if ($isAdmin == true){

	if((empty($_GET['title'])) && (empty($_SESSION['title']))){
		$_SESSION['title']="admini";
		$title = "Список админов";
	}else{
		
		if (!empty($_GET['title'])){
			if ($_GET['title'] == "admini"){
				$_SESSION['title']="admini";
				$title = "Список админов";
			}
			if($_GET['title'] == "temi"){
				$_SESSION['title'] = "temi";
				$title = "Список тем";
			}
			if($_GET['title'] == "voprosi"){
				$_SESSION['title'] = "voprosi";
				$title = "Вопросы в темах";
			}
			if($_GET['title'] == "banList"){
				$_SESSION['title'] = "banList";
				$title = "Cтоп лист";
			}
			
		}else{
			if ($_SESSION['title'] == "admini"){
				$title = "Список админов";
			}
			if($_SESSION['title'] == "temi"){
				$title = "Список тем";
			}
			if($_SESSION['title'] == "voprosi"){
				$title = "Вопросы в темах";
			}
			if($_SESSION['title'] == "banList"){
				$title = "Cтоп лист";
			}
		
		}
	}
	
	
echo $template->render(array(
	'title' => $title,
));

	
	if($_SESSION['title'] == "admini"){
	$admini = new Admini;
	}
	if($_SESSION['title'] == "temi"){
	$temi = new Temi;
	}
	if($_SESSION['title'] == "voprosi"){
	$voprosi = new Voprosi;
	}
	if($_SESSION['title'] == "banList"){
	$ban = new Ban;
	}

	if(!empty($_POST['chengeFooter'])){
		$_SESSION['idForFooter'] = $_POST['idForFooter'];
		require_once("footerAdmin.php");
	}
}

?>