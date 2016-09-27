<?php 
//session_start();
require_once("../app/config.php");

class Modificate {

	public function sqlSetQuestionInAdmin($column, $variable, $id){
		$pdo = connect();
		$sql =$pdo->prepare('UPDATE question SET '.$column.' =:variable WHERE id =:id');
		$sql->bindParam(":variable",$variable);
		$sql->bindParam(":id",$id);
		$sql->execute();
		return $sql;
	}	
	public function sqlNoBan($id)
	{
		$pdo = connect();
		$sth=$pdo->prepare("UPDATE question SET ban= NULL WHERE id =:id");
		$sth->bindParam(":id",$id);
		$sth->execute();
		return $sth;
	}
	public function sqlSaveQuestion($text, $ban, $banWord)
	{
		$pdo = connect();
		$sth=$pdo->prepare("INSERT INTO question (category, description, name, mail, date, ban, banWord, update_id) VALUES(:category, :description, :name, :mail, CURRENT_TIMESTAMP, :ban, :banWord, :update_id)");
		$sth->bindParam(":category",$text['theme']);
		$sth->bindParam(":description",$text['mesage']);
		$sth->bindParam(":name",$text['name']);
		$sth->bindParam(":mail",$text['mail']);
		$sth->bindParam(":ban",$ban);
		$sth->bindParam(":banWord",$banWord);
		$sth->bindParam(":update_id",$text['update_id']);
		$sth->execute();
		return $sth;
	}
	public function delete($category)
	{
		$pdo = connect();
		$sth=$pdo->prepare("DELETE FROM question WHERE category=:category"); 
		$sth->bindParam(":category",$category);
		$sth->execute();
		return $sth;
	}
	public function delQuestion($id)
	{
		$pdo = connect();
		$sth=$pdo->prepare("DELETE FROM question WHERE id=:id"); 
		$sth->bindParam(":id",$id);
		$sth->execute();
		return $sth;
	}
	public function sqlChengeQuestion($id)
	{
		$pdo = connect();
		$sql =$pdo->prepare('UPDATE question SET hidden = "1" WHERE id =:id');
		$sql->bindParam(":id",$id);
		$sql->execute();
		return $sql;
	}
	public function sqlSetQuestion($id){
		$pdo = connect();
		$sql =$pdo->prepare('UPDATE question SET hidden = "0" WHERE id =:id');
		$sql->bindParam(":id",$id);
		$sql->execute();
		return $sql;
	}
	
	
	
}

