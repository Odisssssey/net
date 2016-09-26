<?php 
require_once("./model/question.class.php");

class Temi {


	function __construct(){
		$this->tabliza();
			
	}
	
	public function tabliza(){
	
		echo "<table><tr><th>темы</th><th>кол-во вопросов</th><th>кол-во отвеченных</th><th>ждут ответа</th></tr>";
		$this->viborKategorii();
		echo "</table>";
	}
	
	public function viborKategorii(){
		$question = new Question;
		$viborKategorii = $question->sqldistinct();
		while ($tema = $viborKategorii->fetch(PDO::FETCH_NUM)) 
		{
			echo "<tr>";
			$f = $tema[0];
			echo "<td>".$tema[0]."</td>";
			$qlCount = $question->sqlCount($f);
			while ($count = $qlCount->fetch(PDO::FETCH_NUM)){
			echo "<td>".$count[0]."</td>";
			$description = $count[0];
			}
			$countAnswer = $question->sqlCountAnswer($tema[0]);
			while ($answer = $countAnswer->fetch(PDO::FETCH_NUM)){
			echo "<td>".$answer[0]."</td>";
			$answers = $answer[0];
			}
			$fre = $description - $answers;
			echo "<td>".$fre."</td>";
			echo "<form action='./controller/setTema.php' method='POST'>";
			echo "<td><input type=hidden name='category' value='{$tema[0]}'><input type='submit' name='del' value='удалить' ></td>";
			echo "</form>";
			echo "</tr>";
		}
	}

}
