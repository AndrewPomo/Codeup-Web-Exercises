<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        return isset($_REQUEST[$key]);
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        return self::has($key) ? $_REQUEST[$key] : $default;
    }

    public static function getString($key, $min = 1, $max = 1000)
    {
        $potentialString = self::get($key);

        if (strlen($potentialString) < $min) {
        	throw new LengthException("Your input $potentialString for $key was too short.");
        }

        if (strlen($potentialString) > $max) {
        	throw new LengthException("Your input '$potentialString' for $key was too long.");
        }

        if (!is_string($potentialString) || !is_numeric($min) || !is_numeric($max))
        {
        	throw new InvalidArgumentException("You passed an invalid argument. $key must be a string.");
        }

        if (empty($potentialString)) {
        	throw new OutOfRangeException("What exactly is an OutOfRangeException?");
        }

        if (is_numeric($potentialString)) {
        	echo $potentialString;
            throw new DomainException("Problem with input '$potentialString' for $key. Please input words instead of a number.");
        } 

        return $potentialString;

    }

    public static function getNumber($key, $min = 1, $max = 100)
    {
       	$potentialNum = self::get($key);

       	if (strlen($potentialNum) < $min) {
        	throw new RangeException("Your input '$potentialNum' for $key was too short.");
        }

        if (strlen($potentialNum) > $max) {
        	throw new RangeException("Your input '$potentialNum' for $key was too long.");
        }

        if (!is_string($potentialNum) || !is_numeric($min) || !is_numeric($max))
        {
        	throw new InvalidArgumentException("You passed an invalid argument. $potentialNum must be numeric.");
        }

        if (empty($potentialNum)) {
        	throw new OutOfRangeException("What exactly is an OutOfRangeException?");
        }

        if (!is_numeric($potentialNum)) {
            throw new DomainException("Problem with input '$potentialNum' for $key Please input a number instead of words.");
        }

        $potentialNum = (int)$potentialNum;

        return $potentialNum;
    }

    public static function getImg($fileToUpload, $target_file, $filename)
    {
    	
		$uploadOk = 1;
		$filename = basename($_FILES[$fileToUpload]["name"]);
		$imageFileType = pathinfo($target_file);


		// Check if image file is an actual image or fake image
		$check = getimagesize($_FILES[$fileToUpload]["tmp_name"]);
	    if($check !== false) {
	        $uploadOk = 1;
	    } else {
	        $uploadOk = 0;
	        throw new Exception("The file you uploaded was not an image!");
	    }
	    // Check if file already exists
		if (file_exists($target_file)) {
		    $uploadOk = 0;
		    throw new Exception("The file you uploaded already exists!");
		}
		// Check file size
		if ($_FILES[$fileToUpload]["size"] > 500000) {
		    $uploadOk = 0;
		    throw new Exception("The file you uploaded was too big!");
		}
		// Allow certain file formats
		if($imageFileType['extension'] != "jpg" && $imageFileType['extension'] != "png" && $imageFileType['extension'] != "jpeg"
		&& $imageFileType['extension'] != "gif" ) {
		    $uploadOk = 0;
		throw new Exception("The file you uploaded was not a jpg, jpeg, png or gif!");
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    throw new Exception("Your file was not uploaded. Try again!");
		// if everything is ok, try to upload file
		} else {
		    if (!move_uploaded_file($_FILES[$fileToUpload]["tmp_name"], $target_file)) {
		        throw new Exception("Sorry, there was an error uploading your file.");
		    }
		}
    }

    public static function escape($input)
    {
    	return strip_tags($input);
    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
