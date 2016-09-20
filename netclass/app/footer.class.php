<?php 
require_once("./model/modelForHtml.php");


class Footer {
	
	function __construct(){
		
		$this->errorVopros();
		$this->form();
	}
	
	public function errorVopros(){
		if (!empty($_SESSION['errorVopros']))
		{
			echo $_SESSION['errorVopros'];
		} 
	}
	
	public function form(){
		echo'<form action="./controller/actionLetter.php" method="POST" >';
		$this->polevvoda("Ваше имя", "name");
		echo'<input type="submit" name="save" value="Добавить" /><br/><br/>';
		$this->polemail("Ваша почта", "mail");
		$this->select();
		$this->textarea();
		echo'</form>';
		
	}
	
	///pole vvoda///
	
	public function polevvoda($placeholder, $variable){
		$s = <<<EOT
			<input type="text" name="text[{$variable}]" placeholder="{$placeholder}" value="{$this->existence($variable)}" />
EOT;
		echo $s;
	}
	
	public function polemail($placeholder, $variable){
		$s = <<<EOT
			<input type="email" name="text[{$variable}]" placeholder="{$placeholder}" value="{$this->existence($variable)}" />
EOT;
		echo $s;
	}
	
	public function existence($variable){
		if(!empty($_SESSION['text']["{$variable}"])){
		return $_SESSION['text']["{$variable}"]; 
		}
	}
	///select///
	
	public function select(){
		echo "<select name='text[theme]'>";
		echo $this->notexists();
		
		$s = <<<EOT
		<option disabled {$this->notexists()} >выбрать тему</option>
EOT;
		echo $s;
		$this->viborThemi();
		
		echo "</select><br/><br/>";
	}
	
	public function notexists(){
		if(empty($_SESSION['text']['theme'])) {
		return 'selected';
		}
	}
	
	public function viborThemi(){
		$viborThemi = sqldistinct();
		while ($viborThem = $viborThemi->fetch(PDO::FETCH_NUM))		
		{
			$s = <<<EOT
			<option value="{$viborThem[0]}" {$this->exists($viborThem[0])} >{$viborThem[0]}</option>
EOT;
		    echo $s;
		}
	}
	
	public function exists($viborThem){
		if(!empty($_SESSION['text']['theme']) && ($_SESSION['text']['theme'] == $viborThem )){
		return 'selected'; 
		}
	}
	
	public function textarea(){
	
		$s = <<<EOT
		<textarea name="text[mesage]" placeholder="Введите свой вопрос" rows="4" cols="41" wrap="virtual">{$this->existence('mesage')}</textarea> 
EOT;
		echo $s;
	}
}


