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
require_once("./model/modelForHtml.php");
?>

<h1>Вопросник</h1>

<?php
$viborKategorii = sqldistinct();
while ($vibor = $viborKategorii->fetch(PDO::FETCH_NUM)) 
{
	echo "<h3>".$vibor[0]."</h3>";
?>
	<table>
		<tr>
			<th>вопрос</th>
			<th>ответ</th>
			<th>имя</th>
		</tr>
	<?php
	$sqlSort = sqlSort($vibor[0]);
	while ($row = $sqlSort->fetch(PDO::FETCH_NUM)) 
	{
		echo "<tr>";
		echo "<td>".$row[2]."</td>";
		echo "<td>".$row[3]."</td>";
		echo "<td>".$row[4]."</td>";
		echo "<tr>";
	}
	?>
	</table>
<?php }	?>

<?php
require_once("footer.php"); 
?>

</body>
</html>