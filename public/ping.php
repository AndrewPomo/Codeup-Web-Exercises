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
	<h1>Take a Swing, Ping!</h1>
	<h1>Ping Score: <?=$pingScore?></h1>
	<h1>PongScore: <?=$pongScore?></h1>
	<a href="pong.php?swing=hit&pingScore=<?=$pingScore+1?>&pongScore=<?=$pongScore?>">HIT</a>
	<a href="pong.php?swing=miss&pingScore=<?=$pingScore?>&pongScore=<?=$pongScore+1?>">MISS</a>
</body>
</html>