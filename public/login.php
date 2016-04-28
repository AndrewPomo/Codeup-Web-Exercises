<?php
session_start();



$logged_in_user = isset($_SESSION['logged_in_user']) ? $_SESSION['logged_in_user'] : 0;

$message = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$username = $_POST['username'];
	$password = $_POST['password'];
	if ($username == "guest" && $password == "password"){
		$logged_in_user = $username;
		$_SESSION['logged_in_user'] = $logged_in_user;
		header ('Location: authorized.php');
		die;
	} else {
		$message = 'Login Failed';
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
	<p><?=$message?></p>
</body>
</html>