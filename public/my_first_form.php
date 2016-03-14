<h1>Get</h1>
<?php var_dump($_GET);?>
<h1>Post</h1>
<?php var_dump($_POST);?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>My First HTML Form</title>
</head>
<body>
    <hr>
	<h2>User Login</h2>
	<form method="POST" action="/my_first_form.php">
		<p>
			<label for="username">Username</label>
			<input id="username" name="username" type="text" placeholder="Enter Your Username">
		</p>
		<p>
			<label for="password">Password</label>
			<input id="password" name="password" type="password" placeholder="Enter Your Password">
		</p>
		<p>
			<button type="submit">Login</button>
		</p>
	</form>
	
	<hr>

	<h2>Compose an Email</h2>
	<form method="POST" action="/my_first_form.php">
		<p>
			<label for="to_address">Send To:</label>
			<input id="to_address" name="to_address" type="email" placeholder="Enter Recipient's Email">
		</p>
		<p>
			<label for="from_address">Your Email:</label>
			<input id="from_address" name="from_address" type="email" placeholder="Enter Your Email">
		</p>
		<p>
			<label for="subject">Subject:</label>
			<input id="subject" name="subject" type="text" placeholder="Enter Message Subject">
		</p>
		<p>
			<label for="message_body">Your Message:</label>
		</p>
        <p>
			<textarea id="message_body" name="message_body" cols="40" rows="10" placeholder="Enter your message here..."></textarea>
		</p>
		<p>
			<input type="checkbox" id="copy" name="copy" value="y" checked>
			<label for="copy">Save a copy to my 'sent' folder.</label>
		</p>
		<button type="submit">Click Here To Send!</button>
	</form>
	
	<hr>

	<h2>Multiple Choice Test</h2>
	<form method="POST" action="/my_first_form.php">
		<h3>Which team is better?</h3>
		<p>
			<label for="spurs">Spurs</label>
			<input id="spurs" name="best_team" type="radio" value="1">
		</p>
		<p>
			<label for="warriors">Warriors</label>
			<input id="warriors" name="best_team" type="radio" value="0">
		</p>
		<h3>Where is Phoenix?</h3>
		<p>
			<label for="Texas">Texas</label>
			<input id="Texas" name="Phoenix" type="radio" value="0">
		</p>
		<p>
			<label for="Alaska">Alaska</label>
			<input id="Alaska" name="Phoenix" type="radio" value="0">
		</p>
		<p>
			<label for="Arizona">Arizona</label>
			<input id="Arizona" name="Phoenix" type="radio" value="1" >
		</p>
		<p>
			<label for="Florida">Florida</label>
			<input id="Florida" name="Phoenix" type="radio" value="0">
		</p>
		<h3>Which of the following are even?</h3>
		<p>
			<label><input type="checkbox" id="2" name="odd_even[]" value="1">2</label>
		</p>
		<p>
			<label><input type="checkbox" id="3" name="odd_even[]" value="0">3</label>
		</p>
		<p>
			<label><input type="checkbox" id="4" name="odd_even[]" value="1">4</label>
		</p>
		<p>
			<label><input type="checkbox" id="5" name="odd_even[]" value="0">5</label>
		</p>
		<p>
			<label><input type="checkbox" id="6" name="odd_even[]" value="1">6</label>
		</p>
		<p>
			<label><input type="checkbox" id="7" name="odd_even[]" value="0">7</label>
		</p>
		<p>
			<label><input type="checkbox" id="8" name="odd_even[]" value="1">8</label>
		</p>
		<p>
			<label><input type="checkbox" id="9" name="odd_even[]" value="0">9</label>
		</p>
        <h3>Are multi-select inputs particularly useful or user-friendly?</h3>
        <p>
            <select id="inputs" name="multi[]" multiple>
                <option value="1">No</option>
                <option value="1">No</option>
                <option value="0">Yes</option>
                <option value="1">No</option>
            </select>
        </p>
        <p>
            <button type="submit">Submit your answers!</button>
        </p>
	</form>

    <hr>

    <h2>Select Testing</h2>
    <form method="POST" action="/my_first_form.php">
        <p>
            <label for="select">Does the following drop-down work properly?</label>
        </p>
        <p>
            <select id="select" name="drop_down">
                <option value="1">Yes</option>
                <option selected value="0">No</option>
            </select>
        </p>
        <p>
            <button type="submit">Submit your answer</button>
        </p>
    </form>
</body>
</html>
