<?php 
require_once("../model/question.class.php");
require_once("../model/modelForBanHtml.php");

class Voprosi {


	function __construct(){
		
		$this->sozdanieFormi();
		if (isset($_POST['category'])){
			$this->sozdanieTablizi();
		}
	}
	
	public function sozdanieFormi(){
	
		echo'<form action="" method="POST" >';
		echo'<select name="category">';
		$this->sozdanieSelecta();
		$this->sozdanieOpziiBezOtveta();
		$this->sozdanieOpzii();
		
		echo'<input type="submit" name="enter" value="выбрать" /></form>';
	}
	
	public function sozdanieSelecta(){
	
		$s = <<<EOT
		<option disabled {$this->proverkaNaOtsutstvie()} >выбрать тему</option>
EOT;
		echo $s;
	}
	
	public function proverkaNaOtsutstvie(){
	
		if(empty($_SESSION['text']['theme'])){
		return 'selected';
		}
	}
	
	public function sozdanieOpziiBezOtveta(){
		
		$s = <<<EOT
		<option value="noAnswer" {$this->proverkaNaSuchestvovanieOpziiBezOtveta()} >без ответа</option>
		<option value="inBan" {$this->proverkaNaSuchestvovanieOpziiBezOtveta()} >забаненные</option>
EOT;
		echo $s;
		
	}
	
	public function proverkaNaSuchestvovanieOpziiBezOtveta(){
	
		if(!empty($_SESSION['text']['theme']) && ($_SESSION['text']['theme'] == $viborThem[0] )){
		return 'selected'; 
		}
	
	}
	
	public function sozdanieOpzii(){
		$question = new Question;
		$viborThemi = $question->sqldistinct();
		while ($viborThem = $viborThemi->fetch(PDO::FETCH_NUM)) 
		{
			$this->opzii($viborThem[0]);
		}
	}
	
	public function opzii($viborThem){
	
		$s = <<<EOT
		<option value={$viborThem} {$this->provercaNaNalichieVibrannogo()} >{$viborThem}</option>
EOT;
		echo $s;
	
	}
	
	public function provercaNaNalichieVibrannogo(){
	
		if(!empty($_SESSION['text']['theme']) && ($_SESSION['text']['theme'] == $viborThem[0] )){ 
		return 'selected'; 
		}
		
	}
	
	public function sozdanieTablizi(){
	
		echo"<table><tr><th>вопрос</th><th>ответ</th><th>имя</th><th>время</th><th>статус</th></tr>";
		$this->zapolnenieTablizi();
	
	}
	
	public function zapolnenieTablizi(){
	
		if(($_POST['category'] != "noAnswer") || ($_POST['category'] != "inBan")){
			$question = new Question;
			$baseCategory = $question->sqlBaseCategory($_POST['category']);
		}
		if($_POST['category'] == "inBan"){
			$question = new Question;
			$baseCategory = $question->sqlBaseInBan();
		}
		if($_POST['category'] == "noAnswer"){
			$question = new Question;
			$baseCategory = $question->sqlBaseNotAnswer();
		}
			
		
		
		while ($basePole = $baseCategory->fetch(PDO::FETCH_NUM)) 
		{
			echo "<tr>";
			echo "<td>".$basePole[2]."</td>";
			echo "<td>".$basePole[3]."</td>";
			echo "<td>".$basePole[4]."</td>";
			echo "<td>".$basePole[7]."</td>";
			if (isset($basePole[3])){
				if ($basePole[6] == 0){echo "<td>".'виден'."</td>";}else{echo "<td>".'скрыт'."</td>";}
				}else{
				echo "<td>".'нет ответа'."</td>";
				}
			
			echo "<form action='' method='POST' >";		
			echo "<td>"."<input type='submit' name='chengeFooter' value='изменить' /><input type=hidden name='idForFooter' value='{$basePole[0]}'>"."</td>";
			echo "</form>";
			
			echo "<form action='../controller/setQuestion.php' method='POST' >";
			echo "<td>"."<input type='submit' name='delquestion' value='удалить' /><input type=hidden name='id' value='{$basePole[0]}'>"."</td>";
			if (isset($basePole[3])){	
				if ($basePole[6] == 0){

					echo "<td>"."<input type='submit' name='chengequestion' value='скрыть' /><input type=hidden name='id' value='{$basePole[0]}'>"."</td>";
				}else{
					echo "<td>"."<input type='submit' name='setquestion' value='показать' /><input type=hidden name='id' value='{$basePole[0]}'>"."</td>";
				}
			}	
			if (isset($basePole[9])){
				echo "<td>".$basePole[9]."</td>";
			}
			echo "</form>";
			
			echo "</tr>";
		}


	}
	
	
	
	
	
	
	
	

}


