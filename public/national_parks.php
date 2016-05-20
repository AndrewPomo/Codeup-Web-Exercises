<?php 

require_once '../Input.php';
require_once '../park_credentials.php';
require_once '../db_connect.php';

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$target_dir = "./img/parkImg/";
	$target_file = $target_dir . basename($_FILES["parkImg"]["name"]);
	$uploadOk = 1;
	$filename = basename($_FILES["parkImg"]["name"]);
	$imageFileType = pathinfo($target_file);


	// Check if image file is an actual image or fake image
	$check = getimagesize($_FILES["parkImg"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
    // Check if file already exists
	if (file_exists($target_file)) {
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["parkImg"]["size"] > 500000) {
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType['extension'] != "jpg" && $imageFileType['extension'] != "png" && $imageFileType['extension'] != "jpeg"
	&& $imageFileType['extension'] != "gif" ) {
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo " Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["parkImg"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["parkImg"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}

	$stmt = $dbc->prepare('INSERT INTO national_parks (name, img, location, date_established, area_in_acres, description) VALUES (:name, :img, :location, :date_established, :area_in_acres, :description)');
	
	try {
    	$stmt->bindValue(':name', Input::getString('name'), PDO::PARAM_STR);
    	$stmt->bindValue(':location', Input::getString('location'), PDO::PARAM_STR);
    	$stmt->bindValue(':area_in_acres', Input::getNumber('area_in_acres'), PDO::PARAM_INT); 
    	$stmt->bindValue(':description', Input::getString('description'), PDO::PARAM_STR);
    	$stmt->bindValue(':date_established', Input::get('date_established'), PDO::PARAM_STR);
    	$stmt->bindValue(':img', $filename, PDO::PARAM_STR);
    	$stmt->execute();
	} catch (Exception $e) {
		$errors[] = $e->getMessage();
		echo 'An error occurred with your input: ' . $e->getMessage() . PHP_EOL;
	}
	// try {
 //    	$stmt->bindValue(':location', Input::getString('location'), PDO::PARAM_STR);
	// } catch (Exception $e) {
	// 	$errors[] = $e->getMessage();
	// 	echo 'An error occurred with your Location input: ' . $e->getMessage() . PHP_EOL;
	// }
	// try {
 //    	$stmt->bindValue(':area_in_acres', Input::getNumber('area_in_acres'), PDO::PARAM_INT); 
	// } catch (Exception $e) {
	// 	$errors[] = $e->getMessage();
	// 	echo 'An error occurred with your Park Area input: ' . $e->getMessage() . PHP_EOL;
	// }
	// try {
 //    	$stmt->bindValue(':description', Input::getString('description'), PDO::PARAM_STR);
	// } catch (Exception $e) {
	// 	$errors[] = $e->getMessage();
	// 	echo 'An error occurred with your Park Description input: ' . $e->getMessage() . PHP_EOL;
	// }

    
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
		        <input type="text" class="form-control" name="name" required>
	        </fieldset>
	        <fieldset class="form-group">
		        <label>Location</label>
		        <input type="text" class="form-control" name="location" required>
	        </fieldset>
	        <fieldset class="form-group">
		        <label>Date Established</label>
		        <input type="date" class="form-control" name="date_established" required>
	        </fieldset>
	        <fieldset class="form-group">
		        <label>Area In Acres</label>
		        <input type="number" class="form-control" name="area_in_acres" required>
	        </fieldset>
	        <fieldset class="form-group">
		        <label>Description</label>
		        <textarea type="text" class="form-control" name="description" required></textarea>
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