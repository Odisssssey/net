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
require_once("config.php");
?>

<h1>Информация о полях таблиц базы данных:</h1>

<div style="margin-bottom: 20px;">
    <form method="POST">
        <label for="table">Выберите таблицу:</label>
        <select name="table">
                            <?php
				
								$pdo = new PDO("mysql:host=localhost;dbname=tarutin", "tarutin", "neto0402");
								$pdo->exec("set names 'utf8'");

								$sql_vibor = 'SHOW TABLES FROM tarutin';
								$smt = $pdo->prepare($sql_vibor);
								$smt->execute();
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
    </tr>

<?php
$stmt = $pdo->prepare($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_NUM)) 
{
//print_r($row);
	echo "<tr>";
	echo "<td>".$row[0]."</td>";
	echo "<td>".$row[1]."</td>";
	echo "</tr>";
	
}

?>




</body>
</html>



