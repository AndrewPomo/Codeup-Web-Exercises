<?php

function pageController()
{	
	!isset($_GET['count']) ? $count = 0 : $count = $_GET['count'];	
	return ['count' => $count];
}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1><?=$count?></h1>
<a href="?count=<?=$count+1?>">UP</a>
<a href="?count=<?=$count-1?>">DOWN</a>

</body>
</html>