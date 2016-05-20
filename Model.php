<?php 

class Model
{
	private $attributes = [];
	protected static $table = 'bleh';

	// public function __construct($make, $model)
	// {
	// 	$this->make = $make;
	// 	$this->model = $model;
	// }

	public static function getTableName()
	{
		return static::$table;
	}
	
	public function __get($name)
	{
		return isset($this->attributes[$name]) ? $this->attributes[$name] : null;
	}

	public function __set($name, $value)
	{
		$this->attributes[$name] = $value;
	}

	public function dumpData()
	{
		print_r($this->attributes);
	}
}

 ?>