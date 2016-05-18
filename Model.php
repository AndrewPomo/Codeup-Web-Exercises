<?php 

class Model
{
	private $attributes = [];

	// public function __construct($make, $model)
	// {
	// 	$this->make = $make;
	// 	$this->model = $model;
	// }
	
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