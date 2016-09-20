<?php
session_start();
require_once("../model/model.php");

class Letter{

	
	function __construct($text){
		$_SESSION['text'] = $text;
		unset($_SESSION['errorVopros']);
		$this->existenceOfVariable($text);
		var_dump($text);
		if (empty($_SESSION['errorVopros']))
		{
			$saveQuestion = sqlSaveQuestion($text);
			unset($_SESSION['text']);
		}
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
	
	}
	
	public function delTema($category){
	
	$del = delete($category);
	
	}

}
