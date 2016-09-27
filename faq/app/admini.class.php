<?php 
require_once("../model/question.class.php");

class Admini {


	function __construct(){
		$this->topForm();
		$this->tabliza();
		
		
	}
	
	public function topForm(){
	
		echo"<form action='../controller/setAdmin.php' method='POST' >";
		$this->poleParola();
		$this->skritoepole();
		$this->knopcaParola();
		echo"</form>";
		
	}

	public function poleParola(){
	
		$s = <<<EOT
		<input type="text" name="description" placeholder="изменить пароль" value="{$this->provercaPolaParola()}" />
EOT;
		echo $s;
	}
	public function provercaPolaParola(){
		if(isset($_GET['description'])){
		return $_GET['description'];
		}
	}

	public function skritoepole(){
		$s= <<<EOT
		<input type=hidden name="id" value="{$this->provercaSkritogoPola()}">
EOT;
		echo $s;
	}
	public function provercaSkritogoPola(){
		if(isset($_GET['id'])){ 
		return $_GET['id'];
		}
	}

	public function knopcaParola(){
		$s= <<<EOT
		<input type="submit" name="save" value="Изменить" />
EOT;
		echo $s;
	}

	
	public function tabliza(){
		echo"<table><tr><th>логин</th><th>пароль</th><th>админ</th><th></th><th></th></tr>";
		$this->formirovanieTablizi();
		echo"</table>";
	}
	
	public function formirovanieTablizi(){
	$question = new Question;
	$admins = $question->sqlLogs();
	while ($row = $admins->fetch(PDO::FETCH_NUM)) 
	{
			echo "<tr>";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			if($row[3] == "1"){ echo "<td>"."да"."</td>"; }else{ echo "<td>"."нет"."</td>";};
			if($row[3] != "1"){	echo "<td><a href='../controller/setAdmin.php?id={$row[0]}&admin=1'>сделать админом</a></td>"; }else{ echo "<td><a href='../controller/setAdmin.php?id={$row[0]}&admin=0'>разжаловать</a></td>";};
			echo "<td><a href='adminka.php?description={$row[2]}&id={$row[0]}'>Изменить пароль</a>";
			echo "</tr>";
	}
	
	}

}


