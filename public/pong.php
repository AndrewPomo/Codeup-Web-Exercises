<?php

require_once '../Input.php';

function zeroSensor($score) 
{
	$score = !Input::has($score) ? 0 : Input::get($score);
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
	<?php if ($pingScore === "WINNER" || $pongScore ==="WINNER"){
		?><meta /><?php 
	} else {
		?><meta http-equiv="refresh" content="3;url=ping.php?swing=miss&pongScore=<?=$pongScore?>&pingScore=<?=$pingScore+1?>" />
	<?php } ?>
</head>
<body>
	<h1>Take a Swing, Pong!</h1>
	<h1>Ping Score: <?=Input::escape($pingScore)?></h1>
	<h1>Pong Score: <?=Input::escape($pongScore)?></h1>
	<a class="swing" id='swing1' href="ping.php?swing=hit&pingScore=<?=Input::escape($pingScore)?>&pongScore=<?=Input::escape($pongScore)?>">HIT</a>
	<a class="swing" id='swing2' href="ping.php?swing=miss&pingScore=<?=Input::escape($pingScore)+1?>&pongScore=<?=Input::escape($pongScore)?>">MISS</a>
	<a class="swing" id='swing3' href="ping.php?swing=miss&pingScore=<?=Input::escape($pingScore)+1?>&pongScore=<?=Input::escape($pongScore)?>">MISS</a>
	<a class="swing" id='swing4' href="ping.php?swing=miss&pingScore=<?=Input::escape($pingScore)+1?>&pongScore=<?=Input::escape($pongScore)?>">MISS</a>
	<a class="swing" id='swing5' href="ping.php?swing=miss&pingScore=<?=Input::escape($pingScore)+1?>&pongScore=<?=Input::escape($pongScore)?>">MISS</a>
	<a class="swing" id='swing6' href="ping.php?swing=miss&pingScore=<?=Input::escape($pingScore)+1?>&pongScore=<?=Input::escape($pongScore)?>">MISS</a>
	<a class="swing" id='swing7' href="ping.php?swing=miss&pingScore=<?=Input::escape($pingScore)+1?>&pongScore=<?=Input::escape($pongScore)?>">MISS</a>
	<a class="swing" id='swing8' href="ping.php?swing=miss&pingScore=<?=Input::escape($pingScore)+1?>&pongScore=<?=Input::escape($pongScore)?>">MISS</a>
	<a class="swing" id='swing9' href="ping.php?swing=miss&pingScore=<?=Input::escape($pingScore)+1?>&pongScore=<?=Input::escape($pongScore)?>">MISS</a>
	<a class="swing" id='swing10' href="ping.php?swing=miss&pingScore=<?=Input::escape($pingScore)+1?>&pongScore=<?=Input::escape($pongScore)?>">MISS</a>
	<a class="swing" id='swing11' href="ping.php?swing=miss&pingScore=<?=Input::escape($pingScore)+1?>&pongScore=<?=Input::escape($pongScore)?>">MISS</a>
	<a class="swing" id='swing12' href="ping.php?swing=miss&pingScore=<?=Input::escape($pingScore)+1?>&pongScore=<?=Input::escape($pongScore)?>">MISS</a>
	<a class="swing" id='swing13' href="ping.php?swing=miss&pingScore=<?=Input::escape($pingScore)+1?>&pongScore=<?=Input::escape($pongScore)?>">MISS</a>
	<a class="swing" id='swing14' href="ping.php?swing=miss&pingScore=<?=Input::escape($pingScore)+1?>&pongScore=<?=Input::escape($pongScore)?>">MISS</a>
	<a class="swing" id='swing15' href="ping.php?swing=miss&pingScore=<?=Input::escape($pingScore)+1?>&pongScore=<?=Input::escape($pongScore)?>">MISS</a>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="js/pingpong.js"></script>
</body>
</html>