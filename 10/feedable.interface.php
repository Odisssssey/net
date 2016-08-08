<?php
interface feedable{
     
	
	public function feed_item();
	public function add_to_feed($type, $key);
	
}
/**class Add implements feedable{
	
	public function add_to_feed($type, $key)
	{
		$f = fopen("feed.csv", "a+");
		$str = "\n{$type};{$key}";
		fwrite($f, $str);
		fclose($f);
		return true;
		
	}
	public function feed_item(){
	
	}

}*/
