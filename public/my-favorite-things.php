<?php 

function pageController()
{

	$data = [];

	$favesArray = ['Filipa', 'Jack', 'Sadie', 'Spurs', 'Fun', 'Sleep', 'Steak', 'Coffee', 'Bacon'];

	$data = ['faves' => $favesArray, 'thingNum' => 1];

	return $data;

}

	extract(pageController());
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>My Favorite Things</title>

 	<style type="text/css">

 	.greyRow {
 		background-color: grey;
 	}

 	</style>
 </head>
 <body>
 	<h1>A few of my favorite things.</h1>
 	<table>
 	<?php foreach ($faves as $faveThing) { 
		if ($thingNum % 2 == 0) {?>
			<tr class="greyRow">
				<td> <?= "$faveThing"; $thingNum++; ?> </td>
			</tr>
		<?php } else {?>
			<tr>
				<td> <?= "$faveThing"; $thingNum++; ?> </td>
			</tr>
		<?php } 
	} ?>

 	</table>
 
 </body>
 </html>