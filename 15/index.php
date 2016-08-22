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
require_once("model.php");
?>
<?php 
require_once("sql.php");
?>

<h1>Информация о полях таблиц базы данных:</h1>

<div style="margin-bottom: 20px;">
    <form method="POST">
        <label for="table">Выберите таблицу:</label>
        <select name="table">
                            <?php
												
								$smt = sqlVibor();
																
								while ($rom = $smt->fetch(PDO::FETCH_NUM)) 
								{ 
								?>
								<option value="<?= $rom[0] ?>"><?= $rom[0] ?></option>
							<?php } ?>
                    </select>
        <input type="submit" value="Показать информацию" />
    </form>
</div>
<div style="clear: both"></div>
<table>
    <tr>
        <th>Поле</th>
        <th>Тип</th>
		<th>Действие</th>
    </tr>

<?php

$stmt = $pdo->prepare($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_NUM)) 
{
	echo "<tr>";
	echo "<td>".$row[0]."</td>";
	echo "<td>".$row[1]."</td>";
	?>
	<td><form action="action.php" method="POST">
				<input type="submit" name="delete" value="Удалить" />
				<input type=hidden name="id" value="<?=$row[0]?>">
				</form></td>
	</tr>
<?php 	
}
?>
	<tr>
	<td><form action="action.php" method="POST">
	<input type="text" name="pole" placeholder="Название поля" value="" />
		</td>
		
	<td>
        <select name="tupe">
                            
			<option value="int">int</option>
			<option value="text">text</option>
							
        </select>
	</td>
	
	<td><input type="submit" name="save" value="Добавить" /></form></td>
	</tr>

   
</table>
</body>
</html>



