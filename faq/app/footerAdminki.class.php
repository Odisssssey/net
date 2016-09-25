<?php 
require_once("./model/modelForHtml.php");

class FooterAdminki {


	function __construct(){
		$this->formirovanieFormi();
	}
	
	public function formirovanieFormi(){
		echo '<form action="./controller/setQuestion.php" method="POST" >';
		$this->vigruzIzbazi();
		echo '</form>';
	}
	
	public function vigruzIzbazi(){
		$qestionAdmin = baseQestionAdmin($_SESSION['idForFooter']);
		while ($qestion= $qestionAdmin->fetch(PDO::FETCH_NUM)) 
		{
			
			$s = <<<EOT
			<input type=hidden name="id" value="{$qestion[0]}">
			<input type=hidden name="ban" value="{$qestion[8]}">
			<input type="text" name="user[name]" placeholder="имя пользователя" value="{$qestion[4]}" />

					<input type="submit" name="reSave" value="Изменить" /><br/><br/>
					<input type="text" name="user[mail]" placeholder="почта" value="{$qestion[5]}" /><br/><br/>
					<textarea name="user[mesage]" placeholder="вопрос" rows="4" cols="41" wrap="virtual">{$qestion[2]}</textarea><br/><br/>
					<textarea name="user[answer]" placeholder="ответ" rows="4" cols="41" wrap="virtual">{$qestion[3]}</textarea> 
			
			
			
EOT;
		echo $s;
		
		}
	}
	
	
	
	
}
	



