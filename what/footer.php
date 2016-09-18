<html>
  <head>
      <meta charset="utf-8">
  </head>
<body>
<h3>задать вопрос</h3>
<?php if (!empty($_SESSION['errorVopros']))
{
	echo $_SESSION['errorVopros'];
} ?>
<form action="actionLetter.php" method="POST" >
        <input type="text" name="text[name]" placeholder="Ваше имя" value="<?php if(!empty($_SESSION['text']['name'])){ echo $_SESSION['text']['name']; } ?>" />
		<input type="submit" name="save" value="Добавить" /><br/><br/>
		<input type="email" name="text[mail]" placeholder="Ваша почта" value="<?php if(!empty($_SESSION['text']['mail'])){ echo $_SESSION['text']['mail']; } ?>" />
		
		<select name="text[theme]">
		<option disabled <?php if(empty($_SESSION['text']['theme'])) {echo 'selected';} ?> >выбрать тему</option>
<?php
$viborThemi = sqldistinct();
while ($viborThem = $viborThemi->fetch(PDO::FETCH_NUM)) 
{
?>
		<option value="<?= $viborThem[0] ?>" <?php if(!empty($_SESSION['text']['theme']) && ($_SESSION['text']['theme'] == $viborThem[0] )){ echo 'selected'; } ?> ><?= $viborThem[0] ?></option>
<?php } ?>		
		</select><br/><br/>
		
		<textarea name="text[mesage]" placeholder="Введите свой вопрос" rows="4" cols="41" wrap="virtual"><?php if(!empty($_SESSION['text']['mesage'])){ echo $_SESSION['text']['mesage']; } ?></textarea> 

</form>

</body>
</html>