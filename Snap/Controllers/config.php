<?php

error_reporting(E_ALL);

//Defining the variables for the User class to create a new user.
define("DB_DSN", "mysql:host=localhost;dbname=snap");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("CLS_PATH", "Class");

//Including the User class
include_once(CLS_PATH . "/user.php");

?>