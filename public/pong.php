<?php

function zeroSensor($score) 
{
	$score = !isset($_GET[$score]) ? 0 : $_GET[$score];
	return $score;
}

function winSensor($score1, $score2) 
{
	if (($score1 >= 11 && ($score1-$score2) >= 2) || ($score1 == 7 && $score2 == 0)) {

		return 'WINNER';
	} else {
		return $score1;
	}
}

function pageController()
{	
	

	$pingScore = zeroSensor("pingScore");
	$pongScore = zeroSensor("pongScore");
	$pongScore = winSensor($pongScore, $pingScore);

	if ($pongScore === 'WINNER') {
		$pingScore = 'LOSER';
	}
	
	return ['pongScore' => $pongScore, 'pingScore' => $pingScore];
}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="/css/pingpong.css">
</head>
<body>
	<h1>Take a Swing, Pong!</h1>
	<h1>Ping Score: <?=$pingScore?></h1>
	<h1>Pong Score: <?=$pongScore?></h1>
	<a class="swing" id='swing1' href="ping.php?swing=hit&pingScore=<?=$pingScore?>&pongScore=<?=$pongScore?>">HIT</a>
	<a class="swing" id='swing2' href="ping.php?swing=miss&pingScore=<?=$pingScore+1?>&pongScore=<?=$pongScore?>">MISS</a>
	<a class="swing" id='swing3' href="ping.php?swing=miss&pingScore=<?=$pingScore+1?>&pongScore=<?=$pongScore?>">MISS</a>
	<a class="swing" id='swing4' href="ping.php?swing=miss&pingScore=<?=$pingScore+1?>&pongScore=<?=$pongScore?>">MISS</a>
	<a class="swing" id='swing5' href="ping.php?swing=miss&pingScore=<?=$pingScore+1?>&pongScore=<?=$pongScore?>">MISS</a>
	<a class="swing" id='swing6' href="ping.php?swing=miss&pingScore=<?=$pingScore+1?>&pongScore=<?=$pongScore?>">MISS</a>
	<a class="swing" id='swing7' href="ping.php?swing=miss&pingScore=<?=$pingScore+1?>&pongScore=<?=$pongScore?>">MISS</a>
	<a class="swing" id='swing8' href="ping.php?swing=miss&pingScore=<?=$pingScore+1?>&pongScore=<?=$pongScore?>">MISS</a>
	<a class="swing" id='swing9' href="ping.php?swing=miss&pingScore=<?=$pingScore+1?>&pongScore=<?=$pongScore?>">MISS</a>
	<a class="swing" id='swing10' href="ping.php?swing=miss&pingScore=<?=$pingScore+1?>&pongScore=<?=$pongScore?>">MISS</a>
	<a class="swing" id='swing11' href="ping.php?swing=miss&pingScore=<?=$pingScore+1?>&pongScore=<?=$pongScore?>">MISS</a>
	<a class="swing" id='swing12' href="ping.php?swing=miss&pingScore=<?=$pingScore+1?>&pongScore=<?=$pongScore?>">MISS</a>
	<a class="swing" id='swing13' href="ping.php?swing=miss&pingScore=<?=$pingScore+1?>&pongScore=<?=$pongScore?>">MISS</a>
	<a class="swing" id='swing14' href="ping.php?swing=miss&pingScore=<?=$pingScore+1?>&pongScore=<?=$pongScore?>">MISS</a>
	<a class="swing" id='swing15' href="ping.php?swing=miss&pingScore=<?=$pingScore+1?>&pongScore=<?=$pongScore?>">MISS</a>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="js/pingpong.js"></script>
</body>
</html>