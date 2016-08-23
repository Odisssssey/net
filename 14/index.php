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
require_once("header.php"); 
?>
 
<?php 
require_once("model.php");
?>

<p>
<h1>Список дел на вчера</h1>
<div style="float: left">
    <form action="action.php" method="POST" >
        <input type="text" name="description" placeholder="Описание задачи" value="<?php if(isset($_GET['description'])) echo $_GET['description']; ?>" />
        <input type=hidden name="id" value="<?php if(isset($_GET['id'])) echo $_GET['id']; ?>">
		<input type="submit" name="save" value="Добавить" />
    </form>
</div>	
<div style="float: left; margin-left: 20px;">
	<form method="POST">
		<label for="sort">Сортировать по:</label><select name="sort_by">
		<option value="date_added">Дате добавления</option>
		<option value="is_done">Статусу</option>
		<option value="description">Описанию</option>
	</select>
	<input type="submit" name="sort" value="Отсортировать" />
    </form><br/>
</div>
<br/>
<div style="clear: both"></div>
<table>
    <tr>
        <th>Описание задачи</th>
        <th>Дата добавления</th>
        <th>Статус</th>
        <th></th>
		<th>Ответственный</th>
        <th>Закрепить задачу за пользователем</th>
    </tr>
	
<?php
if (!empty($_POST['sort_by'])){
		$sqlSort = sqlSort($_POST['sort_by']);
	}else{
		$sqlSort = sqlBase();
	}
while ($row = $sqlSort->fetch(PDO::FETCH_NUM)) 
{
	echo "<tr>";
	echo "<td>".$row[3]."</td>";
	echo "<td>".$row[5]."</td>";
	if($row[4] == 1)
		{
		echo "<td><span style='color: green;'>Выполнено</span></td>";
		}else{
		echo "<td><span style='color: orange;'>В процессе</span></td>";
		}?>
	<td><a href="index.php?description=<?= $row[3] ?>&id=<?= $row[0] ?>">Изменить</a>
        <a href="action.php?perform=1&id=<?= $row[0] ?>">Выполнить</a>
        <a href="action.php?delete=1&id=<?= $row[0] ?>">Удалить</a>
	</td>
	<?php
	if(!empty($row[2])){
		echo "<td>";
		$sql = sqlLogs();
		while ($rom = $sql->fetch(PDO::FETCH_NUM)) 
		{ 
		if($rom[0] == $row[2]) echo $rom[1];
		}
		echo "</td>";
	}else{
		echo "<td>"."Вы"."</td>";
	}
	?>
		<td><form action="actionz.php" method="POST">
				<select name="make_for">
				<?php
				
				$sql = sqlLogs();
				while ($rom = $sql->fetch(PDO::FETCH_NUM)) 
				{ 
					if($rom[0] != $_SESSION['id']){?>
				<option value="<?= $rom[0] ?>"><?= $rom[1] ?></option>
				<?php }} ?>
				</select>
		<input type=hidden name="id" value="<?= $row[0] ?>">
		
		<input type="submit" name="assign" value="сделать ответственным" />
			</form></td>
	</tr>
<?php
}

?>

</table>
<?php
require_once("treb.php"); 
?>
	</p>
</body>
</html>
	