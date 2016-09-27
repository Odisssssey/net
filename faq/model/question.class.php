<?php 
//session_start();
require_once("../app/config.php");

class Question {

	public function sqlLogs() 
	{
		$pdo = connect();
		$sql=$pdo->prepare('SELECT * FROM user');
		$sql->execute();
		return $sql;
	}
	public function sqlSort($sort_by)
	{
		$pdo = connect();
		$sql=$pdo->prepare('SELECT * FROM question WHERE category=:category and answer!="" and hidden="0"');
		$sql->bindParam(":category",$sort_by);
		$sql->execute();
		return $sql;
	}

	public function sqldistinct()
	{
		$pdo = connect();
		$sqlBas=$pdo->prepare('SELECT DISTINCT category FROM question');
		$sqlBas->execute();
		return $sqlBas;
	}
	function sqlQuestion() 
	{
		$pdo = connect();
		$sql=$pdo->prepare('SELECT * FROM qustion');
		$sql->execute();
		return $sql;
	}
	public function sqlBase()
	{
		$pdo = connect();
		$sqlBas=$pdo->prepare('SELECT * FROM question');
		$sqlBas->execute();
		return $sqlBas;
	}
	public function baseQestionAdmin($id)
	{
		$pdo = connect();
		$sqlBas=$pdo->prepare('SELECT * FROM question WHERE  id =:id');
		$sqlBas->bindParam(":id",$id);
		$sqlBas->execute();
		return $sqlBas;
	}
	public function sqlBaseNotAnswer()
	{
		$pdo = connect();
		$sqlBas=$pdo->prepare('SELECT * FROM question WHERE answer IS NULL AND ban IS NULL');
		$sqlBas->execute();
		return $sqlBas;
	}
	public function sqlBaseCategory($category)
	{
		$pdo = connect();
		$sqlBas=$pdo->prepare('SELECT * FROM question WHERE category=:category AND ban IS NULL');
		$sqlBas->bindParam(":category",$category);
		$sqlBas->execute();
		return $sqlBas;
	}
	public function sqlCountAnswer($category)
	{
		$pdo = connect();
		$sqlBas=$pdo->prepare('SELECT COUNT(answer) FROM question WHERE category =:category');
		$sqlBas->bindParam(":category",$category);
		$sqlBas->execute();
		return $sqlBas;
	}
	public function sqlCount($category)
	{
		$pdo = connect();
		$sqlBas=$pdo->prepare('SELECT COUNT(category) FROM question WHERE category =:category');
		$sqlBas->bindParam(":category",$category);
		$sqlBas->execute();
		return $sqlBas;
	}
	function sqlBaseInBan()
	{
		$pdo = connect();
		$sqlBas=$pdo->prepare('SELECT * FROM question WHERE ban= 1');
		$sqlBas->execute();
		return $sqlBas;
	}

	
	
	
}

