<?php 

// function getMinMax()
// {
// 	$minMax = [];
// 	$min = $_POST['min'];
// 	$max = $_POST['max'];
// 	$minMax = [$min, $max];
// 	var_dump ($minMax);
// 	return $minMax;
// 	$message = "Guess a number between {$min} and {$max}";
// }
$min = 0;
$max = 0;
$guess = 0;


function message($min, $max, $guess, $number)
{
	$rangeMessage = "";
	$adviceMessage = "";
	if($min != null && $max != null){
		$rangeMessage = "Guess a number between $min and $max";
	}

	if (evaluateGuess($guess, $number) === "Higher"){
		$adviceMessage = "Guess Higher.";
	} elseif (evaluateGuess($guess, $number) === "Lower"){
		$adviceMessage = "Guess Lower.";
	}

	return "$adviceMessage $rangeMessage";
}

function getSolution($min, $max)
{
	$number = mt_rand($min, $max);
	return $number;
}

function evaluateGuess($guess, $number)
{
	if ($guess < $number){
		return "Higher";
	} elseif ($guess > $number){
		return "Lower";
	} else {
		return "Winner";
	} 
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && $number === 0){
	$min = $_POST['min'];
	$max = $_POST['max'];
	$guess = $_POST['guess'];
	var_dump($max);
	var_dump($min);

	$number = getSolution($min, $max);
	var_dump($number);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>High Low</title>
</head>
<body>
	<form method="POST">
		<p>Please enter a minimum number<input name="min" value=<?=$min?>></input></p>
		<p>Please enter a maximum number<input name="max" value=<?=$max?>></input></p>
		<button type='submit'>Submit</button>
		<p>Guess<input name="guess"></input></p>
		<button type='submit'>Submit</button>
	</form>

	<p><?= message($min, $max, $guess, $number) ?>


</body>
</html>