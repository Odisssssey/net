<?php
ini_set('display_errors','Off');
include '../app/letter.class.php';
 ?>

<html>
  <head>
      <meta charset="utf-8">
	  	  <style>
    table { 
        border-spacing: 0;
        border-collapse: collapse;
    }

    table td, table th {
        border: 1px solid #ccc;
        padding: 5px;
    }
    
    table th {
        background: #eee;
    }
	form {
        margin: 0;
    }
	h1 {
	  color: #77dd77;
	}

	</style>
  </head>
<body>
<a>Ваше имя: </a><a><?= $_SESSION['login'] ?></a><a> | </a><a href='../exit.php'>Выйти</a>


    <a> | </a><a href='../adminka.php'> Войти в админку</a>
	<a> | </a><a href='../index.php'> Посмотреть вопросник</a>
	<a> | </a><a href='#'> Проверить телеграм</a>
	<hr/><br/>

<h1>Телеграм</h1>
<?php

$botToken = "287541774:AAHJFWm6Ed-cYXo96E884wEY7Zdy_dv62ek";

$website = "https://api.telegram.org/bot".$botToken;

$update = file_get_contents($website."/getupdates");
//var_dump($update);
$updateArray = json_decode($update, True);
$loop = 0;

while(empty($error)){
	$text = [];
	$text['mesage'] = $updateArray['result']["{$loop}"]['message']['text'];
	$text['date'] = $updateArray['result']["{$loop}"]['message']['date'];
	$text['name'] = $updateArray['result']["{$loop}"]['message']['from']['first_name'];
	$text['theme'] = 'telegram';
	$text['mail'] = $updateArray['result']["{$loop}"]['message']['chat']['id'];
	@$letter = new Letter($text);
	if (empty($text['mesage'])){
		$error = 'error!';
		if ($loop == 0){
			echo "Новых вопроснов нет.";
		}
	}else{
		if(empty($error)){
			file_get_contents($website."/sendmessage?chat_id=".$text['mail']."&text=Ваш вопрос принят.");
			if ($loop == 0){
			echo "<table><tr>
				<th>имя</th>
				<th>вопрос</th>
					</tr>";
			}
			echo "<tr>
				<td>".$text['name']."</td>
				<td>".$text['mesage']."</td>
				</tr>";
		}
	}
	$loop++;
}

echo "</table>";

/*
if(!empty($error)){
	header('Location: ../adminka.php');
}*/
//var_dump($text);



/*
print_r($updateArray);
*/
?>
</body>
</html>
