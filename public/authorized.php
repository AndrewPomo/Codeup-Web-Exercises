<?php 
require_once '../Auth.php';
require_once '../Input.php';
session_start();
$logged_in_user = Input::get('logged_in_user', 0);
if (!isset($_SESSION['logged_in_user'])) {
	header ('Location: login.php');
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	if (isset($_SESSION['logged_in_user'])) {
	header ('Location: logout.php');
	}
}


 ?>
<!DOCTYPE html>
<html>
<head>
    <title>POST</title>
</head>
<body>
    <p>Authorized User: <?=Auth::user($logged_in_user)?></p>
    <form method="POST">
        <input type="submit" value="Logout" name="Logout">
    </form>
</body>
</html>