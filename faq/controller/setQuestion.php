<?php 
require_once("../app/letter.class.php");
?>
<?php 

if(isset($_POST['delquestion'])){
	$question = new Letter();
	$question->delQuestion($_POST['id']);
	

	$use = ' удалил вопрос ('.$_POST['id'].')';
}

if(isset($_POST['chengequestion'])){
	$question = new Letter();
	$question->sqlChengeQuestion($_POST['id']);
	
	$use = ' скрыл вопрос ('.$_POST['id'].")";
}

if(isset($_POST['setquestion'])){
	$question = new Letter();
	$question->sqlSetQuestion($_POST['id']);
	
	$use = ' опубликовал вопрос ('.$_POST['id'].")";
}

if(isset($_POST['user'])){
	$user = $_POST['user'];
	
	$use = ' изменил (';
	
	if(isset($user['name'])){
		$question = new Letter();
		$question->setQuestionInAdmin("name", $user['name'], $_POST['id']);
		
		$use .= 'имя ';
	}
	if(isset($user['mail'])){
		$question = new Letter();
		$question->setQuestionInAdmin("mail", $user['mail'], $_POST['id']);
		
		$use .= 'почту ';
	}
	if(isset($user['mesage'])){
		$question = new Letter();
		$question->setQuestionInAdmin("description", $user['mesage'], $_POST['id']);
		if ($question->proverkaNaTelegram($user['mail']) == true){
			$question->sendToTelegram($user);
			echo 111;
		}
		$use .= 'вопрос ';
	}
	if(isset($user['answer'])){
		$question = new Letter();
		$question->setQuestionInAdmin("answer", $user['answer'], $_POST['id']);
		if(!empty($_POST['ban'])){
			$question->noBan($_POST['id']);
			$send = "(снят с бана)";
		}
		$use .= 'ответ '.$send;
	}
	
	$use .= ')в вопросе ('.$_POST['id'].")";
}

$d = getdate();

$file = fopen('../User_can.txt', 'a+');

$text = "[ $d[mday]-$d[mon]-$d[year] $d[hours]:$d[minutes]:$d[seconds] ] ".$_SESSION['login']." ".$use."\n";

fwrite($file, $text);

header('Location: ../view/adminka.php');
