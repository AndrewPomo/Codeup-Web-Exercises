<?php 

require_once '../Input.php';
require_once '../park_credentials.php';
require_once '../db_connect.php';

$errors = [];
$success = false;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$target_dir = "./img/parkImg/";
	$fileToUpload = "parkImg";
	$target_file = $target_dir . basename($_FILES["parkImg"]["name"]);
	$filename = basename($_FILES["parkImg"]["name"]);
	

	

	$stmt = $dbc->prepare('INSERT INTO national_parks (name, img, location, date_established, area_in_acres, description) VALUES (:name, :img, :location, :date_established, :area_in_acres, :description)');
	
	try {
    	$stmt->bindValue(':name', Input::getString('name', 0, 50), PDO::PARAM_STR);
    	$stmt->bindValue(':location', Input::getString('location', 0, 50), PDO::PARAM_STR);
    	$stmt->bindValue(':area_in_acres', Input::getNumber('area_in_acres', 0, 15), PDO::PARAM_INT); 
    	$stmt->bindValue(':description', Input::getString('description', 0, 500), PDO::PARAM_STR);
    	$stmt->bindValue(':date_established', Input::getDate('date_established'), PDO::PARAM_INT);
    	$stmt->bindValue(':img', Input::getImg($fileToUpload, $target_file, $filename), PDO::PARAM_STR);
    	$stmt->execute();
    	$success = true;
	} catch (Exception $e) {
		$errors[] = $e->getMessage();
	}
    
}

function pageDetect($page) 
{
	$page = !Input::has($page) ? 1 : Input::get($page);
	return $page;
}

function makeQuery($pageNum, $limit, $dbc)
{
	$offset = ($pageNum*$limit)-$limit;
	$stmt = $dbc->prepare("SELECT * FROM national_parks LIMIT :limit OFFSET :offset");
	$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
	$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
	$query = "SELECT * FROM national_parks LIMIT $limit OFFSET $offset";
	return($query);
}

function pageController($dbc)
{
	$data = [];
	$limit = 4;
	$pageNum = pageDetect("page");
	$query = makeQuery($pageNum, $limit, $dbc);
	$parkTotal = $dbc->query("SELECT count(*) FROM national_parks")->fetchColumn();
	$lastPage = ($parkTotal/$limit);
	$stmt = $dbc->query($query);
	$data['parks'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$data['pageNum'] = $pageNum;
	$data['parkTotal'] = $parkTotal;
	$data['lastPage'] = $lastPage;
	return $data;
}

extract(pageController($dbc));
?>

<!DOCTYPE html>
<html>
<head>
	<title>First Full Stack</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	<p><?php if (!empty($errors)){
			foreach ($errors as $error) ?>
			<p><?= $error ?></p>
		<?php } ?>
		<h1>National Parks in the United States!</h1>
		<?php 
		foreach ($parks as $park) { 
			$estab = strtotime($park['date_established']);
			$newEstab = date("m/d/Y", $estab);
		?>
			<h2> <?= "{$park['name']} - {$park['location']}"; ?> </h2>
			<img src="img/parkImg/<?="{$park['img']}";?>">
			<h3>Date Established: <?= "$newEstab"; ?> </h3>
			<h3>Area (In Acres): <?= "{$park['area_in_acres']}"; ?> </h3>
			<p> <?= "{$park['description']}"; ?> </p>
		<?php } ?>
		<?php
		if ($pageNum < $lastPage) { ?>
			<a class="btn btn-primary" href="national_parks.php?page=<?=Input::escape($pageNum)+1?>">Next Page</a>
		<?php } ?>
		
		<?php 
		if ($pageNum > 1) { ?>
			<a class="btn btn-primary pull-right" href="national_parks.php?page=<?=Input::escape($pageNum)-1?>">Previous Page</a>
		<?php } ?>
		<h2>Submit a Park!</h2>
		<p>All fields required.</p>
		<form method="POST" action="national_parks.php" enctype="multipart/form-data">
			<fieldset class="form-group">
		        <label>Name</label>
		        <input type="text" class="form-control" name="name" maxlength="50" value="<?php if (Input::has('name')) echo $_POST['name']; ?>" required>
	        </fieldset>
	        <fieldset class="form-group">
		        <label>Location</label>
		        <input type="text" class="form-control" name="location" maxlength="50" value="<?php if (Input::has('location')) echo $_POST['location']; ?>" required>
	        </fieldset>
	        <fieldset class="form-group">
		        <label>Date Established</label>
		        <input type="date" class="form-control" name="date_established" value="<?php if (Input::has('date_established')) echo $_POST['date_established']; ?>" required>
	        </fieldset>
	        <fieldset class="form-group">
		        <label>Area In Acres</label>
		        <input type="number" class="form-control" name="area_in_acres" value="<?php if (Input::has('area_in_acres')) echo $_POST['area_in_acres']; ?>" required>
	        </fieldset>
	        <fieldset class="form-group">
		        <label>Description</label>
		        <textarea type="text" class="form-control" maxlength="500" name="description" required><?php if (Input::has('description')) echo $_POST['description']; ?></textarea>
	        </fieldset>
	        <fieldset class="form-group">
			    <label>Select an image to upload</label>
			    <input type="file" class="form-control" name="parkImg" id="parkImg" required>
		    </fieldset>
		    <button type="submit" class="btn btn-primary">Submit</button>
	    </form>
	</div>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>