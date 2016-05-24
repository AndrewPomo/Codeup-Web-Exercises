<?php 

require_once 'adlister_credentials.php';
require_once 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$dbc->exec('DROP TABLE IF EXISTS users;');

$query = 'CREATE TABLE users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
)';
 
$dbc->exec($query);

 ?>