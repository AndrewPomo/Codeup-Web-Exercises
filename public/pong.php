<?php

function pageController()
{	
	$scoreArray = [];
	!isset($_GET['pongScore']) ? $pongScore = 0 : $pongScore = $_GET['pongScore'];
	!isset($_GET['pingScore']) ? $pingScore = 0 : $pingScore = $_GET['pingScore'];		
	return ['pongScore' => $pongScore, 'pingScore' => $pingScore];
}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Take a Swing, Pong!</h1>
	<h1>Ping Score: <?=$pingScore?></h1>
	<h1>Pong Score: <?=$pongScore?></h1>
	<a href="ping.php?pingScore=<?=$pingScore?>&pongScore=<?=$pongScore+1?>">HIT</a>
	<a href="ping.php?pingScore=<?=$pingScore+1?>&pongScore=<?=$pongScore?>">MISS</a>
</body>
</html>