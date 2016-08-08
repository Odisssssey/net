<?php
/**
 * Created by PhpStorm.
 * User: Dusty
 * Date: 29.07.2016
 * Time: 17:28
 */
require_once "feedable.interface.php";


class Note implements feedable
{
    protected $id;
    public $content;

    public static function storeFolder()
    {
        return 'note';
    }

    public static function contentIdPath($id)
    {
        return static::storeFolder().'/'.$id.'.txt';
    }

    protected static function getFreeId()
    {
        $id = 1;
        while(file_exists(static::contentIdPath($id)))
        {
            $id++;
        }

        return $id;
    }

    public function __construct($id = NULL)
    {
        if ($id !== NULL)
        {
            $this->id = (int) $id;
            $this->load();
        }
    }
	
	public function add_to_feed($type, $key)
	{
		$f = fopen("feed.csv", "a+");
		$str = "\n{$type};{$key}";
		fwrite($f, $str);
		fclose($f);		
	}
	
    protected function load()
    {
        $content = file_get_contents(static::contentIdPath($this->id));
        $this->content = $content;
    }

    public function save()
    {
        if ($this->id === NULL)
        {
            $id = static::getFreeId();
            $this->id = $id;
			$this->add_to_feed(static::storeFolder(), $this->id);

        }
		
        return file_put_contents(static::contentIdPath($this->id),$this->content);
    }

    public function feed_item()
    {
        return "<p>".$this->content."</p>";
    }
	
}