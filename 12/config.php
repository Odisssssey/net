        
<?php

$pdo = new PDO("mysql:host=localhost;dbname=global", "tarutin", "neto0402");
$pdo->exec("set names 'utf8'");
if ((!empty($_GET['author'])) || (!empty($_GET['name'])) || (!empty($_GET['isbn'])))
{
	
	$sql = 'SELECT * FROM books WHERE ';
	$i = 0;
	if (!empty($_GET['author'])){
		$sort = "'%".$_GET['author']."%'";
		$plase = "author";
		$sql .= $plase.' LIKE '.$sort;
		$i++;
	}
	if (!empty($_GET['name'])){
		$sort = "'%".$_GET['name']."%'";
		$plase = "name";
		if($i != 0){
			$sql .= " AND " .$plase.' LIKE '.$sort;
		}else{		
		$sql .= $plase.' LIKE '.$sort;
		}
		$i++;
	}
	if (!empty($_GET['isbn'])){
		if(is_numeric 
		$sort = "'%".$_GET['isbn']."%'";
		$plase = "isbn";
		if($i != 0){
			$sql .= " AND " .$plase.' LIKE '.$sort;
		}else{
		$sql .= $plase.' LIKE '.$sort;
		}
	}
	
/**	$sort = "'%".$_GET['author']."%'";
	$plase = "author";
	$sql .= 'SELECT * FROM books WHERE '.$plase.' LIKE '.$sort." AND isbn LIKE '%500%'" ;
	$i++;*/
	
	

}
else{
	$sql = 'SELECT * FROM books';
}




