<?php


 require_once "feedable.interface.php";
 require_once "note.class.php";
 
class  Image extends Note implements feedable
{
    public $img;	

	public static function storeFolder()
    {
        return 'image';
    }

    public static function imgIdPath($id)
    {
        return static::storeFolder().'/img'.$id.'.jpeg';
    }

    protected function load()
    {
        $img = file_get_contents(static::imgIdPath($this->id));
        $this->img = $img;
        parent::load();
    }

    public function save()
    {
        $result = parent::save();
        if ($result)
        {
            return file_put_contents(static::imgIdPath($this->id),$this->img);
        }
        else
        {
            return $result;
        }
    }

    public function feed_item()
    {
        return "<img src='{$this->img}' >".parent::feed_item().static::imgSize($this->img).static::format($this->img);
    }
	
	public static function imgSize($img)
	{
		$r = $img;
		$size = getimagesize ($r);
		$s = $size[3];
		$r = 'Размер файла: ' . "{$s}". '.<br/>';
		return $r;
	}
	
	public static function format($img)
	{
		$r = $img;
		$size = getimagesize ($r);
		$s = $size["mime"];
		$r = 'Формат файла: ' . "{$s}". '.<br/>';
		return $r;
	}
	
/**	public static function imgSize($img)
	{
		$file = static::imgIdPath($this->id);
		$stat = stat($file);
		$s = $stat['size'];
		$r = 'Размер файла: ' . "{$s}". ' байт.<br/>';
		return $r;
	}*/
	
	

}