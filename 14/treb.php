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

<h3>Требования других пользователей к вам</h3>

<table>
    <tr>
        <th>Описание задачи</th>
        <th>Дата добавления</th>
        <th>Статус</th>
        <th></th>
        <th>Автор</th>
    </tr>

<?php

require_once("model.php");

if (!empty($_POST['sort_by'])){
		$sqlTreb = sqlTrebSort($_POST['sort_by']);
	}else{
		$sqlTreb = sqlTrebBase();
	}
	
while ($rot = $sqlTreb->fetch(PDO::FETCH_NUM)) 
{
//print_r($rot);
	echo "<tr>";
	echo "<td>".$rot[3]."</td>";
	echo "<td>".$rot[5]."</td>";
	if($rot[4] == 1)
		{
		echo "<td><span style='color: green;'>Выполнено</span></td>";
		}else{
		echo "<td><span style='color: orange;'>В процессе</span></td>";
		}?>
	<td><a href="action.php?perform=1&id=<?= $rot[0] ?>">Выполнить</a></td>
	<?php
	if(!empty($rot[2])){
		echo "<td>";
		
		$sql = sqlLogs();
		while ($rom = $sql->fetch(PDO::FETCH_NUM)) 
		{ 
		if($rom[0] == $rot[1]) echo $rom[1];
		}
		echo "</td>";
	}
	?>
		
	</tr>
<?php
}

?>	
	
	
	
</table>

</body>
</html>