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
  
    <p>

<?php 


require_once("config.php");

/*foreach ($pdo->query($sql) as $row)
{
	print_r($row);
}*/
?>

<hr/><br/>
<h1>Библиотека успешного человека</h1>
<br/>
<table>

<tr>
	<th>Название</th>
	<th>Автор</th>
	<th>Год выпуска</th>
	<th>Жанр</th>
	<th>ISBN</th>
</tr>
<?php 
foreach ($pdo->query($sql) as $row)
{
	echo "<tr>";
	$i = 1;
	while(isset($row[$i]))
	{
		if($i == 4)
		{
			echo "<td>".$row[5]."</td>";
			echo "<td>".$row[4]."</td><br/>";
			break;
		}
		echo "<td>".$row[$i]."</td>";
		
		$i++;
	}
	echo "</tr>";
}
?>
</table>





	</p>
</body>
</html>













