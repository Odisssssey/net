<?php
mb_internal_encoding("utf-8");
$f = fopen("srh (1).csv", "r");
echo '<h1>Жесткое сравнение с помощью === </h1> <br/>';
echo "<table>";
while($str = fgetcsv($f))
{
	echo "<tr>";
	foreach($str as $v)
	{
		$vak = ";";
		$pat = explode($vak, $v);
			for($i=0; $i<count($pat); $i++)
			{
				echo "<td style= 'border: 1px solid #000'>$pat[$i]</td>";
			}
		
	}
echo "</tr>";


}
echo "</table>";



