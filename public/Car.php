<?php 

class Car
{
	private $carData = [];

	public function __construct($make, $model)
	{
 		$this->make = $make;
		$this->model = $model;
	}

	public function __get($name)
	{
		echo "magic getter called!" . PHP_EOL;
		echo "\$name: $name" . PHP_EOL;
		return isset($this->carData[$name]) ? $this->carData[$name] : null;
	}

	public function __set($name, $value)
	{
		echo "magic setter called!" . PHP_EOL;
		echo "\$name: $name" . PHP_EOL;
		echo "\$value: $value" . PHP_EOL;
		$this->carData[$name] = $value;
	}

	public function dumpData()
	{
		var_dump($this->carData);
	}
}

 ?>