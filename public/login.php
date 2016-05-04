<?php
require_once '../Auth.php';
require_once '../Input.php';
session_start();

$logged_in_user = Input::get('logged_in_user');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(Auth::attempt($username, $password)) {
		header ('Location: authorized.php');
		exit();
	}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>POST</title>
</head>
<body>
    <form method="POST">
        <label>Username</label>
        <input type="text" name="username"><br>
        <label>Password</label>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>
</body>
</html>