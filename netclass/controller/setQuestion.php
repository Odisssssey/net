<?php 
require_once("../app/letter.class.php");
//require_once("../model/model.php");
?>
<?php 

if(isset($_POST['delquestion'])){
	//$question = delQuestion($_POST['id']);
	$question = new Letter();
	$question->delQuestion($_POST['id']);
}

if(isset($_POST['chengequestion'])){
	//$chengeQuestion = sqlChengeQuestion($_POST['id']);
	$question = new Letter();
	$question->sqlChengeQuestion($_POST['id']);
}

if(isset($_POST['setquestion'])){
	//$chengeQuestion = sqlSetQuestion($_POST['id']);
	$question = new Letter();
	$question->sqlSetQuestion($_POST['id']);
}

if(isset($_POST['user'])){
	$user = $_POST['user'];
	if(isset($user['name'])){
		//$setQuestionInAdmin = sqlSetQuestionInAdmin("name", $user['name'], $_POST['id']);
		$question = new Letter();
		$question->setQuestionInAdmin("name", $user['name'], $_POST['id']);
	}
	if(isset($user['mail'])){
		//$setQuestionInAdmin = sqlSetQuestionInAdmin("mail", $user['mail'], $_POST['id']);
		$question = new Letter();
		$question->setQuestionInAdmin("mail", $user['mail'], $_POST['id']);
	}
	if(isset($user['mesage'])){
		//$setQuestionInAdmin = sqlSetQuestionInAdmin("description", $user['mesage'], $_POST['id']);
		$question = new Letter();
		$question->setQuestionInAdmin("description", $user['mesage'], $_POST['id']);
	}
	if(isset($user['answer'])){
		//$setQuestionInAdmin = sqlSetQuestionInAdmin("answer", $user['answer'], $_POST['id']);
		$question = new Letter();
		$question->setQuestionInAdmin("answer", $user['answer'], $_POST['id']);
	}
}

header('Location: ../adminka.php');
