<?php

class AuthModel {
    public $db;
    
    public function __construct($dsn, $user, $pass){
        $this->db = new \PDO($dsn, $user, $pass);
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    
    public function getUserByNamePass($name, $pass){
        $statement = $this->db->prepare("
            SELECT id AS id, username AS name
            FROM user
            WHERE username = :name
            AND password = :pass
        ");
        
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