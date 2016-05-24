<?php 

require_once '../User.php';

// $firstUser = new User();

// $firstUser->name = 'Andrew Pomo';
// $firstUser->email = 'andrewpomo815@gmail.com';
// $firstUser->password = 'badpass';
// $firstUser->save();

// $secondUser = new User();

// $secondUser->name = 'Tim Duncan';
// $secondUser->email = 'timduncan@gmail.com';
// $secondUser->password = 'goodpass';
// $secondUser->save();

// echo "The id of the last inserted row in the db is " . $secondUser->id . PHP_EOL;

echo "All users below " . PHP_EOL;
$allUsers = User::all();
var_dump($allUsers);

// Echo "First user below " . PHP_EOL;
// $firstUser = User::find(25);
// var_dump($firstUser);
// $firstUser->email = 'bleh@gmail.com';
// $firstUser->save();
// User::delete(49);
// // Model::destroy();
// var_dump($allUsers);

 ?>