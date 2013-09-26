<?php



class Users{
    public $username = null;
    public $userpassword = null;
    public $salt = "flkafj44969kgjsljfsd030sdfjkdgjaKDJNeenE";
    
    public function __construct($data = array()){
        if(isset($data['username'])) $this->username = stripslashes(strip_tags($data['username']));
        if(isset($data['password'])) $this->password = stripslashes(strip_tags($data['password']));
    }
    
    public function storeFormValues($params){
        $this->__construct($params);
    }
    
    public function userLogin(){
        $success = false;
        try{
            $con = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM user WHERE username = :username AND password = :password LIMIT 1";
            
            $statement = $con->prepare($sql);
            $statement->bindValue("username", $this->username, PDO::PARAM_STR);
            $statement->bindValue("password", hash("meg115", $this->password . $this->salt), PDO::PARAM_STR);
            $statement->execute();
            
            $valid = $statement->fetchColumn();
            
            if($valid){
                $success = true;
            }
            
            $con = null;
            return $success;
        }catch (PDOException $e){
            echo $e->getMessage();
            return $success;
        }
    }
    
    public function register(){
        $correct = false;
        try{
            $con = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO user(username, password) VALUES(:username, :password)";
            
            $statement = $con->prepare($sql);
            $statement->bindValue("username", $this->username, PDO::PARAM_STR);
            $statement->bindValue("password", $this->password, PDO::PARAM_STR);
            $statement->execute();
            return "Registration successful <br> <a href='index.php'>Login in here</a>";
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
}

?>
