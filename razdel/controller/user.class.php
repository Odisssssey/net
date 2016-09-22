<?php 
session_start();
require_once("../model/model.php");

class User {

	public $login;
	public $password;
	public $isLogin;
	public $isAdmin;
	public $error;
	
	
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
			$this->error = 'variable is not';
		}
	}
	
	public function visit(){
	
		$sql = sqlLogs();
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
				$this->error = 'Неверный пароль';
			}
		}
	}
	
	
	public function registretion(){
		$sql = sqlLogs();
		while ($row = $sql->fetch(PDO::FETCH_NUM)) 
		{
			if ($this->login == $row[1] && $this->password == $row[2])
			{
				$this->error = 'Вы уже зарегистрированы';
			}
		}
	
		if (empty($this->error))
		{
			$login = htmlspecialchars($this->login);
			$password = htmlspecialchars($this->password);
			$sqlReg = sqlReg($login, $password);
			
		}
	}
	
}

/*$vhod = 'регистрация';
$password = 'poi';
$login = 'poi';
$ivan = new User($vhod, $password, $login);
if(isset($ivan->isAdmin)){
	echo $ivan->login;
	}else{echo "not";}
*/	