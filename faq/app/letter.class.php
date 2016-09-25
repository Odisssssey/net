<?php
session_start();
require_once("../model/model.php");
require_once("../model/modelForBan.php");
require_once("header.php");

class Letter{

	
	function __construct($text){
		$_SESSION['text'] = $text;
		unset($_SESSION['errorVopros']);
		$ban = $this->proverka($text);
		$this->existenceOfVariable($text);
		if (empty($_SESSION['errorVopros']))
		{
			if ($this->proverka($text) == true){
				$saveQuestion = sqlSaveQuestion($text, "1", $ban);
			}else{
				$saveQuestion = sqlSaveQuestion($text);
			}
			unset($_SESSION['text']);
		}
	}
	
	public function proverka($text){
		
		$str = $this->textVMassiv($text);
		$list = sqlList();
		while ($word = $list->fetch(PDO::FETCH_NUM)) 
		{
			foreach ($str as $k => $v){
				if ($word[1] == $v){
					return $v;
				}
			}
		}
	}
		
	public function textVMassiv($text){
		$message = $text['mesage'];
		$str = [];
		$pat = preg_split("/[\s,!?.]+/", $message);
		
		for($i=0; $i<count($pat); $i++)
			{
				array_push($str, $pat["{$i}"]);
			}
		return $str;
	}
	
	public function existenceOfVariable($text){
		if (empty($text['mesage']))
		{
			$_SESSION['errorVopros'] = 'Введите текст сообщения';
		}
		if (empty($text['theme']))
		{
			$_SESSION['errorVopros'] = 'Выберите тему';
		}

		if (empty($text['mail']))
		{
			$_SESSION['errorVopros'] = 'Введите вашу почту';
		}

		if (empty($text['name']))
		{
			$_SESSION['errorVopros'] = 'Введите ваше имя';
		}
		
	}
	
	public function delQuestion($id){
		$question = delQuestion($id);	
	}
	
	
	public function sqlChengeQuestion($id){
	
		$chengeQuestion = sqlChengeQuestion($id);
	}
	
	public function sqlSetQuestion($id){
		$chengeQuestion = sqlSetQuestion($_POST['id']);	
	}
	
	public function setQuestionInAdmin($variable, $name, $id){
	
		$setQuestionInAdmin = sqlSetQuestionInAdmin($variable, $name, $id);
		if(!empty($_POST['ban'])){
			$noBan = sqlNoBan($_POST['id']);
		}
	
	}
	
	
	public function proverkaNaTelegram($mail){
		if(is_numeric($mail)){
			return true;
		}
	}
	public function sendToTelegram($user){
	
		$botToken = "287541774:AAHJFWm6Ed-cYXo96E884wEY7Zdy_dv62ek";
		$website = "https://api.telegram.org/bot".$botToken;
		$mail = $user['mail'];
		
		$text = 'Ваш вопрос: "'.$user['mesage'].'". Ответ: "'.$user['answer'].'".';
		
		file_get_contents($website."/sendmessage?chat_id=".$mail."&text=".$text);
	
	}
	
	public function delTema($category){
	
	$del = delete($category);
	
	}
	
	public function noBan($id){
		$noBan = sqlNoBan($_POST['id']);
	}

}
