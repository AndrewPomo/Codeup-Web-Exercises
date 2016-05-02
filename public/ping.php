<?php

require 'functions.php';

function zeroSensor($score) 
{
	$score = !inputHas($score) ? 0 : inputGet($score);
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
	$pingScore = winSensor($pingScore, $pongScore);
	if ($pingScore === 'WINNER') {
		$pongScore = 'LOSER';
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
	<meta http-equiv="refresh" content="3;url=pong.php?swing=miss&pingScore=<?=$pingScore?>&pongScore=<?=$pongScore+1?>" />
</head>
<body>
	<h1>Take a Swing, Ping!</h1>
	<h1>Ping Score: <?=escape($pingScore)?></h1>
	<h1>Pong Score: <?=escape($pongScore)?></h1>
	<a class="swing" id='swing1' href="pong.php?swing=hit&pingScore=<?=escape($pingScore)?>&pongScore=<?=escape($pongScore)?>">HIT</a>
	<a class="swing" id='swing2' href="pong.php?swing=miss&pingScore=<?=escape($pingScore)?>&pongScore=<?=escape($pongScore)+1?>">MISS</a>
	<a class="swing" id='swing3' href="pong.php?swing=miss&pingScore=<?=escape($pingScore)?>&pongScore=<?=escape($pongScore)+1?>">MISS</a>
	<a class="swing" id='swing4' href="pong.php?swing=miss&pingScore=<?=escape($pingScore)?>&pongScore=<?=escape($pongScore)+1?>">MISS</a>
	<a class="swing" id='swing5' href="pong.php?swing=miss&pingScore=<?=escape($pingScore)?>&pongScore=<?=escape($pongScore)+1?>">MISS</a>
	<a class="swing" id='swing6' href="pong.php?swing=miss&pingScore=<?=escape($pingScore)?>&pongScore=<?=escape($pongScore)+1?>">MISS</a>
	<a class="swing" id='swing7' href="pong.php?swing=miss&pingScore=<?=escape($pingScore)?>&pongScore=<?=escape($pongScore)+1?>">MISS</a>
	<a class="swing" id='swing8' href="pong.php?swing=miss&pingScore=<?=escape($pingScore)?>&pongScore=<?=escape($pongScore)+1?>">MISS</a>
	<a class="swing" id='swing9' href="pong.php?swing=miss&pingScore=<?=escape($pingScore)?>&pongScore=<?=escape($pongScore)+1?>">MISS</a>
	<a class="swing" id='swing10' href="pong.php?swing=miss&pingScore=<?=escape($pingScore)?>&pongScore=<?=escape($pongScore)+1?>">MISS</a>
	<a class="swing" id='swing11' href="pong.php?swing=miss&pingScore=<?=escape($pingScore)?>&pongScore=<?=escape($pongScore)+1?>">MISS</a>
	<a class="swing" id='swing12' href="pong.php?swing=miss&pingScore=<?=escape($pingScore)?>&pongScore=<?=escape($pongScore)+1?>">MISS</a>
	<a class="swing" id='swing13' href="pong.php?swing=miss&pingScore=<?=escape($pingScore)?>&pongScore=<?=escape($pongScore)+1?>">MISS</a>
	<a class="swing" id='swing14' href="pong.php?swing=miss&pingScore=<?=escape($pingScore)?>&pongScore=<?=escape($pongScore)+1?>">MISS</a>
	<a class="swing" id='swing15' href="pong.php?swing=miss&pingScore=<?=escape($pingScore)?>&pongScore=<?=escape($pongScore)+1?>">MISS</a>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="js/pingpong.js"></script>
</body>
</html>