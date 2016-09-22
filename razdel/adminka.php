<?php
 session_start();
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

	</style>
  </head>
<body>
<?php 
require_once("./model/modelForHtml.php");
?>
<h1>Список админов</h1>

    <form action="./controller/setAdmin.php" method="POST" >
        <input type="text" name="description" placeholder="изменить пароль" value="<?php if(isset($_GET['description'])){echo $_GET['description'];} ?>" />
        <input type=hidden name="id" value="<?php if(isset($_GET['id'])) echo $_GET['id']; ?>">
		<input type="submit" name="save" value="Изменить" />
    </form>
	
<table>
		<tr>
			<th>логин</th>
			<th>пароль</th>
			<th>админ</th>
			<th></th>
			<th></th>
		</tr>
		
<?php
$admins = sqlLogs();
while ($row = $admins->fetch(PDO::FETCH_NUM)) 
{
		echo "<tr>";
		echo "<td>".$row[1]."</td>";
		echo "<td>".$row[2]."</td>";
		if($row[3] == "1"){ echo "<td>"."да"."</td>"; }else{ echo "<td>"."нет"."</td>";};
		if($row[3] != "1"){	echo "<td><a href='./controller/setAdmin.php?id={$row[0]}&admin=1'>сделать админом</a></td>"; }else{ echo "<td><a href='./controller/setAdmin.php?id={$row[0]}&admin=0'>разжаловать</a></td>";};
		echo "<td><a href='adminka.php?description={$row[2]}&id={$row[0]}'>Изменить пароль</a>";
		echo "</tr>";
}	?>
	</table>
	
	<h1>Список тем</h1>
<table>
		<tr>
			<th>темы</th>
			<th>кол-во вопросов</th>
			<th>кол-во отвеченных</th>
			<th>ждут ответа</th>
		</tr>	
	
	
<?php	
$viborKategorii = sqldistinct();
while ($tema = $viborKategorii->fetch(PDO::FETCH_NUM)) 
	{
		echo "<tr>";
		$f = $tema[0];
		echo "<td>".$tema[0]."</td>";
		$qlCount = sqlCount($f);
		while ($count = $qlCount->fetch(PDO::FETCH_NUM)){
		echo "<td>".$count[0]."</td>";
		$description = $count[0];
		}
		$countAnswer = sqlCountAnswer($tema[0]);
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
	
?>
	</table>	
	
	
	<h1>Вопросы в темах</h1>
	
	    <form action="" method="POST" >
		<select name="category">
		<option disabled <?php if(empty($_SESSION['text']['theme'])) {echo 'selected';} ?> >выбрать тему</option>
		<option value="noAnswer" <?php if(!empty($_SESSION['text']['theme']) && ($_SESSION['text']['theme'] == $viborThem[0] )){ echo 'selected'; } ?> >без ответа</option>
<?php
$viborThemi = sqldistinct();
while ($viborThem = $viborThemi->fetch(PDO::FETCH_NUM)) 
{
?>
		<option value="<?= $viborThem[0] ?>" <?php if(!empty($_SESSION['text']['theme']) && ($_SESSION['text']['theme'] == $viborThem[0] )){ echo 'selected'; } ?> ><?= $viborThem[0] ?></option>
<?php } ?>	
		<input type="submit" name="enter" value="выбрать" />
		</form>
	
<?php
if (isset($_POST['category'])){
	
	
?>
<table>
		<tr>
			<th>вопрос</th>
			<th>ответ</th>
			<th>имя</th>
			<th>время</th>
			<th>статус</th>
		</tr>

<?php
	if($_POST['category'] != "noAnswer"){
	$baseCategory = sqlBaseCategory($_POST['category']);
	}else{
	$baseCategory = sqlBaseNotAnswer();
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
		
		echo "<form action='./controller/setQuestion.php' method='POST' >";
		echo "<td>"."<input type='submit' name='delquestion' value='удалить' /><input type=hidden name='id' value='{$basePole[0]}'>"."</td>";
		if (isset($basePole[3])){	
			if ($basePole[6] == 0){

				echo "<td>"."<input type='submit' name='chengequestion' value='скрыть' /><input type=hidden name='id' value='{$basePole[0]}'>"."</td>";
			}else{
				echo "<td>"."<input type='submit' name='setquestion' value='показать' /><input type=hidden name='id' value='{$basePole[0]}'>"."</td>";
			}
		}	
		echo "</form>";
		
		echo "</tr>";
	}


}
?>
</table>
<?php
if(!empty($_POST['chengeFooter'])){
$_SESSION['idForFooter'] = $_POST['idForFooter'];
?>

<?php 
require_once("footerAdmin.php");
?>
<?php } ?>
	
</body>
</html>