<?php 
require_once 'Log.php';
require_once 'Input.php';

class Auth
{
	public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

	public static function attempt($username, $password)
	{	
		$Log = new Log;

		if ($username === 'guest' && password_verify($password, self::$password)) {
			$_SESSION['logged_in_user'] = $username;
			$Log->info("User $username logged in.");
			header ('Location: authorized.php');
		} else {
			$Log->error("User $username failed to log in!");
		}
	}

	public static function check()
	{
		return Input::has('logged_in_user');
	}

	public static function user()
	{
		return $_SESSION['logged_in_user'];
	}

	public static function logout()
	{
   		session_unset();
	    session_regenerate_id(true);
	    header ('Location: login.php');
	}

}
 ?>