<?php 
require_once("../model/question.class.php");

class Telegram {


	function __construct(){
		
		$this->telegramDannie();
	}
	
	public function telegramDannie(){
	
		$botToken = "287541774:AAHJFWm6Ed-cYXo96E884wEY7Zdy_dv62ek";

		$website = "https://api.telegram.org/bot".$botToken;

		$update = file_get_contents($website."/getupdates");
		
		$updateArray = json_decode($update, True);
		
		$this-> formirovanieTablozi($updateArray, $website);
	}
	
	public function formirovanieTablozi($updateArray, $website){
		$loop = 0;
		$i = 0;
		while(empty($error)){
			
			$text = [];
			@$text['mesage'] = $updateArray['result']["{$loop}"]['message']['text'];
			@$text['date'] = $updateArray['result']["{$loop}"]['message']['date'];
			@$text['name'] = $updateArray['result']["{$loop}"]['message']['from']['first_name'];
			$text['theme'] = 'telegram';
			@$text['mail'] = $updateArray['result']["{$loop}"]['message']['chat']['id'];
			@$text['update_id'] = $updateArray['result']["{$loop}"]['update_id'];
			
			
			if ($this->proverkaImeushihsa($text['update_id']) != true){
				
			
				if (empty($text['mesage'])){
					$error = 'error!';
					if ($loop == 0){
						echo "Новых вопроснов нет.";
					}
				}else{
					if(empty($error)){
						if ($i == 0){
							echo "<table><tr>
								<th>имя</th>
								<th>вопрос</th>
									</tr>";
							$i = 1;
						}
						echo "<tr>
							<td>".$text['name']."</td>
							<td>".$text['mesage']."</td>";
							
					echo "<td>";
					echo <<<EOT
					<form action="./controller/bot.php" method="POST" >
							<input type=hidden name="text[mesage]" value="{$text['mesage']}">
							<input type=hidden name="text[date]" value="{$text['date']}">
							<input type=hidden name="text[name]" value="{$text['name']}">
							<input type=hidden name="text[theme]" value="{$text['theme']}">
							<input type=hidden name="text[mail]" value="{$text['mail']}">
							<input type=hidden name="text[update_id]" value="{$text['update_id']}">
							<input type=hidden name="website" value="{$website}">
							<input type="submit" name="save" value="принять" />
						</form>
EOT;
					echo "</td></tr>";
					}
				}
			}
			$loop++;
			
		}
		echo "</table>";
		
	}
	
	public function proverkaImeushihsa($update){
		$questions = new Question;
		$question = $questions->sqlQuestion() ;
		while ($row = $question->fetch(PDO::FETCH_NUM)) 
		{
			if(!empty($row[10])){
				if($update == $row[10]){
					return true;
					
				}
			}
		}
	
	}
	
}


