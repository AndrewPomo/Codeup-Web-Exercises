<?php 

require '../Model.php';

$myCar = new Model();

$myCar->make = 'Ford';
$myCar->model = 'Focus';

$yourCar = new Model();

$yourCar->make = 'Honda';
$yourCar->model = 'Civic';

$myCar->numberOfScratches = '1,000,000';
$myCar->dumpData();

$yourCar->numberOfScratches = '1';
$yourCar->dumpData();

 ?>