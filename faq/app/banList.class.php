<?php 
require_once("../model/modelForBanHtml.php");

class Ban {


	function __construct(){
		
		$this->sozdanieFormi();
		$this->sozdanieTablizi();
			
	}
	
	public function sozdanieFormi(){
	
		echo '<form action="../controller/ban.php" method="POST" >';
		echo '<input type="text" name="description" placeholder="добавить исключение" value="" />';
		echo '<input type="submit" name="save" value="Добавить" />';
		echo '</form>';
	}	
	
	public function sozdanieTablizi(){
		echo "<table><tr><th>слово</th><th></th><th>слово</th><th></th><th>слово</th><th></th></tr>";
		$this->zapolnenieTablizi();
		echo "</table>";
	}
	public function zapolnenieTablizi(){
	$list = sqlList();
	$loop = 3;
	while ($word = $list->fetch(PDO::FETCH_NUM)) 
		{
			if($loop == 3){
				echo "<tr>";
				$loop = 0;
			}
			echo "<td>".$word[1]."</td>";
			echo "<td><form action='../controller/ban.php' method='POST' >";
			echo "<input type='submit' name='delBanWord' value='удалить' /><input type=hidden name='id' value='{$word[0]}'>";
			echo "</form></td>";
			$loop++;
			if($loop == 3){
				echo "</tr>";
			}
			
		}
	
	}

}


