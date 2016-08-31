<?php


class Guestbook
{
	public function __construct()
	{
		require_once("config.php");
	}
	
	public function last()
    {
        require_once("config.php");
		$pdo = connect();
		$sql=$pdo->prepare('SELECT * FROM guestbook ORDER BY crdate DESC LIMIT 20');
		$sql->execute();

		while ($row = $sql->fetch(PDO::FETCH_NUM)) 
		{		
			$var[] = $row;
		}
		return $var;
    }
	
	public function create($text)
    {
        $name = htmlspecialchars($text['name']);
		$mesage = htmlspecialchars($text['mesage']);
		$pdo = connect();
		$sth=$pdo->prepare("INSERT INTO guestbook (crdate, name, message) VALUES(CURRENT_TIMESTAMP, :name, :message)");
		$sth->bindParam(":name",$text['name']);
		$sth->bindParam(":message",$text['mesage']);
		$sth->execute();
    }


}