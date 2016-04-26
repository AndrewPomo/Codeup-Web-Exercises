<?php

function pageController()
{
    // Initialize an empty data array.
    $serverName = array();

    // Data to be used in the html view.
    $adjectives = ['spherical', 'malevolant', 'perpetual', 'swanky', 'boisterous', 'nonchalant', 'volatile', 'ambiguous', 'nimble', 'sophisticated'];

	$nouns = ['flamingo', 'macaroni', 'banjo', 'underclothes', 'ashtray', 'rhinoceros', 'molcajete', 'pagoda', 'pinecone', 'albatross'];

    shuffle($adjectives);
    shuffle($nouns);
    $serverWords = $adjectives[0]."-".$nouns[0];
	$serverName['serverName'] = $serverWords;

    // Return the completed data array.
	return $serverName;
}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
	<title>Server Name Generator</title>
</head>
<body>
	<h1>Welcome to server name generator!</h1>
	<p>Your server name is: <?= $serverName;?></p>

</body>
</html>