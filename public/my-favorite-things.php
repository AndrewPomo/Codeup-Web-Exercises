<?php 

$favesArray = ['Filipa', 'Jack', 'Sadie', 'Spurs', 'Fun', 'Sleep', 'Steak', 'Coffee', 'Bacon'];

$thingNum = 1;
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
 	<?php foreach ($favesArray as $faveThing) { 
		if ($thingNum % 2 == 0) {?>
			<tr class="greyRow">
				<td> <?php echo "$faveThing"; $thingNum++; ?> </td>
			</tr>
		<?php } else {?>
			<tr>
				<td> <?php echo "$faveThing"; $thingNum++; ?> </td>
			</tr>
		<?php } 
	} ?>

 	</table>
 
 </body>
 </html>