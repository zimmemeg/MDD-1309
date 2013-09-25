<?php

class AuthModel {
    public $db;
    
    //Constructing the function that will search the db for the user
    public function __construct($dsn, $user, $pass){
        $this->db = new \PDO($dsn, $user, $pass);
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    
    //Once a username is passed in, the function selectes the correct user from the database
    public function getUserByNamePass($name, $pass){
        $statement = $this->db->prepare("
            SELECT id AS id, username AS name
            FROM user
            WHERE username = :name
            AND password = :pass
        ");
        
        //Fetches all the rows of results and gives us the first one (index[0]), then returns the user
        if($statement->execute(array(':name' => $name, ':pass' => $pass))){
            $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
            if(count($rows) === 1){
                return $rows[0];
            }
        }
        return FALSE;
    }
}
?>