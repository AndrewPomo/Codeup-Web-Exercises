<?php

require_once "adlister_credentials.php";

abstract class Model
{
    /** @var PDO|null Connection to the database */
    protected static $dbc = null;

    /** @var array Database values for a single record. Array keys should be column names in the DB */
    protected $attributes = array();

    /**
     * Constructor
     *
     * An instance of a class derived from Model represents a single record in the database.
     *
     * $param array $attributes Optional array of database values to initialize the model record with
     */
    public function __construct(array $attributes = array())
    {
        self::dbConnect();
        // @TODO: Initialize the $attributes property with the passed value
        $this->attributes = $attributes;
    }

    /**
     * Connect to the DB
     *
     * This method should be called at the beginning of any function that needs to communicate with the database
     */
    protected static function dbConnect()
    {
        if (!self::$dbc) {
            self::$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    /**
     * Get a value from attributes based on its name
     *
     * @param string $name key for attributes array
     *
     * @return mixed|null value from the attributes array or null if it is undefined
     */
    public function __get($name)
    {
        return isset($this->attributes[$name]) ? $this->attributes[$name] : null;
    }

    /**
     * Set a new value for a key in attributes
     *
     * @param string $name  key for attributes array
     * @param mixed  $value value to be saved in attributes array
     */
    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    /** Store the object in the database */
    public function save()
    {
        // @TODO: Ensure there are values in the attributes array before attempting to save
        if(isset($this->attributes['id'])){
            $this->update();
        } else {
            $this->insert();
        }
        // @TODO: Call the proper database method: if the `id` is set this is an update, else it is a insert
    }

    /**
     * Insert new entry into database
     *
     * NOTE: Because this method is abstract, any child class MUST have it defined.
     */
    protected abstract function insert();

    /**
     * Update existing entry in database
     *
     * NOTE: Because this method is abstract, any child class MUST have it defined.
     */
    protected abstract function update();

    public static function delete($id)
    {
        self::dbConnect();
        // @TODO: Use prepared statements to ensure data security
        $stmt = self::$dbc->prepare('DELETE FROM users WHERE id = :id;');
        // @TODO: You will need to iterate through all the attributes to build the prepared query
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $result = $stmt->execute();
    }

    public static function destroy()
    {
        self::dbConnect();
        $stmt = self::$dbc->prepare('TRUNCATE users;');
        $result = $stmt->execute();
    }

    public function dumpData()
    {
        print_r($this->attributes);
    }
}
