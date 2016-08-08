<?php

class News_Core
{
	public function news_list()
	{
		
		require_once "feedable.interface.php";

		mb_internal_encoding("utf-8");

		$f = fopen("feed.csv", "r");
		$data = [];
		$j=0;
		while($str = fgetcsv($f))
		{	
			
			foreach($str as $v)
			{
				$vak = ";";
				$pat = explode($vak, $v);
				for($i=0; $i<count($pat); $i++)
				{
					$data[$j][$i] = $pat[$i];
					if ($data[$j][0] != "News")
						{
							unset($data[$j]);
							break;
						}
				}
				
				
			}
			$j++;
		}


		foreach($data as $row)
		{
			$class_name = $row[0];

			$feed_object = new $class_name($row[1]);

			/* @var $feed_object feedable */

			echo $feed_object->feed_item();
		}
	}
	
	
	public function news_one($id)
	{
		$news = new News($id);
		echo "<h2>".$news->title."</h2>";
		echo $news->content;
	}
	
	public function __call($func, $args)
	{
		echo "Искомые новости отсутствуют.";
	}
}