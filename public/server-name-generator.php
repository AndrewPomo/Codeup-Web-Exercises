<?php
require_once '../ServerGen.php';

function pageController()
{
    // Initialize an empty data array.
    $serverName = ServerGen::nameAssembler();
	return $serverName;
}

extract(pageController());

echo "Welcome to server name generator!". PHP_EOL;
echo "Your server name is: $serverName";

?>

