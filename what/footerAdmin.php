<html>
  <head>
      <meta charset="utf-8">
  </head>
<body>
<h3>Корректировать вопрос</h3>

<form action="setQuestion.php" method="POST" >
<?php
$qestionAdmin = baseQestionAdmin($_SESSION['idForFooter']);
while ($qestion= $qestionAdmin->fetch(PDO::FETCH_NUM)) 
{
?>
<input type=hidden name="id" value="<?= $qestion[0] ?>">
<input type="text" name="user[name]" placeholder="имя пользователя" value="<?= $qestion[4] ?>" />

		<input type="submit" name="reSave" value="Изменить" /><br/><br/>
		<input type="email" name="user[mail]" placeholder="почта" value="<?= $qestion[5] ?>" /><br/><br/>
		<textarea name="user[mesage]" placeholder="вопрос" rows="4" cols="41" wrap="virtual"><?= $qestion[2] ?></textarea><br/><br/>
		<textarea name="user[answer]" placeholder="ответ" rows="4" cols="41" wrap="virtual"><?= $qestion[3] ?></textarea> 
<?php
}		
?>		
</form>

</body>
</html>