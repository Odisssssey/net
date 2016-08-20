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
</style>

  </head>
<body>
  
   
<?php 
require_once("model.php");
?>

<?php
/**
foreach ($pdo->query($sql) as $row)
{
	
		print_r($row);
	
}
echo "<hr/><br/>";*/

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
    </form>
</div>
<div style="clear: both"></div>
<table>
    <tr>
        <th>Описание задачи</th>
        <th>Дата добавления</th>
        <th>Статус</th>
        <th></th>
    </tr>
	
<?php


$stmt = $pdo->prepare($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_NUM)) 
{
//print_r($row);
	echo "<tr>";
	echo "<td>".$row[1]."</td>";
	echo "<td>".$row[3]."</td>";
	if($row[2] == 1)
		{
		echo "<td><span style='color: green;'>Выполнено</span></td>";
		}else{
		echo "<td><span style='color: orange;'>В процессе</span></td>";
		}?>
	<td><a href="index.php?description=<?= $row[1] ?>&id=<?= $row[0] ?>">Изменить</a>
        <a href="action.php?perform=1&id=<?= $row[0] ?>">Выполнить</a>
        <a href="action.php?delete=1&id=<?= $row[0] ?>">Удалить</a>
		</td>
	<tr>
<?php
}

?>









</table>



	</p>
</body>
</html>
	