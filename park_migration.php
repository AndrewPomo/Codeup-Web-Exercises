<?php 

require_once 'park_credentials.php';
require_once 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$dbc->exec('DROP TABLE IF EXISTS national_parks;');

$query = 'CREATE TABLE national_parks (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    img VARCHAR(50) NOT NULL,
    location VARCHAR(50) NOT NULL,
    date_established DATE,
    area_in_acres DOUBLE,
    description TEXT,
    PRIMARY KEY (id)
)';
 
$dbc->exec($query);

 ?>