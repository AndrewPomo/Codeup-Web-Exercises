<?php

// __DIR__ is a *magic constant* with the directory path containing this file.
// This allows us to correctly require_once Model.php, no matter where this file is being required from.
require_once __DIR__ . '/Model.php';
require_once __DIR__ . '/adlister_credentials.php';

class User extends Model
{
    /** Insert a new entry into the database */
    protected function insert()
    {
        // @TODO: Use prepared statements to ensure data security
        $stmt = self::$dbc->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');

        // @TODO: You will need to iterate through all the attributes to build the prepared query
        $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->password, PDO::PARAM_STR);
        
        // @TODO: After the insert, add the id back to the attributes array
        //        so the object properly represents a DB record
        $result = $stmt->execute();

        if($result) {
            $this->attributes['id'] = self::$dbc->lastInsertId();
        }
    }

    /** Update existing entry in the database */
    protected function update()
    {
        // @TODO: Use prepared statements to ensure data security
        $stmt = self::$dbc->prepare('UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id');
        // @TODO: You will need to iterate through all the attributes to build the prepared query
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->password, PDO::PARAM_STR);

        $result = $stmt->execute();

        if($result) {
            $this->attributes['id'] = self::$dbc->lastInsertId();
        }
    }

    /**
     * Find a single record in the DB based on its id
     *
     * @param int $id id of the user entry in the database
     *
     * @return User An instance of the User class with attributes array set to values from the database
     */
    public static function find($id)
    {
        // Get connection to the database
        self::dbConnect();

        // @TODO: Create select statement using prepared statements
        $stmt = self::$dbc->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);

        // @TODO: Store the result in a variable named $result
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // The following code will set the attributes on the calling object based on the result variable's contents
        $instance = null;
        if ($result) {
            $instance = new static($result);
        }
        return $instance;
    }

    /**
     * Find all records in a table
     *
     * @return User[] Array of instances of the User class with attributes set to values from database
     */
    public static function all()
    {
        self::dbConnect();
        $stmt = self::$dbc->prepare("SELECT * FROM users");
        // @TODO: Learning from the find method, return all the matching records
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $resultsArray = [];
        foreach ($results as $result)
        {
            $instance = new static($result);
            $resultsArray[] = $instance;
        }
        return $resultsArray;
    }
}
