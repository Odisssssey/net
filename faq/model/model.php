<?php 
require_once("../app/config.php");
?>

<?php 
function sqlLogs() 
{
	$pdo = connect();
	$sql=$pdo->prepare('SELECT * FROM user');
	$sql->execute();
	return $sql;
}
function sqlReg($login, $password){
	$pdo = connect();
	$sth=$pdo->prepare("INSERT INTO user (login, password) VALUES(:login, :password)");
	$sth->bindParam(":login",$login);
	$sth->bindParam(":password",$password);
	$sth->execute();
	return $sth;
}
function sqlSort($sort_by)
{
	$pdo = connect();
	$sql=$pdo->prepare('SELECT * FROM question WHERE category=:category and answer!="" and hidden="0"');
	$sql->bindParam(":category",$sort_by);
	$sql->execute();
	return $sql;
}
function sqldistinct()
{
	$pdo = connect();
	$sqlBas=$pdo->prepare('SELECT DISTINCT category FROM question');
	$sqlBas->execute();
	return $sqlBas;

}
function sqlBase()
{
	$pdo = connect();
	$sqlBas=$pdo->prepare('SELECT * FROM question');
	$sqlBas->execute();
	return $sqlBas;
}
function baseQestionAdmin($id)
{
	$pdo = connect();
	$sqlBas=$pdo->prepare('SELECT * FROM question WHERE  id =:id');
	$sqlBas->bindParam(":id",$id);
	$sqlBas->execute();
	return $sqlBas;
}
function sqlSetQuestionInAdmin($column, $variable, $id){
	$pdo = connect();
	$sql =$pdo->prepare('UPDATE question SET '.$column.' =:variable WHERE id =:id');
	$sql->bindParam(":variable",$variable);
	$sql->bindParam(":id",$id);
	$sql->execute();
	return $sql;
}
function sqlBaseNotAnswer()
{
	$pdo = connect();
	$sqlBas=$pdo->prepare('SELECT * FROM question WHERE answer IS NULL');
	$sqlBas->execute();
	return $sqlBas;
}
function sqlBaseCategory($category)
{
	$pdo = connect();
	$sqlBas=$pdo->prepare('SELECT * FROM question WHERE category=:category');
	$sqlBas->bindParam(":category",$category);
	$sqlBas->execute();
	return $sqlBas;
}
function sqlCountAnswer($category)
{
	$pdo = connect();
	$sqlBas=$pdo->prepare('SELECT COUNT(answer) FROM question WHERE category =:category');
	$sqlBas->bindParam(":category",$category);
	$sqlBas->execute();
	return $sqlBas;
}
function sqlCount($category)
{
	$pdo = connect();
	$sqlBas=$pdo->prepare('SELECT COUNT(category) FROM question WHERE category =:category');
	$sqlBas->bindParam(":category",$category);
	$sqlBas->execute();
	return $sqlBas;
}
function sqlReSetPassword($id, $password){
	$pdo = connect();
	$sth=$pdo->prepare("UPDATE user SET password =:password WHERE id =:id");
	$sth->bindParam(":password",$password);
	$sth->bindParam(":id",$id);
	$sth->execute();
	return $sth;
}
function sqlDelAdmin($id){
	$pdo = connect();
	$sth=$pdo->prepare("UPDATE user SET isAdmin =0 WHERE id =:id");
	$sth->bindParam(":id",$id);
	$sth->execute();
	return $sth;
}
function sqlNoBan($id){
	$pdo = connect();
	$sth=$pdo->prepare("UPDATE question SET ban= NULL WHERE id =:id");
	$sth->bindParam(":id",$id);
	$sth->execute();
	return $sth;
}
function sqlSetAdmin($id){
	$pdo = connect();
	$sth=$pdo->prepare("UPDATE user SET isAdmin =1 WHERE id =:id");
	$sth->bindParam(":id",$id);
	$sth->execute();
	return $sth;
}
function sqlSaveQuestion($text, $ban, $banWord){
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
function delete($category){
	$pdo = connect();
	$sth=$pdo->prepare("DELETE FROM question WHERE category=:category"); 
	$sth->bindParam(":category",$category);
	$sth->execute();
	return $sth;
}
function delQuestion($id){
	$pdo = connect();
	$sth=$pdo->prepare("DELETE FROM question WHERE id=:id"); 
	$sth->bindParam(":id",$id);
	$sth->execute();
	return $sth;
}

function sqlChengeQuestion($id){
	$pdo = connect();
	$sql =$pdo->prepare('UPDATE question SET hidden = "1" WHERE id =:id');
	$sql->bindParam(":id",$id);
	$sql->execute();
	return $sql;
}
function sqlSetQuestion($id){
	$pdo = connect();
	$sql =$pdo->prepare('UPDATE question SET hidden = "0" WHERE id =:id');
	$sql->bindParam(":id",$id);
	$sql->execute();
	return $sql;
}
