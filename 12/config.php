        
<?php

$pdo = new PDO("mysql:host=localhost;dbname=global", "tarutin", "neto0402");
$pdo->exec("set names 'utf8'");
if ((!empty($_GET['author'])) || (!empty($_GET['name'])) || (!empty($_GET['isbn'])))
{
	
	$sql = "";
	$i = 0;
	if (!empty($_GET['author'])){
		$sort = "'%".$_GET['author']."%'";
		$plase = "author";
		$sql .= 'SELECT * FROM books WHERE '.$plase.' LIKE '.$sort;
		$i++;
	}
	if (!empty($_GET['name'])){
		if($i != 0){
			$sql .= "UNION"."\n";
		}
		$sort = "'%".$_GET['name']."%'";
		$plase = "name";
		$sql .= 'SELECT * FROM books WHERE '.$plase.' LIKE '.$sort;
		$i++;
	}
	if (!empty($_GET['isbn'])){
		if($i != 0){
			$sql .= "UNION"."\n";
		}
		$sort = "'%".$_GET['isbn']."%'";
		$plase = "isbn";
		$sql .= 'SELECT * FROM books WHERE '.$plase.' LIKE '.$sort;
	}

}
else{
	$sql = 'SELECT * FROM books';
}




