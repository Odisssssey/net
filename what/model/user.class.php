<?php 
session_start();
require_once("../app/config.php");

class User {

	public $login;
	public $password;
	public $isLogin;
	public $isAdmin;
	
	
	function __construct($vhod, $password, $login){
		
		$this->password = $password;
		$this->login = $login;
		
		$this->existenceOfVariable();
		
		if (empty($this->error)){
			if($vhod == 'Войти'){
				$this->visit();
			}
			if($vhod == 'Зарегистрироваться'){
				$this->registretion();
			}
		}
	}

	public function existenceOfVariable(){
		if(empty($this->password) || empty($this->login)){
			$_SESSION['error'] = 'variable is not';
		}
	}
	
	public function visit(){
	
		$sql = $this->sqlLogs();
		while ($row = $sql->fetch(PDO::FETCH_NUM)) 
		{
			if ($this->login == $row[1] && $this->password == $row[2])
			{
			 $_SESSION['id'] = $row[0];
			 $_SESSION['login'] =  $row[1];
			 $_SESSION['isLogin'] = True;
			 if (!empty($row[3])){
			 $_SESSION['isAdmin'] = True;
			 }
			}
			if ($this->login == $row[1] && $this->password != $row[2])
			{
				$_SESSION['error'] = 'Неверный пароль';
			}
		}
	}
	
	
	public function registretion(){
		$sql = $this->sqlLogs();
		while ($row = $sql->fetch(PDO::FETCH_NUM)) 
		{
			if ($this->login == $row[1] && $this->password == $row[2])
			{
				$_SESSION['error'] = 'Вы уже зарегистрированы';
			}
		}
	
		if (empty($this->error))
		{
			$login = htmlspecialchars($this->login);
			$password = htmlspecialchars($this->password);
			$sqlReg = $this->sqlReg($login, $password);
			
		}
	}
	
	
	public function reSetPassword($id, $description){
	
		$adminSetPassword = $this->sqlReSetPassword($id, $description);
	
	}
	
	public function setAdmin($id){
	
		$adminSet = $this->sqlSetAdmin($id);
	
	}
	
	public function delAdmin($id){
	
		$adminDel = $this->sqlDelAdmin($id);
	
	}
	
	public function sqlLogs() 
	{
		$pdo = connect();
		$sql=$pdo->prepare('SELECT * FROM user');
		$sql->execute();
		return $sql;
	}
	
	function sqlReg($login, $password)
	{
		$pdo = connect();
		$sth=$pdo->prepare("INSERT INTO user (login, password) VALUES(:login, :password)");
		$sth->bindParam(":login",$login);
		$sth->bindParam(":password",$password);
		$sth->execute();
		return $sth;
	}
	
	public function sqlReSetPassword($id, $password){
		$pdo = connect();
		$sth=$pdo->prepare("UPDATE user SET password =:password WHERE id =:id");
		$sth->bindParam(":password",$password);
		$sth->bindParam(":id",$id);
		$sth->execute();
	return $sth;
	}
	
	public function sqlSetAdmin($id){
		$pdo = connect();
		$sth=$pdo->prepare("UPDATE user SET isAdmin =1 WHERE id =:id");
		$sth->bindParam(":id",$id);
		$sth->execute();
		return $sth;
	}
	public function sqlDelAdmin($id){
		$pdo = connect();
		$sth=$pdo->prepare("UPDATE user SET isAdmin =0 WHERE id =:id");
		$sth->bindParam(":id",$id);
		$sth->execute();
	return $sth;
}
	
}

