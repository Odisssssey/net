<?php 
require_once("./model/question.class.php");



class Voprosnik {


	public function activ(){

		$question = new Question;
		$viborKategorii = $question->sqldistinct();
		while ($vibor = $viborKategorii->fetch(PDO::FETCH_NUM)) 
		{
			echo "<h3>".$vibor[0]."</h3>";
		
			echo "<table>";
				echo "<tr>";
					echo "<th>вопрос</th>";
					echo "<th>ответ</th>";
					echo "<th>имя</th>";
				echo "</tr>";
			$qvestion = static::qvestion($vibor[0]);	
			echo "</table>";
		}
		
	}

	public static function qvestion($vibor){
		$question = new Question;
		$sqlSort = $question->sqlSort($vibor);
		while ($row = $sqlSort->fetch(PDO::FETCH_NUM)) 
		{
			echo "<tr>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "<td>".$row[4]."</td>";
			echo "<tr>";
		}
	
	
	}
}


